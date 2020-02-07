<?php

namespace App\Controller;

use App\Entity\UploadFile;
use App\Form\UploadFileType;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @IsGranted("ROLE_ADMIN")
 */
class UploadFileController extends AbstractController
{
    /**
     * @Route("/admin/new/physicalArt", name="app_admin_new_physicalArt")
     */
    public function newFileUploadPhysicalArt(EntityManagerInterface $em ,Request $request){
        $form = $this->createForm(UploadFileType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            /** @var UploadFile $file */
            $file = $form->getData();
            $file->setType1('physical');
            $em->persist($file);
            $em->flush();
            $this->addFlash('success','New Physical Art is added!');
            return $this->redirectToRoute('app_admin_list_physicalArt');
        }
        return $this->render('admin/newUploadFile.html.twig', [
            'type' => 'physicalArt',
            'label' => 'Physical Art',
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/admin/list/physicalArt", name="app_admin_list_physicalArt")
     */
    public function listFileUploadPhysicalArt(EntityManagerInterface $em){
        $files = $em->getRepository(UploadFile::class)->findAllSortedPriorityPhysicalArt();
        return $this->render('admin/listUploadFile.html.twig', [
            'type' => 'physicalArt',
            'label' => 'Physical Art',
            'files' => $files,
        ]);
    }
    /**
     * @Route("/admin/edit/physicalArt/{id}", name="app_admin_edit_physicalArt")
     */
    public function editFileUploadPhysicalArt(EntityManagerInterface $em ,Request $request, UploadFile $uploadFile){
        $form = $this->createForm(UploadFileType::class,$uploadFile);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $uploadFile = $form->getData();
            $em->persist($uploadFile);
            $em->flush();
            $this->addFlash('success','Physical Art is Edited!');
            return $this->redirectToRoute('app_admin_list_physicalArt');
        }
        return $this->render('admin/editUploadFile.html.twig', [
            'type' => 'physicalArt',
            'label' => 'Physical Art',
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/admin/delete/physicalArt/{id}", name="app_admin_delete_physicalArt")
     */
    public function deleteFileUploadPhysicalArt(EntityManagerInterface $em, $id){
        $uploadFile = $em->getRepository(UploadFile::class)->find($id);
        $em->remove($uploadFile);
        $em->flush();
        return $this->redirectToRoute('app_admin_list_physicalArt');
    }
    /**
     * @Route("/admin/new/digitalArt", name="app_admin_new_digitalArt")
     */
    public function newFileUploadDigitalArt(EntityManagerInterface $em ,Request $request){
        $form = $this->createForm(UploadFileType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            /** @var UploadFile $file */
            $file = $form->getData();
            $file->setType1('digital');
            $em->persist($file);
            $em->flush();
            $this->addFlash('success','New Digital Art is added!');
            return $this->redirectToRoute('app_admin_list_digitalArt');
        }
        return $this->render('admin/newUploadFile.html.twig', [
            'type' => 'digitalArt',
            'label' => 'Digital Art',
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/admin/list/digitalArt", name="app_admin_list_digitalArt")
     */
    public function listFileUploadDigitalArt(EntityManagerInterface $em){
        $files = $em->getRepository(UploadFile::class)->findAllSortedPriorityDigitalArt();
        return $this->render('admin/listUploadFile.html.twig', [
            'type' => 'digitalArt',
            'label' => 'Digital Art',
            'files' => $files,
        ]);
    }
    /**
     * @Route("/admin/edit/digitalArt/{id}", name="app_admin_edit_digitalArt")
     */
    public function editFileUploadDigitalArt(EntityManagerInterface $em ,Request $request, UploadFile $uploadFile){
        $form = $this->createForm(UploadFileType::class,$uploadFile);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $uploadFile = $form->getData();
            $em->persist($uploadFile);
            $em->flush();
            $this->addFlash('success','Digital Art is Edited!');
            return $this->redirectToRoute('app_admin_list_digitalArt');
        }
        return $this->render('admin/editUploadFile.html.twig', [
            'type' => 'digitalArt',
            'label' => 'Digital Art',
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/admin/delete/digitalArt/{id}", name="app_admin_delete_digitalArt")
     */
    public function deleteFileUploadDigitalArt(EntityManagerInterface $em, $id){
        $uploadFile = $em->getRepository(UploadFile::class)->find($id);
        $em->remove($uploadFile);
        $em->flush();
        return $this->redirectToRoute('app_admin_list_digitalArt');
    }
    /**
     * @Route("/admin/new/insMusic", name="app_admin_new_insMusic")
     */
    public function newFileUploadInsMusic(EntityManagerInterface $em ,Request $request){
        $form = $this->createForm(UploadFileType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            /** @var UploadFile $file */
            $file = $form->getData();
            $file->setType1('insMusic');
            $em->persist($file);
            $em->flush();
            $this->addFlash('success','New Instrumental Music is added!');
            return $this->redirectToRoute('app_admin_list_insMusic');
        }
        return $this->render('admin/newUploadFile.html.twig', [
            'type' => 'insMusic',
            'label' => 'Instrumental Music',
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/admin/list/insMusic", name="app_admin_list_insMusic")
     */
    public function listFileUploadInsMusic(EntityManagerInterface $em){
        $files = $em->getRepository(UploadFile::class)->findAllSortedPriorityInstrumentalMusic();
        return $this->render('admin/listUploadFileAudio.html.twig', [
            'type' => 'insMusic',
            'label' => 'Instrumental Music',
            'files' => $files,
        ]);
    }
    /**
     * @Route("/admin/edit/insMusic/{id}", name="app_admin_edit_insMusic")
     */
    public function editFileUploadInsMusic(EntityManagerInterface $em ,Request $request, UploadFile $uploadFile){
        $form = $this->createForm(UploadFileType::class,$uploadFile);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $uploadFile = $form->getData();
            $em->persist($uploadFile);
            $em->flush();
            $this->addFlash('success','Instrumental Music is Edited!');
            return $this->redirectToRoute('app_admin_list_insMusic');
        }
        return $this->render('admin/editUploadFile.html.twig', [
            'type' => 'insMusic',
            'label' => 'Instrumental Music',
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/admin/delete/insMusic/{id}", name="app_admin_delete_insMusic")
     */
    public function deleteFileUploadInsMusic(EntityManagerInterface $em, $id){
        $uploadFile = $em->getRepository(UploadFile::class)->find($id);
        $em->remove($uploadFile);
        $em->flush();
        return $this->redirectToRoute('app_admin_list_insMusic');
    }
    /**
     * @Route("/admin/new/insVideo", name="app_admin_new_insVideo")
     */
    public function newFileUploadInsVideo(EntityManagerInterface $em ,Request $request){
        $form = $this->createForm(UploadFileType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            /** @var UploadFile $file */
            $file = $form->getData();
            $file->setType1('insVideo');
            $em->persist($file);
            $em->flush();
            $this->addFlash('success','New Instrumental Video is added!');
            return $this->redirectToRoute('app_admin_list_insVideo');
        }
        return $this->render('admin/newUploadFile.html.twig', [
            'type' => 'insVideo',
            'label' => 'Instrumental Video',
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/admin/list/insVideo", name="app_admin_list_insVideo")
     */
    public function listFileUploadInsVideo(EntityManagerInterface $em){
        $files = $em->getRepository(UploadFile::class)->findAllSortedPriorityInstrumentalVideos();
        return $this->render('admin/listUploadFileVideo.html.twig', [
            'type' => 'insVideo',
            'label' => 'Instrumental Video',
            'files' => $files,
        ]);
    }
    /**
     * @Route("/admin/edit/insVideo/{id}", name="app_admin_edit_insVideo")
     */
    public function editFileUploadInsVideo(EntityManagerInterface $em ,Request $request, UploadFile $uploadFile){
        $form = $this->createForm(UploadFileType::class,$uploadFile);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $uploadFile = $form->getData();
            $em->persist($uploadFile);
            $em->flush();
            $this->addFlash('success','Instrumental Video is Edited!');
            return $this->redirectToRoute('app_admin_list_insVideo');
        }
        return $this->render('admin/editUploadFile.html.twig', [
            'type' => 'insVideo',
            'label' => 'Instrumental Video',
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/admin/delete/insVideo/{id}", name="app_admin_delete_insVideo")
     */
    public function deleteFileUploadInsVideo(EntityManagerInterface $em, $id){
        $uploadFile = $em->getRepository(UploadFile::class)->find($id);
        $em->remove($uploadFile);
        $em->flush();
        return $this->redirectToRoute('app_admin_list_insVideo');
    }
    /**
     * @Route("/admin/new/vocMusic", name="app_admin_new_vocMusic")
     */
    public function newFileUploadVocMusic(EntityManagerInterface $em ,Request $request){
        $form = $this->createForm(UploadFileType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            /** @var UploadFile $file */
            $file = $form->getData();
            $file->setType1('vocMusic');
            $em->persist($file);
            $em->flush();
            $this->addFlash('success','New Vocal Music is added!');
            return $this->redirectToRoute('app_admin_list_vocMusic');
        }
        return $this->render('admin/newUploadFile.html.twig', [
            'type' => 'vocMusic',
            'label' => 'Vocal Music',
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/admin/list/vocMusic", name="app_admin_list_vocMusic")
     */
    public function listFileUploadVocMusic(EntityManagerInterface $em){
        $files = $em->getRepository(UploadFile::class)->findAllSortedPriorityVocalMusic();
        return $this->render('admin/listUploadFileAudio.html.twig', [
            'type' => 'vocMusic',
            'label' => 'Vocal Music',
            'files' => $files,
        ]);
    }
    /**
     * @Route("/admin/edit/vocMusic/{id}", name="app_admin_edit_vocMusic")
     */
    public function editFileUploadVocMusic(EntityManagerInterface $em ,Request $request, UploadFile $uploadFile){
        $form = $this->createForm(UploadFileType::class,$uploadFile);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $uploadFile = $form->getData();
            $em->persist($uploadFile);
            $em->flush();
            $this->addFlash('success','Vocal Music is Edited!');
            return $this->redirectToRoute('app_admin_list_vocMusic');
        }
        return $this->render('admin/editUploadFile.html.twig', [
            'type' => 'vocMusic',
            'label' => 'Vocal Music',
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/admin/delete/vocMusic/{id}", name="app_admin_delete_vocMusic")
     */
    public function deleteFileUploadVocMusic(EntityManagerInterface $em, $id){
        $uploadFile = $em->getRepository(UploadFile::class)->find($id);
        $em->remove($uploadFile);
        $em->flush();
        return $this->redirectToRoute('app_admin_list_vocMusic');
    }
    /**
     * @Route("/admin/new/vocVideo", name="app_admin_new_vocVideo")
     */
    public function newFileUploadVocVideo(EntityManagerInterface $em ,Request $request){
        $form = $this->createForm(UploadFileType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            /** @var UploadFile $file */
            $file = $form->getData();
            $file->setType1('vocVideo');
            $em->persist($file);
            $em->flush();
            $this->addFlash('success','New Vocal Video is added!');
            return $this->redirectToRoute('app_admin_list_vocVideo');
        }
        return $this->render('admin/newUploadFile.html.twig', [
            'type' => 'vocVideo',
            'label' => 'Vocal Video',
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/admin/list/vocVideo", name="app_admin_list_vocVideo")
     */
    public function listFileUploadVocVideo(EntityManagerInterface $em){
        $files = $em->getRepository(UploadFile::class)->findAllSortedPriorityVocalVideos();
        return $this->render('admin/listUploadFileVideo.html.twig', [
            'type' => 'vocVideo',
            'label' => 'Vocal Video',
            'files' => $files,
        ]);
    }
    /**
     * @Route("/admin/edit/vocVideo/{id}", name="app_admin_edit_vocVideo")
     */
    public function editFileUploadVocVideo(EntityManagerInterface $em ,Request $request, UploadFile $uploadFile){
        $form = $this->createForm(UploadFileType::class,$uploadFile);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $uploadFile = $form->getData();
            $em->persist($uploadFile);
            $em->flush();
            $this->addFlash('success','Vocal Video is Edited!');
            return $this->redirectToRoute('app_admin_list_vocVideo');
        }
        return $this->render('admin/editUploadFile.html.twig', [
            'type' => 'vocVideo',
            'label' => 'Vocal Video',
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/admin/delete/vocVideo/{id}", name="app_admin_delete_vocVideo")
     */
    public function deleteFileUploadVocVideo(EntityManagerInterface $em, $id){
        $uploadFile = $em->getRepository(UploadFile::class)->find($id);
        $em->remove($uploadFile);
        $em->flush();
        return $this->redirectToRoute('app_admin_list_vocVideo');
    }
}
