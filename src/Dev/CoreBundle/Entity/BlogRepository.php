<?php

namespace Dev\CoreBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * BlogRepository
 *
 */
class BlogRepository extends EntityRepository
{
	//retourne les $n derniers blogs
	public function findLast($n)
    {
		$query = $this->_em->createQuery('SELECT b FROM Dev\CoreBundle\Entity\Blog b ORDER BY b.created DESC')
			->setMaxResults($n);
	    return $query->getResult();
    }
}