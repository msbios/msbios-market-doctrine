<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Market\Doctrine\Controller;

use Doctrine\Common\Persistence\ObjectManager;
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

    /**
     * IndexController constructor.
     * @param ObjectManager $objectManager
     */
    public function __construct(ObjectManager $objectManager)
    {
        $this->setObjectManager($objectManager);
    }
}
