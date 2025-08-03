<?php

declare(strict_types=1);

namespace Miux\MiuxTemplate\Backend\EventListener;

use TYPO3\CMS\Backend\View\Event\PageContentPreviewRenderingEvent;
use TYPO3\CMS\Core\Attribute\AsEventListener;
use TYPO3\CMS\Backend\Utility\BackendUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Fluid\Core\Rendering\RenderingContextFactory;
use TYPO3\CMS\Fluid\View\StandaloneView;
use TYPO3\CMS\Core\Resource\FileRepository;

final class BackendPreview
{

    private StandaloneView $standaloneView;

    public function __construct(StandaloneView $standaloneView)
    {
        $this->standaloneView = $standaloneView;
    }
    public function __invoke(PageContentPreviewRenderingEvent $event): void
    {
        if ($event->getTable() !== 'tt_content') {
            return;
        }
        if ($event->getRecord()['CType'] === 'modul_bildtext') {
            $this->setBackendTemplate('BildText','assets',$event);
        }
        if ($event->getRecord()['CType'] === 'modul_galerieslider') {
            $this->setBackendTemplate('GalerieSlider','tx_modul_bild',$event);
        }
        if ($event->getRecord()['CType'] === 'modul_galeriekarussell') {
            $this->setBackendTemplate('GalerieKarussell','tx_modul_bild',$event);
        }
        if ($event->getRecord()['CType'] === 'modul_galeriegrid') {
            $this->setBackendTemplate('GalerieGrid','tx_modul_bild',$event);
        }
    }

    public function setBackendTemplate($filename,$imgfield, $event)
    {
        $templatePathAndFilename = GeneralUtility::getFileAbsFileName('EXT:miux_template/Resources/Private/Backend/Templates/'.$filename.'.html');
        $this->standaloneView->setTemplatePathAndFilename($templatePathAndFilename);

        $data = BackendUtility::getRecordWSOL('tt_content', (int)$event->getRecord()['uid']);
        $this->addFilesToData($data, 'tt_content', $imgfield);
        $this->standaloneView->assign('data', $data);
        $itemContent = $this->standaloneView->render();
        //\TYPO3\CMS\Core\Utility\DebugUtility::debug($itemContent,'$data');
        $event->setPreviewContent($itemContent);
    }
    public function getTemplatePathAndFilename($filename)
    {
        $base_dir = __DIR__;
        $path = str_replace("packages/miux_template/Classes/Backend/EventListener", "vendor/miux/miux-template/Resources/Private/Backend/Templates/", $base_dir);
        $templatePathAndFilename = $path.$filename;
        return $templatePathAndFilename;
    }
    public function addFilesToData(array &$data, string $table = 'tt_content', $fieldKey): void
    {
        $uid = $data['uid'];
        $fileRepository = GeneralUtility::makeInstance(FileRepository::class);
        $data[$fieldKey] = $fileRepository->findByRelation($table, $fieldKey, $uid);
    }
}
