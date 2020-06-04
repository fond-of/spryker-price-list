<?php

namespace FondOfSpryker\Zed\PriceList\Persistence;

use FondOfSpryker\Zed\PriceList\Persistence\Propel\Mapper\PriceListMapper;
use FondOfSpryker\Zed\PriceList\Persistence\Propel\Mapper\PriceListMapperInterface;
use Orm\Zed\PriceList\Persistence\FosPriceListQuery;
use Spryker\Zed\Kernel\Persistence\AbstractPersistenceFactory;

/**
 * @method \FondOfSpryker\Zed\PriceList\PriceListConfig getConfig()
 * @method \FondOfSpryker\Zed\PriceList\Persistence\PriceListRepositoryInterface getRepository()
 * @method \FondOfSpryker\Zed\PriceList\Persistence\PriceListEntityManagerInterface getEntityManager()
 */
class PriceListPersistenceFactory extends AbstractPersistenceFactory
{
    /**
     * @return \Orm\Zed\PriceList\Persistence\FosPriceListQuery
     */
    public function createPriceListQuery(): FosPriceListQuery
    {
        return FosPriceListQuery::create();
    }

    /**
     * @return \FondOfSpryker\Zed\PriceList\Persistence\Propel\Mapper\PriceListMapperInterface
     */
    public function createPropelPriceListMapper(): PriceListMapperInterface
    {
        return new PriceListMapper();
    }
}
