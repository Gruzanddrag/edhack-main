<?php

namespace App\Repository;

use App\Entity\InternshipCategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method InternshipCategory|null find($id, $lockMode = null, $lockVersion = null)
 * @method InternshipCategory|null findOneBy(array $criteria, array $orderBy = null)
 * @method InternshipCategory[]    findAll()
 * @method InternshipCategory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InternshipCategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InternshipCategory::class);
    }

    // /**
    //  * @return InternshipCategory[] Returns an array of InternshipCategory objects
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
    public function findOneBySomeField($value): ?InternshipCategory
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
