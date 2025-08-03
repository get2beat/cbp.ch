<?php
namespace Miux\Projects\Domain\Repository;


/***
 *
 * This file is part of the "CBP Project" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2021 Beat Hausheer <bh@miux.ch>, Miux
 *
 ***/
/**
 * The repository for Projects
 */
class ProjectRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{

    // Default ordering - sorting
    protected $defaultOrderings = array(
        'topproject' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING,
        'sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING
    );

    /**
     * Find all Projects by Category selected
     *
     * @return Array of Projects objects
     */
    public function findByCategory($category)
    {
        $query = $this->createQuery();
        $query->matching($query->contains('area', $category));
        return $query->execute();
    }
    /**
     * Search in Projects
     *
     * @return Array of Projects objects
     */
    public function search($search)
    {
        $query = $this->createQuery();
        $query->matching($query->like('title', '%' . $search . '%'));
        $result = $query->execute();
        return $result;
    }


    /**
     * Find next item by BE sorting
     * @param integer $sorting The id of the current record
     * @return boolean|\TYPO3\CMS\Extbase\Persistence\Generic\QueryResult
     */
    public function findNext($sorting) {
        $query = $this->createQuery();
        $result = $query->matching($query->greaterThan('sorting',$sorting))->setLimit(1)->execute();
        if($query->count()) {
            return $result;
        } else {
            return false;
        }
    }

    /**
     * Find previous item by BE sorting
     * @param integer $sorting The id of the current record
     * @return boolean|\TYPO3\CMS\Extbase\Persistence\Generic\QueryResult
     */
    public function findPrev($sorting) {
        $query = $this->createQuery();
        $query->setOrderings(
            [
                'sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING
            ]
        );
        $result = $query->matching($query->lessThan('sorting',$sorting))->setLimit(1)->execute();
        if($query->count()) {
            return $result;
        } else {
            return false;
        }
    }

}
