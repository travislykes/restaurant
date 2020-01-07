<?php
namespace TravisLykes\HofExpressApp\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Travis Lykes <hello@travislykes.com>
 */
class RestaurantTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase
{
    /**
     * @var \TravisLykes\HofExpressApp\Domain\Model\Restaurant
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \TravisLykes\HofExpressApp\Domain\Model\Restaurant();
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
    public function getImageReturnsInitialValueForFileReference()
    {
        self::assertEquals(
            null,
            $this->subject->getImage()
        );
    }

    /**
     * @test
     */
    public function setImageForFileReferenceSetsImage()
    {
        $fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $this->subject->setImage($fileReferenceFixture);

        self::assertAttributeEquals(
            $fileReferenceFixture,
            'image',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getCoverImageReturnsInitialValueForFileReference()
    {
        self::assertEquals(
            null,
            $this->subject->getCoverImage()
        );
    }

    /**
     * @test
     */
    public function setCoverImageForFileReferenceSetsCoverImage()
    {
        $fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $this->subject->setCoverImage($fileReferenceFixture);

        self::assertAttributeEquals(
            $fileReferenceFixture,
            'coverImage',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getMenusReturnsInitialValueForMenu()
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getMenus()
        );
    }

    /**
     * @test
     */
    public function setMenusForObjectStorageContainingMenuSetsMenus()
    {
        $menu = new \TravisLykes\HofExpressApp\Domain\Model\Menu();
        $objectStorageHoldingExactlyOneMenus = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneMenus->attach($menu);
        $this->subject->setMenus($objectStorageHoldingExactlyOneMenus);

        self::assertAttributeEquals(
            $objectStorageHoldingExactlyOneMenus,
            'menus',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function addMenuToObjectStorageHoldingMenus()
    {
        $menu = new \TravisLykes\HofExpressApp\Domain\Model\Menu();
        $menusObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $menusObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($menu));
        $this->inject($this->subject, 'menus', $menusObjectStorageMock);

        $this->subject->addMenu($menu);
    }

    /**
     * @test
     */
    public function removeMenuFromObjectStorageHoldingMenus()
    {
        $menu = new \TravisLykes\HofExpressApp\Domain\Model\Menu();
        $menusObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->setMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $menusObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($menu));
        $this->inject($this->subject, 'menus', $menusObjectStorageMock);

        $this->subject->removeMenu($menu);
    }
}
