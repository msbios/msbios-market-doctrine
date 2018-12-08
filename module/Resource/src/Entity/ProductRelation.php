<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Market\Resource\Doctrine\Entity;

use Doctrine\ORM\Mapping as ORM;
use MSBios\Guard\Resource\Doctrine\BlameableAwareInterface;
use MSBios\Guard\Resource\Doctrine\BlameableAwareTrait;
use MSBios\Market\Resource\Doctrine\Entity;
use MSBios\Resource\Doctrine\OrderKeyableAwareInterface;
use MSBios\Resource\Doctrine\OrderKeyableAwareTrait;
use MSBios\Resource\Doctrine\RowStatusableAwareInterface;
use MSBios\Resource\Doctrine\RowStatusableAwareTrait;
use MSBios\Resource\Doctrine\TimestampableAwareInterface;
use MSBios\Resource\Doctrine\TimestampableAwareTrait;

/**
 * Class ProductRelation
 * @package MSBios\Market\Resource\Doctrine\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="mrk_t_product_relations")
 */
class ProductRelation extends Entity implements
    OrderKeyableAwareInterface,
    TimestampableAwareInterface,
    BlameableAwareInterface,
    RowStatusableAwareInterface
{
    use OrderKeyableAwareTrait;
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
     * @var Product
     *
     * @ORM\ManyToOne(targetEntity="Product")
     * @ORM\JoinColumn(name="relationid", referencedColumnName="id")
     */
    private $relation;

    /**
     * @return Product
     */
    public function getProduct(): Product
    {
        return $this->product;
    }

    /**
     * @param Product $product
     * @return $this
     */
    public function setProduct(Product $product)
    {
        $this->product = $product;
        return $this;
    }

    /**
     * @return Product
     */
    public function getRelation(): Product
    {
        return $this->relation;
    }

    /**
     * @param Product $relation
     * @return $this
     */
    public function setRelation(Product $relation)
    {
        $this->relation = $relation;
        return $this;
    }
}
