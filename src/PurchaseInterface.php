<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Market\Doctrine;

use MSBios\Market\Resource\Doctrine\AmountableAwareInterface;
use MSBios\Market\Resource\Doctrine\PriceableAwareInterface;

/**
 * Interface PurchaseInterface
 * @package MSBios\Market\Doctrine
 */
interface PurchaseInterface extends
    PriceableAwareInterface,
    AmountableAwareInterface
{
    /**
     * @return VariantInterface
     */
    public function getVariant();
}
