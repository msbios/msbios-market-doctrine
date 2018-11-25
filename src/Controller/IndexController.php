<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Market\Doctrine\Controller;

use DoctrineModule\Persistence\ObjectManagerAwareInterface;
use MSBios\Application\Controller\IndexController as DefaultIndexController;
use MSBios\Doctrine\ObjectManagerAwareTrait;

/**
 * Class IndexController
 * @package MSBios\Market\Doctrine\Controller
 */
class IndexController extends DefaultIndexController implements ObjectManagerAwareInterface
{
    use ObjectManagerAwareTrait;
}
