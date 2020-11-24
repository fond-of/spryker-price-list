<?php

namespace FondOfSpryker\Zed\PriceList\Business\Model;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\PriceList\Persistence\PriceListRepositoryInterface;
use Generated\Shared\Transfer\PriceListCollectionTransfer;
use Generated\Shared\Transfer\PriceListTransfer;

class PriceListReaderTest extends Unit
{
    /**
     * @var \FondOfSpryker\Zed\PriceList\Business\Model\PriceListReader
     */
    protected $priceListReader;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\PriceList\Persistence\PriceListRepositoryInterface
     */
    protected $priceListRepositoryInterfaceMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\PriceListTransfer
     */
    protected $priceListTransferMock;

    /**
     * @var int
     */
    protected $idPriceList;

    /**
     * @var string
     */
    protected $namePriceList;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\PriceListCollectionTransfer
     */
    protected $priceListCollectionTransferMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->priceListRepositoryInterfaceMock = $this->getMockBuilder(PriceListRepositoryInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->priceListTransferMock = $this->getMockBuilder(PriceListTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->idPriceList = 1;

        $this->namePriceList = 'name-price-list';

        $this->priceListCollectionTransferMock = $this->getMockBuilder(PriceListCollectionTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->priceListReader = new PriceListReader(
            $this->priceListRepositoryInterfaceMock
        );
    }

    /**
     * @return void
     */
    public function testFindById(): void
    {
        $this->priceListTransferMock->expects($this->atLeastOnce())
            ->method('getIdPriceList')
            ->willReturn($this->idPriceList);

        $this->priceListRepositoryInterfaceMock->expects($this->atLeastOnce())
            ->method('getById')
            ->with($this->idPriceList)
            ->willReturn($this->priceListTransferMock);

        $this->assertInstanceOf(
            PriceListTransfer::class,
            $this->priceListReader->findById(
                $this->priceListTransferMock
            )
        );
    }

    /**
     * @return void
     */
    public function testFindByName(): void
    {
        $this->priceListTransferMock->expects($this->atLeastOnce())
            ->method('getName')
            ->willReturn($this->namePriceList);

        $this->priceListRepositoryInterfaceMock->expects($this->atLeastOnce())
            ->method('getByName')
            ->with($this->namePriceList)
            ->willReturn($this->priceListTransferMock);

        $this->assertInstanceOf(
            PriceListTransfer::class,
            $this->priceListReader->findByName(
                $this->priceListTransferMock
            )
        );
    }

    /**
     * @return void
     */
    public function testFindAll(): void
    {
        $this->priceListRepositoryInterfaceMock->expects($this->atLeastOnce())
            ->method('getAll')
            ->willReturn($this->priceListCollectionTransferMock);

        $this->assertInstanceOf(
            PriceListCollectionTransfer::class,
            $this->priceListReader->findAll()
        );
    }
}
