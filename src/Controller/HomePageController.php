<?php

namespace App\Controller;

use App\Repository\OppositionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomePageController extends AbstractController
{
    #[Route('/', name: 'app_home_page')]
    public function index(OppositionRepository $oppositionRepository): Response
    {
        // / Appel de la méthode lastMatchSixFours pour récupérer le dernier match de Six-Fours
        $lastMatchSixFours = $oppositionRepository->lastMatchSixFours();

        return $this->render('home_page/index.html.twig', [
            'controller_name' => 'HomePageController',
            'lastMatchSixFours' => $lastMatchSixFours,
        ]);
    }

  
}
