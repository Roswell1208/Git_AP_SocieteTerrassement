<?php

namespace App\Controller;

use App\Entity\Prestation;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\User;
use App\Form\AddUserType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;


class BlockController extends AbstractController
{
    /**
     * @Route("/", name="app_block")
     */
    public function index(): Response
    {
        return $this->render('block/index.html.twig', [
            'controller_name' => 'BlockController',
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
     * @Route("Contact", name="Contact")
     */
    public function Contact(): Response
    {
        return $this->render('block/Contact.html.twig', [
            'controller_name' => 'BlockController',
        ]);
    }

    /**
     * @Route("Connexion", name="Connexion")
     */
    public function Connexion(): Response
    {
        return $this->render('block/Connexion.html.twig', [
            'controller_name' => 'BlockController',
        ]);
    }

    /**
     * @Route("Inscription", name="Inscription")
     */
    public function Inscription(Request $request, EntityManagerInterface $entityManager): Response
    {
        $user = new User();

        $form = $this->createForm(AddUserType::class, $user);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $entityManager->persist($user);
            $entityManager->flush();
        }

        return $this->render('block/Inscription.html.twig', [
            'controller_name' => 'BlockController',
            'form' => $form->createView()
        ]);
    }
}

?>