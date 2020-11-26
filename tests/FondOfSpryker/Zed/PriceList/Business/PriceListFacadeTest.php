<?php

namespace FondOfSpryker\Zed\PriceList\Business;

use Codeception\Test\Unit;
use FondOfSpryker\Zed\PriceList\Business\Model\PriceListReaderInterface;
use FondOfSpryker\Zed\PriceList\Business\Model\PriceListWriterInterface;
use Generated\Shared\Transfer\PriceListCollectionTransfer;
use Generated\Shared\Transfer\PriceListTransfer;

class PriceListFacadeTest extends Unit
{
    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\PriceList\Business\PriceListBusinessFactory
     */
    protected $priceListBusinessFactoryMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\PriceList\Business\Model\PriceListWriterInterface
     */
    protected $priceListWriterMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Zed\PriceList\Business\Model\PriceListReaderInterface
     */
    protected $priceListReaderMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\PriceListTransfer
     */
    protected $priceListTransferMock;

    /**
     * @var \FondOfSpryker\Zed\PriceList\Business\PriceListFacadeInterface
     */
    protected $priceListFacade;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Generated\Shared\Transfer\PriceListCollectionTransfer
     */
    protected $priceListCollectionTransferMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

        $this->priceListTransferMock = $this->getMockBuilder(PriceListTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->priceListReaderMock = $this->getMockBuilder(PriceListReaderInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->priceListWriterMock = $this->getMockBuilder(PriceListWriterInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->priceListBusinessFactoryMock = $this->getMockBuilder(PriceListBusinessFactory::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->priceListCollectionTransferMock = $this->getMockBuilder(PriceListCollectionTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->priceListFacade = new PriceListFacade();

        $this->priceListFacade->setFactory($this->priceListBusinessFactoryMock);
    }

    /**
     * @return void
     */
    public function testFindPriceListById(): void
    {
        $this->priceListBusinessFactoryMock->expects($this->atLeastOnce())
            ->method('createPriceListReader')
            ->willReturn($this->priceListReaderMock);

        $this->priceListReaderMock->expects($this->atLeastOnce())
            ->method('findById')
            ->with($this->priceListTransferMock)
            ->willReturn($this->priceListTransferMock);

        $this->assertInstanceOf(
            PriceListTransfer::class,
            $this->priceListFacade->findPriceListById(
                $this->priceListTransferMock
            )
        );
    }

    /**
     * @return void
     */
    public function testFindPriceListByName(): void
    {
        $this->priceListBusinessFactoryMock->expects($this->atLeastOnce())
            ->method('createPriceListReader')
            ->willReturn($this->priceListReaderMock);

        $this->priceListReaderMock->expects($this->atLeastOnce())
            ->method('findByName')
            ->with($this->priceListTransferMock)
            ->willReturn($this->priceListTransferMock);

        $this->assertInstanceOf(
            PriceListTransfer::class,
            $this->priceListFacade->findPriceListByName(
                $this->priceListTransferMock
            )
        );
    }

    /**
     * @return void
     */
    public function testDeletePriceListById(): void
    {
        $this->priceListBusinessFactoryMock->expects($this->atLeastOnce())
            ->method('createPriceListWriter')
            ->willReturn($this->priceListWriterMock);

        $this->priceListWriterMock->expects($this->atLeastOnce())
            ->method('deleteById')
            ->with($this->priceListTransferMock)
            ->willReturn($this->priceListTransferMock);

        $this->priceListFacade->deletePriceListById(
            $this->priceListTransferMock
        );
    }

    /**
     * @return void
     */
    public function testDeletePriceListByName(): void
    {
        $this->priceListBusinessFactoryMock->expects($this->atLeastOnce())
            ->method('createPriceListWriter')
            ->willReturn($this->priceListWriterMock);

        $this->priceListWriterMock->expects($this->atLeastOnce())
            ->method('deleteByName')
            ->with($this->priceListTransferMock)
            ->willReturn($this->priceListTransferMock);

        $this->priceListFacade->deletePriceListByName(
            $this->priceListTransferMock
        );
    }

    /**
     * @return void
     */
    public function testGetPriceListCollection(): void
    {
        $this->priceListBusinessFactoryMock->expects($this->atLeastOnce())
            ->method('createPriceListReader')
            ->willReturn($this->priceListReaderMock);

        $this->priceListReaderMock->expects($this->atLeastOnce())
            ->method('findAll')
            ->willReturn($this->priceListCollectionTransferMock);

        $this->assertInstanceOf(
            PriceListCollectionTransfer::class,
            $this->priceListFacade->getPriceListCollection()
        );
    }

    /**
     * @return void
     */
    public function testCreatePriceList(): void
    {
        $this->priceListBusinessFactoryMock->expects($this->atLeastOnce())
            ->method('createPriceListWriter')
            ->willReturn($this->priceListWriterMock);

        $this->priceListWriterMock->expects($this->atLeastOnce())
            ->method('create')
            ->with($this->priceListTransferMock)
            ->willReturn($this->priceListTransferMock);

        $priceListTransfer = $this->priceListFacade->createPriceList($this->priceListTransferMock);

        $this->assertEquals($this->priceListTransferMock, $priceListTransfer);
    }

    /**
     * @return void
     */
    public function testUpdatePriceList(): void
    {
        $this->priceListBusinessFactoryMock->expects($this->atLeastOnce())
            ->method('createPriceListWriter')
            ->willReturn($this->priceListWriterMock);

        $this->priceListWriterMock->expects($this->atLeastOnce())
            ->method('update')
            ->with($this->priceListTransferMock)
            ->willReturn($this->priceListTransferMock);

        $priceListTransfer = $this->priceListFacade->updatePriceList($this->priceListTransferMock);

        $this->assertEquals($this->priceListTransferMock, $priceListTransfer);
    }
}
