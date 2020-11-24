<?php

namespace FondOfSpryker\Zed\PriceList\Business;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\PriceList\Business\Model\PriceListReaderInterface;
use FondOfSpryker\Zed\PriceList\Business\Model\PriceListWriterInterface;
use FondOfSpryker\Zed\PriceList\Persistence\PriceListEntityManager;
use FondOfSpryker\Zed\PriceList\Persistence\PriceListRepository;

class PriceListBusinessFactoryTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\PriceList\Business\PriceListBusinessFactory
     */
    protected $priceListBusinessFactory;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\PriceList\Persistence\PriceListRepository
     */
    protected $priceListRepositoryMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\PriceList\Persistence\PriceListEntityManager
     */
    protected $priceListEntityManagerMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->priceListRepositoryMock = $this->getMockBuilder(PriceListRepository::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->priceListEntityManagerMock = $this->getMockBuilder(PriceListEntityManager::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->priceListBusinessFactory = new PriceListBusinessFactory();
        $this->priceListBusinessFactory->setRepository($this->priceListRepositoryMock);
        $this->priceListBusinessFactory->setEntityManager($this->priceListEntityManagerMock);
    }

    /**
     * @return void
     */
    public function testCreatePriceListReader(): void
    {
        $this->assertInstanceOf(
            PriceListReaderInterface::class,
            $this->priceListBusinessFactory->createPriceListReader()
        );
    }

    /**
     * @return void
     */
    public function testCreatePriceListWriter(): void
    {
        $this->assertInstanceOf(
            PriceListWriterInterface::class,
            $this->priceListBusinessFactory->createPriceListWriter()
        );
    }
}
