<?php
defined('TYPO3') || die();

call_user_func(function()
{
    /**
     * Temporary variables
     */
    $extensionKey = 'miux_template';

    /**
     * Default TypoScript for MiuxTemplate
     */
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
        $extensionKey,
        'Configuration/TypoScript',
        'Miux Template'
    );
});
