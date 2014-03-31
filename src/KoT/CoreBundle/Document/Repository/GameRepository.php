<?php

namespace KoT\CoreBundle\Document\Repository;

use Doctrine\ODM\MongoDB\DocumentRepository;

/**
 * GameRepository
 *
 */
class GameRepository extends DocumentRepository
{
	public function findByStarted($started)
    {
	    return $this->createQueryBuilder('Game')
	    	->field('started')->equals($started)
            ->sort('created', 'DESC')
            ->getQuery()
            ->execute();
    }
}