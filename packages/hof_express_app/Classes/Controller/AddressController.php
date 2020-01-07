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
 * AddressController
 */
class AddressController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * addressRepository
     * 
     * @var \TravisLykes\HofExpressApp\Domain\Repository\AddressRepository
     */
    protected $addressRepository = null;

    /**
     * @param \TravisLykes\HofExpressApp\Domain\Repository\AddressRepository $addressRepository
     */
    public function injectAddressRepository(\TravisLykes\HofExpressApp\Domain\Repository\AddressRepository $addressRepository)
    {
        $this->addressRepository = $addressRepository;
    }

    /**
     * action list
     * 
     * @return void
     */
    public function listAction()
    {
        $addresses = $this->addressRepository->findAll();
        $this->view->assign('addresses', $addresses);
    }

    /**
     * action show
     * 
     * @param \TravisLykes\HofExpressApp\Domain\Model\Address $address
     * @return void
     */
    public function showAction(\TravisLykes\HofExpressApp\Domain\Model\Address $address)
    {
        $this->view->assign('address', $address);
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
     * @param \TravisLykes\HofExpressApp\Domain\Model\Address $newAddress
     * @return void
     */
    public function createAction(\TravisLykes\HofExpressApp\Domain\Model\Address $newAddress)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->addressRepository->add($newAddress);
        $this->redirect('list');
    }

    /**
     * action edit
     * 
     * @param \TravisLykes\HofExpressApp\Domain\Model\Address $address
     * @ignorevalidation $address
     * @return void
     */
    public function editAction(\TravisLykes\HofExpressApp\Domain\Model\Address $address)
    {
        $this->view->assign('address', $address);
    }

    /**
     * action update
     * 
     * @param \TravisLykes\HofExpressApp\Domain\Model\Address $address
     * @return void
     */
    public function updateAction(\TravisLykes\HofExpressApp\Domain\Model\Address $address)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->addressRepository->update($address);
        $this->redirect('list');
    }

    /**
     * action delete
     * 
     * @param \TravisLykes\HofExpressApp\Domain\Model\Address $address
     * @return void
     */
    public function deleteAction(\TravisLykes\HofExpressApp\Domain\Model\Address $address)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->addressRepository->remove($address);
        $this->redirect('list');
    }
}
