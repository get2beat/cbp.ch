<?php
defined('TYPO3') or die();

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

$pluginSignature1 = ExtensionUtility::registerPlugin(
    'Projects',
    'list',
    'CBP Projekte: Liste'
);
ExtensionManagementUtility::addToAllTCAtypes(
    'tt_content',
    '--div--;Configuration,pi_flexform,',
    $pluginSignature1,
    'after:subheader'
);

ExtensionManagementUtility::addPiFlexFormValue(
    '*',
    'FILE:EXT:projects/Configuration/Flexform/browser.xml',
    $pluginSignature1
);

$pluginSignature2 = ExtensionUtility::registerPlugin(
    'Projects',
    'show',
    'CBP Projekte: Show'
);
ExtensionManagementUtility::addToAllTCAtypes(
    'tt_content',
    '--div--;Configuration,pi_flexform,',
    $pluginSignature2,
    'after:subheader'
);

ExtensionManagementUtility::addPiFlexFormValue(
    '*',
    'FILE:EXT:projects/Configuration/Flexform/browser.xml',
    $pluginSignature2
);
