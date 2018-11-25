<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Market\Doctrine;

use MSBios\Doctrine\Initializer\ObjectManagerInitializer;
use Zend\Router\Http\Regex;
use Zend\Router\Http\Segment;
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
                    'brands' => [
                        'type' => Regex::class,
                        'options' => [
                            'regex' => 'brands/(?<id>[\d]+)-(?<slug>[a-zA-Z-_\d]+)\.html',
                            'spec' => 'brands/%id%-%slug%.html',
                            'defaults' => [
                                'controller' => Controller\BrandsController::class,
                            ]
                        ],
                    ],
                    'products' => [
                        'type' => Segment::class,
                        'options' => [
                            'route' => 'products[/]',
                            'defaults' => [
                                'controller' => Controller\ProductsController::class,
                            ]
                        ],
                        'may_terminate' => true,
                        'child_routes' => [
                            'view' => [
                                'type' => Regex::class,
                                'options' => [
                                    'regex' => '(?<id>[\d]+)-(?<slug>[a-zA-Z-_\d]+)\.html',
                                    'spec' => '%id%-%slug%.html',
                                    'defaults' => [
                                        'action' => 'view',
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
            Controller\BrandsController::class =>
                InvokableFactory::class,
            Controller\CatalogController::class =>
                InvokableFactory::class,
            Controller\IndexController::class =>
                InvokableFactory::class,
            Controller\ProductsController::class =>
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
