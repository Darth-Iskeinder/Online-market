<?php

namespace App\Repository;

use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Product|null find($id, $lockMode = null, $lockVersion = null)
 * @method Product|null findOneBy(array $criteria, array $orderBy = null)
 * @method Product[]    findAll()
 * @method Product[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Product::class);
    }

    public function getLatestProducts()
    {
        return $this->createQueryBuilder('p')
            ->select( 'p.id', 'p.name', 'p.price', 'p.image', 'p.is_new')
            ->where('p.status = 1')
            ->orderBy('p.id', 'desc')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
            ;
    }

    public function getProductListByCategory($categoryId)
    {
        return $this->createQueryBuilder('p')
            ->select('p.id', 'p.name', 'p.price', 'p.image', 'p.is_new')
            ->where('p.status = 1 AND p.category_id = :categoryId')
            ->orderBy('p.id', 'desc')
            ->setMaxResults(10)
            ->setParameter('categoryId', $categoryId)
            ->getQuery()
            ->getResult()
            ;

    }
    // /**
    //  * @return Product[] Returns an array of Product objects
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
    public function findOneBySomeField($value): ?Product
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
