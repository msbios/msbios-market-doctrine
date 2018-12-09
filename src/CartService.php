<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Market\Doctrine;

use MSBios\Market\Doctrine\Storage\CartStorage;
use MSBios\Market\Doctrine\Storage\CartStorageInterface;

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
        if (! is_null($storage)) {
            $this->setStorage($storage);
        }
    }

    /**
     * @return CartStorageInterface
     */
    public function getStorage(): CartStorageInterface
    {
        if (is_null($this->storage)) {
            $this->setStorage(new CartStorage(self::class));
        }
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
     * @param PurchaseInterface $purchase
     * @return $this
     */
    public function add(PurchaseInterface $purchase)
    {
        $this->getStorage()->write($purchase);
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPurchases()
    {
        return $this->getStorage()->read();
    }
}
