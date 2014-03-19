<?php
// src/Dev/CoreBundle/Controller/BlogController.php

namespace Dev\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Blog controller.
 */
class BlogController extends Controller
{
    /**
     * Show a blog entry
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
}