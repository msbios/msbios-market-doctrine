<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Market\Doctrine\Controller;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\Persistence\ObjectRepository;
use MSBios\Market\Doctrine\Mvc\AbstractActionController;
use MSBios\Market\Resource\Doctrine\Entity\Brand;
use MSBios\Market\Resource\Doctrine\Entity\Category;
use Zend\View\Model\ModelInterface;

/**
 * Class BrandController
 * @package MSBios\Market\Doctrine\Controller
 */
class BrandController extends AbstractActionController
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
            ->findOneBy(['id' => $this->params()->fromRoute('id')]);

        if (!$brand) {
            return $this->notFoundAction();
        }

        /** @var ModelInterface $viewModel */
        $viewModel = parent::indexAction();
        $viewModel->setVariables([
            'brand' => $brand,
        ]);

        return $viewModel;
    }
}