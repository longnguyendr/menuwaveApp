<?php

namespace App\Repository;

use App\Entity\Places;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Places|null find($id, $lockMode = null, $lockVersion = null)
 * @method Places|null findOneBy(array $criteria, array $orderBy = null)
 * @method Places[]    findAll()
 * @method Places[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlacesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Places::class);
    }

//    /**
//     * @return Places[] Returns an array of Places objects
//     */
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
    public function findOneBySomeField($value): ?Places
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
