<?php
namespace TravisLykes\HofExpressApp\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Travis Lykes <hello@travislykes.com>
 */
class OrderTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase
{
    /**
     * @var \TravisLykes\HofExpressApp\Domain\Model\Order
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \TravisLykes\HofExpressApp\Domain\Model\Order();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getTotalReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getTotal()
        );
    }

    /**
     * @test
     */
    public function setTotalForIntSetsTotal()
    {
        $this->subject->setTotal(12);

        self::assertAttributeEquals(
            12,
            'total',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getOrderItemsReturnsInitialValueForOrderItems()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getOrderItems()
        );
    }

    /**
     * @test
     */
    public function setOrderItemsForObjectStorageContainingOrderItemsSetsOrderItems()
    {
        $orderItem = new \TravisLykes\HofExpressApp\Domain\Model\OrderItems();
        $objectStorageHoldingExactlyOneOrderItems = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneOrderItems->attach($orderItem);
        $this->subject->setOrderItems($objectStorageHoldingExactlyOneOrderItems);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneOrderItems,
            'orderItems',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function addOrderItemToObjectStorageHoldingOrderItems()
    {
        $orderItem = new \TravisLykes\HofExpressApp\Domain\Model\OrderItems();
        $orderItemsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $orderItemsObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($orderItem));
        $this->inject($this->subject, 'orderItems', $orderItemsObjectStorageMock);

        $this->subject->addOrderItem($orderItem);
    }

    /**
     * @test
     */
    public function removeOrderItemFromObjectStorageHoldingOrderItems()
    {
        $orderItem = new \TravisLykes\HofExpressApp\Domain\Model\OrderItems();
        $orderItemsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $orderItemsObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($orderItem));
        $this->inject($this->subject, 'orderItems', $orderItemsObjectStorageMock);

        $this->subject->removeOrderItem($orderItem);
    }

    /**
     * @test
     */
    public function getOrderStatusReturnsInitialValueForOrderStatus()
    {
        self::assertEquals(
            null,
            $this->subject->getOrderStatus()
        );
    }

    /**
     * @test
     */
    public function setOrderStatusForOrderStatusSetsOrderStatus()
    {
        $orderStatusFixture = new \TravisLykes\HofExpressApp\Domain\Model\OrderStatus();
        $this->subject->setOrderStatus($orderStatusFixture);

        self::assertAttributeEquals(
            $orderStatusFixture,
            'orderStatus',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getCustomerReturnsInitialValueForCustomer()
    {
        self::assertEquals(
            null,
            $this->subject->getCustomer()
        );
    }

    /**
     * @test
     */
    public function setCustomerForCustomerSetsCustomer()
    {
        $customerFixture = new \TravisLykes\HofExpressApp\Domain\Model\Customer();
        $this->subject->setCustomer($customerFixture);

        self::assertAttributeEquals(
            $customerFixture,
            'customer',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getDeliveryTypeReturnsInitialValueForDeliveryType()
    {
        self::assertEquals(
            null,
            $this->subject->getDeliveryType()
        );
    }

    /**
     * @test
     */
    public function setDeliveryTypeForDeliveryTypeSetsDeliveryType()
    {
        $deliveryTypeFixture = new \TravisLykes\HofExpressApp\Domain\Model\DeliveryType();
        $this->subject->setDeliveryType($deliveryTypeFixture);

        self::assertAttributeEquals(
            $deliveryTypeFixture,
            'deliveryType',
            $this->subject
        );
    }
}
