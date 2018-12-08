<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Market\Resource\Doctrine\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use MSBios\Market\Doctrine\OrderInterface;
use MSBios\Market\Resource\Doctrine\Entity;
use MSBios\Resource\Doctrine\NameableAwareInterface;
use MSBios\Resource\Doctrine\NameableAwareTrait;
use MSBios\Resource\Doctrine\RowStatusableAwareInterface;
use MSBios\Resource\Doctrine\RowStatusableAwareTrait;
use MSBios\Resource\Doctrine\TimestampableAwareInterface;
use MSBios\Resource\Doctrine\TimestampableAwareTrait;

/**
 * Class Order
 * @package MSBios\Market\Resource\Doctrine\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="mrk_t_orders")
 */
class Order extends Entity implements
    OrderInterface,
    NameableAwareInterface,
    TimestampableAwareInterface,
    RowStatusableAwareInterface
{
    use NameableAwareTrait;
    use TimestampableAwareTrait;
    use RowStatusableAwareTrait;

    /**
     * @var array
     *
     * @ORM\OneToMany(
     *   targetEntity="Purchase",
     *   mappedBy="order",
     *   cascade={"persist", "remove"}
     * )
     */
    private $purchases;

    /**
     * Order constructor.
     */
    public function __construct()
    {
        $this->purchases = new ArrayCollection;
    }

    /**
     * @return array
     */
    public function getPurchases()
    {
        return $this->purchases;
    }

    /**
     * @param array $purchases
     */
    public function setPurchases(array $purchases)
    {
        $this->purchases = $purchases;
        return $this;
    }
}
