<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SongsController extends AbstractController
{
    /**
     * @Route("/songs/vocal", name="app_songs_vocal")
     */
    public function songsVocal()
    {
        return $this->render('songs/vocal.html.twig', [
            'controller_name' => 'SongsController',
        ]);
    }
    /**
     * @Route("/songs/instrumental", name="app_songs_instrumental")
     */
    public function songsInstrumental()
    {
        return $this->render('songs/instrumental.html.twig', [
            'controller_name' => 'SongsController',
        ]);
    }
}
