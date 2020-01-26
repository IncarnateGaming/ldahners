<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ArtController extends AbstractController
{
    /**
     * @Route("/art/physical", name="app_art_physical")
     */
    public function physicalArt()
    {
        return $this->render('art/physical.html.twig', [
            'controller_name' => 'ArtController',
        ]);
    }
    /**
     * @Route("/art/digital", name="app_art_digital")
     */
    public function digitalArt()
    {
        return $this->render('art/digital.html.twig', [
            'controller_name' => 'ArtController',
        ]);
    }
}
