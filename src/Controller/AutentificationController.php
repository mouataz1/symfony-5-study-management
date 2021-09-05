<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AutentificationController extends AbstractController
{
    /**
     * @Route("/", name="autentification")
     */
    public function index(): Response
    {
        return $this->redirect('/login');
    }
}
