<?php

/**
 * Extension Manager/Repository config file for ext "restaurant".
 */
$EM_CONF[$_EXTKEY] = [
    'title' => 'Restaurant',
    'description' => 'For Hof Express',
    'category' => 'templates',
    'constraints' => [
        'depends' => [
            'typo3' => '8.7.0-9.5.99',
            'rte_ckeditor' => '8.7.0-9.5.99',
            'bootstrap_package' => '10.0.0-10.0.99'
        ],
        'conflicts' => [
        ],
    ],
    'autoload' => [
        'psr-4' => [
            'HofExpress\\Restaurant\\' => 'Classes'
        ],
    ],
    'state' => 'stable',
    'uploadfolder' => 0,
    'createDirs' => '',
    'clearCacheOnLoad' => 1,
    'author' => 'Travis Lykes',
    'author_email' => 'hello@travislykes.com',
    'author_company' => 'Hof Express',
    'version' => '1.0.0',
];
