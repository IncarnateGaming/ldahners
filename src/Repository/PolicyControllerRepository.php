<?php

namespace App\Repository;

use App\Entity\PolicyController;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method PolicyController|null find($id, $lockMode = null, $lockVersion = null)
 * @method PolicyController|null findOneBy(array $criteria, array $orderBy = null)
 * @method PolicyController[]    findAll()
 * @method PolicyController[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PolicyControllerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PolicyController::class);
    }

    // /**
    //  * @return PolicyController[] Returns an array of PolicyController objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PolicyController
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
