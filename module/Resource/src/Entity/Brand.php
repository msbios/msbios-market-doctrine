<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Market\Resource\Doctrine\Entity;

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
 * Class Brand
 * @package MSBios\Market\Resource\Doctrine\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="mrk_t_brands")
 */
class Brand extends Entity implements
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
     * @ORM\OneToMany(
     *   targetEntity="Product",
     *   mappedBy="brand",
     *   cascade={"persist", "remove"}
     * )
     */
    private $products;

}