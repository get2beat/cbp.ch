<?php
defined('TYPO3') || die();


call_user_func(function()
{
    /**
     * Temporary variables
     */
    $extensionKey = 'miux_template';

    /**
     * Default PageTS for MiuxTemplate
     */
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::registerPageTSConfigFile(
        $extensionKey,
        'Configuration/TsConfig/Page/All.tsconfig',
        'Miux Template'
    );
});
