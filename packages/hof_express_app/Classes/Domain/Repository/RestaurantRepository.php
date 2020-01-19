<?php
namespace TravisLykes\HofExpressApp\Domain\Repository;

use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;

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
 * The repository for Restaurants
 */
class RestaurantRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{

    /**
     * @var array
     */
    protected $defaultOrderings = ['sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING];

    /**
     * @param $limit
     */
    public function findRecent($limit = 6)
    {
        $query = $this->createQuery();

        //        $query->setOrderings([
        //            'publicationDate' => QueryInterface::ORDER_DESCENDING
        //        ]);
        if ($limit !== null) {
            $query->setLimit($limit);
        }
        return $query->execute();
    }
}
