<?php

namespace App\Repository;

use App\Entity\Vote;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Vote|null find($id, $lockMode = null, $lockVersion = null)
 * @method Vote|null findOneBy(array $criteria, array $orderBy = null)
 * @method Vote[]    findAll()
 * @method Vote[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VoteRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Vote::class);
    }


    public function findUpVoteForRating($rating): ?int
    {
        $vote = $this->createQueryBuilder('v')
            ->andWhere('v.rating = :val')
            ->setParameter('val', $rating)
            ->andWhere('v.votePoint = "Up"')
            ->getQuery()
            ->getResult();
         return count($vote);
    }

    public function findDownVoteForRating($rating): ?int
    {
        $vote = $this->createQueryBuilder('v')
            ->andWhere('v.rating = :val')
            ->setParameter('val', $rating)
            ->andWhere('v.votePoint = "Down"')
            ->getQuery()
            ->getResult();
        return count($vote);
    }



    /*
    public function findOneBySomeField($value): ?Vote
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

}
