<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Market\Doctrine\Factory;

use Doctrine\ORM\EntityManager;
use Interop\Container\ContainerInterface;
use MSBios\Market\Doctrine\Controller\IndexController;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class IndexControllerFactory
 * @package MSBios\Market\Doctrine\Factory
 */
class IndexControllerFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return IndexController|object
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new IndexController($container->get(EntityManager::class));
    }
}