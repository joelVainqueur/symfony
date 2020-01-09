<?php

namespace App\Repository;

use App\Entity\GoogleId;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method GoogleId|null find($id, $lockMode = null, $lockVersion = null)
 * @method GoogleId|null findOneBy(array $criteria, array $orderBy = null)
 * @method GoogleId[]    findAll()
 * @method GoogleId[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GoogleIdRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GoogleId::class);
    }

    // /**
    //  * @return GoogleId[] Returns an array of GoogleId objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?GoogleId
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
