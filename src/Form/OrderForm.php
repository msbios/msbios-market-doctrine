<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Market\Doctrine\Form;

use DoctrineModule\Stdlib\Hydrator\DoctrineObject;
use Zend\Form\Element;
use Zend\Form\Fieldset;
use Zend\Form\Form;

/**
 * Class OrderForm
 * @package MSBios\Market\Doctrine\Form
 */
class OrderForm extends Form
{
    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        $this->add([
            'type' => Element\Text::class,
            'name' => 'price'
        ])->add([
            'type' => Element\Text::class,
            'name' => 'amount'
        ])->add([
            'type' => Element\Collection::class,
            'name' => 'purchases',
            'hydrator' => DoctrineObject::class,
            'options' => [
                'allow_add' => true,
                'allow_remove' => true,
                'target_element' => [
                    'type' => Fieldset::class,
                    'hydrator' => DoctrineObject::class,
                    'elements' => [
                        [
                            'spec' => [
                                'type' => Element\Text::class,
                                'name' => 'id',
                            ]
                        ], [
                            'spec' => [
                                'type' => Element\Text::class,
                                'name' => 'price',
                            ]
                        ], [
                            'spec' => [
                                'type' => Element\Text::class,
                                'name' => 'amount',
                            ]
                        ], [
                            'spec' => [
                                'type' => Fieldset::class,
                                'name' => 'variant',
                                'elements' => [
                                    [
                                        'spec' => [
                                            'type' => Element\Text::class,
                                            'name' => 'id',
                                        ]
                                    ], [
                                        'spec' => [
                                            'type' => Element\Text::class,
                                            'name' => 'code',
                                        ]
                                    ], [
                                        'spec' => [
                                            'type' => Element\Text::class,
                                            'name' => 'name',
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ])->add([
            'type' => Element\Submit::class,
            'label' => 'Submit'
        ]);
    }
}
