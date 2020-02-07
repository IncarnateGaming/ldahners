<?php

namespace App\Controller;

use App\Entity\UploadFile;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SongsController extends AbstractController
{
    /**
     * @Route("/songs/vocal", name="app_songs_vocal")
     */
    public function songsVocal(EntityManagerInterface $em)
    {
        $repository = $em->getRepository(UploadFile::class);
        $songsAudio = $repository->findAllSortedPriorityVocalMusic();
        $songsVideo = $repository->findAllSortedPriorityVocalVideos();
        return $this->render('songs/vocal.html.twig', [
            'audio'=>$songsAudio,
            'video'=>$songsVideo
        ]);
    }
    /**
     * @Route("/songs/instrumental", name="app_songs_instrumental")
     */
    public function songsInstrumental(EntityManagerInterface $em)
    {
        $repository = $em->getRepository(UploadFile::class);
        $songsAudio = $repository->findAllSortedPriorityInstrumentalMusic();
        $songsVideo = $repository->findAllSortedPriorityInstrumentalVideos();
        return $this->render('songs/instrumental.html.twig', [
            'audio'=>$songsAudio,
            'video'=>$songsVideo
        ]);
    }
}
