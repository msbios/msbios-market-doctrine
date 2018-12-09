<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Market\Doctrine;

use MSBios\Market\Resource\Doctrine\Entity\Order;
use MSBios\Market\Resource\Doctrine\Entity\Purchase;

/**
 * Class MarketManager
 * @package MSBios\Market\Doctrine
 */
class MarketManager implements MarketManagerInterface
{
    /** @var CartService */
    protected $cardService;

    /**
     * MarketManager constructor.
     *
     * @param CartService $cardService
     */
    public function __construct(CartService $cardService)
    {
        $this->cardService = $cardService;
    }

    /**
     * @param PurchaseInterface $purchase
     * @return $this
     */
    public function addPhurchase(PurchaseInterface $purchase)
    {
        $this->cardService
            ->add($purchase);
        return $this;
    }

    /**
     * @param VariantInterface $variant
     * @param int $amount
     * @return MarketManager
     */
    public function addVariant(VariantInterface $variant, $amount = 1)
    {
        /** @var PurchaseInterface[] $purchases */
        $purchases = $this->cardService->getPurchases();

        /** @var PurchaseInterface $purchase */
        foreach ($purchases as $purchase) {
            if ($purchase->getVariant()->getId() == $variant->getId()) {
                $purchase->setAmount($purchase->getAmount() + $amount);
                return $this->addPhurchase($purchase);
            }
        }

        /** @var Purchase $purchase */
        $purchase = (new Purchase)
            ->setVariant($variant)
            ->setAmount($amount);

        return $this->addPhurchase($purchase);
    }

    /**
     * @return OrderInterface
     */
    public function getOrder()
    {
        /** @var PurchaseInterface[] $purchases */
        $purchases = $this->cardService->getPurchases();

        /** @var OrderInterface $order */
        $order = (new Order)
            ->setPurchases($purchases);

        /** @var PurchaseInterface $purchase */
        foreach ($order->getPurchases() as $purchase) {
            $order
                ->setPrice($order->getPrice() + $purchase->getPrice())
                ->setAmount($order->getAmount() + $purchase->getAmount());
            $purchase
                ->setOrder($order);
        }

        return $order;
    }
}
