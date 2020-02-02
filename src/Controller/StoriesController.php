<?php

namespace App\Controller;

use App\Entity\Book;
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
    /**
     * @Route("/stories/{id}", name="app_story")
     */
    public function storyPage(EntityManagerInterface $em,$id)
    {
        $book = $em->getRepository(Book::class)->find($id);
        return $this->render('stories/book.html.twig', [
            'book' => $book,
        ]);
    }
}
