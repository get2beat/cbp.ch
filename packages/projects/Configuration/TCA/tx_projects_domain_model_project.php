<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:projects/Resources/Private/Language/locallang_db.xlf:tx_projects_domain_model_project',
        'label' => 'title',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'sortby' => 'sorting',
        'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
        ],
        'searchFields' => 'title,teaser,place,services,owner,architect,description',
        'iconfile' => 'EXT:projects/Resources/Public/Icons/tx_projects_domain_model_project.gif'
    ],
    'interface' => [
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, topproject, urlsegment, title, seotitle, seodesc, teaser, listimage, images, services, owner, architect, description, area',
    ],
    'types' => [
        '1' => ['showitem' => '
        sys_language_uid, l10n_parent, l10n_diffsource, hidden, topproject, urlsegment, title, place, teaser, description,
        --div--;SEO,
            seotitle,seodesc,
        --div--;Hauptbild,
            listimage,
        --div--;Bilderkarusell,
            images,
        --div--;Eigenschaften,
             services, owner, architect,
        --div--;Bereich,
             area,
        '],
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'language',
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'default' => 0,
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'tx_projects_domain_model_project',
                'foreign_table_where' => 'AND {#tx_projects_domain_model_project}.{#pid}=###CURRENT_PID### AND {#tx_projects_domain_model_project}.{#sys_language_uid} IN (-1,0)',
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.hidden',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'default' => 0,
            ],
        ],
        'starttime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:starttime_formlabel',
            'config' => [
                'type' => 'datetime',
            ],
        ],
        'endtime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:endtime_formlabel',
            'config' => [
                'type' => 'datetime',
            ],
        ],
        'topproject' => [
            'exclude' => true,
            'label' => 'LLL:EXT:projects/Resources/Private/Language/locallang_db.xlf:tx_projects_domain_model_project.topproject',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        0 => '',
                        1 => '',
                        'invertStateDisplay' => true
                    ]
                ],
            ]
        ],
        'urlsegment' => [
            'exclude' => true,
            'label' => 'Sprechende URL Pfadabschnitt',
            'config' => [
                'type' => 'slug',
                'size' => 50,
                'generatorOptions' => [
                    'fields' => ['title'],
                    'replacements' => [
                        '/' => '-'
                    ],
                ],
                'fallbackCharacter' => '_',
                'eval' => 'uniqueInSite',
                'default' => ''
            ],
        ],
        'title' => [
            'exclude' => true,
            'label' => 'LLL:EXT:projects/Resources/Private/Language/locallang_db.xlf:tx_projects_domain_model_project.title',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'required' => true,
                'eval' => 'trim'
            ],
        ],
        'seotitle' => [
            'exclude' => true,
            'label' => 'SEO: Titel',
            'config' => [
                'type' => 'input',
                'size' => 20,
                'eval' => 'trim'
            ],
        ],
        'seodesc' => [
            'exclude' => true,
            'label' => 'SEO: Beschreibung',
            'config' => [
                'type' => 'text',
                'cols' => 20,
                'rows' => 5,
                'eval' => 'trim',
            ],

        ],
        'listimage' => [
            'exclude' => true,
            'label' => 'LLL:EXT:projects/Resources/Private/Language/locallang_db.xlf:tx_projects_domain_model_project.listimage',
            'config' => [
                'type' => 'file',
                'maxitems' => 1,
                'allowed' => 'common-media-types'
            ],
        ],
        'headerimage' => [
            'exclude' => true,
            'label' => 'LLL:EXT:projects/Resources/Private/Language/locallang_db.xlf:tx_projects_domain_model_project.headerimage',
            'config' => [
                'type' => 'file',
                'maxitems' => 1,
                'allowed' => 'common-media-types'
            ],
        ],
        'award' => [
            'exclude' => true,
            'label' => 'LLL:EXT:projects/Resources/Private/Language/locallang_db.xlf:tx_projects_domain_model_project.award',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'owner' => [
            'exclude' => true,
            'label' => 'LLL:EXT:projects/Resources/Private/Language/locallang_db.xlf:tx_projects_domain_model_project.owner',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'year' => [
            'exclude' => true,
            'label' => 'LLL:EXT:projects/Resources/Private/Language/locallang_db.xlf:tx_projects_domain_model_project.year',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'projectplanning' => [
            'exclude' => true,
            'label' => 'LLL:EXT:projects/Resources/Private/Language/locallang_db.xlf:tx_projects_domain_model_project.projectplanning',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'realization' => [
            'exclude' => true,
            'label' => 'LLL:EXT:projects/Resources/Private/Language/locallang_db.xlf:tx_projects_domain_model_project.realization',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'architect' => [
            'exclude' => true,
            'label' => 'LLL:EXT:projects/Resources/Private/Language/locallang_db.xlf:tx_projects_domain_model_project.architect',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'partner' => [
            'exclude' => true,
            'label' => 'LLL:EXT:projects/Resources/Private/Language/locallang_db.xlf:tx_projects_domain_model_project.partner',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'copyright' => [
            'exclude' => true,
            'label' => 'LLL:EXT:projects/Resources/Private/Language/locallang_db.xlf:tx_projects_domain_model_project.copyright',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'description' => [
            'exclude' => true,
            'label' => 'LLL:EXT:projects/Resources/Private/Language/locallang_db.xlf:tx_projects_domain_model_project.description',
            'config' => [
                'type' => 'text',
                'enableRichtext' => true,
                'richtextConfiguration' => 'miuxrte',
                'fieldControl' => [
                    'fullScreenRichtext' => [
                        'disabled' => false,
                    ],
                ],
                'cols' => 40,
                'rows' => 15,
                'required' => true,
                'eval' => 'trim',
            ],

        ],
        'images' => [
            'exclude' => true,
            'label' => 'LLL:EXT:projects/Resources/Private/Language/locallang_db.xlf:tx_projects_domain_model_project.images',
            'config' => [
                'type' => 'file',
                'maxitems' => 10,
                'allowed' => 'common-image-types'
            ],
        ],
        'area' => [
            'exclude' => true,
            'label' => 'LLL:EXT:projects/Resources/Private/Language/locallang_db.xlf:tx_projects_domain_model_project.area',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_projects_domain_model_area',
                'default' => 0,
                'size' => 3,
                'autoSizeMax' => 20,
                'maxitems' => 10,
                'multiple' => 0,
                'fieldControl' => [
                    'editPopup' => [
                        'disabled' => false,
                    ],
                    'addRecord' => [
                        'disabled' => false,
                        'options' => [
                            'pid' => '227',
                        ],
                    ],
                    'listModule' => [
                        'disabled' => true,
                    ],
                ],
            ],

        ],
        'sorting' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
    ],
];
