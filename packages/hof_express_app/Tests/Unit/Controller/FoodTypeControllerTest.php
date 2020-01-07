<?php
namespace TravisLykes\HofExpressApp\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Travis Lykes <hello@travislykes.com>
 */
class FoodTypeControllerTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase
{
    /**
     * @var \TravisLykes\HofExpressApp\Controller\FoodTypeController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\TravisLykes\HofExpressApp\Controller\FoodTypeController::class)
            ->setMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function listActionFetchesAllFoodTypesFromRepositoryAndAssignsThemToView()
    {

        $allFoodTypes = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $foodTypeRepository = $this->getMockBuilder(\TravisLykes\HofExpressApp\Domain\Repository\FoodTypeRepository::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $foodTypeRepository->expects(self::once())->method('findAll')->will(self::returnValue($allFoodTypes));
        $this->inject($this->subject, 'foodTypeRepository', $foodTypeRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('foodTypes', $allFoodTypes);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenFoodTypeToView()
    {
        $foodType = new \TravisLykes\HofExpressApp\Domain\Model\FoodType();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('foodType', $foodType);

        $this->subject->showAction($foodType);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenFoodTypeToFoodTypeRepository()
    {
        $foodType = new \TravisLykes\HofExpressApp\Domain\Model\FoodType();

        $foodTypeRepository = $this->getMockBuilder(\TravisLykes\HofExpressApp\Domain\Repository\FoodTypeRepository::class)
            ->setMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $foodTypeRepository->expects(self::once())->method('add')->with($foodType);
        $this->inject($this->subject, 'foodTypeRepository', $foodTypeRepository);

        $this->subject->createAction($foodType);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenFoodTypeToView()
    {
        $foodType = new \TravisLykes\HofExpressApp\Domain\Model\FoodType();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('foodType', $foodType);

        $this->subject->editAction($foodType);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenFoodTypeInFoodTypeRepository()
    {
        $foodType = new \TravisLykes\HofExpressApp\Domain\Model\FoodType();

        $foodTypeRepository = $this->getMockBuilder(\TravisLykes\HofExpressApp\Domain\Repository\FoodTypeRepository::class)
            ->setMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $foodTypeRepository->expects(self::once())->method('update')->with($foodType);
        $this->inject($this->subject, 'foodTypeRepository', $foodTypeRepository);

        $this->subject->updateAction($foodType);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenFoodTypeFromFoodTypeRepository()
    {
        $foodType = new \TravisLykes\HofExpressApp\Domain\Model\FoodType();

        $foodTypeRepository = $this->getMockBuilder(\TravisLykes\HofExpressApp\Domain\Repository\FoodTypeRepository::class)
            ->setMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $foodTypeRepository->expects(self::once())->method('remove')->with($foodType);
        $this->inject($this->subject, 'foodTypeRepository', $foodTypeRepository);

        $this->subject->deleteAction($foodType);
    }
}
