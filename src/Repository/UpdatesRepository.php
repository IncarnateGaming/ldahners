<?php

namespace App\Repository;

use App\Entity\Updates;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Updates|null find($id, $lockMode = null, $lockVersion = null)
 * @method Updates|null findOneBy(array $criteria, array $orderBy = null)
 * @method Updates[]    findAll()
 * @method Updates[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UpdatesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Updates::class);
    }
    public function findAllSortedPriority(){
        return $this->findBy(array(),array('priority'=>'ASC'));
    }

    // /**
    //  * @return Update[] Returns an array of Update objects
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
    public function findOneBySomeField($value): ?Update
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
