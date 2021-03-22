<?php

namespace App\Controller;

use App\Entity\Categorie;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategorieController extends AbstractController
{
    /**
     * @Route("/", name="categorie")
     */
    public function index(): Response
    {
        // $category = new Categorie();
        // $category->setName("Javascript");

        // $entityManager = $this->getDoctrine()->getManager();
        // $entityManager->persist($category);
        // $entityManager->flush();

        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository(Categorie::class)->findAll();

        return $this->render('categorie/index.html.twig', [
            'categories' => $categories
        ]);
    }
}
