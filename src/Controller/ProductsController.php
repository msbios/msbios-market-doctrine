<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Market\Doctrine\Controller;

use MSBios\Market\Doctrine\Mvc\AbstractActionController;
use MSBios\Market\Resource\Doctrine\Entity\Product;
use Zend\Paginator\Paginator;
use Zend\View\Model\ViewModel;

/**
 * Class ProductsController
 * @package MSBios\Market\Doctrine\Controller
 */
class ProductsController extends AbstractActionController
{
    /** @const PAGE_RANGE  */
    const PAGE_RANGE = 4;

    /** @const ITEM_COUNT_PER_PAGE  */
    const ITEM_COUNT_PER_PAGE = 12;

    /**
     * @return \Doctrine\Common\Persistence\ObjectRepository
     */
    protected function getRepository()
    {
        return $this
            ->getObjectManager()
            ->getRepository(Product::class);
    }

    /**
     * @return ViewModel
     */
    public function indexAction()
    {
        /** @var Paginator $products */
        $products = $this->getRepository()
            ->fetchAll(['o.rowStatus' => true]);

        $products
            ->setPageRange(self::PAGE_RANGE)
            ->setItemCountPerPage(self::ITEM_COUNT_PER_PAGE)
            ->setCurrentPageNumber($this->params()->fromQuery('page', 1));

        return new ViewModel(['products' => $products]);
    }

    /**
     * @return ViewModel
     */
    public function viewAction()
    {
        /** @var Product $product */
        $product = $this->getRepository()
            ->findOneBy(['id' => $this->params()->fromRoute('id'), 'rowStatus' => true]);

        if (!$product) {
            return $this->notFoundAction();
        }

        return new ViewModel([
            'product' => $product
        ]);
    }
}