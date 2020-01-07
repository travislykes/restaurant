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
 * DeliveryTypeController
 */
class DeliveryTypeController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * deliveryTypeRepository
     * 
     * @var \TravisLykes\HofExpressApp\Domain\Repository\DeliveryTypeRepository
     */
    protected $deliveryTypeRepository = null;

    /**
     * @param \TravisLykes\HofExpressApp\Domain\Repository\DeliveryTypeRepository $deliveryTypeRepository
     */
    public function injectDeliveryTypeRepository(\TravisLykes\HofExpressApp\Domain\Repository\DeliveryTypeRepository $deliveryTypeRepository)
    {
        $this->deliveryTypeRepository = $deliveryTypeRepository;
    }

    /**
     * action list
     * 
     * @return void
     */
    public function listAction()
    {
        $deliveryTypes = $this->deliveryTypeRepository->findAll();
        $this->view->assign('deliveryTypes', $deliveryTypes);
    }

    /**
     * action show
     * 
     * @param \TravisLykes\HofExpressApp\Domain\Model\DeliveryType $deliveryType
     * @return void
     */
    public function showAction(\TravisLykes\HofExpressApp\Domain\Model\DeliveryType $deliveryType)
    {
        $this->view->assign('deliveryType', $deliveryType);
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
     * @param \TravisLykes\HofExpressApp\Domain\Model\DeliveryType $newDeliveryType
     * @return void
     */
    public function createAction(\TravisLykes\HofExpressApp\Domain\Model\DeliveryType $newDeliveryType)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->deliveryTypeRepository->add($newDeliveryType);
        $this->redirect('list');
    }

    /**
     * action edit
     * 
     * @param \TravisLykes\HofExpressApp\Domain\Model\DeliveryType $deliveryType
     * @ignorevalidation $deliveryType
     * @return void
     */
    public function editAction(\TravisLykes\HofExpressApp\Domain\Model\DeliveryType $deliveryType)
    {
        $this->view->assign('deliveryType', $deliveryType);
    }

    /**
     * action update
     * 
     * @param \TravisLykes\HofExpressApp\Domain\Model\DeliveryType $deliveryType
     * @return void
     */
    public function updateAction(\TravisLykes\HofExpressApp\Domain\Model\DeliveryType $deliveryType)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->deliveryTypeRepository->update($deliveryType);
        $this->redirect('list');
    }

    /**
     * action delete
     * 
     * @param \TravisLykes\HofExpressApp\Domain\Model\DeliveryType $deliveryType
     * @return void
     */
    public function deleteAction(\TravisLykes\HofExpressApp\Domain\Model\DeliveryType $deliveryType)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->deliveryTypeRepository->remove($deliveryType);
        $this->redirect('list');
    }
}
