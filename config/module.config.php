<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Market\Doctrine;

use MSBios\Doctrine\Initializer\ObjectManagerInitializer;
use Zend\Router\Http\Regex;
use Zend\ServiceManager\Factory\InvokableFactory;

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
                    'brand' => [
                        'type' => Regex::class,
                        'options' => [
                            'regex' => 'brand/(?<id>[\d]+)-(?<slug>[a-zA-Z-_\d]+)',
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
                InvokableFactory::class,
            Controller\IndexController::class =>
                InvokableFactory::class,
        ],
        'aliases' => [
            \MSBios\Application\Controller\IndexController::class =>
                Controller\IndexController::class
        ],
        'initializers' => [
            ObjectManagerInitializer::class =>
                ObjectManagerInitializer::class
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
