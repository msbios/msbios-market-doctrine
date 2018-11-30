<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Market\Resource\Doctrine\Repository;

use Doctrine\ORM\Query\Expr\Join;
use Doctrine\ORM\QueryBuilder;
use MSBios\Market\Resource\Doctrine\Entity\Variant;
use MSBios\Resource\Doctrine\EntityRepository;

/**
 * Class ProductRepository
 * @package MSBios\Market\Resource\Doctrine\Repository
 */
class ProductRepository extends EntityRepository
{
    /** @const DEFAULT_ALIAS */
    const DEFAULT_ALIAS = 'p';

    /**
     * @param array|null $orderBy
     * @param null $limit
     * @param null $offset
     * @return array
     */
    public function findRecommended(array $orderBy = null, $limit = null, $offset = null)
    {
        return parent::findBy([
            'visible' => true,
            'recommended' => true,
            'rowStatus' => true
        ], $orderBy, $limit, $offset);
    }

    /**
     * @param array|null $orderBy
     * @param null $limit
     * @param null $offset
     * @return mixed
     */
    public function findPromotional(array $orderBy = null, $limit = null, $offset = null)
    {
        /** @var QueryBuilder $qb */
        $qb = $this->createQueryBuilder(self::DEFAULT_ALIAS);

        $qb
            ->join(Variant::class, 'v', Join::WITH, $qb->expr()->eq('v.product', 'p.id'))
            ->where($qb->expr()->neq('v.compare', '0.00'));

        if (!is_null($limit)) {
            $qb->setMaxResults($limit);
        }

        if (!is_null($offset)) {
            $qb->setFirstResult($offset);
        }

        return $qb
            ->getQuery()
            ->getResult();
    }

}
