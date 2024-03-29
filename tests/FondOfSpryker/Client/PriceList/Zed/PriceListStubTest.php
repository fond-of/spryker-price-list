<?php

namespace FondOfSpryker\Client\PriceList\Zed;

use Codeception\Test\Unit;
use FondOfSpryker\Client\PriceList\Dependency\Client\PriceListToZedRequestClientInterface;
use Generated\Shared\Transfer\PriceListListTransfer;

class PriceListStubTest extends Unit
{
    /**
     * @var \Generated\Shared\Transfer\PriceListListTransfer|\PHPUnit\Framework\MockObject\MockObject|mixed
     */
    protected $priceListListTransferMock;

    /**
     * @var \FondOfSpryker\Client\PriceList\Dependency\Client\PriceListToZedRequestClientInterface|\PHPUnit\Framework\MockObject\MockObject
     */
    protected $zedRequestClientMock;

    /**
     * @var \FondOfSpryker\Client\PriceList\Zed\PriceListStub
     */
    protected $priceListStub;

    /**
     * @return void
     */
    protected function _before(): void
    {
        parent::_before();

        $this->priceListListTransferMock = $this->getMockBuilder(PriceListListTransfer::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->zedRequestClientMock = $this->getMockBuilder(PriceListToZedRequestClientInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->priceListStub = new PriceListStub($this->zedRequestClientMock);
    }

    /**
     * @return void
     */
    public function testFindPriceLists(): void
    {
        $this->zedRequestClientMock->expects(static::atLeastOnce())
            ->method('call')
            ->with(
                '/price-list/gateway/find-price-lists',
                $this->priceListListTransferMock,
            )->willReturn($this->priceListListTransferMock);

        static::assertEquals(
            $this->priceListListTransferMock,
            $this->priceListStub->findPriceLists($this->priceListListTransferMock),
        );
    }
}
