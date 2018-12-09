<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Market\Doctrine;

use MSBios\Doctrine\ObjectManagerInitializer;
use Zend\Router\Http\Regex;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'home' => [
                'may_terminate' => true,
                'child_routes' => [
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
                    'cart' => [
                        'type' => Segment::class,
                        'options' => [
                            'route' => 'cart[/]',
                            'defaults' => [
                                'controller' => Controller\CartController::class,
                            ]
                        ],
                        'may_terminate' => true,
                        'child_routes' => [
                            'add' => [
                                'type' => Segment::class,
                                'options' => [
                                    'route' => 'add[/]',
                                    'defaults' => [
                                        'action' => 'add',
                                    ]
                                ],
                            ],
                        ],
                    ],
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
            Controller\CartController::class =>
                Factory\CartControllerFactory::class,
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
            CartService::class =>
                Factory\CartServiceFactory::class,
            MarketManager::class =>
                Factory\MarketManagerFactory::class,

            Storage\CartObjectStorage::class =>
                Factory\CartObjectStorageFactory::class
        ],
    ],

    'form_elements' => [
        'factories' => [
            Form\OrderForm::class =>
                InvokableFactory::class
        ],
    ],
];
