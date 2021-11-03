<?php

namespace FondOfSpryker\Zed\PriceList\Persistence\Propel\Mapper;

use Generated\Shared\Transfer\PriceListTransfer;
use Orm\Zed\PriceList\Persistence\Base\FosPriceList;
use Propel\Runtime\Collection\ObjectCollection;

interface PriceListMapperInterface
{
    /**
     * @param \Generated\Shared\Transfer\PriceListTransfer $priceListTransfer
     *
     * @return \Orm\Zed\PriceList\Persistence\Base\FosPriceList
     */
    public function mapTransferToEntity(PriceListTransfer $priceListTransfer): FosPriceList;

    /**
     * @param \Orm\Zed\PriceList\Persistence\Base\FosPriceList $entity
     *
     * @return \Generated\Shared\Transfer\PriceListTransfer
     */
    public function mapEntityToTransfer(\Orm\Zed\PriceList\Persistence\Base\FosPriceList $entity): PriceListTransfer;

    /**
     * @param \Propel\Runtime\Collection\ObjectCollection|\Orm\Zed\PriceList\Persistence\Base\FosPriceList[] $entityCollection
     *
     * @return \Generated\Shared\Transfer\PriceListTransfer[]
     */
    public function mapEntityCollectionToTransfers(ObjectCollection $entityCollection): array;
}
