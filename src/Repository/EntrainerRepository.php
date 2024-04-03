<?php

namespace App\Repository;

use App\Entity\Entrainer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Entrainer>
 *
 * @method Entrainer|null find($id, $lockMode = null, $lockVersion = null)
 * @method Entrainer|null findOneBy(array $criteria, array $orderBy = null)
 * @method Entrainer[]    findAll()
 * @method Entrainer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EntrainerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Entrainer::class);
    }

    //    /**
    //     * @return Entrainer[] Returns an array of Entrainer objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('e.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Entrainer
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
