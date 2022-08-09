<?php

namespace FondOfSpryker\Zed\PriceList\Business;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\PriceList\Business\Model\PriceListReader;
use FondOfSpryker\Zed\PriceList\Business\Model\PriceListWriter;
use FondOfSpryker\Zed\PriceList\Persistence\PriceListEntityManager;
use FondOfSpryker\Zed\PriceList\Persistence\PriceListRepository;
use FondOfSpryker\Zed\PriceList\PriceListDependencyProvider;
use Spryker\Zed\Kernel\Container;

class PriceListBusinessFactoryTest extends Unit
{
    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Zed\Kernel\Container
     */
    protected $containerMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\PriceList\Persistence\PriceListRepository
     */
    protected $priceListRepositoryMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\PriceList\Persistence\PriceListEntityManager
     */
    protected $priceListEntityManagerMock;

    /**
     * @var \FondOfSpryker\Zed\PriceList\Business\PriceListBusinessFactory
     */
    protected $priceListBusinessFactory;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->containerMock = $this->getMockBuilder(Container::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->priceListRepositoryMock = $this->getMockBuilder(PriceListRepository::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->priceListEntityManagerMock = $this->getMockBuilder(PriceListEntityManager::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->priceListBusinessFactory = new PriceListBusinessFactory();
        $this->priceListBusinessFactory->setContainer($this->containerMock);
        $this->priceListBusinessFactory->setRepository($this->priceListRepositoryMock);
        $this->priceListBusinessFactory->setEntityManager($this->priceListEntityManagerMock);
    }

    /**
     * @return void
     */
    public function testCreatePriceListReader(): void
    {
        $this->containerMock->expects(static::atLeastOnce())
            ->method('has')
            ->willReturn(true);

        $this->containerMock->expects(static::atLeastOnce())
            ->method('get')
            ->with(PriceListDependencyProvider::PLUGINS_SEARCH_PRICE_LIST_QUERY_EXPANDER)
            ->willReturn([]);

        static::assertInstanceOf(
            PriceListReader::class,
            $this->priceListBusinessFactory->createPriceListReader(),
        );
    }

    /**
     * @return void
     */
    public function testCreatePriceListWriter(): void
    {
        static::assertInstanceOf(
            PriceListWriter::class,
            $this->priceListBusinessFactory->createPriceListWriter(),
        );
    }
}
