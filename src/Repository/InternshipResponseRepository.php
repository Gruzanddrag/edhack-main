<?php

namespace App\Repository;

use App\Entity\InternshipResponse;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method InternshipResponse|null find($id, $lockMode = null, $lockVersion = null)
 * @method InternshipResponse|null findOneBy(array $criteria, array $orderBy = null)
 * @method InternshipResponse[]    findAll()
 * @method InternshipResponse[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InternshipResponseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InternshipResponse::class);
    }

    // /**
    //  * @return InternshipResponse[] Returns an array of InternshipResponse objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?InternshipResponse
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
