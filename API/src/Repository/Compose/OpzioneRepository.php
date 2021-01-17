<?php

namespace App\Repository\Compose;

use App\Entity\Compose\Opzione;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Opzione|null find($id, $lockMode = null, $lockVersion = null)
 * @method Opzione|null findOneBy(array $criteria, array $orderBy = null)
 * @method Opzione[]    findAll()
 * @method Opzione[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OpzioneRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Opzione::class);
    }

    // /**
    //  * @return Opzione[] Returns an array of Opzione objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Opzione
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
