<?php
return [
    \GeorgRinger\News\Domain\Model\News::class => [
        'subclasses' => [
            3 => \Miux\MiuxTemplate\Domain\Model\Team::class,
        ]
    ],
    \Miux\MiuxTemplate\Domain\Model\Team::class => [
        'tableName' => 'tx_news_domain_model_news',
        'recordType' => 3,
    ]
];
