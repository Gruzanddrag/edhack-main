<?php

namespace App\Repository;

use App\Entity\JobExperience;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method JobExperience|null find($id, $lockMode = null, $lockVersion = null)
 * @method JobExperience|null findOneBy(array $criteria, array $orderBy = null)
 * @method JobExperience[]    findAll()
 * @method JobExperience[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JobExperienceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, JobExperience::class);
    }

    // /**
    //  * @return JobExperience[] Returns an array of JobExperience objects
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
    public function findOneBySomeField($value): ?JobExperience
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
