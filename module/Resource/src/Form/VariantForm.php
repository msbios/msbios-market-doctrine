<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Market\Resource\Doctrine\Form;

use DoctrineModule\Form\Element\ObjectSelect;
use DoctrineModule\Persistence\ObjectManagerAwareInterface;
use DoctrineModule\Persistence\ProvidesObjectManager;
use MSBios\Market\Resource\Doctrine\Entity\Product;
use Zend\Form\Element;
use Zend\Form\Form;

/**
 * Class VariantForm
 * @package MSBios\Market\Resource\Doctrine\Form
 */
class VariantForm extends Form implements ObjectManagerAwareInterface
{
    use ProvidesObjectManager;

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->add([
            'type' => Element\Text::class,
            'name' => 'id',
        ])->add([
            'type' => ObjectSelect::class,
            'name' => 'product',
            'options' => [
                'object_manager' => $this->getObjectManager(),
                'target_class' => Product::class,
            ],
        ])->add([
            'type' => Element\Text::class,
            'name' => 'code',
        ])->add([
            'type' => Element\Text::class,
            'name' => 'name',
        ])->add([
            'type' => Element\Text::class,
            'name' => 'price',
        ])->add([
            'type' => Element\Text::class,
            'name' => 'compare',
        ]);
    }
}