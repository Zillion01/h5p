<?php

return [
    'ctrl'     => [
        'hideTable'      => true,
        'title'          => 'LLL:EXT:h5p/Resources/Private/Language/locallang.xlf:tx_h5p_domain_model_librarydependency',
        'label'          => 'library',
        'label_userFunc' => \MichielRoos\H5p\Backend\TCA::class . '->getLibraryDependencyTitle',
        'tstamp'         => 'tstamp',
        'crdate'         => 'crdate',
        'enablecolumns'  => [
            'disabled' => 'hidden',
        ],
        'delete'         => 'deleted',
        'sortby'         => 'library',
        'searchFields'   => 'library',
        'typeicon_classes' => [
            'default' => 'h5p-logo'
        ],
    ],
    'columns'  => [
        'hidden'           => [
            'exclude' => 1,
            'label'   => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.hidden',
            'config'  => [
                'type' => 'check'
            ]
        ],
        'library'          => [
            'exclude' => 0,
            'label'   => 'LLL:EXT:h5p/Resources/Private/Language/locallang.xlf:tx_h5p_domain_model_librarydependency.library',
            'config'  => [
                'type' => 'input',
                'size' => 80,
                'eval' => 'trim',
            ]
        ],
        'required_library' => [
            'exclude' => 0,
            'label'   => 'LLL:EXT:h5p/Resources/Private/Language/locallang.xlf:tx_h5p_domain_model_librarydependency.requiredlibrary',
            'config'  => [
                'type' => 'input',
                'size' => 80,
                'eval' => 'trim',
            ]
        ],
        'dependency_type'  => [
            'exclude' => 0,
            'label'   => 'LLL:EXT:h5p/Resources/Private/Language/locallang.xlf:tx_h5p_domain_model_librarydependency.dependencytype',
            'config'  => [
                'type' => 'input',
                'size' => 80,
                'eval' => 'trim',
            ]
        ]
    ],
    'types'    => [
        '1' => ['showitem' => '--palette--;;library']
    ],
    'palettes' => [
        'library' => ['showitem' => 'library,requiredlibrary,dependencytype']
    ]
];
