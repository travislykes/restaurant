<?php
namespace TravisLykes\HofExpressApp\Controller;


use TravisLykes\HofExpressApp\Domain\Repository\RestaurantRepository;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

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
 * DashboardController
 */
class DashboardController extends ActionController
{
    /**
     * @var RestaurantRepository
     */
    protected $restaurantRepository;

    /**
     * @param RestaurantRepository $restaurantRepository
     */

    public function injectRestaurantRepository(RestaurantRepository $restaurantRepository)
    {
        $this->restaurantRepository = $restaurantRepository;
    }

    public function overviewAction()
    {
//        $restaurants = $this->restaurants->findRecent(3);
//        $this->view->assign('restaurants', $restaurants);
    }
}