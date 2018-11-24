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
use MSBios\Resource\Doctrine\MetableAwareInterface;
use MSBios\Resource\Doctrine\MetableAwareTrait;
use MSBios\Resource\Doctrine\NameableAwareInterface;
use MSBios\Resource\Doctrine\NameableAwareTrait;
use MSBios\Resource\Doctrine\RowStatusableAwareInterface;
use MSBios\Resource\Doctrine\RowStatusableAwareTrait;
use MSBios\Resource\Doctrine\TimestampableAwareInterface;
use MSBios\Resource\Doctrine\TimestampableAwareTrait;

/**
 * Class Category
 * @package MSBios\Market\Resource\Doctrine\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="mrk_t_categories")
 */
class Category extends Entity implements
    NameableAwareInterface,
    MetableAwareInterface,
    TimestampableAwareInterface,
    BlameableAwareInterface,
    RowStatusableAwareInterface
{
    use NameableAwareTrait;
    use MetableAwareTrait;
    use TimestampableAwareTrait;
    use BlameableAwareTrait;
    use RowStatusableAwareTrait;

    /**
     * @var string
     * @Gedmo\Slug(fields={"name"})
     * @ORM\Column(name="slug", length=128, unique=true)
     */
    private $slug;

    /**
     * @var Category
     *
     * @ORM\ManyToOne(targetEntity="Category")
     * @ORM\JoinColumn(name="parentid", referencedColumnName="id")
     */
    private $category;

    /**
     * @var array
     *
     * @ORM\OneToMany(
     *   targetEntity="Category",
     *   mappedBy="category",
     *   cascade={"persist", "remove"}
     * )
     */
    private $categories;

    /**
     * Category constructor.
     */
    public function __construct()
    {
        $this->categories = new ArrayCollection;
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
     * @return Category
     */
    public function getCategory(): Category
    {
        return $this->category;
    }

    /**
     * @param Category $category
     * @return $this
     */
    public function setCategory(Category $category)
    {
        $this->category = $category;
        return $this;
    }

    /**
     * @return array|ArrayCollection
     */
    public function getCategories()
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
}
