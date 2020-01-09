<?php

namespace App\Repository;

use App\Entity\Annonce;
use App\Entity\AnnonceSearch;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\QueryBuilder;
use Doctrine\ORM\Query;

/**
 * @method Annonce|null find($id, $lockMode = null, $lockVersion = null)
 * @method Annonce|null findOneBy(array $criteria, array $orderBy = null)
 * @method Annonce[]    findAll()
 * @method Annonce[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnnonceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Annonce::class);
    }

    // /**
    //  * @return Annonce[] Returns an array of Annonce objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /**
     *@return Query
     */
    //recupere tout ce qui est visible dans l'objet annonce
    public function findAllVisibleQuery(AnnonceSearch $search): Query
    {
        //sauvegarde de la requette dans la variable query

        $query = $this->findVisibleQuery();

        if ($search->getMinPrice()) {
            $query = $query
                ->andWhere('p.price >= :minprice')
                ->setParameter('minprice', $search->getMinPrice());
        }
        if ($search->getMaxPrice()) {
            $query = $query
                ->andWhere('p.price <= :maxprice')
                ->orderBy('p.price', 'ASC')
                ->setParameter('maxprice', $search->getMaxPrice());
        }
        if ($search->getName()) {
            $query = $query
                ->andWhere('p.title = :name')
                ->setParameter('name', $search->getName());
        }
        return $query->getQuery();
    }


    /**
     * @return Annonce[]
     */
    // recupère les 10 dernier resultat
    public function findLatest(): array
    {
        return $this->findVisibleQuery()
            ->setMaxResults(3)
            ->getQuery()
            ->getResult();
    }

    //affiche les produits non vendu
    //par date de creation
    public function findVisibleQuery(): QueryBuilder
    {
        return $this->createQueryBuilder('p')
            ->orderBy('p.updatedAt', 'DESC')
            ->Where('p.sold = false')
            ->setMaxResults(1);
         
    }
}
