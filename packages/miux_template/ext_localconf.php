<?php
defined('TYPO3') || die();

/***************
 * Add default RTE configuration
 */
$GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['miuxrte'] = 'EXT:miux_template/Configuration/RTE/MiuxRTE.yaml';

call_user_func(function () {

    // Register content element icons
    $iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
    $iconRegistry->registerIcon(
        'tx_modul_text',
        \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
        [
            'source' => 'EXT:miux_template/Resources/Public/Icons/Content/m-text.svg',
        ]
    );
    $iconRegistry->registerIcon(
        'tx_modul_bildtext',
        \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
        [
            'source' => 'EXT:miux_template/Resources/Public/Icons/Content/m-bildtext.svg',
        ]
    );
    $iconRegistry->registerIcon(
        'tx_modul_galerieslider',
        \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
        [
            'source' => 'EXT:miux_template/Resources/Public/Icons/Content/m-galerieslider.svg',
        ]
    );
    $iconRegistry->registerIcon(
        'tx_modul_galeriekarussell',
        \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
        [
            'source' => 'EXT:miux_template/Resources/Public/Icons/Content/m-galeriekarussell.svg',
        ]
    );
    $iconRegistry->registerIcon(
        'tx_modul_accordion',
        \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
        [
            'source' => 'EXT:miux_template/Resources/Public/Icons/Content/m-accordion.svg',
        ]
    );
    $iconRegistry->registerIcon(
        'tx_modul_trennlinie',
        \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
        [
            'source' => 'EXT:miux_template/Resources/Public/Icons/Content/m-trennlinie.svg',
        ]
    );
    $iconRegistry->registerIcon(
        'tx_modul_header',
        \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
        [
            'source' => 'EXT:miux_template/Resources/Public/Icons/Content/m-header.svg',
        ]
    );
    $iconRegistry->registerIcon(
        'tx_modul_topslider',
        \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
        [
            'source' => 'EXT:miux_template/Resources/Public/Icons/Content/m-topslider.svg',
        ]
    );
    $iconRegistry->registerIcon(
        'ext-news-type-team',
        \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
        [
            'source' => 'EXT:miux_template/Resources/Public/Icons/Content/bild.svg',
        ]
    );

    $GLOBALS['TYPO3_CONF_VARS']['BE']['stylesheets']['miux_template']
        = 'EXT:miux_template/Resources/Public/Css/Backend/';

});
