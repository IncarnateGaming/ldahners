<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PolicyController extends AbstractController
{
    /**
     * @Route("/policy/website", name="app_policy_website")
     */
    public function websitePolicy()
    {
        return $this->render('policy/website.html.twig', [
            'controller_name' => 'PolicyController',
        ]);
    }
    /**
     * @Route("/policy/reject", name="app_policy_reject")
     */
    public function rejectPolicy()
    {
        return $this->render('policy/reject.html.twig', [
            'controller_name' => 'PolicyController',
        ]);
    }
}
