<?php

namespace App\Controller;

use App\Entity\Opposition;
use App\Form\OppositionType;
use App\Repository\OppositionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/opposition')]
class OppositionController extends AbstractController
{
    #[Route('/', name: 'app_opposition_index', methods: ['GET'])]
    public function index(OppositionRepository $oppositionRepository): Response
    {
        return $this->render('opposition/index.html.twig', [
            'oppositions' => $oppositionRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_opposition_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $opposition = new Opposition();
        $form = $this->createForm(OppositionType::class, $opposition);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($opposition);
            $entityManager->flush();

            return $this->redirectToRoute('app_opposition_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('opposition/new.html.twig', [
            'opposition' => $opposition,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_opposition_show', methods: ['GET'])]
    public function show(Opposition $opposition): Response
    {
        return $this->render('opposition/show.html.twig', [
            'opposition' => $opposition,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_opposition_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Opposition $opposition, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(OppositionType::class, $opposition);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_opposition_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('opposition/edit.html.twig', [
            'opposition' => $opposition,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_opposition_delete', methods: ['POST'])]
    public function delete(Request $request, Opposition $opposition, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$opposition->getId(), $request->getPayload()->get('_token'))) {
            $entityManager->remove($opposition);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_opposition_index', [], Response::HTTP_SEE_OTHER);
    }
}
