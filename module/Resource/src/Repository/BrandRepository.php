<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Market\Resource\Doctrine\Repository;

use Doctrine\ORM\QueryBuilder;
use MSBios\Market\Resource\Doctrine\Entity\Category;
use MSBios\Resource\Doctrine\EntityRepository;

/**
 * Class BrandRepository
 * @package MSBios\Market\Resource\Doctrine\Repository
 */
class BrandRepository extends EntityRepository
{
    /** @const DEFAULT_ALIAS */
    const DEFAULT_ALIAS = 'b';

    /**
     * @param Category $category
     * @param array $categories
     * @return array
     */
    private static function prepareCategories(Category $category, array &$categories = [])
    {
        $categories[$category->getId()] = $category;

        /** @var Category $category */
        foreach ($category->getCategories() as $category) {
            self::prepareCategories($category, $categories);
        }

        return $categories;
    }

    /**
     * @param Category $category
     * @return mixed
     */
    public function findByCategory(Category $category)
    {
        /** @var QueryBuilder $qb */
        $qb = $this->createQueryBuilder(self::DEFAULT_ALIAS);

        return $qb
            ->join('b.products', 'p', 'WITH')
            ->join('p.categories', 'c', 'WITH')
            ->where($qb->expr()->in('c.id', ':categories'))
            ->andWhere($qb->expr()->eq('b.rowStatus', ':rowStatus'))
            ->setParameter('categories', self::prepareCategories($category))
            ->setParameter('rowStatus', true)
            ->getQuery()
            ->getResult();
    }
}
