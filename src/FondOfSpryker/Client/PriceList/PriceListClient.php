<?php

namespace FondOfSpryker\Client\PriceList;

use Generated\Shared\Transfer\PriceListListTransfer;
use Spryker\Client\Kernel\AbstractClient;

/**
 * @method \FondOfSpryker\Client\PriceList\PriceListFactory getFactory()
 */
class PriceListClient extends AbstractClient implements PriceListClientInterface
{
    /**
     * @param \Generated\Shared\Transfer\PriceListListTransfer $priceListListTransfer
     *
     * @return \Generated\Shared\Transfer\PriceListListTransfer
     */
    public function findPriceLists(PriceListListTransfer $priceListListTransfer): PriceListListTransfer
    {
        return $this->getFactory()->createZedPriceListStub()->findPriceLists($priceListListTransfer);
    }
}
