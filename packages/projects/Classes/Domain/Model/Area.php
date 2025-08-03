<?php
namespace Miux\Projects\Domain\Model;


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
 * Area
 */
class Area extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * area
     *
     * @var string
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected $area = '';

    /**
     * worklist
     *
     * @var string
     */
    protected $worklist = '';

    /**
     * Returns the area
     *
     * @return string $area
     */
    public function getArea()
    {
        return $this->area;
    }

    /**
     * Sets the area
     *
     * @param string $area
     * @return void
     */
    public function setArea($area)
    {
        $this->area = $area;
    }

    /**
     * Returns the worklist
     *
     * @return string $worklist
     */
    public function getWorklist()
    {
        return $this->worklist;
    }

    /**
     * Sets the worklist
     *
     * @param string $worklist
     * @return void
     */
    public function setWorklist($worklist)
    {
        $this->worklist = $worklist;
    }
}
