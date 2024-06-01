<?php

namespace App\Controller;

use App\Entity\Equipe;
use App\Form\EquipeType;
use App\Repository\EquipeRepository;
use App\Repository\OppositionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


    #[Route('/equipe')]
    class EquipeController extends AbstractController
    {
        private OppositionRepository $repo;
    
        public function __construct(OppositionRepository $repo)
        {
            $this->repo = $repo;
        }
        

   
//----------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------

    #[Route('/', name: 'app_equipe_index', methods: ['GET'])]
    public function index(EquipeRepository $equipeRepository): Response
    {
        $equipes =  $equipeRepository->findAll();
        // Tableau pour stocker les matchs gagnés
        $scores = [];
        $matches = [];
        $matchesGagne = []; 
        $matchesNul = []; 
        $matchesPerdu = []; 

        // Initialiser les tableaux avec les ID des équipes
        foreach ($equipes as $equipe) {
            $equipeId = $equipe->getId();
            $matches[$equipeId] = 0;
            $matchesGagne[$equipeId] = 0;
            $matchesNul[$equipeId] = 0;
            $matchesPerdu[$equipeId] = 0;
        }

        // Fonction pour calculer le score de l'équipe et le nombre de matchs gagnés
        function getEquipeScore(int $equipeId, OppositionRepository $repo, array &$matches, array &$matchesGagne, array &$matchesNul, array &$matchesPerdu): int
        {
            $totalPoints = 0;

            foreach ($repo->getOppositionByEquipe($equipeId) as $opposition) {
                $matches[$equipeId] = $matches[$equipeId] + 1;
                $equipe1 = $opposition->getEquipe1();
                $scoreEquipe1 = $opposition->getScoreEquipe1();
                $scoreEquipe2 = $opposition->getScoreEquipe2();

                if ($equipeId === $equipe1->getId()) {
                    if ($scoreEquipe1 > $scoreEquipe2) {
                        $totalPoints += 3;
                        $matchesGagne[$equipeId]++;
                    } elseif ($scoreEquipe1 === $scoreEquipe2) {
                        $totalPoints++;
                        $matchesNul[$equipeId]++;
                        $matchesPerdu[$equipeId]++;
                    }
                } else {
                    if ($scoreEquipe1 < $scoreEquipe2) {
                        $totalPoints += 3;
                        $matchesGagne[$equipeId]++;
                    } elseif ($scoreEquipe1 === $scoreEquipe2) {
                        $totalPoints++;
                        $matchesNul[$equipeId]++;
                        $matchesPerdu[$equipeId]++;
                    }
                }
            }
            return $totalPoints;
        }

        // Calculer le score de chaque équipe
        foreach ($equipes as $equipe) {
            $scores[$equipe->getId()] = getEquipeScore($equipe->getId(), $this->repo, $matches, $matchesGagne, $matchesNul, $matchesPerdu);
        }

        // tri du score par ordre décroissant 
        usort($equipes, function($a, $b) use ($scores) {
            return $scores[$b->getId()] <=> $scores[$a->getId()];
        });
        

        return $this->render('equipe/index.html.twig', [
            'equipes' => $equipes,
            'scores' => $scores,
            'matches' => $matches,
            'matchesGagne' => $matchesGagne,
            'matchesNul' => $matchesNul,
            'matchesPerdu' => $matchesPerdu,
        ]);
    }

    

//-------------------------------------------------------------------------------------------------------------



    #[Route('/new', name: 'app_equipe_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $equipe = new Equipe;
        $form = $this->createForm(EquipeType::class, $equipe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($equipe);
            $entityManager->flush();

            return $this->redirectToRoute('app_equipe_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('equipe/new.html.twig', [
            'equipe' => $equipe,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_equipe_show', methods: ['GET'])]
    public function show(Equipe $equipe): Response
    {
        return $this->render('equipe/show.html.twig', [
            'equipe' => $equipe,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_equipe_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Equipe $equipe, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(EquipeType::class, $equipe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_equipe_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('equipe/edit.html.twig', [
            'equipe' => $equipe,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_equipe_delete', methods: ['POST'])]
    public function delete(Request $request, Equipe $equipe, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$equipe->getId(), $request->getPayload()->get('_token'))) {
            $entityManager->remove($equipe);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_equipe_index', [], Response::HTTP_SEE_OTHER);
    }


    
    // #[Route('/cards_equipes', name: 'app_cards_equipes', methods: ['GET'])]
    // public function cardsEquipes(EquipeRepository $equipeRepository): Response
    // {
    //     $equipes = $equipeRepository->findAll();

    //     return $this->render('equipe/cards_equipes.html.twig', [
    //         'equipes' => $equipes,
    //     ]);
    // }

}
