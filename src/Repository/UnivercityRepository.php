<?php

namespace App\Repository;

use App\Entity\Univercity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Univercity|null find($id, $lockMode = null, $lockVersion = null)
 * @method Univercity|null findOneBy(array $criteria, array $orderBy = null)
 * @method Univercity[]    findAll()
 * @method Univercity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UnivercityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Univercity::class);
    }

    // /**
    //  * @return Univercity[] Returns an array of Univercity objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Univercity
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
