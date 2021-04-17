<?php

namespace App\Repository;

use App\Entity\JobSkill;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method JobSkill|null find($id, $lockMode = null, $lockVersion = null)
 * @method JobSkill|null findOneBy(array $criteria, array $orderBy = null)
 * @method JobSkill[]    findAll()
 * @method JobSkill[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JobSkillRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, JobSkill::class);
    }

    // /**
    //  * @return JobSkill[] Returns an array of JobSkill objects
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
    public function findOneBySomeField($value): ?JobSkill
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
