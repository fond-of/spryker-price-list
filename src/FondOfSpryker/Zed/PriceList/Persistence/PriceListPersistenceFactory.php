<?php

namespace FondOfSpryker\Zed\PriceList\Persistence;

use FondOfSpryker\Zed\PriceList\Persistence\Propel\Mapper\PriceListMapper;
use FondOfSpryker\Zed\PriceList\Persistence\Propel\Mapper\PriceListMapperInterface;
use FondOfSpryker\Zed\PriceList\Persistence\Propel\QueryBuilder\PriceListQueryJoinQueryBuilder;
use FondOfSpryker\Zed\PriceList\Persistence\Propel\QueryBuilder\PriceListQueryJoinQueryBuilderInterface;
use FondOfSpryker\Zed\PriceList\Persistence\Propel\QueryBuilder\PriceListSearchFilterFieldQueryBuilder;
use FondOfSpryker\Zed\PriceList\Persistence\Propel\QueryBuilder\PriceListSearchFilterFieldQueryBuilderInterface;
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
    public function createPriceListMapper(): PriceListMapperInterface
    {
        return new PriceListMapper();
    }

    /**
     * @return \FondOfSpryker\Zed\PriceList\Persistence\Propel\QueryBuilder\PriceListQueryJoinQueryBuilderInterface
     */
    public function createPriceListQueryJoinQueryBuilder(): PriceListQueryJoinQueryBuilderInterface
    {
        return new PriceListQueryJoinQueryBuilder();
    }

    /**
     * @return \FondOfSpryker\Zed\PriceList\Persistence\Propel\QueryBuilder\PriceListSearchFilterFieldQueryBuilderInterface
     */
    public function createPriceListSearchFilterFieldQueryBuilder(): PriceListSearchFilterFieldQueryBuilderInterface
    {
        return new PriceListSearchFilterFieldQueryBuilder(
            $this->getConfig()
        );
    }
}
