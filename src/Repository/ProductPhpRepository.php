<?php

namespace App\Repository;

use App\Entity\ProductPhp;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ProductPhp|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProductPhp|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProductPhp[]    findAll()
 * @method ProductPhp[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductPhpRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ProductPhp::class);
    }

    // /**
    //  * @return ProductPhp[] Returns an array of ProductPhp objects
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
    public function findOneBySomeField($value): ?ProductPhp
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
