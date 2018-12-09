<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Market\Doctrine\Controller;

use Doctrine\ORM\QueryBuilder;
use MSBios\Market\Doctrine\Mvc\Controller\AbstractActionController;
use MSBios\Market\Resource\Doctrine\Entity\Product;
use MSBios\Paginator\Doctrine\Adapter\QueryBuilderPaginator;
use Zend\Paginator\Paginator;
use Zend\View\Model\ViewModel;

/**
 * Class ProductsController
 * @package MSBios\Market\Doctrine\Controller
 */
class ProductsController extends AbstractActionController
{
    /** @const PAGE_RANGE */
    const PAGE_RANGE = 4;

    /** @const ITEM_COUNT_PER_PAGE */
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
        /**
         * @param QueryBuilder $qb
         * @return QueryBuilderPaginator
         */
        $findBy = function (QueryBuilder $qb) {
            $qb
                ->where($qb->expr()->eq('p.rowStatus', ':rowStatus'))
                ->setParameter('rowStatus', true);

            /** @var array $data */
            $data = $this->params()->fromQuery();

            if (isset($data['name']) && !empty($data['name'])) {
                $qb->andWhere($qb->expr()->like('p.name', ':name'))
                ->setParameter('name', "%{$data['name']}%");
            }

            return new QueryBuilderPaginator($qb);
        };

        /** @var Paginator $products */
        $products = $this->getRepository()
            ->fetchAll($findBy);

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

        if (! $product) {
            return $this->notFoundAction();
        }

        return new ViewModel([
            'product' => $product
        ]);
    }
}
