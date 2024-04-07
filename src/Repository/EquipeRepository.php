<?php

namespace App\Repository;

use App\Entity\Equipe;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Equipe>
 *
 * @method Equipe|null find($id, $lockMode = null, $lockVersion = null)
 * @method Equipe|null findOneBy(array $criteria, array $orderBy = null)
 * @method Equipe[]    findAll()
 * @method Equipe[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EquipeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Equipe::class);
    }

    

    // private $oppositionRepository;

    // public function __construct(ManagerRegistry $registry, OppositionRepository $oppositionRepository)
    // {
    //     parent::__construct($registry, Equipe::class);
    //     $this->oppositionRepository = $oppositionRepository;
    // }

    // public function getEquipeScore(int $equipeId): int
    // {
    //     $totalPoints = 0;
    //     $matches = 0;
        
    //     // Récupérer les oppositions de l'équipe
    //     $oppositions = $this->oppositionRepository->getOppositionByEquipe($equipeId);

    //     // Parcourir les oppositions
    //     foreach ($oppositions as $opposition) {
    //         $matches++;
    //         $equipe1 = $opposition->getEquipe1();
    //         $scoreEquipe1 = $opposition->getScoreEquipe1();
    //         $scoreEquipe2 = $opposition->getScoreEquipe2();

    //         // Calculer les points en fonction des scores
    //         if ($equipeId === $equipe1->getId()) {
    //             if ($scoreEquipe1 > $scoreEquipe2) {
    //                 $totalPoints += 3;
    //             } elseif ($scoreEquipe1 === $scoreEquipe2) {
    //                 $totalPoints++;
    //             }
    //         } else {
    //             if ($scoreEquipe2 > $scoreEquipe1) {
    //                 $totalPoints += 3;
    //             } elseif ($scoreEquipe1 === $scoreEquipe2) {
    //                 $totalPoints++;
    //             }
    //         }
    //     }

    //     return $totalPoints;
    // }


    //    /**
    //     * @return Equipe[] Returns an array of Equipe objects
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

    //    public function findOneBySomeField($value): ?Equipe
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }



}
