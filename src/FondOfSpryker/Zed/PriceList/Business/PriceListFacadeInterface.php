<?php

namespace FondOfSpryker\Zed\PriceList\Business;

use Generated\Shared\Transfer\PriceListTransfer;

interface PriceListFacadeInterface
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
    public function findPriceListById(PriceListTransfer $priceListTransfer): ?PriceListTransfer;
}
