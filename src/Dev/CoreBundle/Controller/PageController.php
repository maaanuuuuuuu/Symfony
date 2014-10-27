<?php
// src/Dev/CoreBundle/Controller/PageController.php

namespace Dev\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Dev\CoreBundle\Document\Blog;
use Dev\CoreBundle\Document\Tag;
use Dev\CoreBundle\Form\BlogType;

class PageController extends Controller
{
    public function indexAction()
    {
        $dm = $this->get('doctrine.odm.mongodb.document_manager');

        // j'ajoute le formulaire d'ajout de nouveau blog post
        $newBlog = new Blog();
        $tag1 = new Tag();
        $tag1->setTitle('tag1');
        $newBlog->getTags()->add($tag1);
        $tag2 = new Tag();
        $tag2->setTitle('tag2');
        $newBlog->getTags()->add($tag2);
        $newBlogForm = $this->createForm(new BlogType(), $newBlog);

        //je récupère les nouvelles infos trello qui seront tranformées en posts par un listener
        $trelloAPI = $this->get('dev_core.trelloAPI');
        $trelloAPI->fetchNewTrelloCards();
        //j'ajoute le post qui vient éventuellement d'être créé
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $newBlogForm->bind($request);

            if ($newBlogForm->isValid()) {
                $dm->persist($newBlog);
                $dm->flush();
                $blogs = $dm->getRepository('DevCoreBundle:Blog')->findLast(10);

                $newBlogForm = $this->createForm(new BlogType(), new Blog());

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
