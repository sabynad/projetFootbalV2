<?php

namespace App\Controller;

use App\Controller\EquipeController;
use App\Repository\EquipeRepository;
use App\Repository\ArticleRepository;
use App\Repository\OppositionRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomePageController extends AbstractController
{


    #[Route('/', name: 'app_home_page')]
    public function index(OppositionRepository $oppositionRepository, EquipeRepository $equipeRepository, ArticleRepository $articleRepository): Response
    {
        
        // / Appel de la méthode lastMatchSixFours pour récupérer le dernier match de Six-Fours et les affichers à la vue
        $lastMatchSixFours = $oppositionRepository->lastMatchSixFours();
        
        // Récupérer les résultats des matchs pour chaque équipe
        $resultsByEquipe = [];
        $equipes = $equipeRepository->findAll();
        foreach ($equipes as $equipe) {
            $resultsByEquipe[$equipe->getId()] = $oppositionRepository->getOppositionByEquipe($equipe->getId());
        }
        
        

        return $this->render('home_page/index.html.twig', [
            'controller_name' => 'HomePageController',
            'lastMatchSixFours' => $lastMatchSixFours,
            'equipes' => $equipeRepository->findAll(),

            
            
            'articles' => $articleRepository->findAll(),
            // 'articles' => $articleRepository->findBy(array('rubrique_id' => 1)),
        ]);
    }

  
}
