<?php

declare(strict_types=1);

namespace Miux\Projects\Controller;


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

use Miux\Projects\PageTitle\MyRecordTitleProvider;
use TYPO3\CMS\Core\TypoScript\TypoScriptService;
use TYPO3\CMS\Core\MetaTag\MetaTagManagerRegistry;
use TYPO3\CMS\Core\Utility\GeneralUtility;


/**
 * ProjectController
 */
class ProjectController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * projectRepository
     *
     * @var \Miux\Projects\Domain\Repository\ProjectRepository
     */
    protected $projectRepository = null;

    /**
     * @param \Miux\Projects\Domain\Repository\ProjectRepository $projectRepository
     */
    public function injectProjectRepository(\Miux\Projects\Domain\Repository\ProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    /**
     * areaRepository
     *
     * @var \Miux\Projects\Domain\Repository\AreaRepository
     */
    protected $areaRepository = null;

    /**
     * @param \Miux\Projects\Domain\Repository\AreaRepository $areaRepository
     */
    public function injectAreaRepository(\Miux\Projects\Domain\Repository\AreaRepository $areaRepository)
    {
        $this->areaRepository = $areaRepository;
    }

    /**
     * action list
     * *
     * * @return \Psr\Http\Message\ResponseInterface
     */
    public function listAction(): \Psr\Http\Message\ResponseInterface
    {


        $kategorien = $this->areaRepository->findAll();
        $this->view->assign('kategorien', $kategorien);
        $this->view->assign('selKat', 1);

        $this->view->assign("currentPageID", $GLOBALS['TSFE']->id);
        $this->view->assign("detailPid", $this->settings['detailPid']);

        return $this->htmlResponse();
    }

    /**
     * action ajaxCall
     *
     * @return void
     */
    public function ajaxCallAction(): \Psr\Http\Message\ResponseInterface
    {

        $arg = $this->request->getArguments();

        //\TYPO3\CMS\Core\Utility\DebugUtility::debug($arg,'ProjectController: showAction: $project');

        $cat = $arg['selKategorie'][0] ?? null; // Überprüfung auf Existenz
        $search = $arg['search'] ?? null; // Überprüfung auf Existenz

        if($cat > 1){
            $projects = $this->projectRepository->findByCategory($cat);
            $bereich = $this->areaRepository->findByUid($cat);
            $this->view->assign('worklist', $bereich->getWorklist());
        } else {
            $projects = $this->projectRepository->findAll();
        }
        if ($search) {
            $projects = $this->projectRepository->search($search);
        }


        $this->view->assign('detailPid', 70);
        $this->view->assign('projects', $projects);
        return $this->htmlResponse();
    }

    /**
     * action show
     *
     * @param \Miux\Projects\Domain\Model\Project $project
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function showAction(\Miux\Projects\Domain\Model\Project $project): \Psr\Http\Message\ResponseInterface
    {

        if($project->getSeotitle()){
            $title = $project->getSeotitle();
        }else{
            $title = strip_tags($project->getTitle());
        }
        $titleProvider = GeneralUtility::makeInstance(MyRecordTitleProvider::class);
        $titleProvider->setTitle($title);

        $metaTagManager = GeneralUtility::makeInstance(MetaTagManagerRegistry::class)->getManagerForProperty('og:title');
        $metaTagManager->addProperty('og:title', $title);
        $metaTagManager = GeneralUtility::makeInstance(MetaTagManagerRegistry::class)->getManagerForProperty('title');
        $metaTagManager->addProperty('title', $title);

        $metaTagManager = GeneralUtility::makeInstance(MetaTagManagerRegistry::class)->getManagerForProperty('description');
        $metaTagManager->addProperty('description', $project->getSeodesc());

        //\TYPO3\CMS\Core\Utility\DebugUtility::debug($project,'ProjectController: showAction: $project');

        $next = $this->projectRepository->findNext($project->getSorting());
        if($next){
            $this->view->assign('next', $next[0]->getUid());
        }

        $prev = $this->projectRepository->findPrev($project->getSorting());
        if($prev){
            $this->view->assign('prev', $prev[0]->getUid());
        }


        $this->view->assign('project', $project);
        return $this->htmlResponse();
    }

    /**
     * action single
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function singleAction(): \Psr\Http\Message\ResponseInterface
    {
        $projectRecords = [];
        $idList = GeneralUtility::trimExplode(',', $this->settings['singleProject'], true);
        foreach ($idList as $id) {
            $project = $this->projectRepository->findByIdentifier($id);
            if ($project) {
                $projectRecords[] = $project;
            }
        }
        $this->contentObj = $this->configurationManager->getContentObject();
        $this->view->assign('header', $this->contentObj->data['header']);
        $this->view->assign('projects', $projectRecords);
        return $this->htmlResponse();
    }
}
