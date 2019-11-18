<?php

namespace App\Controller;

use App\Entity\Episode;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class EpisodeController extends AbstractController
{
    /**
     * @Route("/episodes", name="episodes")
     */
    public function index()
    {
        $em = $this->getDoctrine()->getManager();
        $episodes = $em->getRepository(Episode::class)->findAll();
        return $this->render('episode/episodeList.html.twig', [
            'episodes' => $episodes,
        ]);
    }
}
