<?php

namespace App\Repository;

use App\Entity\Casa;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Casa|null find($id, $lockMode = null, $lockVersion = null)
 * @method Casa|null findOneBy(array $criteria, array $orderBy = null)
 * @method Casa[]    findAll()
 * @method Casa[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CasaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Casa::class);
    }

//    /**
//     * @return Casa[] Returns an array of Casa objects
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
    public function findOneBySomeField($value): ?Casa
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
