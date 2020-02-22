<?php

namespace App\Controller;

use App\Entity\Book;
use App\Entity\Series;
use App\Entity\Updates;
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
        $updates = $em->getRepository(Updates::class)->findAllSortedPriority();
        return $this->render('stories/books.html.twig', [
            'controller_name' => 'StoriesController',
            'series' => $series,
            'updates' => $updates,
        ]);
    }
    /**
     * @Route("/stories/book/{id}", name="app_story")
     */
    public function storyPage(EntityManagerInterface $em,$id)
    {
        $book = $em->getRepository(Book::class)->find($id);
        return $this->render('stories/book.html.twig', [
            'book' => $book,
        ]);
    }
    /**
     * @Route("/stories/series/{id}", name="app_serial")
     */
    public function seriesPage(EntityManagerInterface $em,$id)
    {
        $serial = $em->getRepository(Series::class)->find($id);
        return $this->render('stories/serial.html.twig', [
            'serial' => $serial,
        ]);
    }
}
