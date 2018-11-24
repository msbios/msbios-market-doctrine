<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Market\Doctrine;

use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Persistence\ObjectManagerAwareInterface;
use MSBios\Market\Doctrine\Controller\CatalogController;
use MSBios\Market\Doctrine\Controller\IndexController;
use MSBios\Market\Resource\Doctrine\Entity\Brand;
use MSBios\Market\Resource\Doctrine\Entity\Category;
use MSBios\ModuleInterface;
use Zend\EventManager\EventInterface;
use Zend\EventManager\SharedEventManager;
use Zend\Loader\AutoloaderFactory;
use Zend\Loader\StandardAutoloader;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\BootstrapListenerInterface;
use Zend\Mvc\ApplicationInterface;
use Zend\Mvc\MvcEvent;

/**
 * Class Module
 * @package MSBios\Market\Doctrine
 */
class Module implements
    ModuleInterface,
    AutoloaderProviderInterface,
    BootstrapListenerInterface
{
    /** @const VERSION */
    const VERSION = '1.0.0';

    /**
     * @return mixed
     */
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    /**
     * Return an array for passing to Zend\Loader\AutoloaderFactory.
     *
     * @return array
     */
    public function getAutoloaderConfig()
    {
        return [
            AutoloaderFactory::STANDARD_AUTOLOADER => [
                StandardAutoloader::LOAD_NS => [
                    __NAMESPACE__ => __DIR__,
                ],
            ],
        ];
    }

    /**
     * Listen to the bootstrap event
     *
     * @param EventInterface $e
     * @return array
     */
    public function onBootstrap(EventInterface $e)
    {
        /** @var ApplicationInterface $target */
        $target = $e->getTarget();

        /** @var SharedEventManager $sharedEventManager */
        $sharedEventManager = $target
            ->getEventManager()
            ->getSharedManager();

        $sharedEventManager->attach(
            IndexController::class, MvcEvent::EVENT_DISPATCH, [$this, 'onRender'], 1);
        $sharedEventManager->attach(
            CatalogController::class, MvcEvent::EVENT_DISPATCH, [$this, 'onRender'], 1);
    }

    /**
     * @param EventInterface $e
     */
    public function onRender(EventInterface $e)
    {
        /** @var  $target */
        $target = $e->getTarget();

        if ($target instanceof ObjectManagerAwareInterface) {
            /** @var ObjectManager $dem */
            $dem = $target->getObjectManager();

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
        }
    }
}
