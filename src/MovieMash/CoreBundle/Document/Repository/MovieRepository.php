<?php

namespace MovieMash\CoreBundle\Document\Repository;

use Doctrine\ODM\MongoDB\DocumentRepository;

/**
 * MovieRepository
 *
 */
class MovieRepository extends DocumentRepository
{

    public function findAll()
    {
       return $this->createQueryBuilder()
            ->getQuery()
            ->execute();
    }
}
