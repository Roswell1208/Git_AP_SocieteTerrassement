<?php

namespace App\Controller;

use App\Entity\Avis;
use App\Form\AvisType;
use App\Entity\Contact;
use App\Form\ContactType;
use App\Entity\Prestation;
use App\Entity\Presentation;
use App\Form\ModifPresentType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Form\AddPrestaType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class BlockController extends AbstractController
{
    /**
     * @Route("/", name="app_block")
     */
    public function index(): Response
    {
        $repoAvis = $this->getDoctrine()->getRepository(Avis::class);
        $avis = $repoAvis->findAll();

        return $this->render('block/index.html.twig', [
            'controller_name' => 'BlockController',
            'listeAvis' => $avis
        ]);
    }

    /**
     * @Route("listPresta", name="listPresta")
     */
    public function listPresta(): Response
    {
        $repoPresta = $this->getDoctrine()->getRepository(Prestation::class);
        $prestas = $repoPresta->findAll();

        return $this->render('block/listPresta.html.twig', [
            'controller_name' => 'BlockController',
            'prestas' => $prestas
        ]);
    }

    /**
     * @Route("detailsPresta/{id}", name = "detailsPresta")
     */
    public function detailsPresta(int $id): Response
    {
        $repoPresta = $this->getDoctrine()->getRepository(Prestation::class);
        $prestas = $repoPresta->findAll();

        // renders templates/block/detailsPresta.html.twig
        return $this->render('block/detailsPresta.html.twig', [
            'id' => $id, 
            'controller_name' => 'BlockController', 
            'prestas' => $prestas
        ]);
    }

    /**
     * @Route("Avis", name="Avis")
     */
    public function Avis(Request $request, EntityManagerInterface $entityManager): Response
    {
        $avis = new Avis();
        $form = $this->createForm(AvisType::class, $avis);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $avis -> setDate(new \DateTime('@'.strtotime('now')));
            $entityManager->persist($avis);
            $entityManager->flush();
        }


        return $this->render('block/Avis.html.twig', [
            'controller_name' => 'BlockController',
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("Contact", name="Contact")
     */
    public function Contact(Request $request, EntityManagerInterface $entityManager): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $contact -> setDate(new \DateTime('@'.strtotime('now')));
            $entityManager->persist($contact);
            $entityManager->flush();
        }


        return $this->render('block/Contact.html.twig', [
            'controller_name' => 'BlockController',
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("presentation", name="presentation")
     */
    public function presentation(): Response
    {
        $repoPresentation = $this->getDoctrine()->getRepository(Presentation::class);
        $presentations = $repoPresentation->findAll();

        return $this->render('block/presentation.html.twig', [
            'controller_name' => 'BlockController',

            'listePresentations' => $presentations
        ]);
    }


    /**
     * @Route("/delete/{id}", name = "prestaDelete")
     * 
     * @return Response
     */
    public function prestaDelete(Prestation $unePresta)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($unePresta);
        $em->flush();

        
        return $this->redirectToRoute('listPresta');
    }


    /**
     * @Route("AjoutPresta", name="AjoutPresta")
     */
    public function AddPresta(Request $request, EntityManagerInterface $entityManager): Response
    {
        $presta = new Prestation();
        $form = $this->createForm(AddPrestaType::class, $presta);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $entityManager->persist($presta);
            $entityManager->flush();
        }


        return $this->render('block/AddPresta.html.twig', [
            'controller_name' => 'BlockController',
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/edit/{id}", name = "prestaEdit")
     * 
     * @return Response
     */
    public function prestaEdit(Request $request, Prestation $unePresta)
    {
        $form = $this->createForm(AddPrestaType::class, $unePresta);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->flush();

            return $this->redirectToRoute('listPresta');
        }

        $formView = $form->createView();

        return $this->render('block/EditPresta.html.twig', [
            'controller_name' => 'BlockController',
            'form' => $form->createView()
        ]);
    }
    
    
    /**
     * @Route("/ModifPresent/{id}", name="ModifPresent")
     */
    public function ModifPresent(Request $request, Presentation $presentation )
    {
        #$modifPres = new presentation();
        #$form = $this->createForm(ModifPresentType::class, $modifPres);
        #$form->handleRequest($request);

        
        #if ($form->isSubmitted() && $form->isValid()){

            #$id = $form->get('id')->getData();
            #$idbdd = getId();
            #$titre = $form->get('titre')->getData();
            #$description = $form->get('description')->getData();
            #$lien_img = $form->get('lien_img')->getData();

            #if($id == $idbdd){
           
                #$modifPres -> setTitre($titre);
                #$modifPres -> setDescription($description);
                #$modifPres -> setLienImg($lien_img);

                #$entityManager->persist($modifPres);
                #$entityManager->flush();
            #}
            
        // On récupère le formulaire
        $form = $this->createForm(ModifPresentType::class, $presentation);
        $form->handleRequest($request);

        // si le formulaire a été soumis
        if($form->isSubmitted() && $form->isValid()){
            // on enregistre le produit en bdd
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute('presentation');
        }
    
        $formView = $form->createView();

        return $this->render('block/ModifPresentation.html.twig', [
            'controller_name' => 'BlockController',

            'form' => $form->createView()
        ]);

    }


    /**
     * @Route("listContact", name="listContact")
     */
    public function listContact(): Response
    {
        $repoContact = $this->getDoctrine()->getRepository(Contact::class);
        $contact = $repoContact->findAll();

        return $this->render('block/listContact.html.twig', [
            'controller_name' => 'BlockController',
            'listContact' => $contact
        ]);
    }
}

?>