<?php

namespace FondOfSpryker\Zed\PriceList;

use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;

/**
 * @codeCoverageIgnore
 *
 * @method \FondOfSpryker\Zed\PriceList\PriceListConfig getConfig()
 */
class PriceListDependencyProvider extends AbstractBundleDependencyProvider
{
    /**
     * @var string
     */
    public const PLUGINS_SEARCH_PRICE_LIST_QUERY_EXPANDER = 'PLUGINS_SEARCH_PRICE_LIST_QUERY_EXPANDER';

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function provideBusinessLayerDependencies(Container $container): Container
    {
        $container = parent::provideBusinessLayerDependencies($container);

        return $this->addSearchPriceListQueryExpanderPlugins($container);
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addSearchPriceListQueryExpanderPlugins(Container $container): Container
    {
        $self = $this;

        $container[static::PLUGINS_SEARCH_PRICE_LIST_QUERY_EXPANDER] = static function () use ($self) {
            return $self->getSearchPriceListQueryExpanderPlugins();
        };

        return $container;
    }

    /**
     * @return array<\FondOfOryx\Zed\PriceListExtension\Dependency\Plugin\SearchPriceListQueryExpanderPluginInterface>
     */
    protected function getSearchPriceListQueryExpanderPlugins(): array
    {
        return [];
    }
}
