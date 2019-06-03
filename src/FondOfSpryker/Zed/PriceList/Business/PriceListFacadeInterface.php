<?php

namespace FondOfSpryker\Zed\PriceList\Business;

use Generated\Shared\Transfer\PriceListTransfer;

interface PriceListFacadeInterface
{
    /**
     * Specification:
     * - Finds a price list by price list id in provided transfer.
     * - Returns PriceListTransfer if found, NULL otherwise.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\PriceListTransfer $priceListTransfer
     *
     * @return \Generated\Shared\Transfer\PriceListTransfer|null
     */
    public function findPriceListById(PriceListTransfer $priceListTransfer): ?PriceListTransfer;

    /**
     * Specification:
     * - Finds a price list by price list name in provided transfer.
     * - Returns PriceListTransfer if found, NULL otherwise.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\PriceListTransfer $priceListTransfer
     *
     * @return \Generated\Shared\Transfer\PriceListTransfer|null
     */
    public function findPriceListByName(PriceListTransfer $priceListTransfer): ?PriceListTransfer;

    /**
     * Specification:
     * - Finds a price list record by ID and NAME in DB.
     * - Uses incoming transfer to create or update entity.
     * - Persists the entity to DB.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\PriceListTransfer $priceListTransfer
     *
     * @return \Generated\Shared\Transfer\PriceListTransfer
     */
    public function persistPriceList(PriceListTransfer $priceListTransfer): PriceListTransfer;

    /**
     * Specification:
     * - Finds a price list record by ID in DB.
     * - Removes the price list record.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\PriceListTransfer $priceListTransfer
     *
     * @return void
     */
    public function deletePriceListById(PriceListTransfer $priceListTransfer): void;

    /**
     * Specification:
     * - Finds a price list record by NAME in DB.
     * - Removes the price list record.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\PriceListTransfer $priceListTransfer
     *
     * @return void
     */
    public function deletePriceListByName(PriceListTransfer $priceListTransfer): void;
}
