<?php

namespace FondOfSpryker\Zed\PriceList\Business\Model;

use Generated\Shared\Transfer\PriceListCollectionTransfer;
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

    /**
     * @return \Generated\Shared\Transfer\PriceListCollectionTransfer
     */
    public function findAll(): PriceListCollectionTransfer;
}
