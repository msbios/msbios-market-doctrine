<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Market\Resource\Doctrine\Entity;

use Doctrine\ORM\Mapping as ORM;
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
    NameableAwareInterface,
    TimestampableAwareInterface,
    RowStatusableAwareInterface
{
    use NameableAwareTrait;
    use TimestampableAwareTrait;
    use RowStatusableAwareTrait;
}
