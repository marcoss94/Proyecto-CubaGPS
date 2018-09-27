<?php

namespace App\Repository;

use App\Entity\DisplayableComponent;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method DisplayableComponent|null find($id, $lockMode = null, $lockVersion = null)
 * @method DisplayableComponent|null findOneBy(array $criteria, array $orderBy = null)
 * @method DisplayableComponent[]    findAll()
 * @method DisplayableComponent[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DisplayableComponentRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, DisplayableComponent::class);
    }

//    /**
//     * @return DisplayableComponent[] Returns an array of DisplayableComponent objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DisplayableComponent
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
