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
 * The repository for Area
 */
class AreaRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
    /**
     * @var array
     */
    protected $defaultOrderings = ['sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING];
}
