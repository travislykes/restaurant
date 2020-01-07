<?php
namespace TravisLykes\HofExpressApp\Domain\Model;


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
 * Order
 */
class Order extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * total
     * 
     * @var int
     */
    protected $total = 0;

    /**
     * orderItems
     * 
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TravisLykes\HofExpressApp\Domain\Model\OrderItems>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected $orderItems = null;

    /**
     * orderStatus
     * 
     * @var \TravisLykes\HofExpressApp\Domain\Model\OrderStatus
     */
    protected $orderStatus = null;

    /**
     * customer
     * 
     * @var \TravisLykes\HofExpressApp\Domain\Model\Customer
     */
    protected $customer = null;

    /**
     * deliveryType
     * 
     * @var \TravisLykes\HofExpressApp\Domain\Model\DeliveryType
     */
    protected $deliveryType = null;

    /**
     * __construct
     */
    public function __construct()
    {

        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
    }

    /**
     * Initializes all ObjectStorage properties
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     * 
     * @return void
     */
    protected function initStorageObjects()
    {
        $this->orderItems = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Returns the total
     * 
     * @return int $total
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Sets the total
     * 
     * @param int $total
     * @return void
     */
    public function setTotal($total)
    {
        $this->total = $total;
    }

    /**
     * Adds a OrderItems
     * 
     * @param \TravisLykes\HofExpressApp\Domain\Model\OrderItems $orderItem
     * @return void
     */
    public function addOrderItem(\TravisLykes\HofExpressApp\Domain\Model\OrderItems $orderItem)
    {
        $this->orderItems->attach($orderItem);
    }

    /**
     * Removes a OrderItems
     * 
     * @param \TravisLykes\HofExpressApp\Domain\Model\OrderItems $orderItemToRemove The OrderItems to be removed
     * @return void
     */
    public function removeOrderItem(\TravisLykes\HofExpressApp\Domain\Model\OrderItems $orderItemToRemove)
    {
        $this->orderItems->detach($orderItemToRemove);
    }

    /**
     * Returns the orderItems
     * 
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TravisLykes\HofExpressApp\Domain\Model\OrderItems> $orderItems
     */
    public function getOrderItems()
    {
        return $this->orderItems;
    }

    /**
     * Sets the orderItems
     * 
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TravisLykes\HofExpressApp\Domain\Model\OrderItems> $orderItems
     * @return void
     */
    public function setOrderItems(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $orderItems)
    {
        $this->orderItems = $orderItems;
    }

    /**
     * Returns the orderStatus
     * 
     * @return \TravisLykes\HofExpressApp\Domain\Model\OrderStatus $orderStatus
     */
    public function getOrderStatus()
    {
        return $this->orderStatus;
    }

    /**
     * Sets the orderStatus
     * 
     * @param \TravisLykes\HofExpressApp\Domain\Model\OrderStatus $orderStatus
     * @return void
     */
    public function setOrderStatus(\TravisLykes\HofExpressApp\Domain\Model\OrderStatus $orderStatus)
    {
        $this->orderStatus = $orderStatus;
    }

    /**
     * Returns the customer
     * 
     * @return \TravisLykes\HofExpressApp\Domain\Model\Customer $customer
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * Sets the customer
     * 
     * @param \TravisLykes\HofExpressApp\Domain\Model\Customer $customer
     * @return void
     */
    public function setCustomer(\TravisLykes\HofExpressApp\Domain\Model\Customer $customer)
    {
        $this->customer = $customer;
    }

    /**
     * Returns the deliveryType
     * 
     * @return \TravisLykes\HofExpressApp\Domain\Model\DeliveryType $deliveryType
     */
    public function getDeliveryType()
    {
        return $this->deliveryType;
    }

    /**
     * Sets the deliveryType
     * 
     * @param \TravisLykes\HofExpressApp\Domain\Model\DeliveryType $deliveryType
     * @return void
     */
    public function setDeliveryType(\TravisLykes\HofExpressApp\Domain\Model\DeliveryType $deliveryType)
    {
        $this->deliveryType = $deliveryType;
    }
}
