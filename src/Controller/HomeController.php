<?php

namespace App\Controller;

use App\Entity\Updates;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="app_home")
     * @param EntityManagerInterface $em
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(EntityManagerInterface $em)
    {
        $updates = $em->getRepository(Updates::class)->findAllSortedPriority();
        return $this->render('home.html.twig', [
            'controller_name' => 'HomeController',
            'updates' => $updates,
        ]);
    }
}
