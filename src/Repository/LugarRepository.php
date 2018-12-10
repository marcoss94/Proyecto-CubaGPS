<?php

namespace App\Repository;

use App\Entity\Lugar;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Lugar|null find($id, $lockMode = null, $lockVersion = null)
 * @method Lugar|null findOneBy(array $criteria, array $orderBy = null)
 * @method Lugar[]    findAll()
 * @method Lugar[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LugarRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Lugar::class);
    }



    /**
     * @return Lugar[] Returns an array of Lugar objects
    */
    public function findAllPlaceNames($em)
    {
        $query = $em->createQuery('SELECT l.nombre FROM App\Entity\Lugar l ORDER BY l.nombre ASC');
        return $query->getResult();
    }


    /*
    public function findOneBySomeField($value): ?Lugar
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
