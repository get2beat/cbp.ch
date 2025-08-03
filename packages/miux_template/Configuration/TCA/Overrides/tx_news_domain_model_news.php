<?php
defined('TYPO3') or die();

$fields = array(
    'teamemail' => array(
        'exclude' => 1,
        'label' => 'Team E-Mail',
        'config' => array(
            'type' => 'input',
            'size' => 15
        ),
    ),
    'teampdf' => [
        'config' => [
            'autocomplete' => '0',
            'behaviour' => [
                'allowLanguageSynchronization' => '0',
            ],
            'fieldControl' => [
                'linkPopup' => [
                    'options' => [
                        'title' => 'Team PDF',
                    ],
                ],
            ],
            'renderType' => 'inputLink',
            'softref' => 'typolink',
            'type' => 'input',
        ],
        'exclude' => '1',
        'label' => 'Team PDF',
    ],
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tx_news_domain_model_news', $fields);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('tx_news_domain_model_news', 'teamemail,teampdf');


// Set title and icon (example below) for the news type
$GLOBALS['TCA']['tx_news_domain_model_news']['columns']['type']['config']['items']['3'] =
    ['team', 3,  'ext-news-type-team'] ;

$GLOBALS['TCA']['tx_news_domain_model_news']['types']['3'] = [
    'showitem' => 'type,title,--palette--;;paletteSlug,teaser,teamemail,teampdf,
    --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.media,
                    fal_media,fal_related_files,
    --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:categories,
                    categories,
    --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
                    --palette--;;paletteHidden,
                    --palette--;;paletteAccess,'
];
