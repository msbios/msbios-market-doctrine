<?php
/**
 * @access protected
 * @author Judzhin Miles <judzhin[at]gns-it.com>
 */
namespace MSBios\Market\Resource\Doctrine;

use Doctrine\ORM\Mapping as ORM;

/**
 * Trait AmountableAwareTrait
 * @package MSBios\Market\Resource\Doctrine
 */
trait AmountableAwareTrait
{
    /**
     * @var integer
     *
     * @ORM\Column(name="amount")
     */
    private $amount = 0;

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     * @return $this
     */
    public function setAmount(int $amount)
    {
        $this->amount = $amount;
        return $this;
    }
}
