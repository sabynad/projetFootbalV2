<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Entity\Equipe;
use App\Entity\Joueur;
use App\Entity\Opposition;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{

    #[Route('/admin', name: 'admin.index')]
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('ProjetFootbalV2  Administration')
            ->renderContentMaximized();
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Users', 'fa-solid fa-circle-user', User::class);
        yield MenuItem::linkToCrud('Equipes', 'fa-solid fa-hand-peace', Equipe::class);
        yield MenuItem::linkToCrud('Joueurs', 'fa-solid fa-people-group', Joueur::class);
        yield MenuItem::linkToCrud('Oppositions', 'fa-solid fa-futbol', Opposition::class);
    }
}
