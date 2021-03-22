<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Form\CategorieType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CategorieController extends AbstractController
{
    /**
     * @Route("/", name="categorie")
     */
    public function index(): Response
    {
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository(Categorie::class)->findAll();

        return $this->render('categorie/index.html.twig', [
            'categories' => $categories
        ]);
    }

    /**
     * @Route("/saveCategorie", name="saveCategorie")
     */
    public function saveCategorie(Request $request)
    {
        $categorie = new Categorie();
        $form = $this->createForm(CategorieType::class, $categorie);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

            $categorie = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($categorie);
            $entityManager->flush();
            dump($categorie);

            $this->redirectToRoute("categorie");
        }

        return $this->render('categorie/save.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
