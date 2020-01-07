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
 * FoodTypeController
 */
class FoodTypeController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * foodTypeRepository
     * 
     * @var \TravisLykes\HofExpressApp\Domain\Repository\FoodTypeRepository
     */
    protected $foodTypeRepository = null;

    /**
     * @param \TravisLykes\HofExpressApp\Domain\Repository\FoodTypeRepository $foodTypeRepository
     */
    public function injectFoodTypeRepository(\TravisLykes\HofExpressApp\Domain\Repository\FoodTypeRepository $foodTypeRepository)
    {
        $this->foodTypeRepository = $foodTypeRepository;
    }

    /**
     * action list
     * 
     * @return void
     */
    public function listAction()
    {
        $foodTypes = $this->foodTypeRepository->findAll();
        $this->view->assign('foodTypes', $foodTypes);
    }

    /**
     * action show
     * 
     * @param \TravisLykes\HofExpressApp\Domain\Model\FoodType $foodType
     * @return void
     */
    public function showAction(\TravisLykes\HofExpressApp\Domain\Model\FoodType $foodType)
    {
        $this->view->assign('foodType', $foodType);
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
     * @param \TravisLykes\HofExpressApp\Domain\Model\FoodType $newFoodType
     * @return void
     */
    public function createAction(\TravisLykes\HofExpressApp\Domain\Model\FoodType $newFoodType)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->foodTypeRepository->add($newFoodType);
        $this->redirect('list');
    }

    /**
     * action edit
     * 
     * @param \TravisLykes\HofExpressApp\Domain\Model\FoodType $foodType
     * @ignorevalidation $foodType
     * @return void
     */
    public function editAction(\TravisLykes\HofExpressApp\Domain\Model\FoodType $foodType)
    {
        $this->view->assign('foodType', $foodType);
    }

    /**
     * action update
     * 
     * @param \TravisLykes\HofExpressApp\Domain\Model\FoodType $foodType
     * @return void
     */
    public function updateAction(\TravisLykes\HofExpressApp\Domain\Model\FoodType $foodType)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->foodTypeRepository->update($foodType);
        $this->redirect('list');
    }

    /**
     * action delete
     * 
     * @param \TravisLykes\HofExpressApp\Domain\Model\FoodType $foodType
     * @return void
     */
    public function deleteAction(\TravisLykes\HofExpressApp\Domain\Model\FoodType $foodType)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->foodTypeRepository->remove($foodType);
        $this->redirect('list');
    }
}
