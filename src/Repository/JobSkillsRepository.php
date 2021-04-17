<?php

namespace App\Repository;

use App\Entity\JobSkills;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method JobSkills|null find($id, $lockMode = null, $lockVersion = null)
 * @method JobSkills|null findOneBy(array $criteria, array $orderBy = null)
 * @method JobSkills[]    findAll()
 * @method JobSkills[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JobSkillsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, JobSkills::class);
    }

    // /**
    //  * @return JobSkills[] Returns an array of JobSkills objects
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
    public function findOneBySomeField($value): ?JobSkills
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
