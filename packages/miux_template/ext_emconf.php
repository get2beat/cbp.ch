<?php

/**
 * Extension Manager/Repository config file for ext "miux_template".
 */
$EM_CONF[$_EXTKEY] = [
    'title' => 'Miux Template',
    'description' => 'Configuration for Miux typo3 template',
    'category' => 'plugin',
    'author' => 'Beat Hausheer',
    'author_email' => 'bh@miux.ch',
    'author_company' => 'Miux',
    'state' => 'stable',
    'clearCacheOnLoad' => true,
    'version' => '13.0.1', // miux_template version
    'constraints' => [
        'depends' => [
            'typo3' => '11.9.99-12.4.2-13.9.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];


