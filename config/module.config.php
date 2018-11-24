<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Market\Doctrine;

use Zend\Router\Http\Regex;

return [
    'router' => [
        'routes' => [
            'home' => [
                'may_terminate' => true,
                'child_routes' => [
                    'catalog' => [
                        'type' => Regex::class,
                        'options' => [
                            'regex' => 'catalog/(?<id>[\d]+)-(?<slug>[a-zA-Z-_\d]+)',
                            'spec' => 'catalog/%id%-%slug%',
                            'defaults' => [
                                'controller' => Controller\CatalogController::class,
                            ]
                        ],
                        'may_terminate' => true,
                        'child_routes' => [
                            'brand' => [
                                'type' => Regex::class,
                                'options' => [
                                    'regex' => '/(?<brandid>[\d]+)-(?<brandslug>[a-zA-Z-_\d]+)\.html',
                                    'spec' => '/%brandid%-%brandslug%.html',
                                    'defaults' => [
                                        'action' => 'brand',
                                    ]
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],

    'controllers' => [
        'factories' => [
            Controller\CatalogController::class =>
                Factory\CatalogControllerFactory::class,
            Controller\IndexController::class =>
                Factory\IndexControllerFactory::class,
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

    'listeners' => [
        // ...
    ]
];
