<?php

namespace App\Repository;

use App\Entity\JobResponse;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method JobResponse|null find($id, $lockMode = null, $lockVersion = null)
 * @method JobResponse|null findOneBy(array $criteria, array $orderBy = null)
 * @method JobResponse[]    findAll()
 * @method JobResponse[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JobResponseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, JobResponse::class);
    }

    // /**
    //  * @return JobResponse[] Returns an array of JobResponse objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('j.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?JobResponse
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
