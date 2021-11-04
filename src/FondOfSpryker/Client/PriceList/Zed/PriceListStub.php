<?php

namespace FondOfSpryker\Client\PriceList\Zed;

use FondOfSpryker\Client\PriceList\Dependency\Client\PriceListToZedRequestClientInterface;
use Generated\Shared\Transfer\PriceListListTransfer;

class PriceListStub implements PriceListStubInterface
{
    /**
     * @var \FondOfSpryker\Client\PriceList\Dependency\Client\PriceListToZedRequestClientInterface
     */
    protected $zedRequestClient;

    /**
     * @param \FondOfSpryker\Client\PriceList\Dependency\Client\PriceListToZedRequestClientInterface $zedRequestClient
     */
    public function __construct(PriceListToZedRequestClientInterface $zedRequestClient)
    {
        $this->zedRequestClient = $zedRequestClient;
    }

    /**
     * @param \Generated\Shared\Transfer\PriceListListTransfer $priceListListTransfer
     *
     * @return \Generated\Shared\Transfer\PriceListListTransfer
     */
    public function findPriceLists(PriceListListTransfer $priceListListTransfer): PriceListListTransfer
    {
        /** @var \Generated\Shared\Transfer\PriceListListTransfer $priceListListTransfer */
        $priceListListTransfer = $this->zedRequestClient->call(
            '/price-list/gateway/find-price-lists',
            $priceListListTransfer
        );

        return $priceListListTransfer;
    }
}
