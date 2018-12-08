<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Market\Resource\Doctrine\Entity;

use Doctrine\ORM\Mapping as ORM;
use MSBios\Market\Doctrine\PurchaseInterface;
use MSBios\Market\Resource\Doctrine\Entity;
use MSBios\Market\Resource\Doctrine\PriceableAwareInterface;
use MSBios\Market\Resource\Doctrine\PriceableAwareTrait;
use MSBios\Resource\Doctrine\RowStatusableAwareInterface;
use MSBios\Resource\Doctrine\RowStatusableAwareTrait;
use MSBios\Resource\Doctrine\TimestampableAwareInterface;
use MSBios\Resource\Doctrine\TimestampableAwareTrait;

/**
 * Class Purchase
 * @package MSBios\Market\Resource\Doctrine\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="mrk_t_purchases")
 */
class Purchase extends Entity implements
    PurchaseInterface,
    PriceableAwareInterface,
    TimestampableAwareInterface,
    RowStatusableAwareInterface
{
    use PriceableAwareTrait;
    use TimestampableAwareTrait;
    use RowStatusableAwareTrait;

    /**
     * @var Order
     *
     * @ORM\ManyToOne(targetEntity="Order")
     * @ORM\JoinColumn(name="orderid", referencedColumnName="id")
     */
    private $order;

    /**
     * @var Variant
     *
     * @ORM\ManyToOne(targetEntity="Variant")
     * @ORM\JoinColumn(name="variantid", referencedColumnName="id")
     */
    private $variant;

    /**
     * @var integer
     *
     * @ORM\Column(name="amount")
     */
    private $amount = 0;

    /**
     * @return Order
     */
    public function getOrder(): Order
    {
        return $this->order;
    }

    /**
     * @param Order $order
     * @return $this
     */
    public function setOrder(Order $order)
    {
        $this->order = $order;
        return $this;
    }

    /**
     * @return Variant
     */
    public function getVariant(): Variant
    {
        return $this->variant;
    }

    /**
     * @param Variant $variant
     * @return $this
     */
    public function setVariant(Variant $variant)
    {
        $this->variant = $variant;
        return $this;
    }

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
