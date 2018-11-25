<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Market\Doctrine\Mvc;


use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Persistence\ObjectManagerAwareInterface;
use MSBios\Doctrine\ObjectManagerAwareTrait;
use MSBios\Market\Resource\Doctrine\Entity\Brand;
use MSBios\Market\Resource\Doctrine\Entity\Category;
use Zend\Mvc\Controller\AbstractActionController as DefaultAbstractActionController;
use Zend\Mvc\MvcEvent;

/**
 * Class AbstractActionController
 * @package MSBios\Market\Doctrine\Mvc
 */
class AbstractActionController extends DefaultAbstractActionController implements ObjectManagerAwareInterface
{
    use ObjectManagerAwareTrait;

    /**
     * @param MvcEvent $e
     * @return mixed
     */
    public function onDispatch(MvcEvent $e)
    {
        /** @var ObjectManager $dem */
        $dem = $this->getObjectManager();

        /** @var array $categories */
        $categories = $dem
            ->getRepository(Category::class)
            ->findBy(['category' => null]);

        /** @var array $brands */
        $brands = $dem
            ->getRepository(Brand::class)
            ->findAll();

        $e->getViewModel()->setVariables([
            'categories' => $categories,
            'brands' => $brands
        ]);

        return parent::onDispatch($e);
    }

}