<?php

namespace FondOfSpryker\Zed\PriceList\Business;

use FondOfSpryker\Zed\PriceList\Business\Model\PriceListReader;
use FondOfSpryker\Zed\PriceList\Business\Model\PriceListReaderInterface;
use FondOfSpryker\Zed\PriceList\Business\Model\PriceListWriter;
use FondOfSpryker\Zed\PriceList\Business\Model\PriceListWriterInterface;
use FondOfSpryker\Zed\PriceList\PriceListDependencyProvider;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

/**
 * @method \FondOfSpryker\Zed\PriceList\PriceListConfig getConfig()
 * @method \FondOfSpryker\Zed\PriceList\Persistence\PriceListRepositoryInterface getRepository()
 * @method \FondOfSpryker\Zed\PriceList\Persistence\PriceListEntityManagerInterface getEntityManager()
 */
class PriceListBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return \FondOfSpryker\Zed\PriceList\Business\Model\PriceListReaderInterface
     */
    public function createPriceListReader(): PriceListReaderInterface
    {
        return new PriceListReader(
            $this->getRepository(),
            $this->getSearchPriceListQueryExpanderPlugins(),
        );
    }

    /**
     * @return \FondOfSpryker\Zed\PriceList\Business\Model\PriceListWriterInterface
     */
    public function createPriceListWriter(): PriceListWriterInterface
    {
        return new PriceListWriter(
            $this->getEntityManager(),
        );
    }

    /**
     * @return array<\FondOfOryx\Zed\PriceListExtension\Dependency\Plugin\SearchPriceListQueryExpanderPluginInterface>
     */
    protected function getSearchPriceListQueryExpanderPlugins(): array
    {
        return $this->getProvidedDependency(PriceListDependencyProvider::PLUGINS_SEARCH_PRICE_LIST_QUERY_EXPANDER);
    }
}
