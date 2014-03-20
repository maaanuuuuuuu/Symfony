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
		// $query = $this->dm->createQuery('SELECT b FROM Dev\CoreBundle\Document\Blog b ORDER BY b.created DESC')
		// 	->setMaxResults($n);
	 //    return $query->getResult();

	    return $this->createQueryBuilder()
            ->sort('created', 'DESC')
            ->getQuery()
            ->execute();
    }
}