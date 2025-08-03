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
 * Project
 */
class Project extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * sorting
     *
     * @var string $sorting
     */
    Protected $sorting;

    /**
     * Setter for sorting
     *
     * @param string $sorting
     * @return void
     */
    public function setSorting($sorting) {
        $this->sorting = $sorting;
    }

    /**
     * Getter for sorting
     *
     * @return string sorting
     */
    public function getSorting() {
        return $this->sorting;
    }

    /**
     * onlylist
     *
     * @var bool
     */
    protected $onlylist = false;

    /**
     * topproject
     *
     * @var bool
     */
    protected $topproject = false;

    /**
     * title
     *
     * @var string
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected $title = '';

    /**
     * seotitle
     *
     * @var string
     */
    protected $seotitle = '';

    /**
     * seodesc
     *
     * @var string
     */
    protected $seodesc = '';



    /**
     * listimage
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected $listimage = null;

    /**
     * headerimage
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected $headerimage = null;

    /**
     * award
     *
     * @var string
     */
    protected $award = '';

    /**
     * owner
     *
     * @var string
     */
    protected $owner = '';

    /**
     * copyright
     *
     * @var string
     */
    protected $copyright = '';

    /**
     * year
     *
     * @var string
     */
    protected $year = '';

    /**
     * projectplanning
     *
     * @var string
     */
    protected $projectplanning = '';

    /**
     * realization
     *
     * @var string
     */
    protected $realization = '';

    /**
     * architect
     *
     * @var string
     */
    protected $architect = '';

    /**
     * partner
     *
     * @var string
     */
    protected $partner = '';


    /**
     * description
     *
     * @var string
     */
    protected $description = '';

    /**
     * images
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected $images = null;


    /**
     * area
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Miux\Projects\Domain\Model\Area>
     */
    protected $area = null;

    /**
     * __construct
     */
    public function __construct()
    {

        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
    }

    /**
     * Initializes all ObjectStorage properties
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     *
     * @return void
     */
    protected function initStorageObjects()
    {
        $this->area = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }
    /**
     * Returns the onlylist
     *
     * @return bool $onlylist
     */
    public function getOnlylist()
    {
        return $this->onlylist;
    }

    /**
     * Sets the onlylist
     *
     * @param bool $onlylist
     * @return void
     */
    public function setOnlylist($onlylist)
    {
        $this->onlylist = $onlylist;
    }

    /**
     * Returns the topproject
     *
     * @return bool $topproject
     */
    public function getTopproject()
    {
        return $this->topproject;
    }

    /**
     * Sets the topproject
     *
     * @param bool $topproject
     * @return void
     */
    public function setTopproject($topproject)
    {
        $this->topproject = $topproject;
    }

    /**
     * Returns the boolean state of topproject
     *
     * @return bool
     */
    public function isTopproject()
    {
        return $this->topproject;
    }

    /**
     * Returns the title
     *
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the title
     *
     * @param string $title
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Returns the seotitle
     *
     * @return string $seotitle
     */
    public function getSeotitle()
    {
        return $this->seotitle;
    }

    /**
     * Sets the seotitle
     *
     * @param string $seotitle
     * @return void
     */
    public function setSeotitle($seotitle)
    {
        $this->seotitle = $seotitle;
    }


    /**
     * Returns the seodesc
     *
     * @return string $seodesc
     */
    public function getSeodesc()
    {
        return $this->seodesc;
    }

    /**
     * Sets the seodesc
     *
     * @param string $seodesc
     * @return void
     */
    public function setSeodesc($seodesc)
    {
        $this->seodesc = $seodesc;
    }

    /**
     * Returns the listimage
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $listimage
     */
    public function getListimage()
    {
        return $this->listimage;
    }

    /**
     * Sets the listimage
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $listimage
     * @return void
     */
    public function setListimage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $listimage)
    {
        $this->listimage = $listimage;
    }

    /**
     * Returns the headerimage
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $headerimage
     */
    public function getHeaderimage()
    {
        return $this->headerimage;
    }

    /**
     * Sets the headerimage
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $headerimage
     * @return void
     */
    public function setHeaderimage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $headerimage)
    {
        $this->headerimage = $headerimage;
    }

    /**
     * Returns the images
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference> $images
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * Sets the images
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $images
     * @return void
     */
    public function setImages(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $images)
    {
        $this->images = $images;
    }

    /**
     * Returns the award
     *
     * @return string $award
     */
    public function getAward()
    {
        return $this->award;
    }

    /**
     * Sets the award
     *
     * @param string $award
     * @return void
     */
    public function setAward($award)
    {
        $this->award = $award;
    }

    /**
     * Returns the owner
     *
     * @return string $owner
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * Sets the owner
     *
     * @param string $owner
     * @return void
     */
    public function setOwner($owner)
    {
        $this->owner = $owner;
    }

    /**
     * Returns the year
     *
     * @return string $year
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Sets the year
     *
     * @param string $year
     * @return void
     */
    public function setYear($year)
    {
        $this->year = $year;
    }

    /**
     * Returns the copyright
     *
     * @return string $copyright
     */
    public function getCopyright()
    {
        return $this->copyright;
    }

    /**
     * Sets the copyright
     *
     * @param string $copyright
     * @return void
     */
    public function setCopyright($copyright)
    {
        $this->copyright = $copyright;
    }

    /**
     * Returns the projectplanning
     *
     * @return string $projectplanning
     */
    public function getProjectplanning()
    {
        return $this->projectplanning;
    }

    /**
     * Sets the projectplanning
     *
     * @param string $projectplanning
     * @return void
     */
    public function setProjectplanning($projectplanning)
    {
        $this->projectplanning = $projectplanning;
    }
    /**
     * Returns the realization
     *
     * @return string $realization
     */
    public function getRealization()
    {
        return $this->realization;
    }

    /**
     * Sets the realization
     *
     * @param string $realization
     * @return void
     */
    public function setRealization($realization)
    {
        $this->realization = $realization;
    }

    /**
     * Returns the architect
     *
     * @return string $architect
     */
    public function getArchitect()
    {
        return $this->architect;
    }

    /**
     * Sets the architect
     *
     * @param string $architect
     * @return void
     */
    public function setArchitect($architect)
    {
        $this->architect = $architect;
    }

    /**
     * Returns the partner
     *
     * @return string $partner
     */
    public function getPartner()
    {
        return $this->partner;
    }

    /**
     * Sets the partner
     *
     * @param string $partner
     * @return void
     */
    public function setPartner($partner)
    {
        $this->partner = $partner;
    }

    /**
     * Returns the description
     *
     * @return string $description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the description
     *
     * @param string $description
     * @return void
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }


    /**
     * Adds a Area
     *
     * @param \Miux\Projects\Domain\Model\Area $area
     * @return void
     */
    public function addSkill(\Miux\Projects\Domain\Model\Area $area)
    {
        $this->area->attach($area);
    }

    /**
     * Removes a Area
     *
     * @param \Miux\Projects\Domain\Model\Area $areaToRemove The Area to be removed
     * @return void
     */
    public function removeArea(\Miux\Projects\Domain\Model\Area $areaToRemove)
    {
        $this->area->detach($areaToRemove);
    }

    /**
     * Returns the Area
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Miux\Projects\Domain\Model\Area> $area
     */
    public function getArea()
    {
        return $this->area;
    }

    /**
     * Sets the Area
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Miux\Projects\Domain\Model\Area> $area
     * @return void
     */
    public function setSkills(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $area)
    {
        $this->area = $area;
    }

}
