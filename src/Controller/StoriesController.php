<?php

namespace App\Controller;

use App\Entity\Series;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class StoriesController extends AbstractController
{
    /**
     * @Route("/stories", name="app_stories")
     */
    public function index(EntityManagerInterface $em)
    {
        $series = $em->getRepository(Series::class)->findAllSortedPriority();
        return $this->render('stories/books.html.twig', [
            'controller_name' => 'StoriesController',
            'series' => $series,
        ]);
    }
}
