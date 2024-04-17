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


    // requete qui recupère dans la base de donnée toutes les oppositions de chaque equipe que ce soit en tant que equipe 1(match aller) et equipe 2(match retour)
    public function getOppositionByEquipe (int $equipeId): array
    {
        return $this->createQueryBuilder('o')
                ->orWhere('o.equipe1 = :eq1')
                ->setParameter('eq1', $equipeId)
                ->orWhere('o.equipe2 = :eq2')
                ->setParameter('eq2', $equipeId)
                ->getQuery()
                ->getResult();
    }

    // Requête pour récupérer et afficher le dernier match de l'équipe de six fours

    // Ne fonctionne pas (envoi un match au hasard)

    // public function lastMatchSixFours(): ?Opposition
    // {
    //     return $this->createQueryBuilder('o')
    //         ->join('o.equipe1', 'e1')
    //         ->join('o.equipe2', 'e2')
    //         ->andWhere('e1.nom = :teamName OR e2.nom = :teamName')
    //         ->setParameter('teamName', 'Football Club Six-Fours') 
    //         ->orderBy('o.date', 'DESC')
    //         ->setMaxResults(1)
    //         ->getQuery()
    //         ->getOneOrNullResult();
    // }
    public function lastMatchSixFours(): ?Opposition
    {
        return $this->createQueryBuilder('o')
            ->join('o.equipe1', 'e1')
            ->join('o.equipe2', 'e2')
            ->andWhere('e1.nom = :teamName OR e2.nom = :teamName')
            ->setParameter('teamName', 'Football Club Six-Fours') 
            ->orderBy('o.date', 'DESC')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
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
