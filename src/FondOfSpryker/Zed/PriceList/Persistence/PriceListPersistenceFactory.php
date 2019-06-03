<?php

namespace FondOfSpryker\Zed\PriceList\Persistence;

use FondOfSpryker\Zed\PriceList\Persistence\Propel\Mapper\PriceListMapper;
use FondOfSpryker\Zed\PriceList\Persistence\Propel\Mapper\PriceListMapperInterface;
use Spryker\Zed\Kernel\Persistence\AbstractPersistenceFactory;

/**
 * @method \FondOfSpryker\Zed\PriceList\PriceListConfig getConfig()
 * @method \FondOfSpryker\Zed\PriceList\Persistence\PriceListRepositoryInterface getRepository()
 */
class PriceListPersistenceFactory extends AbstractPersistenceFactory
{
    /**
     * @return \FondOfSpryker\Zed\PriceList\Persistence\Propel\Mapper\PriceListMapperInterface
     */
    public function createPropelPriceListMapper(): PriceListMapperInterface
    {
        return new PriceListMapper();
    }
}
