<?php
defined('TYPO3') || die();

use T3docs\Examples\Controller\FalExampleController;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

(static function() {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Projects',
            'list',
            [
                \Miux\Projects\Controller\ProjectController::class => 'list, ajaxCall'
            ],
            // non-cacheable actions
            [
                \Miux\Projects\Controller\ProjectController::class => 'ajaxCall',
            ],
            ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
        );
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Projects',
        'show',
        [
            \Miux\Projects\Controller\ProjectController::class => 'show',
        ],
        // non-cacheable actions
        [
            \Miux\Projects\Controller\ProjectController::class => '',
        ],
        ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
    );

})();
