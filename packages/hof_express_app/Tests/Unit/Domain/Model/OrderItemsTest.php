<?php
namespace TravisLykes\HofExpressApp\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Travis Lykes <hello@travislykes.com>
 */
class OrderItemsTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase
{
    /**
     * @var \TravisLykes\HofExpressApp\Domain\Model\OrderItems
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \TravisLykes\HofExpressApp\Domain\Model\OrderItems();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getQuantityReturnsInitialValueForInt()
    {
        self::assertSame(
            0,
            $this->subject->getQuantity()
        );
    }

    /**
     * @test
     */
    public function setQuantityForIntSetsQuantity()
    {
        $this->subject->setQuantity(12);

        self::assertAttributeEquals(
            12,
            'quantity',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getFoodReturnsInitialValueForFood()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getFood()
        );
    }

    /**
     * @test
     */
    public function setFoodForObjectStorageContainingFoodSetsFood()
    {
        $food = new \TravisLykes\HofExpressApp\Domain\Model\Food();
        $objectStorageHoldingExactlyOneFood = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneFood->attach($food);
        $this->subject->setFood($objectStorageHoldingExactlyOneFood);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneFood,
            'food',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function addFoodToObjectStorageHoldingFood()
    {
        $food = new \TravisLykes\HofExpressApp\Domain\Model\Food();
        $foodObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $foodObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($food));
        $this->inject($this->subject, 'food', $foodObjectStorageMock);

        $this->subject->addFood($food);
    }

    /**
     * @test
     */
    public function removeFoodFromObjectStorageHoldingFood()
    {
        $food = new \TravisLykes\HofExpressApp\Domain\Model\Food();
        $foodObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $foodObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($food));
        $this->inject($this->subject, 'food', $foodObjectStorageMock);

        $this->subject->removeFood($food);
    }
}
