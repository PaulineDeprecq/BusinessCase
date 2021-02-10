<?php

namespace App\Repository\Basis;

use App\Entity\Basis\ColorType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ColorType|null find($id, $lockMode = null, $lockVersion = null)
 * @method ColorType|null findOneBy(array $criteria, array $orderBy = null)
 * @method ColorType[]    findAll()
 * @method ColorType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ColorTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ColorType::class);
    }

    // /**
    //  * @return ColorType[] Returns an array of ColorType objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ColorType
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
