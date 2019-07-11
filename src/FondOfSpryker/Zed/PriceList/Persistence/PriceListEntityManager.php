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
     * {@inheritdoc}
     *
     * @param \Generated\Shared\Transfer\PriceListTransfer $priceListTransfer
     *
     * @throws
     *
     * @return \Generated\Shared\Transfer\PriceListTransfer
     */
    public function persist(PriceListTransfer $priceListTransfer): PriceListTransfer
    {
        $fosPriceListQuery = $this->getFactory()->createPriceListQuery();

        if ($priceListTransfer->getIdPriceList() !== null) {
            $fosPriceListQuery->filterByIdPriceList($priceListTransfer->getIdPriceList());
        }

        if ($priceListTransfer->getIdPriceList() === null && $priceListTransfer->getName() !== null) {
            $fosPriceListQuery->filterByName($priceListTransfer->getName());
        }

        $fosPriceList = $fosPriceListQuery->findOneOrCreate();

        $fosPriceList = $this->getFactory()
            ->createPropelPriceListMapper()
            ->mapTransferToEntity($priceListTransfer, $fosPriceList);

        $fosPriceList->save();

        $priceListTransfer->setIdPriceList($fosPriceList->getIdPriceList());

        return $priceListTransfer;
    }

    /**
     * {@inheritdoc}
     *
     * @param int $idProductList
     *
     * @throws
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
     * {@inheritdoc}
     *
     * @param string $name
     *
     * @throws
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
