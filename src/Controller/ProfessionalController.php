<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProfessionalController extends AbstractController
{
    /**
     * @Route("/professional", name="app_professional")
     */
    public function professionalPage()
    {
        return $this->render('professional/professional.html.twig', [
            'controller_name' => 'ProfessionalController',
        ]);
    }
}
