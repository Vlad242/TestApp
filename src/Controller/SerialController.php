<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SerialController extends AbstractController
{
    /**
     * @Route("/serial", name="serial")
     */
    public function index()
    {
        return $this->render('serial/index.html.twig', [
            'controller_name' => 'SerialController',
        ]);
    }
}
