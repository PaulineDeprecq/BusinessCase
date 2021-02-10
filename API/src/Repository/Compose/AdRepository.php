<?php

namespace App\Repository\Compose;

use App\Entity\Compose\Ad;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Oro\ORM\Query\AST\Functions\SimpleFunction;
use Oro\ORM\Query\AST\Platform\Functions\Mysql\Year;

/**
 * @method Ad|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ad|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ad[]    findAll()
 * @method Ad[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AdRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Ad::class);
    }

    /**
     * Pagination
     * @return Ad[] Returns an array of Ad objects
     */
    public function getXelementsPerPage($limit = 10, $offset = 0, $search) 
    {
        $qb = $this->makeQuery($search)
            ->addSelect('a')
            ->orderBy('a.publishedAt', 'DESC')
            ->setMaxResults($limit)
            ->setFirstResult($offset * $limit)
        ;
        
        return $qb->getQuery()->getResult();
    }

    public function countAll($search)
    {
        $qb = $this->makeQuery($search);
        return $qb->select('count(a)')->getQuery()->getOneOrNullResult();
    }

    public function makeQuery($search) {
        $qb = $this->createQueryBuilder('a')
            ->leftJoin('a.car', 'c')
            ->leftJoin('c.model', 'm')
            ->leftJoin('m.builder', 'b')
            ->leftJoin('a.fuel', 'f')
        ;

        if($search['builder']) {
            $qb->andWhere('b.name = :builder')
                ->setParameter('builder', $search['builder'])
            ;
        }

        if($search['model']) {
            $qb->andWhere('m.name = :model')
                ->setParameter('model', $search['model'])
            ;
        }

        $qb->andWhere('a.circulationDate BETWEEN :year_min AND :year_max')
            ->setParameter('year_min', $search['yearMin'])
            ->setParameter('year_max', $search['yearMax'])
        ;

        $qb->andWhere('a.price BETWEEN :price_min AND :price_max')
            ->setParameter('price_min', $search['priceMin'])
            ->setParameter('price_max', $search['priceMax'])
        ;

        if($search['fuel']) {
            $qb->andWhere('f.type = :fuel')
                ->setParameter('fuel', $search['fuel'])
            ;
        }
        return $qb;
    }
}
