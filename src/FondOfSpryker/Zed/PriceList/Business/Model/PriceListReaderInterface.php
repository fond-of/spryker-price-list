<?php

namespace FondOfSpryker\Zed\PriceList\Business\Model;

use Generated\Shared\Transfer\PriceListTransfer;

interface PriceListReaderInterface
{
    /**
     * @param \Generated\Shared\Transfer\PriceListTransfer $priceListTransfer
     *
     * @return \Generated\Shared\Transfer\PriceListTransfer|null
     */
    public function findById(PriceListTransfer $priceListTransfer): ?PriceListTransfer;

    /**
     * @param \Generated\Shared\Transfer\PriceListTransfer $priceListTransfer
     *
     * @return \Generated\Shared\Transfer\PriceListTransfer|null
     */
    public function findByName(PriceListTransfer $priceListTransfer): ?PriceListTransfer;
}
