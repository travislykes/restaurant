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
 * OrderItems
 */
class OrderItems extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * quantity
     * 
     * @var int
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected $quantity = 0;

    /**
     * food
     * 
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TravisLykes\HofExpressApp\Domain\Model\Food>
     */
    protected $food = null;

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
        $this->food = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Returns the quantity
     * 
     * @return int $quantity
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Sets the quantity
     * 
     * @param int $quantity
     * @return void
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * Adds a Food
     * 
     * @param \TravisLykes\HofExpressApp\Domain\Model\Food $food
     * @return void
     */
    public function addFood(\TravisLykes\HofExpressApp\Domain\Model\Food $food)
    {
        $this->food->attach($food);
    }

    /**
     * Removes a Food
     * 
     * @param \TravisLykes\HofExpressApp\Domain\Model\Food $foodToRemove The Food to be removed
     * @return void
     */
    public function removeFood(\TravisLykes\HofExpressApp\Domain\Model\Food $foodToRemove)
    {
        $this->food->detach($foodToRemove);
    }

    /**
     * Returns the food
     * 
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TravisLykes\HofExpressApp\Domain\Model\Food> $food
     */
    public function getFood()
    {
        return $this->food;
    }

    /**
     * Sets the food
     * 
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TravisLykes\HofExpressApp\Domain\Model\Food> $food
     * @return void
     */
    public function setFood(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $food)
    {
        $this->food = $food;
    }
}
