<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Market\Doctrine\Controller;

use Doctrine\Common\Persistence\ObjectManager;
use MSBios\Market\Doctrine\Form\OrderForm;
use MSBios\Market\Doctrine\Hydrator\OrderHydrator;
use MSBios\Market\Doctrine\MarketManagerInterface;
use MSBios\Market\Doctrine\Mvc\Controller\AbstractActionController;
use MSBios\Market\Resource\Doctrine\Entity\Order;
use MSBios\Market\Resource\Doctrine\Entity\Variant;
use MSBios\Resource\Doctrine\EntityInterface;
use Zend\Form\FormElementManager\FormElementManagerV3Polyfill;
use Zend\View\Model\ViewModel;

/**
 * Class CartController
 * @package MSBios\Market\Doctrine\Controller
 */
class CartController extends AbstractActionController
{
    /** @var FormElementManagerV3Polyfill */
    protected $formElementManager;

    /** @var MarketManagerInterface */
    protected $marketManager;

    /**
     * CartController constructor.
     *
     * @param ObjectManager $objectManager
     * @param FormElementManagerV3Polyfill $formElementManagerV3Polyfill
     * @param MarketManagerInterface $marketManager
     */
    public function __construct(
        ObjectManager $objectManager,
        FormElementManagerV3Polyfill $formElementManagerV3Polyfill,
        MarketManagerInterface $marketManager
    )
    {
        $this->setObjectManager($objectManager);
        $this->formElementManager = $formElementManagerV3Polyfill;
        $this->marketManager = $marketManager;
    }

    /**
     * @return ViewModel
     */
    public function indexAction()
    {
        /** @var Order $order */
        $order = $this->marketManager->getOrder();

        /** @var OrderForm $form */
        $form = $this->formElementManager->get(OrderForm::class)
            ->setAttribute('action', $this->url()->fromRoute($this->getEvent()->getRouteMatch()->getMatchedRouteName()))
            ->setData((new OrderHydrator($this->getObjectManager()))->extract($order));

        if ($this->getRequest()->isPost()) {

            if ($form->setData($this->params()->fromPost())->isValid()) {

                /** @var EntityInterface|Order $entity */
                $entity = $form->getData();

                /** @var ObjectManager $dem */
                $dem = $this->getObjectManager();
                $dem->persist($entity);
                $dem->flush();

                $this
                    ->flashMessenger()
                    ->addSuccessMessage('Thank. Your order has been successfully accepted.');

            } else {
                r($form->getMessages());
                die();
            }

            return $this
                ->redirect()
                ->toRoute($this->getEvent()->getRouteMatch()->getMatchedRouteName());
        }


        return new ViewModel([
            'form' => $form,
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
