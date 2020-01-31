<?php

namespace App\Controller;

use App\Entity\Merchandise;
use App\Entity\Series;
use App\Entity\User;
use App\Form\BookType;
use App\Form\MerchandiseType;
use App\Form\RegistrationFormType;
use App\Form\SeriesType;
use App\Security\LoginFormAuthenticator;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Guard\GuardAuthenticatorHandler;

/**
 */
//* @IsGranted("ROLE_ADMIN")
class AdminController extends AbstractController
{
    /**
     * @Route("/admin/register", name="app_admin_register")
     */
    public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder, GuardAuthenticatorHandler $guardHandler, LoginFormAuthenticator $authenticator): Response
    {
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setPassword(
                $passwordEncoder->encodePassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            $user->setAgreedToTermsOn(new \DateTime("now"));
            $user->setRoles(array("USER_ADMIN"));
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            // do anything else you need here, like send an email

            return $guardHandler->authenticateUserAndHandleSuccess(
                $user,
                $request,
                $authenticator,
                'main' // firewall name in security.yaml
            );
        }

        return $this->render('admin/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }
    /**
     * @Route("/admin/new/series", name="app_admin_new_series")
     */
    public function newSeries(EntityManagerInterface $em ,Request $request){
        $form = $this->createForm(SeriesType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $series = $form->getData();
            $em->persist($series);
            $em->flush();
            $this->addFlash('success','New Series is added!');
            return $this->redirectToRoute('app_admin_new_book');
        }
        $form->handleRequest($request);
        return $this->render('admin/newSeries.html.twig', [
            'seriesForm' => $form->createView(),
        ]);
    }
    /**
     * @Route("/admin/new/book", name="app_admin_new_book")
     */
    public function newBook(EntityManagerInterface $em ,Request $request){
        $form = $this->createForm(BookType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $book = $form->getData();
            $em->persist($book);
            $em->flush();
            $this->addFlash('success','New Book is added!');
            return $this->redirectToRoute('app_stories');
        }
        $form->handleRequest($request);
        return $this->render('admin/newBook.html.twig', [
            'bookForm' => $form->createView(),
        ]);
    }
    /**
     * @Route("/admin/new/merchandise", name="app_admin_new_merchandise")
     */
    public function newMerchandise(EntityManagerInterface $em ,Request $request){
        $form = $this->createForm(MerchandiseType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $merchandise = $form->getData();
            $em->persist($merchandise);
            $em->flush();
            $this->addFlash('success','New Merchandise is added!');
            return $this->redirectToRoute('app_stories');
        }
        $form->handleRequest($request);
        return $this->render('admin/newMerchandise.html.twig', [
            'merchandiseForm' => $form->createView(),
        ]);
    }
}
