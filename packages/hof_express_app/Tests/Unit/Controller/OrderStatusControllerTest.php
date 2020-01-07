<?php
namespace TravisLykes\HofExpressApp\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Travis Lykes <hello@travislykes.com>
 */
class OrderStatusControllerTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase
{
    /**
     * @var \TravisLykes\HofExpressApp\Controller\OrderStatusController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\TravisLykes\HofExpressApp\Controller\OrderStatusController::class)
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
    public function listActionFetchesAllOrderStatusesFromRepositoryAndAssignsThemToView()
    {

        $allOrderStatuses = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $orderStatusRepository = $this->getMockBuilder(\TravisLykes\HofExpressApp\Domain\Repository\OrderStatusRepository::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $orderStatusRepository->expects(self::once())->method('findAll')->will(self::returnValue($allOrderStatuses));
        $this->inject($this->subject, 'orderStatusRepository', $orderStatusRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('orderStatuses', $allOrderStatuses);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenOrderStatusToView()
    {
        $orderStatus = new \TravisLykes\HofExpressApp\Domain\Model\OrderStatus();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('orderStatus', $orderStatus);

        $this->subject->showAction($orderStatus);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenOrderStatusToOrderStatusRepository()
    {
        $orderStatus = new \TravisLykes\HofExpressApp\Domain\Model\OrderStatus();

        $orderStatusRepository = $this->getMockBuilder(\TravisLykes\HofExpressApp\Domain\Repository\OrderStatusRepository::class)
            ->setMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $orderStatusRepository->expects(self::once())->method('add')->with($orderStatus);
        $this->inject($this->subject, 'orderStatusRepository', $orderStatusRepository);

        $this->subject->createAction($orderStatus);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenOrderStatusToView()
    {
        $orderStatus = new \TravisLykes\HofExpressApp\Domain\Model\OrderStatus();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('orderStatus', $orderStatus);

        $this->subject->editAction($orderStatus);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenOrderStatusInOrderStatusRepository()
    {
        $orderStatus = new \TravisLykes\HofExpressApp\Domain\Model\OrderStatus();

        $orderStatusRepository = $this->getMockBuilder(\TravisLykes\HofExpressApp\Domain\Repository\OrderStatusRepository::class)
            ->setMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $orderStatusRepository->expects(self::once())->method('update')->with($orderStatus);
        $this->inject($this->subject, 'orderStatusRepository', $orderStatusRepository);

        $this->subject->updateAction($orderStatus);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenOrderStatusFromOrderStatusRepository()
    {
        $orderStatus = new \TravisLykes\HofExpressApp\Domain\Model\OrderStatus();

        $orderStatusRepository = $this->getMockBuilder(\TravisLykes\HofExpressApp\Domain\Repository\OrderStatusRepository::class)
            ->setMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $orderStatusRepository->expects(self::once())->method('remove')->with($orderStatus);
        $this->inject($this->subject, 'orderStatusRepository', $orderStatusRepository);

        $this->subject->deleteAction($orderStatus);
    }
}
