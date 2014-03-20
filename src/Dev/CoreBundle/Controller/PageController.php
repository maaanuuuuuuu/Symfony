<?php
// src/Dev/CoreBundle/Controller/PageController.php

namespace Dev\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Dev\CoreBundle\Document\Blog;
use Dev\CoreBundle\Form\BlogType;

class PageController extends Controller
{
    public function indexAction()
    {   
        $dm = $this->get('doctrine.odm.mongodb.document_manager');

    	//j'ajoute le formulaire d'ajout de nouveau blog post
    	$newBlog = new Blog();
        $newBlogForm = $this->createForm(new BlogType(), $newBlog);

        //j'ajoute les posts à afficher en page d'acceuil

        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $newBlogForm->bind($request);

            if($newBlogForm->isValid()) {
                $dm->persist($newBlog);
                $dm->flush($newBlog);
                $blogs = $dm->getRepository('DevCoreBundle:Blog')->findLast(10);

                return $this->render('DevCoreBundle:Page:index.html.twig', array(
                    'blogs' => $blogs,
                    'newBlogForm' => $newBlogForm->createView()
                ));
            }
        }
        $blogs = $dm->getRepository('DevCoreBundle:Blog')->findLast(10);

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