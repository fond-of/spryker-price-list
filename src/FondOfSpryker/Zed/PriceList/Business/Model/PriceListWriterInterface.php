<?php

namespace FondOfSpryker\Zed\PriceList\Business\Model;

use Generated\Shared\Transfer\PriceListTransfer;

interface PriceListWriterInterface
{
    /**
     * @param \Generated\Shared\Transfer\PriceListTransfer $priceListTransfer
     *
     * @return \Generated\Shared\Transfer\PriceListTransfer
     */
    public function persist(PriceListTransfer $priceListTransfer): PriceListTransfer;

    /**
     * @param \Generated\Shared\Transfer\PriceListTransfer $priceListTransfer
     *
     * @return void
     */
    public function deleteById(PriceListTransfer $priceListTransfer): void;

    /**
     * @param \Generated\Shared\Transfer\PriceListTransfer $priceListTransfer
     *
     * @return void
     */
    public function deleteByName(PriceListTransfer $priceListTransfer): void;
}