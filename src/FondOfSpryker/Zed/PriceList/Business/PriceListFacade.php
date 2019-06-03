<?php

namespace FondOfSpryker\Zed\PriceList\Business;

use Generated\Shared\Transfer\PriceListTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \FondOfSpryker\Zed\PriceList\Business\PriceListBusinessFactory getFactory()
 * @method \FondOfSpryker\Zed\PriceList\Persistence\PriceListRepositoryInterface getRepository()
 */
class PriceListFacade extends AbstractFacade implements PriceListFacadeInterface
{
    /**
     * Specification:
     * - Finds a price list by price list id in provided transfer.
     * - Returns MerchantTransfer if found, NULL otherwise.
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
}
