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
use MSBios\Resource\Doctrine\NameableAwareInterface;
use MSBios\Resource\Doctrine\NameableAwareTrait;
use MSBios\Resource\Doctrine\OrderKeyableAwareInterface;
use MSBios\Resource\Doctrine\OrderKeyableAwareTrait;
use MSBios\Resource\Doctrine\RowStatusableAwareInterface;
use MSBios\Resource\Doctrine\RowStatusableAwareTrait;
use MSBios\Resource\Doctrine\TimestampableAwareInterface;
use MSBios\Resource\Doctrine\TimestampableAwareTrait;

/**
 * Class Feature
 * @package MSBios\Market\Resource\Doctrine\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="mrk_t_features")
 */
class Feature extends Entity implements
    NameableAwareInterface,
    OrderKeyableAwareInterface,
    TimestampableAwareInterface,
    BlameableAwareInterface,
    RowStatusableAwareInterface
{
    use NameableAwareTrait;
    use OrderKeyableAwareTrait;
    use TimestampableAwareTrait;
    use BlameableAwareTrait;
    use RowStatusableAwareTrait;

    /**
     * @var boolean
     *
     * @ORM\Column(name="in_filter", type="boolean", options={"default" : 0})
     */
    private $inFilter = false;

    /**
     * @var array
     *
     * @ORM\ManyToMany(targetEntity="Category", mappedBy="features")
     */
    private $categories;

    /**
     * @return bool
     */
    public function isInFilter(): bool
    {
        return $this->inFilter;
    }

    /**
     * @param bool $inFilter
     * @return $this
     */
    public function setInFilter(bool $inFilter)
    {
        $this->inFilter = $inFilter;
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
}
