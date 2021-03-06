<?php

namespace FondOfSpryker\Zed\PriceList\Persistence;

use Generated\Shared\Transfer\PriceListCollectionTransfer;
use Generated\Shared\Transfer\PriceListTransfer;
use Spryker\Zed\Kernel\Persistence\AbstractRepository;

/**
 * @method \FondOfSpryker\Zed\PriceList\Persistence\PriceListPersistenceFactory getFactory()
 */
class PriceListRepository extends AbstractRepository implements PriceListRepositoryInterface
{
    /**
     * {@inheritDoc}
     *
     * @param int $idPriceList
     *
     * @return \Generated\Shared\Transfer\PriceListTransfer|null
     */
    public function getById(int $idPriceList): ?PriceListTransfer
    {
        $fosPriceList = $this->getFactory()
            ->createPriceListQuery()
            ->filterByIdPriceList($idPriceList)
            ->findOne();

        if (!$fosPriceList) {
            return null;
        }

        return $this->getFactory()
            ->createPropelPriceListMapper()
            ->mapEntityToTransfer($fosPriceList, new PriceListTransfer());
    }

    /**
     * {@inheritDoc}
     *
     * @param string $name
     *
     * @return \Generated\Shared\Transfer\PriceListTransfer|null
     */
    public function getByName(string $name): ?PriceListTransfer
    {
        $fosPriceList = $this->getFactory()
            ->createPriceListQuery()
            ->filterByName($name)
            ->findOne();

        if (!$fosPriceList) {
            return null;
        }

        return $this->getFactory()
            ->createPropelPriceListMapper()
            ->mapEntityToTransfer($fosPriceList, new PriceListTransfer());
    }

    /**
     * {@inheritDoc}
     *
     * @return \Generated\Shared\Transfer\PriceListCollectionTransfer
     */
    public function getAll(): PriceListCollectionTransfer
    {
        $fosPriceLists = $this->getFactory()
            ->createPriceListQuery()
            ->find();

        $priceListCollectionTransfer = new PriceListCollectionTransfer();

        foreach ($fosPriceLists as $fosPriceList) {
            $priceListTransfer = $this->getFactory()
                ->createPropelPriceListMapper()
                ->mapEntityToTransfer($fosPriceList, new PriceListTransfer());

            $priceListCollectionTransfer->addPriceList($priceListTransfer);
        }

        return $priceListCollectionTransfer;
    }
}
