<?php

namespace FondOfSpryker\Zed\PriceList\Business\Model;

use FondOfSpryker\Zed\PriceList\Persistence\PriceListRepositoryInterface;
use Generated\Shared\Transfer\PriceListTransfer;

class PriceListReader implements PriceListReaderInterface
{
    /**
     * @var \FondOfSpryker\Zed\PriceList\Persistence\PriceListRepositoryInterface
     */
    protected $repository;

    /**
     * @param \FondOfSpryker\Zed\PriceList\Persistence\PriceListRepositoryInterface $repository
     */
    public function __construct(PriceListRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param \Generated\Shared\Transfer\PriceListTransfer $priceListTransfer
     *
     * @return \Generated\Shared\Transfer\PriceListTransfer|null
     */
    public function findById(PriceListTransfer $priceListTransfer): ?PriceListTransfer
    {
        $priceListTransfer->requireIdPriceList();

        return $this->repository->getById($priceListTransfer->getIdPriceList());
    }

    /**
     * @param \Generated\Shared\Transfer\PriceListTransfer $priceListTransfer
     *
     * @return \Generated\Shared\Transfer\PriceListTransfer|null
     */
    public function findByName(PriceListTransfer $priceListTransfer): ?PriceListTransfer
    {
        $priceListTransfer->requireName();

        return $this->repository->getByName($priceListTransfer->getName());
    }
}
