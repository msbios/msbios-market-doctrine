<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Market\Doctrine\Factory;

use Doctrine\ORM\EntityManager;
use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use MSBios\Market\Doctrine\CartService;
use MSBios\Market\Doctrine\Controller\CartController;
use MSBios\Market\Doctrine\MarketManager;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class CartControllerFactory
 * @package MSBios\Market\Doctrine\Factory
 */
class CartControllerFactory implements FactoryInterface
{
    /**
     * @inheritdoc
     *
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return object|void
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new CartController(
            $container->get(EntityManager::class),
            $container->get(MarketManager::class)
        );
    }
}
