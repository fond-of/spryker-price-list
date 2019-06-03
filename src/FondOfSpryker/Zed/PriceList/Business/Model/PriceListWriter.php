<?php

namespace FondOfSpryker\Zed\PriceList\Business\Model;

use FondOfSpryker\Zed\PriceList\Persistence\PriceListEntityManagerInterface;
use Generated\Shared\Transfer\PriceListTransfer;

class PriceListWriter implements PriceListWriterInterface
{
    /**
     * @var \FondOfSpryker\Zed\PriceList\Persistence\PriceListEntityManagerInterface
     */
    protected $entityManager;

    /**
     * @param \FondOfSpryker\Zed\PriceList\Persistence\PriceListEntityManagerInterface $entityManager
     */
    public function __construct(PriceListEntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @param \Generated\Shared\Transfer\PriceListTransfer $priceListTransfer
     *
     * @return \Generated\Shared\Transfer\PriceListTransfer
     */
    public function persist(PriceListTransfer $priceListTransfer): PriceListTransfer
    {
        $priceListTransfer->requireName();

        return $this->entityManager->persist($priceListTransfer);
    }

    /**
     * @param \Generated\Shared\Transfer\PriceListTransfer $priceListTransfer
     *
     * @return void
     */
    public function deleteById(PriceListTransfer $priceListTransfer): void
    {
        $priceListTransfer->requireIdPriceList();

        $this->entityManager->deleteById($priceListTransfer->getIdPriceList());
    }

    /**
     * @param \Generated\Shared\Transfer\PriceListTransfer $priceListTransfer
     *
     * @return void
     */
    public function deleteByName(PriceListTransfer $priceListTransfer): void
    {
        $priceListTransfer->requireName();

        $this->entityManager->deleteByName($priceListTransfer->getName());
    }
}