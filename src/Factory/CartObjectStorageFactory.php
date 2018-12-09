<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Market\Doctrine\Factory;

use Doctrine\ORM\EntityManager;
use Interop\Container\ContainerInterface;
use MSBios\Market\Doctrine\Storage\CartObjectStorage;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class CartObjectStorageFactory
 * @package MSBios\Market\Doctrine\Factory
 */
class CartObjectStorageFactory implements FactoryInterface
{
    /**
     * @inheritdoc
     *
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return CartObjectStorage|object
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new CartObjectStorage($container->get(EntityManager::class));
    }
}
