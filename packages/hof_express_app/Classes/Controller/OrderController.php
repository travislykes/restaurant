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
 * OrderController
 */
class OrderController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * orderRepository
     * 
     * @var \TravisLykes\HofExpressApp\Domain\Repository\OrderRepository
     */
    protected $orderRepository = null;

    /**
     * @param \TravisLykes\HofExpressApp\Domain\Repository\OrderRepository $orderRepository
     */
    public function injectOrderRepository(\TravisLykes\HofExpressApp\Domain\Repository\OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    /**
     * action list
     * 
     * @return void
     */
    public function listAction()
    {
        $orders = $this->orderRepository->findAll();
        $this->view->assign('orders', $orders);
    }

    /**
     * action show
     * 
     * @param \TravisLykes\HofExpressApp\Domain\Model\Order $order
     * @return void
     */
    public function showAction(\TravisLykes\HofExpressApp\Domain\Model\Order $order)
    {
        $this->view->assign('order', $order);
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
     * @param \TravisLykes\HofExpressApp\Domain\Model\Order $newOrder
     * @return void
     */
    public function createAction(\TravisLykes\HofExpressApp\Domain\Model\Order $newOrder)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->orderRepository->add($newOrder);
        $this->redirect('list');
    }

    /**
     * action edit
     * 
     * @param \TravisLykes\HofExpressApp\Domain\Model\Order $order
     * @ignorevalidation $order
     * @return void
     */
    public function editAction(\TravisLykes\HofExpressApp\Domain\Model\Order $order)
    {
        $this->view->assign('order', $order);
    }

    /**
     * action update
     * 
     * @param \TravisLykes\HofExpressApp\Domain\Model\Order $order
     * @return void
     */
    public function updateAction(\TravisLykes\HofExpressApp\Domain\Model\Order $order)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->orderRepository->update($order);
        $this->redirect('list');
    }

    /**
     * action delete
     * 
     * @param \TravisLykes\HofExpressApp\Domain\Model\Order $order
     * @return void
     */
    public function deleteAction(\TravisLykes\HofExpressApp\Domain\Model\Order $order)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->orderRepository->remove($order);
        $this->redirect('list');
    }
}
