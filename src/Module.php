<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Market\Doctrine;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManager;
use MSBios\Market\Resource\Doctrine\Entity\Brand;
use MSBios\Market\Resource\Doctrine\Entity\Category;
use MSBios\ModuleInterface;
use Zend\EventManager\EventInterface;
use Zend\EventManager\EventManager;
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

        /**
         * @param EventInterface $e
         */
        $listener = function (EventInterface $e) use ($target) {

            /** @var ObjectManager $dem */
            $dem = $target
                ->getServiceManager()
                ->get(EntityManager::class);

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
        };

        /** @var EventManager $eventManager */
        $eventManager = $target->getEventManager();
        $eventManager->attach(MvcEvent::EVENT_DISPATCH, $listener);
        $eventManager->attach(MvcEvent::EVENT_DISPATCH_ERROR, $listener);
    }
}
