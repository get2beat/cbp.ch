<?php

/*
 * This file is part of the package miux/glatsch.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

defined('TYPO3') || die();

$listCropSettings = [
    'title' => 'Seitenverhältnis',
    'allowedAspectRatios' => [
        '300:204' => [
            'title' => 'Querformat',
            'value' => 300 / 204
        ],
        '300:428' => [
            'title' => 'Hochformat',
            'value' => 300 / 428
        ],
    ],
    'selectedRatio' => 'NaN',
    'cropArea' => [
        'x' => 0.0,
        'y' => 0.0,
        'width' => 1.0,
        'height' => 1.0,
    ]
];
$headerCropSettings = [
    'title' => 'Seitenverhältnis',
    'allowedAspectRatios' => [
        '21:10' => [
            'title' => 'Querformat 21/10',
            'value' => 21 / 10
        ],
    ],
    'selectedRatio' => 'NaN',
    'cropArea' => [
        'x' => 0.0,
        'y' => 0.0,
        'width' => 1.0,
        'height' => 1.0,
    ]
];
$galerieSliderCropSettings = [
    'title' => 'Seitenverhältnis',
    'allowedAspectRatios' => [
        '16:10' => [
            'title' => 'Querformat 16/10',
            'value' => 16 / 10
        ],
        '1.5:2' => [
            'title' => 'Hochformat 1.5/2',
            'value' => 0.7445

        ],
        'NaN' => [
            'title' => 'Frei',
            'value' => 0.0
        ],
    ],
    'selectedRatio' => 'NaN',
    'cropArea' => [
        'x' => 0.0,
        'y' => 0.0,
        'width' => 1.0,
        'height' => 1.0,
    ]
];
$quadratCropSettings = [
    'title' => 'Quadrat',
    'allowedAspectRatios' => [
        '1:1' => [
            'title' => 'Quadrat 1/1',
            'value' => 1 / 1
        ],
    ],
    'selectedRatio' => 'NaN',
    'cropArea' => [
        'x' => 0.0,
        'y' => 0.0,
        'width' => 1.0,
        'height' => 1.0,
    ]
];


/******************
 * project listimage
 */
$GLOBALS['TCA']['tx_projects_domain_model_project']['columns']['listimage']['config']['overrideChildTca']['columns']['crop']['config']['cropVariants']['desktop'] = $listCropSettings;
$GLOBALS['TCA']['tx_projects_domain_model_project']['columns']['listimage']['config']['overrideChildTca']['columns']['crop']['config']['cropVariants']['desktop']['title'] = 'Bild auf der Übersichtsseite: Querformat/Hochformat';
$GLOBALS['TCA']['tx_projects_domain_model_project']['columns']['listimage']['config']['overrideChildTca']['columns']['crop']['config']['cropVariants']['mobile'] = $quadratCropSettings;
$GLOBALS['TCA']['tx_projects_domain_model_project']['columns']['listimage']['config']['overrideChildTca']['columns']['crop']['config']['cropVariants']['mobile']['title'] = 'Mobile: Quadrat';

/******************
 * project headerimage
 */
$GLOBALS['TCA']['tx_projects_domain_model_project']['columns']['headerimage']['config']['overrideChildTca']['columns']['crop']['config']['cropVariants']['desktop'] = $headerCropSettings;
$GLOBALS['TCA']['tx_projects_domain_model_project']['columns']['headerimage']['config']['overrideChildTca']['columns']['crop']['config']['cropVariants']['desktop']['title'] = 'Bild auf der Übersichtsseite: Querformat/Hochformat';
$GLOBALS['TCA']['tx_projects_domain_model_project']['columns']['headerimage']['config']['overrideChildTca']['columns']['crop']['config']['cropVariants']['mobile'] = $quadratCropSettings;
$GLOBALS['TCA']['tx_projects_domain_model_project']['columns']['headerimage']['config']['overrideChildTca']['columns']['crop']['config']['cropVariants']['mobile']['title'] = 'Mobile: Quadrat';

/******************
 * project galerieSlider
 */
$GLOBALS['TCA']['tx_projects_domain_model_project']['columns']['images']['config']['overrideChildTca']['columns']['crop']['config']['cropVariants']['desktop'] = $galerieSliderCropSettings;
$GLOBALS['TCA']['tx_projects_domain_model_project']['columns']['images']['config']['overrideChildTca']['columns']['crop']['config']['cropVariants']['desktop']['title'] = 'Querformat';
$GLOBALS['TCA']['tx_projects_domain_model_project']['columns']['images']['config']['overrideChildTca']['columns']['crop']['config']['cropVariants']['mobile'] = $quadratCropSettings;
$GLOBALS['TCA']['tx_projects_domain_model_project']['columns']['images']['config']['overrideChildTca']['columns']['crop']['config']['cropVariants']['mobile']['title'] = 'Querformat';


