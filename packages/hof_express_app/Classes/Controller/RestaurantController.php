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
 * RestaurantController
 */
class RestaurantController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * restaurantRepository
     * 
     * @var \TravisLykes\HofExpressApp\Domain\Repository\RestaurantRepository
     */
    protected $restaurantRepository = null;

    /**
     * @param \TravisLykes\HofExpressApp\Domain\Repository\RestaurantRepository $restaurantRepository
     */
    public function injectRestaurantRepository(\TravisLykes\HofExpressApp\Domain\Repository\RestaurantRepository $restaurantRepository)
    {
        $this->restaurantRepository = $restaurantRepository;
    }

    /**
     * action list
     * 
     * @return void
     */
    public function listAction()
    {
        $restaurants = $this->restaurantRepository->findAll();
        $this->view->assign('restaurants', $restaurants);
    }

    /**
     * action show
     * 
     * @param \TravisLykes\HofExpressApp\Domain\Model\Restaurant $restaurant
     * @return void
     */
    public function showAction(\TravisLykes\HofExpressApp\Domain\Model\Restaurant $restaurant)
    {
        $this->view->assign('restaurant', $restaurant);
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
     * @param \TravisLykes\HofExpressApp\Domain\Model\Restaurant $newRestaurant
     * @return void
     */
    public function createAction(\TravisLykes\HofExpressApp\Domain\Model\Restaurant $newRestaurant)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->restaurantRepository->add($newRestaurant);
        $this->redirect('list');
    }

    /**
     * action edit
     * 
     * @param \TravisLykes\HofExpressApp\Domain\Model\Restaurant $restaurant
     * @ignorevalidation $restaurant
     * @return void
     */
    public function editAction(\TravisLykes\HofExpressApp\Domain\Model\Restaurant $restaurant)
    {
        $this->view->assign('restaurant', $restaurant);
    }

    /**
     * action update
     * 
     * @param \TravisLykes\HofExpressApp\Domain\Model\Restaurant $restaurant
     * @return void
     */
    public function updateAction(\TravisLykes\HofExpressApp\Domain\Model\Restaurant $restaurant)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->restaurantRepository->update($restaurant);
        $this->redirect('list');
    }

    /**
     * action delete
     * 
     * @param \TravisLykes\HofExpressApp\Domain\Model\Restaurant $restaurant
     * @return void
     */
    public function deleteAction(\TravisLykes\HofExpressApp\Domain\Model\Restaurant $restaurant)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->restaurantRepository->remove($restaurant);
        $this->redirect('list');
    }
}
