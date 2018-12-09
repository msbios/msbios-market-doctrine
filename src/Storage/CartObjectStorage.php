<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Market\Doctrine\Storage;

use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Persistence\ObjectManagerAwareInterface;
use DoctrineModule\Persistence\ProvidesObjectManager;
use MSBios\Market\Doctrine\PurchaseInterface;
use MSBios\Market\Resource\Doctrine\Entity\Purchase;
use MSBios\Market\Resource\Doctrine\Entity\Variant;
use MSBios\Resource\Doctrine\EntityInterface;
use Zend\Session\SessionManager;
use Zend\Stdlib\ArrayUtils;

/**
 * Class CartObjectStorage
 * @package MSBios\Market\Doctrine\Storage
 */
class CartObjectStorage extends CartStorage implements ObjectManagerAwareInterface
{
    use ProvidesObjectManager;

    /**
     * @inheritdoc
     *
     * @param ObjectManager $objectManager
     * @param null $namespace
     * @param null $member
     * @param null|SessionManager $manager
     */
    public function __construct(ObjectManager $objectManager, $namespace = null, $member = null, SessionManager $manager = null)
    {
        $this->setObjectManager($objectManager);
        parent::__construct($namespace, $member, $manager);
    }

    /**
     * @inheritdoc
     *
     * @param $contents
     */
    public function write($contents)
    {
        if ($contents instanceof PurchaseInterface) {
            /** @var EntityInterface $variant */
            $variant = $contents->getVariant();

            /** @var array $contents */
            $contents = ArrayUtils::merge(
                [$variant->getId() => $contents->getAmount()], parent::read()
            );
        }

        return parent::write($contents);
    }

    public function read()
    {
        /** @var array $contents */
        $contents = parent::read();

        /** @var ObjectManager $dem */
        $dem = $this->getObjectManager();

        /** @var PurchaseInterface[] $purchases */
        $purchases = [];

        /**
         * @var int $id
         * @var int $amount
         */
        foreach ($contents as $id => $amount) {
            /** @var Variant $variant */
            if ($variant = $dem->find(Variant::class, $id)) {

                /** @var PurchaseInterface $purchase */
                $purchase = (new Purchase)
                    ->setVariant($variant)
                    ->setAmount($amount)
                    ->setPrice($variant->getPrice() * $amount);

                $purchases[] = $purchase;
            }
        }

        return $purchases;
    }
}