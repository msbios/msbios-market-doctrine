<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Market\Doctrine;

use MSBios\Market\Resource\Doctrine\Entity\Product;

/**
 * Class CartService
 * @package MSBios\Market\Doctrine
 */
class CartService implements CartServiceInterface
{
    /** @var CartStorageInterface */
    protected $storage;

    /**
     * CartService constructor.
     * @param CartStorageInterface|null $storage
     */
    public function __construct(CartStorageInterface $storage = null)
    {
        if (!is_null($storage)) {
            $this->setStorage($storage);
        }
    }

    /**
     * @return CartStorageInterface
     */
    public function getStorage(): CartStorageInterface
    {
        return $this->storage;
    }

    /**
     * @param CartStorageInterface $storage
     * @return $this
     */
    public function setStorage(CartStorageInterface $storage)
    {
        $this->storage = $storage;
        return $this;
    }

    /**
     * @param VariantInterface $variant
     * @return $this
     */
    public function add(VariantInterface $variant)
    {
        r($variant); die();
        return $this;
    }
}