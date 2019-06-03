<?php

namespace FondOfSpryker\Zed\PriceList\Persistence;

use Generated\Shared\Transfer\PriceListTransfer;

interface PriceListRepositoryInterface
{
    /**
     * Specification:
     * - Returns a PriceListTransfer by price list id.
     * - Returns null in case a record is not found.
     *
     * @api
     *
     * @param int $idPriceList
     *
     * @return \Generated\Shared\Transfer\PriceListTransfer|null
     */
    public function getById(int $idPriceList): ?PriceListTransfer;

    /**
     * Specification:
     * - Returns a PriceListTransfer by price list name.
     * - Returns null in case a record is not found.
     *
     * @api
     *
     * @param int|string $name
     *
     * @return \Generated\Shared\Transfer\PriceListTransfer|null
     */
    public function getByName(string $name): ?PriceListTransfer;
}
