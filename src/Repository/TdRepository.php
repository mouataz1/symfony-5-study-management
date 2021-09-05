<?php

namespace App\Repository;

use App\Entity\Td;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Td|null find($id, $lockMode = null, $lockVersion = null)
 * @method Td|null findOneBy(array $criteria, array $orderBy = null)
 * @method Td[]    findAll()
 * @method Td[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TdRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Td::class);
    }

    // /**
    //  * @return Td[] Returns an array of Td objects
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
    public function findOneBySomeField($value): ?Td
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
