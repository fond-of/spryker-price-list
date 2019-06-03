<?php

namespace FondOfSpryker\Zed\PriceList\Business;

use FondOfSpryker\Zed\PriceList\Business\Model\PriceListReader;
use FondOfSpryker\Zed\PriceList\Business\Model\PriceListReaderInterface;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

/**
 * @method \FondOfSpryker\Zed\PriceList\PriceListConfig getConfig()
 * @method \FondOfSpryker\Zed\PriceList\Persistence\PriceListRepositoryInterface getRepository()
 */
class PriceListBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return \FondOfSpryker\Zed\PriceList\Business\Model\PriceListReaderInterface
     */
    public function createPriceListReader(): PriceListReaderInterface
    {
        return new PriceListReader(
            $this->getRepository()
        );
    }
}
