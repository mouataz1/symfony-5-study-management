<?php

namespace App\Repository;

use App\Entity\Tp;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Tp|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tp|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tp[]    findAll()
 * @method Tp[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TpRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Tp::class);
    }

    // /**
    //  * @return Tp[] Returns an array of Tp objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Tp
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
