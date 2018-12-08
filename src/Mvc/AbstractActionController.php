<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Market\Doctrine\Mvc;

use DoctrineModule\Persistence\ObjectManagerAwareInterface;
use MSBios\Doctrine\ObjectManagerAwareTrait;
use Zend\Mvc\Controller\AbstractActionController as DefaultAbstractActionController;

/**
 * Class AbstractActionController
 * @package MSBios\Market\Doctrine\Mvc
 */
class AbstractActionController extends DefaultAbstractActionController implements ObjectManagerAwareInterface
{
    use ObjectManagerAwareTrait;
}
