<?php
/**
 * @access protected
 * @author Judzhin Miles <judzhin[at]gns-it.com>
 */
namespace MSBios\Market\Resource\Doctrine;

use Doctrine\ORM\Mapping as ORM;

/**
 * Interface AmountableAwareInterface
 * @package MSBios\Market\Resource\Doctrine
 */
interface AmountableAwareInterface
{
    /**
     * @return int
     */
    public function getAmount(): int;

    /**
     * @param int $amount
     * @return $this
     */
    public function setAmount(int $amount);
}
