<?php
// src/Dev/CoreBundle/Controller/PageController.php

namespace Dev\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PageController extends Controller
{
    public function indexAction()
    {
    	//j'ajoute le formulaire d'ajout de nouveau blog post
    	
        return $this->render('DevCoreBundle:Page:index.html.twig');
    }


    public function aboutAction()
    {
        return $this->render('DevCoreBundle:Page:about.html.twig');
    }
}