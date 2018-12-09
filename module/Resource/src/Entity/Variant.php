<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Market\Resource\Doctrine\Entity;

use Doctrine\ORM\Mapping as ORM;
use MSBios\Guard\Resource\Doctrine\BlameableAwareInterface;
use MSBios\Guard\Resource\Doctrine\BlameableAwareTrait;
use MSBios\Market\Doctrine\VariantInterface;
use MSBios\Market\Resource\Doctrine\Entity;
use MSBios\Market\Resource\Doctrine\PriceableAwareInterface;
use MSBios\Market\Resource\Doctrine\PriceableAwareTrait;
use MSBios\Resource\Doctrine\NameableAwareInterface;
use MSBios\Resource\Doctrine\NameableAwareTrait;
use MSBios\Resource\Doctrine\RowStatusableAwareInterface;
use MSBios\Resource\Doctrine\RowStatusableAwareTrait;
use MSBios\Resource\Doctrine\TimestampableAwareInterface;
use MSBios\Resource\Doctrine\TimestampableAwareTrait;

/**
 * Class Variant
 * @package MSBios\Market\Resource\Doctrine\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="mrk_t_variants")
 */
class Variant extends Entity implements
    VariantInterface,
    NameableAwareInterface,
    PriceableAwareInterface,
    TimestampableAwareInterface,
    BlameableAwareInterface,
    RowStatusableAwareInterface
{
    use NameableAwareTrait;
    use PriceableAwareTrait;
    use TimestampableAwareTrait;
    use BlameableAwareTrait;
    use RowStatusableAwareTrait;

    /**
     * @var Product
     *
     * @ORM\ManyToOne(targetEntity="Product")
     * @ORM\JoinColumn(name="productid", referencedColumnName="id")
     */
    private $product;

    /**
     * @var string
     *
     * @ORM\Column(name="code", length=128, nullable=false)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(type="decimal", precision=14, scale=2, nullable=false)
     */
    private $compare = 0.00;

    /**
     * @return Product
     */
    public function getProduct(): Product
    {
        return $this->product;
    }

    /**
     * @param Product $product
     */
    public function setProduct(Product $product): void
    {
        $this->product = $product;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    /**
     * @return bool
     */
    public function hasCompare()
    {
        return 0.00 != $this->getCompare();
    }

    /**
     * @return string
     */
    public function getCompare(): string
    {
        return $this->compare;
    }

    /**
     * @param string $compare
     */
    public function setCompare(string $compare): void
    {
        $this->compare = $compare;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->getName()
            . ' ' . $this->getPrice();
    }
}
