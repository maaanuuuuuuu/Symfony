<?php
// src/Dev/CoreBundle/Controller/ProjectsController.php

namespace Dev\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Dev\CoreBundle\Document\Project;
use Dev\CoreBundle\Form\ProjectType;

class ProjectsController extends Controller
{
    public function indexAction()
    {   
        $dm = $this->get('doctrine.odm.mongodb.document_manager');
        $projects = $dm->getRepository('DevCoreBundle:Project')->findSortByCreated();
        
        return $this->render('DevCoreBundle:Projects:index.html.twig', array(
            'projects' => $projects,
        ));
    }

    public function creationAction()
    {   
		$newProject = new Project();
        $newProjectForm = $this->createForm(new ProjectType(), $newProject);

        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
	        $dm = $this->get('doctrine.odm.mongodb.document_manager');
            $newProjectForm->bind($request);

            if($newProjectForm->isValid()) {
                $dm->persist($newProject);
                $dm->flush();

                $newProjectForm = $this->createForm(new ProjectType(), new Project());
                return $this->render('DevCoreBundle:Projects:create.html.twig', array(
					'newProjectForm' => $newProjectForm->createView()
                ));
            }
        }

		return $this->render('DevCoreBundle:Projects:create.html.twig', array(
			'newProjectForm' => $newProjectForm->createView()
		));
    }
}