<?php
namespace TravisLykes\HofExpressApp\Controller;

use OliverHader\SessionService\InvalidSessionException;
use OliverHader\SessionService\SubjectCollection;
use OliverHader\SessionService\SubjectResolver;
use TravisLykes\HofExpressApp\Domain\Model\Customer;
use TravisLykes\HofExpressApp\Domain\Model\Food;
use TravisLykes\HofExpressApp\Domain\Model\OrderItems;
use TravisLykes\HofExpressApp\Domain\Repository\OrderItemsRepository;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

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
 * CartController
 */
class CartController extends ActionController
{
    /**
     * @var OrderItemsRepository
     */
    protected $orderItemsRepository;

    /**
     * @param OrderItemsRepository $orderItemsRepository
     */
    public function injectOrderItemsRepository(OrderItemsRepository $orderItemsRepository)
    {
        $this->orderItemsRepository = $orderItemsRepository;
    }

    public function showAction()
    {
        try{
            $customer = SubjectResolver::get()
                ->forClassName(Customer::class)
                ->forPropertyName('user')
                ->resolve();
        }
        catch (InvalidSessionException $exception)
        {
            $customer = null;
        }

        $orderItems = $this->provideOrders();

        $this->view->assign('customer', $customer);
        $this->view->assign('orderItems', $orderItems);
    }

    /**
     * @param Food $food
     */
    public function addAction(Food $food)
    {
        $orderItems = $this->provideOrders();
        $orderItems->addFood($food);
        $this->orderItemsRepository->update($orderItems);
        $this->redirect('show');

    }

    /**
     * @param Food $food
     */
    public function removeAction(Food $food)
    {
        $orderItems = $this->provideOrders();
        $orderItems->removeFood($food);
        $this->orderItemsRepository->update($orderItems);
        $this->redirect('show');
    }

    /**
     * @param Food $food
     */
    public function purgeAction(Food $food)
    {
        $orderItems = $this->provideOrders();
        $this->redirect('show');
    }

    private function provideOrders(): OrderItems
    {
        $collection = SubjectCollection::get('hof_express_app/orders');
        if(!isset($collection['orderItems']))
        {
            $collection['orderItems'] = $this->objectManager->get(OrderItems::class);
            $collection->persist();
        }
        return $collection['orderItems'];
    }
}