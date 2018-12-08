<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Market\Doctrine;

/**
 * Interface PurchaseInterface
 * @package MSBios\Market\Doctrine
 */
interface PurchaseInterface
{
    /**
     * @return VariantInterface
     */
    public function getVariant();

    /**
     * @return int
     */
    public function getAmount();
}