<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Market\Doctrine\Controller;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\Persistence\ObjectRepository;
use Doctrine\ORM\QueryBuilder;
use MSBios\Market\Doctrine\Mvc\AbstractActionController;
use MSBios\Market\Resource\Doctrine\Entity\Brand;
use MSBios\Market\Resource\Doctrine\Entity\Category;
use MSBios\Market\Resource\Doctrine\Entity\Product;
use MSBios\Paginator\Doctrine\Adapter\QueryBuilderPaginator;
use Zend\Paginator\Paginator;
use Zend\View\Model\ModelInterface;

/**
 * Class CatalogController
 * @package MSBios\Market\Doctrine\Controller
 */
class CatalogController extends AbstractActionController
{
    /**
     * @param Category $category
     * @param array $categories
     */
    private static function prepareCategories(Category $category, array &$categories)
    {
        $categories[$category->getId()] = $category;

        /** @var Category $category */
        foreach ($category->getCategories() as $category) {
            self::prepareCategories($category, $categories);
        }
    }

    /**
     * @return \Zend\View\Model\ViewModel
     */
    public function indexAction()
    {
        /** @var ObjectManager $dem */
        $dem = $this->getObjectManager();

        /** @var ObjectRepository $categoryRepository */
        $categoryRepository = $dem->getRepository(Category::class);

        /** @var Category $category */
        $category = $categoryRepository->findOneBy([
            'id' => $this->params()->fromRoute('id'),
            'rowStatus' => true
        ]);

        if (!$category) {
            return $this->notFoundAction();
        }

        $this->getEvent()->getRouter()->setDefaultParams([
            'id' => $category->getId(),
            'slug' => $category->getSlug()
        ]);

        /** @var array $brands */
        $brands = $dem
            ->getRepository(Brand::class)
            ->findByCategory($category);

        /** @var array $categories */
        $categories = [];
        self::prepareCategories($category, $categories);

        /**
         * @param QueryBuilder $qb
         * @return QueryBuilderPaginator
         */
        $fetchBy = function (QueryBuilder $qb) use ($categories) {

            $qb
                ->join('o.categories', 'c', 'WITH')
                ->where($qb->expr()->in('c.id', ':categories'))
                ->andWhere($qb->expr()->eq('o.rowStatus', ':rowStatus'))
                ->setParameter('categories', $categories)
                ->setParameter('rowStatus', true);

            return new QueryBuilderPaginator($qb);
        };

        /** @var Paginator $products */
        $products = $dem
            ->getRepository(Product::class)
            ->fetchAll($fetchBy);

        /** @var ModelInterface $viewModel */
        $viewModel = parent::indexAction();
        $viewModel->setVariables([
            'category' => $category,
            'brands' => $brands,
            'products' => $products
        ]);

        return $viewModel;
    }

    /**
     * @return ModelInterface|\Zend\View\Model\ViewModel
     */
    public function brandAction()
    {
        /** @var ObjectManager $dem */
        $dem = $this->getObjectManager();

        /** @var ObjectRepository $brandRepository */
        $brandRepository = $dem->getRepository(Brand::class);

        /** @var Brand $brand */
        $brand = $brandRepository->findOneBy([
            'id' => $this->params()->fromRoute('brandid'),
            'rowStatus' => true
        ]);

        /** @var ObjectRepository $categoryRepository */
        $categoryRepository = $dem->getRepository(Category::class);

        /** @var Category $category */
        $category = $categoryRepository->findOneBy([
            'id' => $this->params()->fromRoute('id'),
            'rowStatus' => true
        ]);

        if (!$brand || !$category) {
            return $this->notFoundAction();
        }

        $this->getEvent()->getRouter()->setDefaultParams([
            'id' => $category->getId(),
            'slug' => $category->getSlug()
        ]);

        /** @var array $brands */
        $brands = $dem
            ->getRepository(Brand::class)
            ->findAll();

        /**
         * @param QueryBuilder $qb
         * @return QueryBuilderPaginator
         */
        $fetchBy = function (QueryBuilder $qb) use ($brand) {

            $qb->where($qb->expr()->eq('o.brand', ':brand'))
                ->setParameter('brand', $brand);

            return new QueryBuilderPaginator($qb);
        };

        /** @var Paginator $products */
        $products = $dem
            ->getRepository(Product::class)
            ->fetchAll($fetchBy);

        /** @var ModelInterface $viewModel */
        $viewModel = parent::indexAction();
        $viewModel->setVariables([
            'brand' => $brand,
            'category' => $category,
            'brands' => $brands,
            'products' => $products
        ]);

        return $viewModel;
    }
}
