<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Market\Doctrine\Controller;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Persistence\ObjectManager;
use MSBios\Market\Doctrine\Mvc\Controller\AbstractActionController;
use MSBios\Market\Resource\Doctrine\Entity\Product;
use MSBios\Market\Resource\Doctrine\Repository\ProductRepository;
use Zend\View\Model\ViewModel;

/**
 * Class IndexController
 * @package MSBios\Market\Doctrine\Controller
 */
class IndexController extends AbstractActionController
{
    /**
     * @return ViewModel
     */
    public function indexAction()
    {
        /** @var ObjectManager $dem */
        $dem = $this->getObjectManager();

        /** @var ProductRepository $repository */
        $repository = $dem
            ->getRepository(Product::class);

        /** @var ArrayCollection $recommended */
        $recommended = $repository->findRecommended();

        /** @var ArrayCollection $novelty */
        $novelty = $repository->findNovelty(2);

        /** @var ArrayCollection $promotional */
        $promotional = $repository->findPromotional();

        return new ViewModel([
            'recommended' => $recommended,
            'novelty' => $novelty,
            'promotional' => $promotional
        ]);
    }
}
