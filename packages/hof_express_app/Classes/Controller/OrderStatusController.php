<?php
namespace TravisLykes\HofExpressApp\Controller;


/***
 *
 * This file is part of the "Hof Express App" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2020 Travis Lykes <hello@travislykes.com>, Hof Express LLC
 *
 ***/
/**
 * OrderStatusController
 */
class OrderStatusController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * orderStatusRepository
     * 
     * @var \TravisLykes\HofExpressApp\Domain\Repository\OrderStatusRepository
     */
    protected $orderStatusRepository = null;

    /**
     * @param \TravisLykes\HofExpressApp\Domain\Repository\OrderStatusRepository $orderStatusRepository
     */
    public function injectOrderStatusRepository(\TravisLykes\HofExpressApp\Domain\Repository\OrderStatusRepository $orderStatusRepository)
    {
        $this->orderStatusRepository = $orderStatusRepository;
    }

    /**
     * action list
     * 
     * @return void
     */
    public function listAction()
    {
        $orderStatuses = $this->orderStatusRepository->findAll();
        $this->view->assign('orderStatuses', $orderStatuses);
    }

    /**
     * action show
     * 
     * @param \TravisLykes\HofExpressApp\Domain\Model\OrderStatus $orderStatus
     * @return void
     */
    public function showAction(\TravisLykes\HofExpressApp\Domain\Model\OrderStatus $orderStatus)
    {
        $this->view->assign('orderStatus', $orderStatus);
    }

    /**
     * action new
     * 
     * @return void
     */
    public function newAction()
    {
    }

    /**
     * action create
     * 
     * @param \TravisLykes\HofExpressApp\Domain\Model\OrderStatus $newOrderStatus
     * @return void
     */
    public function createAction(\TravisLykes\HofExpressApp\Domain\Model\OrderStatus $newOrderStatus)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->orderStatusRepository->add($newOrderStatus);
        $this->redirect('list');
    }

    /**
     * action edit
     * 
     * @param \TravisLykes\HofExpressApp\Domain\Model\OrderStatus $orderStatus
     * @ignorevalidation $orderStatus
     * @return void
     */
    public function editAction(\TravisLykes\HofExpressApp\Domain\Model\OrderStatus $orderStatus)
    {
        $this->view->assign('orderStatus', $orderStatus);
    }

    /**
     * action update
     * 
     * @param \TravisLykes\HofExpressApp\Domain\Model\OrderStatus $orderStatus
     * @return void
     */
    public function updateAction(\TravisLykes\HofExpressApp\Domain\Model\OrderStatus $orderStatus)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->orderStatusRepository->update($orderStatus);
        $this->redirect('list');
    }

    /**
     * action delete
     * 
     * @param \TravisLykes\HofExpressApp\Domain\Model\OrderStatus $orderStatus
     * @return void
     */
    public function deleteAction(\TravisLykes\HofExpressApp\Domain\Model\OrderStatus $orderStatus)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->orderStatusRepository->remove($orderStatus);
        $this->redirect('list');
    }
}
