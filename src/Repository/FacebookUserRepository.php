<?php

namespace App\Repository;

use App\Entity\FacebookUser;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method FacebookUser|null find($id, $lockMode = null, $lockVersion = null)
 * @method FacebookUser|null findOneBy(array $criteria, array $orderBy = null)
 * @method FacebookUser[]    findAll()
 * @method FacebookUser[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FacebookUserRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, FacebookUser::class);
    }

//    /**
//     * @return FacebookUser[] Returns an array of FacebookUser objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FacebookUser
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
