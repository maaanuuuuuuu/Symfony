<?php
// src/Dev/CoreBundle/Controller/BlogController.php

namespace Dev\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Httpfoundation\Response;

/**
 * Blog controller.
 */
class BlogController extends Controller
{
    /**
     * Show a blog entry  DEPRECATED est encore ne mode ORM/sql et pas ODM/MongoDb
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $blog = $em->getRepository('DevCoreBundle:Blog')->find($id);

        if (!$blog) {
            throw $this->createNotFoundException('Unable to find Blog post.');
        }

        return $this->render('DevCoreBundle:Blog:show.html.twig', array(
            'blog'      => $blog,
        ));
    }

    /**
     * Delete a blog entry
     */
    public function deleteAction()
    {
        $request = $this->getRequest();
        $id = $request->request->get('id');
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $blog = $dm->getRepository("DevCoreBundle:Blog")->find($id);
        $dm->remove($blog);
        $dm->flush();

        $response = new Response("ok", 200);
        return $response;
    }
}