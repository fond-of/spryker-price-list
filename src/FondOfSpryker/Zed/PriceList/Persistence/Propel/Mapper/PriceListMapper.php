<?php

namespace FondOfSpryker\Zed\PriceList\Persistence\Propel\Mapper;

use Generated\Shared\Transfer\PriceListTransfer;
use Orm\Zed\PriceList\Persistence\FosPriceList;
use Propel\Runtime\Collection\ObjectCollection;

class PriceListMapper implements PriceListMapperInterface
{
    /**
     * @param \Generated\Shared\Transfer\PriceListTransfer $priceListTransfer
     *
     * @return \Orm\Zed\PriceList\Persistence\Base\FosPriceList
     */
    public function mapTransferToEntity(PriceListTransfer $priceListTransfer): FosPriceList
    {
        $fosPriceList = new FosPriceList();

        $fosPriceList->fromArray(
            $priceListTransfer->modifiedToArray(false)
        );

        return $fosPriceList;
    }

    /**
     * @param \Orm\Zed\PriceList\Persistence\Base\FosPriceList $entity
     *
     * @return \Generated\Shared\Transfer\PriceListTransfer
     */
    public function mapEntityToTransfer(\Orm\Zed\PriceList\Persistence\Base\FosPriceList $entity): PriceListTransfer
    {
        return (new PriceListTransfer())
            ->fromArray($entity->toArray(), true);
    }

    /**
     * @param \Propel\Runtime\Collection\ObjectCollection|\Orm\Zed\PriceList\Persistence\Base\FosPriceList[] $entityCollection
     *
     * @return \Generated\Shared\Transfer\PriceListTransfer[]
     */
    public function mapEntityCollectionToTransfers(ObjectCollection $entityCollection): array
    {
        $transfers = [];

        foreach ($entityCollection as $entity) {
            $transfers[] = $this->mapEntityToTransfer($entity);
        }

        return $transfers;
    }
}
