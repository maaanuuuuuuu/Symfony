<?php
// src/Dev/CoreBundle/Controller/PageController.php

namespace Dev\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Dev\CoreBundle\Entity\Blog;
use Dev\CoreBundle\Form\BlogType;

class PageController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

    	//j'ajoute le formulaire d'ajout de nouveau blog post
    	$newBlog = new Blog();
        $newBlogForm = $this->createForm(new BlogType(), $newBlog);

        //j'ajoute les posts à afficher en page d'acceuil

        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $newBlogForm->bind($request);

            if($newBlogForm->isValid()) {
                $em->persist($newBlog);
                $em->flush($newBlog);
                $blogs = $em->getRepository('DevCoreBundle:Blog')->findLast(10);

                return $this->render('DevCoreBundle:Page:index.html.twig', array(
                    'blogs' => $blogs,
                    'newBlogForm' => $newBlogForm->createView()
                ));
            }
        }
        $blogs = $em->getRepository('DevCoreBundle:Blog')->findLast(10);

        return $this->render('DevCoreBundle:Page:index.html.twig', array(
            'blogs' => $blogs,
            'newBlogForm' => $newBlogForm->createView()
        ));
    }


    public function aboutAction()
    {
        return $this->render('DevCoreBundle:Page:about.html.twig');
    }
}