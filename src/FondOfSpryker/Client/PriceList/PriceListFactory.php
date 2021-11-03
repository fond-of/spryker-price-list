<?php

namespace FondOfSpryker\Client\PriceList;

use FondOfSpryker\Client\PriceList\Dependency\Client\PriceListToZedRequestClientInterface;
use FondOfSpryker\Client\PriceList\Zed\PriceListStub;
use FondOfSpryker\Client\PriceList\Zed\PriceListStubInterface;
use Spryker\Client\Kernel\AbstractFactory;

class PriceListFactory extends AbstractFactory
{
    /**
     * @return \FondOfSpryker\Client\PriceList\Zed\PriceListStubInterface
     */
    public function createZedPriceListStub(): PriceListStubInterface
    {
        return new PriceListStub($this->getZedRequestClient());
    }

    /**
     * @return \FondOfSpryker\Client\PriceList\Dependency\Client\PriceListToZedRequestClientInterface
     */
    protected function getZedRequestClient(): PriceListToZedRequestClientInterface
    {
        return $this->getProvidedDependency(PriceListDependencyProvider::CLIENT_ZED_REQUEST);
    }
}
