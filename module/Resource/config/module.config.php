<?php
/**
 * @access protected
 * @author
 */
namespace MSBios\Market\Resource\Doctrine;

use Doctrine\ORM\Mapping\Driver\AnnotationDriver;

return [
    'doctrine' => [
        'driver' => [
            Module::class => [
                'class' => AnnotationDriver::class,
                'cache' => 'array',
                'paths' => [
                    __DIR__ . '/../src/Entity'
                ],
            ],

            'orm_default' => [
                'drivers' => [
                    Entity::class =>
                        Module::class
                ]
            ],
        ],
    ],
];
