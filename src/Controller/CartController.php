<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Market\Doctrine\Controller;

use Doctrine\Common\Persistence\ObjectManager;
use MSBios\Market\Doctrine\CartServiceInterface;
use MSBios\Market\Doctrine\Mvc\Controller\AbstractActionController;
use MSBios\Market\Doctrine\OrderInterface;
use MSBios\Market\Resource\Doctrine\Entity\Purchase;
use MSBios\Market\Resource\Doctrine\Entity\Variant;
use Zend\View\Model\ViewModel;

/**
 * Class CartController
 * @package MSBios\Market\Doctrine\Controller
 */
class CartController extends AbstractActionController
{
    /** @var CartServiceInterface */
    protected $cartService;

    /**
     * CartController constructor.
     * @param ObjectManager $objectManager
     * @param CartServiceInterface $cartService
     */
    public function __construct(ObjectManager $objectManager, CartServiceInterface $cartService)
    {
        $this->setObjectManager($objectManager);
        $this->cartService = $cartService;
    }

    /**
     * @return ViewModel
     */
    public function indexAction()
    {
        if ($this->getRequest()->isPost()) {

            /** @var ObjectManager $dem */
            $dem = $this->getObjectManager();

            /** @var array $data */
            $data = $this->params()->fromPost();


            /** @var Variant $variant */
            $variant = $dem->find(Variant::class, $data['variantid']);

            /** @var Purchase $purchase */
            $purchase = (new Purchase)
                ->setVariant($variant)
                ->setAmount(1);

            $this->cartService
                ->add($purchase);

            $this
                ->flashMessenger()
                ->addSuccessMessage('Product was successfully added to cart.');

            return $this
                ->redirect()
                ->toRoute($this->getEvent()->getRouteMatch()->getMatchedRouteName());
        }

        /** @var OrderInterface $order */
        $order = $this->cartService->getOrder();

        return new ViewModel([
            'order' => $order
        ]);
    }
}
