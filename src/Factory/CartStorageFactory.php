<?php
///**
// * @access protected
// * @author Judzhin Miles <info[woof-woof]msbios.com>
// */
//namespace MSBios\Market\Doctrine\Factory;
//
//use Doctrine\ORM\EntityManager;
//use Interop\Container\ContainerInterface;
//use Interop\Container\Exception\ContainerException;
//use MSBios\Market\Doctrine\CartService;
//use MSBios\Market\Doctrine\CartStorage;
//use MSBios\Market\Doctrine\Controller\CartController;
//use MSBios\Session\SessionManagerInterface;
//use Zend\ServiceManager\Exception\ServiceNotCreatedException;
//use Zend\ServiceManager\Exception\ServiceNotFoundException;
//use Zend\ServiceManager\Factory\FactoryInterface;
//use Zend\Session\Container as SessionContainer;
//
///**
// * Class CartStorageFactory
// * @package MSBios\Market\Doctrine\Factory
// */
//class CartStorageFactory implements FactoryInterface
//{
//    /**
//     * @inheritdoc
//     *
//     * @param ContainerInterface $container
//     * @param string $requestedName
//     * @param array|null $options
//     * @return CartStorage|object
//     */
//    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
//    {
//        /** @var SessionManagerInterface $manager */
//        $manager = $container->get(SessionManagerInterface::class);
//        $container = new SessionContainer($requestedName, $manager);
//        return new CartStorage($container);
//    }
//}