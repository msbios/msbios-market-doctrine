<?php
/**
 * @access protected
 * @author Judzhin Miles <judzhin[at]gns-it.com>
 */
namespace MSBios\Market\Resource\Doctrine;

use Doctrine\ORM\Mapping as ORM;

/**
 * Trait PriceableAwareTrait
 * @package MSBios\Market\Resource\Doctrine
 */
trait PriceableAwareTrait
{
    /**
     * @var float
     *
     * @ORM\Column(type="decimal", precision=14, scale=2)
     */
    private $price;

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param string $price
     * @return $this
     */
    public function setPrice(string $price)
    {
        $this->price = $price;
        return $this;
    }
}
