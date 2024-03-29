<?php

namespace FondOfSpryker\Zed\PriceList\Business\Model;

use FondOfSpryker\Zed\PriceList\Persistence\PriceListRepositoryInterface;
use Generated\Shared\Transfer\PriceListCollectionTransfer;
use Generated\Shared\Transfer\PriceListListTransfer;
use Generated\Shared\Transfer\PriceListTransfer;
use Generated\Shared\Transfer\QueryJoinCollectionTransfer;

class PriceListReader implements PriceListReaderInterface
{
    /**
     * @var \FondOfSpryker\Zed\PriceList\Persistence\PriceListRepositoryInterface
     */
    protected $repository;

    /**
     * @var array<\FondOfOryx\Zed\PriceListExtension\Dependency\Plugin\SearchPriceListQueryExpanderPluginInterface>
     */
    protected $searchPriceListQueryExpanderPlugins;

    /**
     * @var array<int, \Generated\Shared\Transfer\PriceListTransfer>
     */
    protected static $cachePriceListTransfers = [];

    /**
     * @param \FondOfSpryker\Zed\PriceList\Persistence\PriceListRepositoryInterface $repository
     * @param array<\FondOfOryx\Zed\PriceListExtension\Dependency\Plugin\SearchPriceListQueryExpanderPluginInterface> $searchPriceListQueryExpanderPlugins
     */
    public function __construct(
        PriceListRepositoryInterface $repository,
        array $searchPriceListQueryExpanderPlugins = []
    ) {
        $this->repository = $repository;
        $this->searchPriceListQueryExpanderPlugins = $searchPriceListQueryExpanderPlugins;
    }

    /**
     * @param \Generated\Shared\Transfer\PriceListTransfer $priceListTransfer
     *
     * @return \Generated\Shared\Transfer\PriceListTransfer|null
     */
    public function findById(PriceListTransfer $priceListTransfer): ?PriceListTransfer
    {
        $idPriceList = $priceListTransfer->getIdPriceListOrFail();

        if (!array_key_exists($idPriceList, static::$cachePriceListTransfers)) {
            static::$cachePriceListTransfers[$idPriceList] = $this->repository->getById($idPriceList);
        }

        return static::$cachePriceListTransfers[$idPriceList];
    }

    /**
     * @param \Generated\Shared\Transfer\PriceListTransfer $priceListTransfer
     *
     * @return \Generated\Shared\Transfer\PriceListTransfer|null
     */
    public function findByName(PriceListTransfer $priceListTransfer): ?PriceListTransfer
    {
        $priceListTransfer->requireName();

        return $this->repository->getByName($priceListTransfer->getName());
    }

    /**
     * @return \Generated\Shared\Transfer\PriceListCollectionTransfer
     */
    public function findAll(): PriceListCollectionTransfer
    {
        return $this->repository->getAll();
    }

    /**
     * @param \Generated\Shared\Transfer\PriceListListTransfer $priceListListTransfer
     *
     * @return \Generated\Shared\Transfer\PriceListListTransfer
     */
    public function findByPriceListList(PriceListListTransfer $priceListListTransfer): PriceListListTransfer
    {
        $priceListListTransfer = $this->executeSearchPriceListQueryExpanderPlugins($priceListListTransfer);

        return $this->repository->findPriceLists($priceListListTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\PriceListListTransfer $priceListListTransfer
     *
     * @return \Generated\Shared\Transfer\PriceListListTransfer
     */
    protected function executeSearchPriceListQueryExpanderPlugins(PriceListListTransfer $priceListListTransfer): PriceListListTransfer
    {
        $queryJoinCollectionTransfer = new QueryJoinCollectionTransfer();
        $filterTransfers = $priceListListTransfer->getFilterFields()->getArrayCopy();

        foreach ($this->searchPriceListQueryExpanderPlugins as $searchPriceListQueryExpanderPlugin) {
            if ($searchPriceListQueryExpanderPlugin->isApplicable($filterTransfers)) {
                $queryJoinCollectionTransfer = $searchPriceListQueryExpanderPlugin->expand(
                    $filterTransfers,
                    $queryJoinCollectionTransfer,
                );
            }
        }

        return $priceListListTransfer->setQueryJoins($queryJoinCollectionTransfer);
    }
}
