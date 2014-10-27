<?php

namespace Dev\CoreBundle\Listener;

use Symfony\Component\HttpKernel\Log\LoggerInterface;

use Doctrine\ODM\MongoDB\Event\LifeCycleEventArgs;
use Dev\CoreBundle\Document\Project;

class ProjectListener
{
	private $logger = null;

	public function __construct(LoggerInterface $logger = null)
	{
        $this->logger = $logger;
	}

    // private function createBoardFromProject(LifeCycleEventArgs $args){

    // }

    public function postUpdate(LifeCycleEventArgs $args)
    {
        $project = $args->getEntity();
        if($project instanceof Project){
            $this->logger->debug("Project: Post Update");
            $entityManager = $args->getEntityManager();
            $uow = $entityManager->getUnitOfWork();
            //get les champs changés dans l'entité
            $changeSet = $uow->getEntityChangeSet($project);
        }

    } 

    public function postPersist(LifeCycleEventArgs $args)
    {
        $project = $args->getEntity();
        if($project instanceof Project){
            $this->logger->debug("Project: Post Persist");
            $entityManager = $args->getEntityManager();
            if(!is_null($project->getTrelloBoardLink())){
                
            }        
        }
    }


    
    
}