<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

return [

    'doctrine' => [
        'connection' => [
            'orm_default' => [
                'params' => [
                    'host' => '127.0.0.1',
                    'user' => 'root',
                    'password' => 'root',
                    'dbname' => 'portal.dev',
                ],
            ],
        ],
    ],

    \MSBios\Theme\Module::class => [
        'themes' => [
            'default' => [
                'identifier' => 'default',
                'title' => 'Default Application Theme',
                'description' => 'Default Application Theme Description',
                'template_path_stack' => [
                    __DIR__ . '/../../themes/default/view/',
                ],
                'translation_file_patterns' => [
                    [
                        'type' => 'gettext',
                        'base_dir' => __DIR__ . '/../../themes/default/language/',
                        'pattern' => '%s.mo',
                    ],
                ],
                'widget_manager' => [
                    'template_map' => [
                    ],
                    'template_path_stack' => [
                        __DIR__ . '/../../themes/default/widget/'
                    ],
                ],
            ]
        ]
    ],

//    'view_manager' => [
//        // 'display_not_found_reason' => true,
//        // 'display_exceptions' => true,
//        // 'doctype' => 'HTML5',
//        // 'not_found_template' => 'error/404',
//        // 'exception_template' => 'error/index',
//        'template_map' => [
//            'layout/layout' => __DIR__ . '/../../view/layout/layout.phtml',
//            // 'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
//            // 'error/404' => __DIR__ . '/../view/error/404.phtml',
//            // 'error/index' => __DIR__ . '/../view/error/index.phtml',
//        ],
//        'template_path_stack' => [
//            __DIR__ . '/../../view',
//        ],
//    ],

//    \MSBios\Theme\Module::class => [
//        // ...
//    ]
];
