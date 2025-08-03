<?php
defined('TYPO3') || die();

(static function () {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToInsertRecords('tx_modul_slides');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToInsertRecords('tx_modul_accordions');
})();
