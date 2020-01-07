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
 * FoodController
 */
class FoodController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * foodRepository
     * 
     * @var \TravisLykes\HofExpressApp\Domain\Repository\FoodRepository
     */
    protected $foodRepository = null;

    /**
     * @param \TravisLykes\HofExpressApp\Domain\Repository\FoodRepository $foodRepository
     */
    public function injectFoodRepository(\TravisLykes\HofExpressApp\Domain\Repository\FoodRepository $foodRepository)
    {
        $this->foodRepository = $foodRepository;
    }

    /**
     * action list
     * 
     * @return void
     */
    public function listAction()
    {
        $foods = $this->foodRepository->findAll();
        $this->view->assign('foods', $foods);
    }

    /**
     * action show
     * 
     * @param \TravisLykes\HofExpressApp\Domain\Model\Food $food
     * @return void
     */
    public function showAction(\TravisLykes\HofExpressApp\Domain\Model\Food $food)
    {
        $this->view->assign('food', $food);
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
     * @param \TravisLykes\HofExpressApp\Domain\Model\Food $newFood
     * @return void
     */
    public function createAction(\TravisLykes\HofExpressApp\Domain\Model\Food $newFood)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->foodRepository->add($newFood);
        $this->redirect('list');
    }

    /**
     * action edit
     * 
     * @param \TravisLykes\HofExpressApp\Domain\Model\Food $food
     * @ignorevalidation $food
     * @return void
     */
    public function editAction(\TravisLykes\HofExpressApp\Domain\Model\Food $food)
    {
        $this->view->assign('food', $food);
    }

    /**
     * action update
     * 
     * @param \TravisLykes\HofExpressApp\Domain\Model\Food $food
     * @return void
     */
    public function updateAction(\TravisLykes\HofExpressApp\Domain\Model\Food $food)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->foodRepository->update($food);
        $this->redirect('list');
    }

    /**
     * action delete
     * 
     * @param \TravisLykes\HofExpressApp\Domain\Model\Food $food
     * @return void
     */
    public function deleteAction(\TravisLykes\HofExpressApp\Domain\Model\Food $food)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->foodRepository->remove($food);
        $this->redirect('list');
    }
}
