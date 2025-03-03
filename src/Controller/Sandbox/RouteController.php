<?php

namespace App\Controller\Sandbox;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/sandbox/route', name: 'sandbox_route')]
class RouteController extends AbstractController
{
    #[Route('', name: '')]
    public function indexAction(): Response {
        return new Response('<body>RouteController</body>');
    }
    #[Route('/with-variable/{age}', name: '_with_variable')]
    public function withVariableAction(int $age): Response
    {
        return new Response('<body>Route::withVariable : age =' . $age . '</body>');
    }

    #[Route('/with-default/{age}', name: '_with_default', defaults: ['age' => 18])]
    public function withDefaultAction(int $age): Response
    {
        dump($age);
        return new Response('<body>Route::withDefault : age =' . $age . '</body>');
    }

    #[Route('/with-constraint/{age}', name: '_with_constraint', requirements: ['age' => '0|[0-9]\d*'], defaults: ['age' => 18])]
    public function withConstraintAction(int $age): Response
    {
        dump($age);
        return new Response('<body>Route::withConstraint : age =' . $age . '</body>');
    }
    #[Route('/test1/{year}/{month}/{filename}.{ext}', name: '_test1')]
    public function _test1Action(int $year, int $month, string $filename, string $ext): Response
    {
        $args = array(
            'title' => 'test1',
            'year' => $year,
            'month' => $month,
            'filename' => $filename,
            'ext' => $ext
        );
        return $this->render('Sandbox/Route/test1234.html.twig', $args);
    }

    #[Route('/test2/{year}/{month}/{filename}.{ext}', name: '_test2', requirements: ['year' => '[1-9]\d{0,3}', 'month' => '(0?[1-9])|(1[0-2])', 'filename' => '[-a-zA-Z]+', 'ext' => 'jpg|jpeg|png|ppm'])]
    public function _test2Action(int $year, int $month, string $filename, string $ext): Response
    {
        $args = array(
            'title' => 'test2',
            'year' => $year,
            'month' => $month,
            'filename' => $filename,
            'ext' => $ext
        );
        return $this->render('Sandbox/Route/test1234.html.twig', $args);
    }

    #[Route('/test3/{year}/{month}/{filename}.{ext}', name: '_test3', requirements: ['year' => '[1-9]\d{0,3}', 'month' => '(0?[1-9])|(1[0-2])', 'filename' => '[-a-zA-Z]+', 'ext' => 'jpg|jpeg|png|ppm'], defaults : ['ext' => 'png'])]
    public function _test3Action(int $year, int $month, string $filename, string $ext): Response
    {
        $args = array(
            'title' => 'test3',
            'year' => $year,
            'month' => $month,
            'filename' => $filename,
            'ext' => $ext
        );
        return $this->render('Sandbox/Route/test1234.html.twig', $args);
    }

    #[Route('/test4/{year}/{month}/{filename}.{ext}', name: '_test4', requirements: ['year' => '[1-9]\d{0,3}', 'month' => '(0?[1-9])|(1[0-2])', 'filename' => '[-a-zA-Z]+', 'ext' => 'jpg|jpeg|png|ppm'], defaults : ['ext' => 'png', 'month' => 1])]
    public function _test4Action(int $year, int $month, string $filename, string $ext): Response
    {
        $args = array(
            'title' => 'test4',
            'year' => $year,
            'month' => $month,
            'filename' => $filename,
            'ext' => $ext
        );
        return $this->render('Sandbox/Route/test1234.html.twig', $args);
    }

    #[Route('/test4/{year}', name: '_test4bis', requirements: ['year' => '[1-9]\d{0,3}', 'month' => '(0?[1-9])|(1[0-2])', 'filename' => '[-a-zA-Z]+', 'ext' => 'jpg|jpeg|png|ppm'], defaults : ['ext' => 'png', 'month' => 1])]
    public function _test4bisAction(int $year, int $month, string $filename, string $ext): Response
    {
        $args = array(
            'title' => 'test4',
            'year' => $year,
            'month' => $month,
            'filename' => $filename,
            'ext' => $ext
        );
        return $this->render('Sandbox/Route/test4bis.html.twig', $args);
    }

    #[Route('/redirect1', name: '_redirect1')]
    public function _redirect1Action(): Response
    {
        return $this->redirectToRoute('sandbox_prefix_hello2');
    }
}
