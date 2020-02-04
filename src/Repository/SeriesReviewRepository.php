<?php

namespace App\Repository;

use App\Entity\SeriesReview;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method SeriesReview|null find($id, $lockMode = null, $lockVersion = null)
 * @method SeriesReview|null findOneBy(array $criteria, array $orderBy = null)
 * @method SeriesReview[]    findAll()
 * @method SeriesReview[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SeriesReviewRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SeriesReview::class);
    }

    // /**
    //  * @return SeriesReview[] Returns an array of SeriesReview objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SeriesReview
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
