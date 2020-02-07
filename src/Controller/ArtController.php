<?php

namespace App\Controller;

use App\Entity\UploadFile;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ArtController extends AbstractController
{
    /**
     * @Route("/art/physical", name="app_art_physical")
     */
    public function physicalArt(EntityManagerInterface $em)
    {
        $repository = $em->getRepository(UploadFile::class);
        $artwork = $repository->findAllSortedPriorityPhysicalArt();
        return $this->render('art/physical.html.twig', [
            'artwork'=>$artwork
        ]);
    }
    /**
     * @Route("/art/digital", name="app_art_digital")
     */
    public function digitalArt(EntityManagerInterface $em)
    {
        $repository = $em->getRepository(UploadFile::class);
        $artwork = $repository->findAllSortedPriorityDigitalArt();
        return $this->render('art/digital.html.twig', [
            'artwork'=>$artwork
        ]);
    }
}
