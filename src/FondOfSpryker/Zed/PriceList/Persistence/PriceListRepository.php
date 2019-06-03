<?php

namespace FondOfSpryker\Zed\PriceList\Persistence;

use Generated\Shared\Transfer\PriceListTransfer;
use Spryker\Zed\Kernel\Persistence\AbstractRepository;

/**
 * @method \FondOfSpryker\Zed\PriceList\Persistence\PriceListPersistenceFactory getFactory()
 */
class PriceListRepository extends AbstractRepository implements PriceListRepositoryInterface
{
    /**
     * {@inheritdoc}
     *
     * @param int $idPriceList
     *
     * @throws
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
     * {@inheritdoc}
     *
     * @param int|string $name
     *
     * @throws
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
}
