<?php

namespace FondOfSpryker\Zed\PriceList\Persistence;

use Generated\Shared\Transfer\PriceListTransfer;
use Spryker\Zed\Kernel\Persistence\AbstractEntityManager;

/**
 * @method \FondOfSpryker\Zed\PriceList\Persistence\PriceListPersistenceFactory getFactory()
 */
class PriceListEntityManager extends AbstractEntityManager implements PriceListEntityManagerInterface
{
    /**
     * {@inheritDoc}
     *
     * @param \Generated\Shared\Transfer\PriceListTransfer $priceListTransfer
     *
     * @return \Generated\Shared\Transfer\PriceListTransfer
     */
    public function persist(PriceListTransfer $priceListTransfer): PriceListTransfer
    {
        $fosPriceListQuery = $this->getFactory()->createPriceListQuery();

        $fosPriceList = $fosPriceListQuery
            ->filterByIdPriceList($priceListTransfer->getIdPriceList())
            ->findOneOrCreate();

        $fosPriceList = $this->getFactory()
            ->createPropelPriceListMapper()
            ->mapTransferToEntity($priceListTransfer, $fosPriceList);

        $fosPriceList->save();

        $priceListTransfer->setIdPriceList($fosPriceList->getIdPriceList());

        return $priceListTransfer;
    }

    /**
     * {@inheritDoc}
     *
     * @param int $idProductList
     *
     * @return void
     */
    public function deleteById(int $idProductList): void
    {
        $this->getFactory()
            ->createPriceListQuery()
            ->filterByIdPriceList($idProductList)
            ->delete();
    }

    /**
     * {@inheritDoc}
     *
     * @param string $name
     *
     * @return void
     */
    public function deleteByName(string $name): void
    {
        $this->getFactory()
            ->createPriceListQuery()
            ->filterByName($name)
            ->delete();
    }
}
