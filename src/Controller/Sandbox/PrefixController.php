<?php

namespace App\Controller\Sandbox;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Response;

final class PrefixController extends AbstractController
{
    #[Route('/sandbox/prefix', name: 'sandbox_prefix')]
    public function indexAction(): Response
    {
        return new Response('<body>Hello World!</body>');
    }

    #[Route('/sandbox/prefix/hello2', name: 'sandbox_prefix_hello2')]
    public function hello2Action(): Response
    {
        return $this->render('sandbox/prefix/hello2.html.twig');
    }

    #[Route('/sandbox/prefix/hello3', name: 'sandbox_prefix_hello3')]
    public function hello3Action(): Response
    {
        $args = array(
            'prenom' => 'Romain',
            'jeux' => ['WOW', 'TWW', 'CS']
        );
        return $this->render('sandbox/prefix/hello3.html.twig', $args);
    }
    #[Route('/sandbox/prefix/hello4', name: 'sandbox_prefix_hello4')]
    public function hello4Action(): Response
    {
        $args = array(
            'prenom' => 'Romain',
            'jeux' => ['WOW', 'TWW', 'CS']
        );
        return $this->render('sandbox/prefix/hello4.html.twig', $args);
    }

}
