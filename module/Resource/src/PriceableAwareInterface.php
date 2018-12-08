<?php
/**
 * @access protected
 * @author Judzhin Miles <judzhin[at]gns-it.com>
 */
namespace MSBios\Market\Resource\Doctrine;

/**
 * Interface PriceableAwareInterface
 * @package MSBios\Market\Resource\Doctrine
 */
interface PriceableAwareInterface
{
    /**
     * @return float
     */
    public function getPrice();

    /**
     * @param string $price
     * @return mixed
     */
    public function setPrice(string $price);
}
