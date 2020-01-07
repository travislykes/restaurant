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
 * Menu
 */
class Menu extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * name
     * 
     * @var string
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected $name = '';

    /**
     * description
     * 
     * @var string
     */
    protected $description = '';

    /**
     * foods
     * 
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TravisLykes\HofExpressApp\Domain\Model\Food>
     */
    protected $foods = null;

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
        $this->foods = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Returns the name
     * 
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the name
     * 
     * @param string $name
     * @return void
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Returns the description
     * 
     * @return string $description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the description
     * 
     * @param string $description
     * @return void
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Adds a Food
     * 
     * @param \TravisLykes\HofExpressApp\Domain\Model\Food $food
     * @return void
     */
    public function addFood(\TravisLykes\HofExpressApp\Domain\Model\Food $food)
    {
        $this->foods->attach($food);
    }

    /**
     * Removes a Food
     * 
     * @param \TravisLykes\HofExpressApp\Domain\Model\Food $foodToRemove The Food to be removed
     * @return void
     */
    public function removeFood(\TravisLykes\HofExpressApp\Domain\Model\Food $foodToRemove)
    {
        $this->foods->detach($foodToRemove);
    }

    /**
     * Returns the foods
     * 
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TravisLykes\HofExpressApp\Domain\Model\Food> $foods
     */
    public function getFoods()
    {
        return $this->foods;
    }

    /**
     * Sets the foods
     * 
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TravisLykes\HofExpressApp\Domain\Model\Food> $foods
     * @return void
     */
    public function setFoods(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $foods)
    {
        $this->foods = $foods;
    }
}
