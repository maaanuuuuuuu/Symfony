<?php

namespace Dev\CoreBundle\Document;

use Doctrine\ODM\MongoDB\DocumentRepository;

/**
 * ProjectRepository
 *
 */
class ProjectRepository extends DocumentRepository
{
	public function findSortByCreated()
    {
	    return $this->createQueryBuilder()
            ->sort('created', 'DESC')
            ->getQuery()
            ->execute();
    }
}