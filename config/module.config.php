<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Market\Doctrine;

use Zend\Router\Http\Regex;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
//            'home' => [
//                'type' => Regex::class,
//                'options' => [
//                    'regex' => '^/(?!cpanel?/)(?<path>.*)',
//                    'spec' => '/%path%',
//                ],
//            ],
        ],
    ],

    'controllers' => [
        'factories' => [
            Controller\IndexController::class =>
                InvokableFactory::class,
        ],
        'aliases' => [
            \MSBios\Application\Controller\IndexController::class =>
                Controller\IndexController::class
        ]
    ],

    'service_manager' => [
        'factories' => [
            // ...
        ],
    ],


    'view_manager' => [
        'template_map' => [
            // ...
        ],
        'template_path_stack' => [
            // ...
        ],
    ],

    'listeners' => [
        // ...
    ]
];
