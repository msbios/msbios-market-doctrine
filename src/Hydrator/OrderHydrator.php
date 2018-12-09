<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Market\Doctrine\Hydrator;


use DoctrineModule\Stdlib\Hydrator\DoctrineObject;

/**
 * Class OrderHydrator
 * @package MSBios\Market\Doctrine\Hydrator
 */
class OrderHydrator extends DoctrineObject
{
    /**
     * @param object $object
     * @return array
     */
    public function extract($object)
    {
        /** @var array $data */
        $data = parent::extract($object);

        foreach ($data['purchases'] as $key => $purchase) {
            $purchase = parent::extract($purchase);
            $purchase['variant'] = parent::extract($purchase['variant']);
            $data['purchases'][$key] = $purchase;
        }

        return $data;
    }

}