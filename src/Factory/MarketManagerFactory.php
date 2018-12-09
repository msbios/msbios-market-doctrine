<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Market\Doctrine\Factory;

use Interop\Container\ContainerInterface;
use MSBios\Market\Doctrine\CartService;
use MSBios\Market\Doctrine\MarketManager;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class MarketManagerFactory
 * @package MSBios\Market\Doctrine\Factory
 */
class MarketManagerFactory implements FactoryInterface
{
    /**
     * @inheritdoc
     *
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return MarketManager|object
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new MarketManager(
            $container->get(CartService::class)
        );
    }
}
