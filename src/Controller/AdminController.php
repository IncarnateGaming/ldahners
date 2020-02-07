<?php

namespace App\Controller;

use App\Entity\Book;
use App\Entity\Merchandise;
use App\Entity\Review;
use App\Entity\Series;
use App\Entity\SeriesReview;
use App\Entity\User;
use App\Form\BookType;
use App\Form\MerchandiseType;
use App\Form\RegistrationFormType;
use App\Form\ReviewType;
use App\Form\SeriesReviewType;
use App\Form\SeriesType;
use App\Security\LoginFormAuthenticator;
use Doctrine\ORM\EntityManagerInterface;
use phpDocumentor\Reflection\Types\Integer;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Guard\GuardAuthenticatorHandler;

/**
 * @IsGranted("ROLE_ADMIN")
 */
class AdminController extends AbstractController
{
    /**
     * @Route("/admin/index", name="app_admin_index")
     */
    public function indexPage(){
        return $this->render('admin/adminIndex.html.twig', [
        ]);
    }
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
            $user->setRoles(array("ROLE_ADMIN"));
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
        return $this->render('admin/newSeries.html.twig', [
            'seriesForm' => $form->createView(),
        ]);
    }
    /**
     * @Route("/admin/list/series", name="app_admin_list_series")
     */
    public function listSeries(EntityManagerInterface $em){
        $series = $em->getRepository(Series::class)->findAllSortedPriority();
        return $this->render('admin/listSeries.html.twig', [
            'series' => $series,
        ]);
    }
    /**
     * @Route("/admin/edit/series/{id}", name="app_admin_edit_serial")
     */
    public function editSerial(EntityManagerInterface $em ,Request $request, Series $series){
        $form = $this->createForm(SeriesType::class,$series);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            /** @var Series $series */
            $series = $form->getData();
            $em->persist($series);
            $em->flush();
            $this->addFlash('success',$series->getName().' has been edited!');
            return $this->redirectToRoute('app_admin_list_series');
        }
        return $this->render('admin/editSerial.html.twig', [
            'seriesForm' => $form->createView(),
        ]);
    }
    /**
     * @Route("/admin/delete/series/{id}", name="app_admin_delete_serial")
     */
    public function deleteSerial(EntityManagerInterface $em, $id){
        $serial = $em->getRepository(Series::class)->find($id);
        $em->remove($serial);
        $em->flush();
        return $this->redirectToRoute('app_admin_list_series');
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
        return $this->render('admin/newBook.html.twig', [
            'bookForm' => $form->createView(),
        ]);
    }
    /**
     * @Route("/admin/list/books", name="app_admin_list_books")
     */
    public function listBooks(EntityManagerInterface $em){
        $books = $em->getRepository(Book::class)->findAllSortedPriority();
        return $this->render('admin/listBooks.html.twig', [
            'books' => $books,
        ]);
    }
    /**
     * @Route("/admin/edit/book/{id}", name="app_admin_edit_book")
     */
    public function editBook(EntityManagerInterface $em ,Request $request, Book $book){
        $form = $this->createForm(BookType::class,$book);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $book = $form->getData();
            $em->persist($book);
            $em->flush();
            $this->addFlash('success','Book Edited!');
            return $this->redirectToRoute('app_admin_list_books');
        }
        return $this->render('admin/editBook.html.twig', [
            'bookForm' => $form->createView(),
        ]);
    }
    /**
     * @Route("/admin/delete/book/{id}", name="app_admin_delete_book")
     */
    public function deleteBook(EntityManagerInterface $em, $id){
        $book = $em->getRepository(Book::class)->find($id);
        $em->remove($book);
        $em->flush();
        return $this->redirectToRoute('app_admin_list_books');
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
        return $this->render('admin/newMerchandise.html.twig', [
            'merchandiseForm' => $form->createView(),
        ]);
    }
    /**
     * @Route("/admin/list/merchandise", name="app_admin_list_merchandise")
     */
    public function listMerchandise(EntityManagerInterface $em){
        $merchandise = $em->getRepository(Merchandise::class)->findAllSortedPriority();
        return $this->render('admin/listMerchandise.html.twig', [
            'merchandise' => $merchandise,
        ]);
    }
    /**
     * @Route("/admin/edit/merchandise/{id}", name="app_admin_edit_merchandise")
     */
    public function editMerchandise(EntityManagerInterface $em ,Request $request, Merchandise $merchandise){
        $form = $this->createForm(MerchandiseType::class,$merchandise);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $merchandise = $form->getData();
            $em->persist($merchandise);
            $em->flush();
            $this->addFlash('success','Merchandise edited!');
            return $this->redirectToRoute('app_admin_list_merchandise');
        }
        return $this->render('admin/editMerchandise.html.twig', [
            'merchandiseForm' => $form->createView(),
        ]);
    }
    /**
     * @Route("/admin/delete/merchandise/{id}", name="app_admin_delete_merchandise")
     */
    public function deleteMerchandise(EntityManagerInterface $em, $id){
        $merchandise = $em->getRepository(Merchandise::class)->find($id);
        $em->remove($merchandise);
        $em->flush();
        return $this->redirectToRoute('app_admin_list_merchandise');
    }
    /**
     * @Route("/admin/new/review", name="app_admin_new_review")
     */
    public function newReview(EntityManagerInterface $em ,Request $request){
        $form = $this->createForm(ReviewType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $review = $form->getData();
            $em->persist($review);
            $em->flush();
            $this->addFlash('success','New Book Review is added!');
            return $this->redirectToRoute('app_admin_list_review');
        }
        return $this->render('admin/newReview.html.twig', [
            'reviewForm' => $form->createView(),
        ]);
    }
    /**
     * @Route("/admin/list/review", name="app_admin_list_review")
     */
    public function listReview(EntityManagerInterface $em){
        $review = $em->getRepository(Review::class)->findAllSortedPriority();
        return $this->render('admin/listReview.html.twig', [
            'review' => $review,
        ]);
    }
    /**
     * @Route("/admin/edit/review/{id}", name="app_admin_edit_review")
     */
    public function editReview(EntityManagerInterface $em ,Request $request, Review $review){
        $form = $this->createForm(ReviewType::class,$review);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $review = $form->getData();
            $em->persist($review);
            $em->flush();
            $this->addFlash('success','Book Review Edited!');
            return $this->redirectToRoute('app_admin_list_review');
        }
        return $this->render('admin/editReview.html.twig', [
            'reviewForm' => $form->createView(),
        ]);
    }
    /**
     * @Route("/admin/delete/review/{id}", name="app_admin_delete_review")
     */
    public function deleteReview(EntityManagerInterface $em, $id){
        $review = $em->getRepository(Review::class)->find($id);
        $em->remove($review);
        $em->flush();
        return $this->redirectToRoute('app_admin_list_review');
    }
    /**
     * @Route("/admin/new/seriesReview", name="app_admin_new_seriesReview")
     */
    public function newSeriesReview(EntityManagerInterface $em ,Request $request){
        $form = $this->createForm(SeriesReviewType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $review = $form->getData();
            $em->persist($review);
            $em->flush();
            $this->addFlash('success','New Series Review is added!');
            return $this->redirectToRoute('app_admin_list_seriesReview');
        }
        return $this->render('admin/newSeriesReview.html.twig', [
            'seriesReviewForm' => $form->createView(),
        ]);
    }
    /**
     * @Route("/admin/list/seriesReview", name="app_admin_list_seriesReview")
     */
    public function listSeriesReview(EntityManagerInterface $em){
        $review = $em->getRepository(SeriesReview::class)->findAllSortedPriority();
        return $this->render('admin/listSeriesReview.html.twig', [
            'review' => $review,
        ]);
    }
    /**
     * @Route("/admin/edit/seriesReview/{id}", name="app_admin_edit_seriesReview")
     */
    public function editSeriesReview(EntityManagerInterface $em ,Request $request, SeriesReview $seriesReview){
        $form = $this->createForm(SeriesReviewType::class,$seriesReview);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $seriesReview = $form->getData();
            $em->persist($seriesReview);
            $em->flush();
            $this->addFlash('success','New Series Review is added!');
            return $this->redirectToRoute('app_admin_list_seriesReview');
        }
        return $this->render('admin/editSeriesReview.html.twig', [
            'seriesReviewForm' => $form->createView(),
        ]);
    }
    /**
     * @Route("/admin/delete/seriesReview/{id}", name="app_admin_delete_seriesReview")
     */
    public function deleteSeriesReview(EntityManagerInterface $em, $id){
        $seriesReview = $em->getRepository(SeriesReview::class)->find($id);
        $em->remove($seriesReview);
        $em->flush();
        return $this->redirectToRoute('app_admin_list_seriesReview');
    }
}
