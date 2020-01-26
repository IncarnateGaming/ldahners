<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class StoriesController extends AbstractController
{
    /**
     * @Route("/stories", name="app_stories")
     */
    public function index()
    {
        return $this->render('stories/books.html.twig', [
            'controller_name' => 'StoriesController',
        ]);
    }
}
