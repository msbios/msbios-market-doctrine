<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Market\Doctrine\Controller;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\QueryBuilder;
use MSBios\Market\Doctrine\Mvc\AbstractActionController;
use MSBios\Market\Resource\Doctrine\Entity\Brand;
use MSBios\Market\Resource\Doctrine\Entity\Product;
use MSBios\Paginator\Doctrine\Adapter\QueryBuilderPaginator;
use Zend\Paginator\Paginator;
use Zend\View\Model\ModelInterface;

/**
 * Class BrandsController
 * @package MSBios\Market\Doctrine\Controller
 */
class BrandsController extends AbstractActionController
{
    /**
     * @return \Zend\View\Model\ViewModel
     */
    public function indexAction()
    {
        /** @var ObjectManager $dem */
        $dem = $this->getObjectManager();

        /** @var array $brands */
        $brand = $dem
            ->getRepository(Brand::class)
            ->findOneBy(['id' => $this->params()->fromRoute('id'), 'rowStatus' => true]);

        if (!$brand) {
            return $this->notFoundAction();
        }

        /**
         * @param QueryBuilder $qb
         * @return QueryBuilderPaginator
         */
        $fetchBy = function (QueryBuilder $qb) use ($brand) {
            $qb->where($qb->expr()->eq('o.brand', ':brand'))
                ->andWhere($qb->expr()->eq('o.rowStatus', true))
                ->setParameter('brand', $brand);

            return new QueryBuilderPaginator($qb);
        };

        /** @var Paginator $products */
        $products = $dem->getRepository(Product::class)
            ->fetchAll($fetchBy);

        $products
            ->setPageRange(ProductsController::PAGE_RANGE)
            ->setItemCountPerPage(ProductsController::ITEM_COUNT_PER_PAGE)
            ->setCurrentPageNumber($this->params()->fromQuery('page', 1));

        /** @var ModelInterface $viewModel */
        $viewModel = parent::indexAction();
        $viewModel->setVariables([
            'brand' => $brand,
            'products' => $products,
        ]);

        return $viewModel;
    }
}