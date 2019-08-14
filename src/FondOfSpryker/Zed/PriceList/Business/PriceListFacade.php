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
     * @api
     *
     * @param \Generated\Shared\Transfer\PriceListTransfer $priceListTransfer
     *
     * @return \Generated\Shared\Transfer\PriceListTransfer|null
     */
    public function findPriceListById(PriceListTransfer $priceListTransfer): ?PriceListTransfer
    {
        return $this->getFactory()->createPriceListReader()->findById($priceListTransfer);
    }

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\PriceListTransfer $priceListTransfer
     *
     * @return \Generated\Shared\Transfer\PriceListTransfer|null
     */
    public function findPriceListByName(PriceListTransfer $priceListTransfer): ?PriceListTransfer
    {
        return $this->getFactory()->createPriceListReader()->findByName($priceListTransfer);
    }

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\PriceListTransfer $priceListTransfer
     *
     * @return void
     */
    public function deletePriceListById(PriceListTransfer $priceListTransfer): void
    {
        $this->getFactory()->createPriceListWriter()->deleteById($priceListTransfer);
    }

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\PriceListTransfer $priceListTransfer
     *
     * @return void
     */
    public function deletePriceListByName(PriceListTransfer $priceListTransfer): void
    {
        $this->getFactory()->createPriceListWriter()->deleteByName($priceListTransfer);
    }

    /**
     * {@inheritdoc}
     *
     * * @api
     *
     * @return \Generated\Shared\Transfer\PriceListCollectionTransfer
     */
    public function getPriceListCollection(): PriceListCollectionTransfer
    {
        return $this->getFactory()->createPriceListReader()->findAll();
    }

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\PriceListTransfer $priceListTransfer
     *
     * @return \Generated\Shared\Transfer\PriceListTransfer
     */
    public function createPriceList(PriceListTransfer $priceListTransfer): PriceListTransfer
    {
        return $this->getFactory()->createPriceListWriter()->create($priceListTransfer);
    }

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\PriceListTransfer $priceListTransfer
     *
     * @return \Generated\Shared\Transfer\PriceListTransfer
     */
    public function updatePriceList(PriceListTransfer $priceListTransfer): PriceListTransfer
    {
        return $this->getFactory()->createPriceListWriter()->update($priceListTransfer);
    }
}
