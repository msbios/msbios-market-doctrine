<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Market\Resource\Doctrine\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use MSBios\Market\Doctrine\OrderInterface;
use MSBios\Market\Resource\Doctrine\AmountableAwareTrait;
use MSBios\Market\Resource\Doctrine\Entity;
use MSBios\Market\Resource\Doctrine\PriceableAwareTrait;
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
    TimestampableAwareInterface,
    RowStatusableAwareInterface
{
    use PriceableAwareTrait;
    use AmountableAwareTrait;
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

    /**
     * @param Purchase $purchase
     * @return $this
     */
    public function addPurchase(Purchase $purchase)
    {
        $purchase->setOrder($this);
        $this->purchases->add($purchase);
        return $this;
    }

    /**
     * @param ArrayCollection $purchases
     * @return $this
     */
    public function addPurchases(ArrayCollection $purchases)
    {
        /** @var Purchase $purchase */
        foreach ($purchases as $purchase) {
            $this->addPurchase($purchase);
        }

        return $this;
    }

    /**
     * @param Purchase $purchase
     * @return $this
     */
    public function removePurchase(Purchase $purchase)
    {
        $purchase->setOrder(null);
        $this->purchases->removeElement($purchase);
        return $this;
    }

    /**
     * @param ArrayCollection $purchases
     * @return $this
     */
    public function removePurchases(ArrayCollection $purchases)
    {
        foreach ($purchases as $purchase) {
            $this->removePurchase($purchase);
        }

        return $this;
    }


}
