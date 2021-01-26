<?php

namespace App\Repository\Compose;

use App\Entity\Compose\Ad;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

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
    public function getXelementsPerPage($limit = 15, $offset = 0)
    {
        return $this->createQueryBuilder('a')
            ->orderBy('a.publishedAt', 'ASC')
            ->setMaxResults($limit)
            ->setFirstResult($offset * $limit)
            ->getQuery()
            ->getResult()
        ;
    }

    public function countAll()
    {
        return $this->createQueryBuilder('a')
            ->select('count(a)')
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
}
