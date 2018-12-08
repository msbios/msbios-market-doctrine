<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Market\Doctrine\Controller;

use MSBios\Market\Doctrine\Mvc\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 * Class CartController
 * @package MSBios\Market\Doctrine\Controller
 */
class CartController extends AbstractActionController
{
    /**
     * @return ViewModel
     */
    public function indexAction()
    {
        if ($this->getRequest()->isPost()) {
            $this
                ->flashMessenger()
                ->addSuccessMessage('Product was successfully added to cart.');

            return $this
                ->redirect()
                ->toRoute($this->getEvent()->getRouteMatch()->getMatchedRouteName());
        }

        return new ViewModel;
    }
}
