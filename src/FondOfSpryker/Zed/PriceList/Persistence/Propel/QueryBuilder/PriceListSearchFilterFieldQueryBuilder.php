<?php

namespace FondOfSpryker\Zed\PriceList\Persistence\Propel\QueryBuilder;

use Generated\Shared\Transfer\FilterFieldTransfer;
use Generated\Shared\Transfer\PriceListListTransfer;
use Orm\Zed\PriceList\Persistence\Base\FosPriceListQuery;

class PriceListSearchFilterFieldQueryBuilder implements PriceListSearchFilterFieldQueryBuilderInterface
{
    /**
     * @var string
     */
    protected const FILTER_FIELD_TYPE_ORDER_BY = 'orderBy';

    /**
     * @var string
     */
    protected const DELIMITER_ORDER_BY = '::';

    /**
     * @inheritDoc
     */
    public function addSalesOrderQueryFilters(
        FosPriceListQuery $priceListQuery,
        PriceListListTransfer $priceListListTransfer
    ): FosPriceListQuery {
        foreach ($priceListListTransfer->getFilterFields() as $filterFieldTransfer) {
            $priceListQuery = $this->addQueryFilter($priceListQuery, $filterFieldTransfer);
        }

        return $priceListQuery;
    }

    protected function addQueryFilter(
        FosPriceListQuery $priceListQuery,
        FilterFieldTransfer $filterFieldTransfer
    ): FosPriceListQuery {
        $filterFieldType = $filterFieldTransfer->getType();

        if ($filterFieldType === static::FILTER_FIELD_TYPE_ORDER_BY) {
            return $this->addOrderByFilter(
                $priceListQuery,
                $filterFieldTransfer
            );
        }

        return $priceListQuery;
    }

    /**
     * @param \Orm\Zed\PriceList\Persistence\Base\FosPriceListQuery $salesOrderQuery
     * @param \Generated\Shared\Transfer\FilterFieldTransfer $filterFieldTransfer
     *
     * @return \Orm\Zed\PriceList\Persistence\Base\FosPriceListQuery
     */
    protected function addOrderByFilter(
        FosPriceListQuery $salesOrderQuery,
        FilterFieldTransfer $filterFieldTransfer
    ): FosPriceListQuery {
        [$orderColumn, $orderDirection] = explode(static::DELIMITER_ORDER_BY, $filterFieldTransfer->getValue());

        if ($orderColumn) {
            $salesOrderQuery->orderBy($orderColumn, $orderDirection);
        }

        return $salesOrderQuery;
    }
}
