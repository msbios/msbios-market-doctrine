<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Market\Resource\Doctrine\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use MSBios\Guard\Resource\Doctrine\BlameableAwareInterface;
use MSBios\Guard\Resource\Doctrine\BlameableAwareTrait;
use MSBios\Market\Resource\Doctrine\Entity;
use MSBios\Resource\Doctrine\ContentableAwareTrait;
use MSBios\Resource\Doctrine\MetableAwareInterface;
use MSBios\Resource\Doctrine\MetableAwareTrait;
use MSBios\Resource\Doctrine\NameableAwareInterface;
use MSBios\Resource\Doctrine\NameableAwareTrait;
use MSBios\Resource\Doctrine\RowStatusableAwareInterface;
use MSBios\Resource\Doctrine\RowStatusableAwareTrait;
use MSBios\Resource\Doctrine\TimestampableAwareInterface;
use MSBios\Resource\Doctrine\TimestampableAwareTrait;

/**
 * Class Product
 * @package MSBios\Market\Resource\Doctrine\Entity
 *
 * @ORM\Entity(repositoryClass="MSBios\Market\Resource\Doctrine\Repository\ProductRepository")
 * @ORM\Table(name="mrk_t_products")
 */
class Product extends Entity implements
    NameableAwareInterface,
    MetableAwareInterface,
    TimestampableAwareInterface,
    BlameableAwareInterface,
    RowStatusableAwareInterface
{
    use NameableAwareTrait;
    use ContentableAwareTrait;
    use MetableAwareTrait;
    use TimestampableAwareTrait;
    use BlameableAwareTrait;
    use RowStatusableAwareTrait;

    /**
     * @var Brand
     *
     * @ORM\ManyToOne(targetEntity="Brand")
     * @ORM\JoinColumn(name="brandid", referencedColumnName="id")
     */
    private $brand;

    /**
     * @var string
     *
     * @Gedmo\Slug(fields={"name"})
     * @ORM\Column(name="slug", length=128, unique=true)
     */
    private $slug;

    /**
     * @var string
     *
     * @ORM\Column(name="annotation", type="text", nullable=false)
     */
    private $annotation;

    /**
     * @var bool
     *
     * @ORM\Column(name="visible", type="boolean", options={"default" : 1})
     */
    private $visible = true;

    /**
     * @var bool
     *
     * @ORM\Column(name="recommended", type="boolean", options={"default" : 0})
     */
    private $recommended = false;

    /**
     * @var array
     *
     * @ORM\ManyToMany(targetEntity="Category")
     * @ORM\OrderBy({"name"="ASC"})
     * @ORM\JoinTable(
     *     name="mrk_t_product_categories",
     *     joinColumns={@ORM\JoinColumn(name="productid", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="categoryid", referencedColumnName="id")}
     * )
     **/
    private $categories;

    /**
     * @var array
     *
     * @ORM\OneToMany(
     *   targetEntity="Variant",
     *   mappedBy="product",
     *   cascade={"persist", "remove"}
     * )
     */
    private $variants;

    /**
     * @var array
     *
     * @ORM\OneToMany(
     *   targetEntity="ProductRelation",
     *   mappedBy="product",
     *   cascade={"persist", "remove"}
     * )
     */
    private $relations;

    /**
     * @var array
     *
     * @ORM\OneToMany(
     *   targetEntity="ProductOption",
     *   mappedBy="product",
     *   cascade={"persist", "remove"}
     * )
     */
    private $options;

    /**
     * Product constructor.
     */
    public function __construct()
    {
        $this->categories = new ArrayCollection;
        $this->variants = new ArrayCollection;
        $this->relations = new ArrayCollection;
        $this->options = new ArrayCollection;
    }

    /**
     * @return Brand
     */
    public function getBrand(): Brand
    {
        return $this->brand;
    }

    /**
     * @param Brand $brand
     * @return $this
     */
    public function setBrand(Brand $brand)
    {
        $this->brand = $brand;
        return $this;
    }

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     * @return $this
     */
    public function setSlug(string $slug)
    {
        $this->slug = $slug;
        return $this;
    }

    /**
     * @return string
     */
    public function getAnnotation(): string
    {
        return $this->annotation;
    }

    /**
     * @param string $annotation
     * @return $this
     */
    public function setAnnotation(string $annotation)
    {
        $this->annotation = $annotation;
        return $this;
    }

    /**
     * @return bool
     */
    public function isVisible(): bool
    {
        return $this->visible;
    }

    /**
     * @param bool $visible
     * @return $this
     */
    public function setVisible(bool $visible)
    {
        $this->visible = $visible;
        return $this;
    }

    /**
     * @return bool
     */
    public function isRecommended(): bool
    {
        return $this->recommended;
    }

    /**
     * @param bool $recommended
     * @return $this
     */
    public function setRecommended(bool $recommended)
    {
        $this->recommended = $recommended;
        return $this;
    }

    /**
     * @return array
     */
    public function getCategories(): array
    {
        return $this->categories;
    }

    /**
     * @param array $categories
     * @return $this
     */
    public function setCategories(array $categories)
    {
        $this->categories = $categories;
        return $this;
    }

    /**
     * @return array|ArrayCollection
     */
    public function getVariants()
    {
        return $this->variants;
    }

    /**
     * @param array $variants
     * @return $this
     */
    public function setVariants(array $variants)
    {
        $this->variants = $variants;
        return $this;
    }

    /**
     * @return array|ArrayCollection
     */
    public function getRelations()
    {
        return $this->relations;
    }

    /**
     * @param array $relations
     * @return $this
     */
    public function setRelations(array $relations)
    {
        $this->relations = $relations;
        return $this;
    }

    /**
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param array $options
     * @return $this
     */
    public function setOptions(array $options)
    {
        $this->options = $options;
        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getName();
    }
}
