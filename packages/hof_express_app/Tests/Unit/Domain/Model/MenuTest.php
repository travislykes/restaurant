<?php
namespace TravisLykes\HofExpressApp\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Travis Lykes <hello@travislykes.com>
 */
class MenuTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase
{
    /**
     * @var \TravisLykes\HofExpressApp\Domain\Model\Menu
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \TravisLykes\HofExpressApp\Domain\Model\Menu();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getNameReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getName()
        );
    }

    /**
     * @test
     */
    public function setNameForStringSetsName()
    {
        $this->subject->setName('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'name',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getDescriptionReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getDescription()
        );
    }

    /**
     * @test
     */
    public function setDescriptionForStringSetsDescription()
    {
        $this->subject->setDescription('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'description',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getFoodsReturnsInitialValueForFood()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getFoods()
        );
    }

    /**
     * @test
     */
    public function setFoodsForObjectStorageContainingFoodSetsFoods()
    {
        $food = new \TravisLykes\HofExpressApp\Domain\Model\Food();
        $objectStorageHoldingExactlyOneFoods = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneFoods->attach($food);
        $this->subject->setFoods($objectStorageHoldingExactlyOneFoods);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneFoods,
            'foods',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function addFoodToObjectStorageHoldingFoods()
    {
        $food = new \TravisLykes\HofExpressApp\Domain\Model\Food();
        $foodsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $foodsObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($food));
        $this->inject($this->subject, 'foods', $foodsObjectStorageMock);

        $this->subject->addFood($food);
    }

    /**
     * @test
     */
    public function removeFoodFromObjectStorageHoldingFoods()
    {
        $food = new \TravisLykes\HofExpressApp\Domain\Model\Food();
        $foodsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $foodsObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($food));
        $this->inject($this->subject, 'foods', $foodsObjectStorageMock);

        $this->subject->removeFood($food);
    }
}
