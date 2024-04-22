<?php

namespace App\Controller;

use App\Controller\EquipeController;
use App\Repository\EquipeRepository;
use App\Repository\OppositionRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class HomePageController extends AbstractController
{


    #[Route('/', name: 'app_home_page')]
    public function index(OppositionRepository $oppositionRepository, EquipeRepository $equipeRepository): Response
    {
        
        // / Appel de la méthode lastMatchSixFours pour récupérer le dernier match de Six-Fours et les affichers à la vue
        $lastMatchSixFours = $oppositionRepository->lastMatchSixFours();
        
        
        

        return $this->render('home_page/index.html.twig', [
            'controller_name' => 'HomePageController',
            'lastMatchSixFours' => $lastMatchSixFours,
            'equipes' => $equipeRepository->findAll(),
            // 'scores' => $scores,
            
        ]);
    }

  
}
