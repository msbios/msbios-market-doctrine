<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Market\Doctrine\Form;

use MSBios\Market\Resource\Doctrine\Entity\Variant;
use MSBios\Market\Resource\Doctrine\Form\VariantForm;
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
        $this->add([
            'type' => Element\Text::class,
            'name' => 'price'
        ])->add([
            'type' => Element\Text::class,
            'name' => 'amount'
        ])->add([
            'type' => Element\Collection::class,
            'name' => 'purchases',
            'options' => [
                'allow_add' => true,
                'allow_remove' => true,
                'target_element' => [
                    'type' => Fieldset::class,
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
                        ]
                    ],
                    'fieldsets' => [
                        [
                            'spec' => [
                                'type' => VariantForm::class,
                                'name' => 'variant',
                                //'object' => Variant::class,
                                //'elements' => [
                                //    [
                                //        'spec' => [
                                //            'type' => Element\Text::class,
                                //            'name' => 'id',
                                //        ]
                                //    ], [
                                //        'spec' => [
                                //            'type' => Element\Text::class,
                                //            'name' => 'code',
                                //        ]
                                //    ], [
                                //        'spec' => [
                                //            'type' => Element\Text::class,
                                //            'name' => 'name',
                                //        ]
                                //    ]
                                //]
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
