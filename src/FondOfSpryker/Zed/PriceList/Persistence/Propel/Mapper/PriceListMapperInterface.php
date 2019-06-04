<?php

namespace FondOfSpryker\Zed\PriceList\Persistence\Propel\Mapper;

use Generated\Shared\Transfer\PriceListTransfer;
use Orm\Zed\PriceList\Persistence\FosPriceList;

interface PriceListMapperInterface
{
    /**
     * @param \Generated\Shared\Transfer\PriceListTransfer $priceListTransfer
     * @param \Orm\Zed\PriceList\Persistence\FosPriceList $fosPriceList
     *
     * @return \Orm\Zed\PriceList\Persistence\FosPriceList
     */
    public function mapTransferToEntity(
        PriceListTransfer $priceListTransfer,
        FosPriceList $fosPriceList
    ): FosPriceList;

    /**
     * @param \Orm\Zed\PriceList\Persistence\FosPriceList $fosPriceList
     * @param \Generated\Shared\Transfer\PriceListTransfer $priceListTransfer
     *
     * @return \Generated\Shared\Transfer\PriceListTransfer
     */
    public function mapEntityToTransfer(
        FosPriceList $fosPriceList,
        PriceListTransfer $priceListTransfer
    ): PriceListTransfer;
}
