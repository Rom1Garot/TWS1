<?php

namespace App\Controller\Sandbox;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Response;

final class OverviewController extends AbstractController
{
    #[Route('/sandbox/overview', name: 'sandbox_overview')]
    public function indexAction(): Response
    {
        return new Response('<body>Hello World!</body>');
    }

    #[Route('/sandbox/overview/hello2', name: 'sandbox_overview_hello2')]
    public function hello2Action(): Response
    {
        return $this->render('sandbox/overview/hello2.html.twig');
    }

    #[Route('/sandbox/overview/hello3', name: 'sandbox_overview_hello3')]
    public function hello3Action(): Response
    {
        $args = array(
            'prenom' => 'Romain',
            'jeux' => ['WOW', 'TWW', 'CS']
        );
        return $this->render('sandbox/overview/hello3.html.twig', $args);
    }
    #[Route('/sandbox/overview/hello4', name: 'sandbox_overview_hello4')]
    public function hello4Action(): Response
    {
        $args = array(
            'prenom' => 'Romain',
            'jeux' => ['WOW', 'TWW', 'CS']
        );
        return $this->render('sandbox/overview/hello4.html.twig', $args);
    }

}
