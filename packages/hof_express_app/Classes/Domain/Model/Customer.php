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
 * Customer
 */
class Customer extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * userId
     * 
     * @var int
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected $userId = 0;

    /**
     * phonenumber
     * 
     * @var string
     */
    protected $phonenumber = '';

    /**
     * address
     * 
     * @var \TravisLykes\HofExpressApp\Domain\Model\Address
     */
    protected $address = null;

    /**
     * user
     * 
     * @var \TYPO3\CMS\Extbase\Domain\Model\FrontendUser
     */
    protected $user = null;

    /**
     * Returns the userId
     * 
     * @return int $userId
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Sets the userId
     * 
     * @param int $userId
     * @return void
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * Returns the phonenumber
     * 
     * @return string $phonenumber
     */
    public function getPhonenumber()
    {
        return $this->phonenumber;
    }

    /**
     * Sets the phonenumber
     * 
     * @param string $phonenumber
     * @return void
     */
    public function setPhonenumber($phonenumber)
    {
        $this->phonenumber = $phonenumber;
    }

    /**
     * Returns the address
     * 
     * @return \TravisLykes\HofExpressApp\Domain\Model\Address $address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Sets the address
     * 
     * @param \TravisLykes\HofExpressApp\Domain\Model\Address $address
     * @return void
     */
    public function setAddress(\TravisLykes\HofExpressApp\Domain\Model\Address $address)
    {
        $this->address = $address;
    }

    /**
     * Returns the user
     * 
     * @return \TYPO3\CMS\Extbase\Domain\Model\FrontendUser $user
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Sets the user
     * 
     * @param \TYPO3\CMS\Extbase\Domain\Model\FrontendUser $user
     * @return void
     */
    public function setUser(\TYPO3\CMS\Extbase\Domain\Model\FrontendUser $user)
    {
        $this->user = $user;
    }
}
