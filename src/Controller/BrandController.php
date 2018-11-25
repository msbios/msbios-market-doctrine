<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Market\Doctrine\Controller;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\Persistence\ObjectRepository;
use DoctrineModule\Persistence\ObjectManagerAwareInterface;
use MSBios\Application\Controller\IndexController as DefaultIndexController;
use MSBios\Doctrine\ObjectManagerAwareTrait;
use MSBios\Market\Resource\Doctrine\Entity\Brand;
use MSBios\Market\Resource\Doctrine\Entity\Category;
use Zend\View\Model\ModelInterface;

/**
 * Class BrandController
 * @package MSBios\Market\Doctrine\Controller
 */
class BrandController extends DefaultIndexController implements ObjectManagerAwareInterface
{
    use ObjectManagerAwareTrait;

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

        /** @var array $categories */
        $categories = $categoryRepository->findBy([
            'category' => null
        ]);

        /** @var array $brands */
        $brands = $dem
            ->getRepository(Brand::class)
            ->findAll();

        /** @var ModelInterface $viewModel */
        $viewModel = parent::indexAction();
        $viewModel->setVariables([
            'category' => $category,
            'brands' => $brands,
            'categories' => $categories
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

        /** @var array $categories */
        $categories = $categoryRepository->findBy([
            'category' => null
        ]);

        /** @var array $brands */
        $brands = $dem
            ->getRepository(Brand::class)
            ->findAll();

        /** @var ModelInterface $viewModel */
        $viewModel = parent::indexAction();
        $viewModel->setVariables([
            'brand' => $brand,
            'category' => $category,
            'brands' => $brands,
            'categories' => $categories
        ]);

        return $viewModel;
    }
}
