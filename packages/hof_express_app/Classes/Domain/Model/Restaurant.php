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
 * Restaurant
 */
class Restaurant extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
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
     * image
     * 
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected $image = null;

    /**
     * coverImage
     * 
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected $coverImage = null;

    /**
     * menus
     * 
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TravisLykes\HofExpressApp\Domain\Model\Menu>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected $menus = null;

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
        $this->menus = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
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
     * Returns the image
     * 
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Sets the image
     * 
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
     * @return void
     */
    public function setImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $image)
    {
        $this->image = $image;
    }

    /**
     * Returns the coverImage
     * 
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $coverImage
     */
    public function getCoverImage()
    {
        return $this->coverImage;
    }

    /**
     * Sets the coverImage
     * 
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $coverImage
     * @return void
     */
    public function setCoverImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $coverImage)
    {
        $this->coverImage = $coverImage;
    }

    /**
     * Adds a Menu
     * 
     * @param \TravisLykes\HofExpressApp\Domain\Model\Menu $menu
     * @return void
     */
    public function addMenu(\TravisLykes\HofExpressApp\Domain\Model\Menu $menu)
    {
        $this->menus->attach($menu);
    }

    /**
     * Removes a Menu
     * 
     * @param \TravisLykes\HofExpressApp\Domain\Model\Menu $menuToRemove The Menu to be removed
     * @return void
     */
    public function removeMenu(\TravisLykes\HofExpressApp\Domain\Model\Menu $menuToRemove)
    {
        $this->menus->detach($menuToRemove);
    }

    /**
     * Returns the menus
     * 
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TravisLykes\HofExpressApp\Domain\Model\Menu> $menus
     */
    public function getMenus()
    {
        return $this->menus;
    }

    /**
     * Sets the menus
     * 
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TravisLykes\HofExpressApp\Domain\Model\Menu> $menus
     * @return void
     */
    public function setMenus(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $menus)
    {
        $this->menus = $menus;
    }
}
