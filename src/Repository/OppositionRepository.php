<?php

namespace App\Repository;

use App\Entity\Opposition;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Opposition>
 *
 * @method Opposition|null find($id, $lockMode = null, $lockVersion = null)
 * @method Opposition|null findOneBy(array $criteria, array $orderBy = null)
 * @method Opposition[]    findAll()
 * @method Opposition[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OppositionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Opposition::class);
    }

    //    /**
    //     * @return Opposition[] Returns an array of Opposition objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('o')
    //            ->andWhere('o.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('o.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Opposition
    //    {
    //        return $this->createQueryBuilder('o')
    //            ->andWhere('o.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
