<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Market\Doctrine\Factory;

use Interop\Container\ContainerInterface;
use MSBios\Market\Doctrine\CartService;
use MSBios\Market\Doctrine\Storage\CartObjectStorage;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class CartServiceFactory
 * @package MSBios\Market\Doctrine\Factory
 */
class CartServiceFactory implements FactoryInterface
{
    /**
     * @inheritdoc
     *
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return CartService|object
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new CartService($container->get(CartObjectStorage::class));
    }
}