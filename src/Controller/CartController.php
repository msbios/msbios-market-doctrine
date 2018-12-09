<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Market\Doctrine\Controller;

use Doctrine\Common\Persistence\ObjectManager;
use MSBios\Market\Doctrine\CartServiceInterface;
use MSBios\Market\Doctrine\MarketManager;
use MSBios\Market\Doctrine\MarketManagerInterface;
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
    /** @var MarketManagerInterface */
    protected $marketManager;

    /**
     * CartController constructor.
     * @param ObjectManager $objectManager
     * @param MarketManagerInterface $marketManager
     */
    public function __construct(ObjectManager $objectManager, MarketManagerInterface $marketManager)
    {
        $this->setObjectManager($objectManager);
        $this->marketManager = $marketManager;
    }

    /**
     * @return ViewModel
     */
    public function indexAction()
    {
        if ($this->getRequest()->isPost()) {

            // /** @var ObjectManager $dem */
            // $dem = $this->getObjectManager();
            //
            // /** @var array $data */
            // $data = $this->params()->fromPost();
            //
            // /** @var Variant $variant */
            // $variant = $dem->find(Variant::class, $data['variantid']);
            //
            // $this
            //     ->marketManager
            //     ->addVariant($variant);
            //
            // $this
            //     ->flashMessenger()
            //     ->addSuccessMessage('Product was successfully added to cart.');

            return $this
                ->redirect()
                ->toRoute($this->getEvent()->getRouteMatch()->getMatchedRouteName());
        }

        /** @var OrderInterface $order */
        $order = $this->marketManager->getOrder();

        return new ViewModel([
            'order' => $order
        ]);
    }

    /**
     * @return ViewModel
     */
    public function addAction()
    {
        if ($this->getRequest()->isPost()) {

            /** @var ObjectManager $dem */
            $dem = $this->getObjectManager();

            /** @var array $data */
            $data = $this->params()->fromPost();

            /** @var Variant $variant */
            $variant = $dem->find(Variant::class, $data['variantid']);

            $this->marketManager
                ->addVariant($variant);

            $this
                ->flashMessenger()
                ->addSuccessMessage('Product was successfully added to cart.');

            return $this
                ->redirect()
                ->toRoute('home/cart');
        }

        return $this
            ->redirect()
            ->toRoute('home');
    }

}
