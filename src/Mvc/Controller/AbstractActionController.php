<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Market\Doctrine\Mvc\Controller;

use DoctrineModule\Persistence\ObjectManagerAwareInterface;
use DoctrineModule\Persistence\ProvidesObjectManager;
use Zend\Mvc\Controller\AbstractActionController as DefaultAbstractActionController;

/**
 * Class AbstractActionController
 * @package MSBios\Market\Doctrine\Mvc\Controller
 */
class AbstractActionController extends DefaultAbstractActionController implements ObjectManagerAwareInterface
{
    use ProvidesObjectManager;
}
