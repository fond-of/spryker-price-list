<?php

namespace FondOfSpryker\Zed\PriceList\Communication\Console;

use ArrayObject;
use Generated\Shared\Transfer\PriceListListTransfer;
use Generated\Shared\Transfer\QueryJoinCollectionTransfer;
use Generated\Shared\Transfer\QueryJoinTransfer;
use Generated\Shared\Transfer\QueryWhereConditionTransfer;
use Orm\Zed\Company\Persistence\Map\SpyCompanyTableMap;
use Orm\Zed\PriceList\Persistence\Map\FosPriceListTableMap;
use Propel\Runtime\ActiveQuery\Criteria;
use Spryker\Zed\Kernel\Communication\Console\Console;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @codeCoverageIgnore
 *
 * @method \FondOfSpryker\Zed\PriceList\Persistence\PriceListRepositoryInterface getRepository()
 * @method \FondOfSpryker\Zed\PriceList\Business\PriceListFacadeInterface getFacade()
 */
class PlaygroundStartConsole extends Console
{
    private const COMMAND_NAME = 'price-list:playground:start';
    private const DESCRIPTION = 'Start price list playground.';

    /**
     * @return void
     */
    protected function configure(): void
    {
        $this->setName(static::COMMAND_NAME);
        $this->setDescription(static::DESCRIPTION);

        parent::configure();
    }

    /**
     * @param \Symfony\Component\Console\Input\InputInterface $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     *
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $whereCondition = (new QueryWhereConditionTransfer())
            ->setValue(10)
            ->setColumn(SpyCompanyTableMap::COL_ID_COMPANY)
            ->setComparison(Criteria::EQUAL);

        $whereConditions = new ArrayObject();
        $whereConditions->append($whereCondition);

        $queryJoinTransfer = (new QueryJoinTransfer())
            ->setJoinType('INNER JOIN')
            ->setLeft([FosPriceListTableMap::COL_ID_PRICE_LIST])
            ->setRight([SpyCompanyTableMap::COL_FK_PRICE_LIST])
            //->setRelation(SpyCompanyTableMap::TABLE_NAME)
            ->setWhereConditions($whereConditions);

        $queryJoinCollectionTransfer = (new QueryJoinCollectionTransfer())
            ->addQueryJoin($queryJoinTransfer);

        $priceListListTransfer = (new PriceListListTransfer())
            ->setQueryJoins($queryJoinCollectionTransfer);

        $priceListListTransfer = $this->getRepository()->findPriceLists($priceListListTransfer);

        foreach ($priceListListTransfer->getPriceLists() as $priceListTransfer) {
            $output->writeln($priceListTransfer->serialize());
        }

        return 0;
    }
}
