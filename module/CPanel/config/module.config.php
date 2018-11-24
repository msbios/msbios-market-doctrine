<?php
/**
 * @access protected
 * @author
 */
namespace MSBios\Market\CPanel\Doctrine;

return [
    'navigation' => [
        \MSBios\CPanel\Navigation\Sidebar::class => [
            'catalog' => [
                'label' => _('Catalog'),
                'uri' => '#',
                'class' => 'icon-cube',
                'order' => 100,
                'pages' => [
                    'products' => [
                        'label' => _('Products'),
                        'uri' => '#',
                    ],
                    'categories' => [
                        'label' => _('Categories'),
                        'uri' => '#',
                    ],
                    'brands' => [
                        'label' => _('Brands'),
                        'uri' => '#',
                    ],
                    'properties' => [
                        'label' => _('Properties'),
                        'uri' => '#',
                    ],
                ],
            ],
            'orders' => [
                'label' => _('Orders'),
                'uri' => '#',
                'class' => 'icon-bag',
                'order' => 100,
                'pages' => [
                    'products' => [
                        'label' => _('New'),
                        'uri' => '#',
                    ],
                    'accepted' => [
                        'label' => _('Accepted'),
                        'uri' => '#',
                    ],
                    'fulfilled' => [
                        'label' => _('Fulfilled'),
                        'uri' => '#',
                    ],
                    'removed' => [
                        'label' => _('Removed'),
                        'uri' => '#',
                    ],
                    'tags' => [
                        'label' => _('Tags'),
                        'uri' => '#',
                    ],
                ],
            ],
            'buyers' => [
                'label' => _('Buyers'),
                'uri' => '#',
                'class' => 'icon-users4',
                'order' => 100,
                'pages' => [
                    'buyers' => [
                        'label' => _('Buyers'),
                        'uri' => '#',
                    ],
                    'groups' => [
                        'label' => _('Groups'),
                        'uri' => '#',
                    ],
                    'coupons' => [
                        'label' => _('Coupons'),
                        'uri' => '#',
                    ],
                ],
            ],
        ],
    ],
];
