<?php

namespace App\Repository;

use App\Entity\Contador;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Contador|null find($id, $lockMode = null, $lockVersion = null)
 * @method Contador|null findOneBy(array $criteria, array $orderBy = null)
 * @method Contador[]    findAll()
 * @method Contador[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContadorRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Contador::class);
    }

//    /**
//     * @return Contador[] Returns an array of Contador objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Contador
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
