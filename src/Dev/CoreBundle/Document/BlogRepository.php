<?php

namespace Dev\CoreBundle\Document;

use Doctrine\ODM\MongoDB\DocumentRepository;

/**
 * BlogRepository
 *
 */
class BlogRepository extends DocumentRepository
{
	//retourne les $n derniers blogs
	public function findLast($n)
    {
	    return $this->createQueryBuilder()
            ->sort('created', 'DESC')
            ->getQuery()
            ->execute();
    }
}