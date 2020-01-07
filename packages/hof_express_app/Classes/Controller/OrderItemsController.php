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
 * OrderItemsController
 */
class OrderItemsController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * orderItemsRepository
     * 
     * @var \TravisLykes\HofExpressApp\Domain\Repository\OrderItemsRepository
     */
    protected $orderItemsRepository = null;

    /**
     * @param \TravisLykes\HofExpressApp\Domain\Repository\OrderItemsRepository $orderItemsRepository
     */
    public function injectOrderItemsRepository(\TravisLykes\HofExpressApp\Domain\Repository\OrderItemsRepository $orderItemsRepository)
    {
        $this->orderItemsRepository = $orderItemsRepository;
    }

    /**
     * action list
     * 
     * @return void
     */
    public function listAction()
    {
        $orderItems = $this->orderItemsRepository->findAll();
        $this->view->assign('orderItems', $orderItems);
    }

    /**
     * action show
     * 
     * @param \TravisLykes\HofExpressApp\Domain\Model\OrderItems $orderItems
     * @return void
     */
    public function showAction(\TravisLykes\HofExpressApp\Domain\Model\OrderItems $orderItems)
    {
        $this->view->assign('orderItems', $orderItems);
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
     * @param \TravisLykes\HofExpressApp\Domain\Model\OrderItems $newOrderItems
     * @return void
     */
    public function createAction(\TravisLykes\HofExpressApp\Domain\Model\OrderItems $newOrderItems)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->orderItemsRepository->add($newOrderItems);
        $this->redirect('list');
    }

    /**
     * action edit
     * 
     * @param \TravisLykes\HofExpressApp\Domain\Model\OrderItems $orderItems
     * @ignorevalidation $orderItems
     * @return void
     */
    public function editAction(\TravisLykes\HofExpressApp\Domain\Model\OrderItems $orderItems)
    {
        $this->view->assign('orderItems', $orderItems);
    }

    /**
     * action update
     * 
     * @param \TravisLykes\HofExpressApp\Domain\Model\OrderItems $orderItems
     * @return void
     */
    public function updateAction(\TravisLykes\HofExpressApp\Domain\Model\OrderItems $orderItems)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->orderItemsRepository->update($orderItems);
        $this->redirect('list');
    }

    /**
     * action delete
     * 
     * @param \TravisLykes\HofExpressApp\Domain\Model\OrderItems $orderItems
     * @return void
     */
    public function deleteAction(\TravisLykes\HofExpressApp\Domain\Model\OrderItems $orderItems)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->orderItemsRepository->remove($orderItems);
        $this->redirect('list');
    }
}
