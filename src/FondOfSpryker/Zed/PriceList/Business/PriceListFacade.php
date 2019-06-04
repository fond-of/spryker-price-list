<?php

namespace FondOfSpryker\Zed\PriceList\Business;

use Generated\Shared\Transfer\PriceListCollectionTransfer;
use Generated\Shared\Transfer\PriceListTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \FondOfSpryker\Zed\PriceList\Business\PriceListBusinessFactory getFactory()
 * @method \FondOfSpryker\Zed\PriceList\Persistence\PriceListRepositoryInterface getRepository()
 * @method \FondOfSpryker\Zed\PriceList\Persistence\PriceListEntityManagerInterface getEntityManager()
 */
class PriceListFacade extends AbstractFacade implements PriceListFacadeInterface
{
    /**
     * {@inheritdoc}
     *
     * @param \Generated\Shared\Transfer\PriceListTransfer $priceListTransfer
     *
     * @return \Generated\Shared\Transfer\PriceListTransfer|null
     * @api
     *
     */
    public function findPriceListById(PriceListTransfer $priceListTransfer): ?PriceListTransfer
    {
        return $this->getFactory()->createPriceListReader()->findById($priceListTransfer);
    }

    /**
     * {@inheritdoc}
     *
     * @param \Generated\Shared\Transfer\PriceListTransfer $priceListTransfer
     *
     * @return \Generated\Shared\Transfer\PriceListTransfer|null
     * @api
     *
     */
    public function findPriceListByName(PriceListTransfer $priceListTransfer): ?PriceListTransfer
    {
        return $this->getFactory()->createPriceListReader()->findByName($priceListTransfer);
    }

    /**
     * {@inheritdoc}
     *
     * @param \Generated\Shared\Transfer\PriceListTransfer $priceListTransfer
     *
     * @return \Generated\Shared\Transfer\PriceListTransfer
     * @api
     *
     */
    public function persistPriceList(PriceListTransfer $priceListTransfer): PriceListTransfer
    {
        return $this->getFactory()->createPriceListWriter()->persist($priceListTransfer);
    }

    /**
     * {@inheritdoc}
     *
     * @param \Generated\Shared\Transfer\PriceListTransfer $priceListTransfer
     *
     * @return void
     * @api
     *
     */
    public function deletePriceListById(PriceListTransfer $priceListTransfer): void
    {
        $this->getFactory()->createPriceListWriter()->deleteById($priceListTransfer);
    }

    /**
     * {@inheritdoc}
     *
     * @param \Generated\Shared\Transfer\PriceListTransfer $priceListTransfer
     *
     * @return void
     * @api
     *
     */
    public function deletePriceListByName(PriceListTransfer $priceListTransfer): void
    {
        $this->getFactory()->createPriceListWriter()->deleteByName($priceListTransfer);
    }

    /**
     * {@inheritdoc}
     *
     * @return \Generated\Shared\Transfer\PriceListCollectionTransfer
     * @api
     *
     */
    public function getPriceListCollection(): PriceListCollectionTransfer
    {
        return $this->getFactory()->createPriceListReader()->findAll();
    }
}
