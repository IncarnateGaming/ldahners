<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\ChangePasswordType;
use App\Form\RegistrationFormType;
use App\Security\LoginFormAuthenticator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Guard\GuardAuthenticatorHandler;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * @IsGranted("IS_AUTHENTICATED_FULLY")
 */
class AccountController extends AbstractController
{
    /**
     * @Route("/account/changePassword", name="app_account_changePassword")
     */
    public function changePassword(Request $request, UserPasswordEncoderInterface $passwordEncoder, GuardAuthenticatorHandler $guardHandler, LoginFormAuthenticator $authenticator, EntityManagerInterface $em): Response
    {
        $user = $this->getUser();
        $form = $this->createForm(ChangePasswordType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $oldPassword = $form->get('oldPassword')->getData();
            $newPassword = $form->get('newPassword')->getData();
            $passwordCheck = $passwordEncoder->isPasswordValid($user,$oldPassword);
            if($passwordCheck) {
                // encode the plain password
                $user->setPassword(
                    $passwordEncoder->encodePassword(
                        $user,
                        $newPassword
                    )
                );

                $em->persist($user);
                $em->flush();
                $this->addFlash('success','New Password Set!');
                return $this->redirectToRoute('app_home');
            }else{
                $this->addFlash('failure','Old Password Does Not Match');
            }

            // do anything else you need here, like send an email

        }

        return $this->render('account/changePassword.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
