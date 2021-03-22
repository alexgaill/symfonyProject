<?php

namespace App\Controller;

use App\Entity\Post;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PostController extends AbstractController
{
    /**
     * @Route("/post", name="post")
     */
    public function index(): Response
    {
        // $post = new Post();
        // $post->setTitle("Mon premier article");
        // $post->setContent("Lorem ipsum dolor, sit amet consectetur adipisicing elit. Labore sequi nesciunt explicabo inventore mollitia qui? Odit sed quisquam quia blanditiis explicabo? Maiores repudiandae, voluptates aspernatur ab labore recusandae minus. Ipsa.");
        // $post->setCreatedAt(new \DateTime());

        // $em = $this->getDoctrine()->getManager();
        // $em->persist($post);
        // $em->flush();

        $em = $this->getDoctrine()->getManager();
        $post = $em->getRepository(Post::class)->findAll();

        return $this->render('post/index.html.twig', [
            'post' => $post,
        ]);
    }
}
