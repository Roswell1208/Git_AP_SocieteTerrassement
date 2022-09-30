<?php

namespace App\Controller;

use App\Entity\Prestation;
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
}

?>