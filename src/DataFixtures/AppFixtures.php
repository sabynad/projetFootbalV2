<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Equipe;
use App\Entity\Opposition;
use Faker\Factory;



class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        // Création de l'équipe "Football Club Six-fours"
        $equipe1 = new Equipe;
        $equipe1->setNom('Football Club Six-fours')
                ->setCategorie('Senior')
                ->setChampionnat('Régional 1')
                ->setImageName('logo-six-fours-detoure.png');
        $manager->persist($equipe1);

        // Création des autres équipes avec des noms réels
        $equipesNoms = [
            'Sporting Club Toulon',
            'Athletique Club de Berthe',
            'Football Club Seynois',
            'Gardia Club Football',
            'AS Mar-Vivo',
            'Racing Club Toulon',
            'Football Club Ollioules',
            'Assocaition Sportive Lery',
            'Jeunesse Sportive Seynoise',
            
        ];
        
        foreach ($equipesNoms as $nom) {
            $equipe = new Equipe;
            $equipe->setNom($nom)
                   ->setCategorie('Senior')
                   ->setChampionnat('Régional 1')
                   ->setImageName('quelques-choses.png');
            $manager->persist($equipe);
        }


        // Récupération de toutes les équipes
        $equipes = $manager->getRepository(Equipe::class)->findAll();

        // Création des oppositions entre toutes les paires d'équipes
        foreach ($equipes as $key => $equipe1) {
            foreach ($equipes as $key2 => $equipe2) {
                if ($key != $key2) {
                    $opposition = new Opposition();
                    $opposition->setEquipe1($equipe1)
                               ->setEquipe2($equipe2)
                               ->setScoreEquipe1(mt_rand(0, 3))
                               ->setScoreEquipe2(mt_rand(0, 3))
                               ->setDate($faker->dateTimeBetween('-7 months'));
                    $manager->persist($opposition);
                }
            }
        }

        $manager->flush();
    }
}