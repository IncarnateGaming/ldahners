<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CharityController extends AbstractController
{
    /**
     * @Route("/charity", name="app_charity")
     */
    public function charityOverview()
    {
        return $this->render('charity/index.html.twig', [
            'controller_name' => 'CharityController',
        ]);
    }
}
