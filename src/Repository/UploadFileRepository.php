<?php

namespace App\Repository;

use App\Entity\UploadFile;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method UploadFile|null find($id, $lockMode = null, $lockVersion = null)
 * @method UploadFile|null findOneBy(array $criteria, array $orderBy = null)
 * @method UploadFile[]    findAll()
 * @method UploadFile[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UploadFileRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UploadFile::class);
    }
    public function findAllSortedPriority(){
        return $this->findBy(array(),array('order1'=>'ASC'));
    }
    public function findAllSortedPriorityPhysicalArt(){
        return $this->findBy(array('type1'=>'physical'),array('order1'=>'ASC'));
    }
    public function findAllSortedPriorityDigitalArt(){
        return $this->findBy(array('type1'=>'digital'),array('order1'=>'ASC'));
    }
    public function findAllSortedPriorityInstrumentalMusic(){
        return $this->findBy(array('type1'=>'insMusic'),array('order1'=>'ASC'));
    }
    public function findAllSortedPriorityInstrumentalVideos(){
        return $this->findBy(array('type1'=>'insVideo'),array('order1'=>'ASC'));
    }
    public function findAllSortedPriorityVocalMusic(){
        return $this->findBy(array('type1'=>'vocMusic'),array('order1'=>'ASC'));
    }
    public function findAllSortedPriorityVocalVideos(){
        return $this->findBy(array('type1'=>'vocVideo'),array('order1'=>'ASC'));
    }

    // /**
    //  * @return UploadFile[] Returns an array of UploadFile objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?UploadFile
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
