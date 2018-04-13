<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class ReviewRepository extends EntityRepository
{
    
    /**
     * Queries the existing reviews.
     * 
     * @return array The list of reviews
     */
    public function findReviews()
    {
        $query = $this->getEntityManager()
            ->createQuery(
                "SELECT r "
                . "FROM AppBundle:Review r"
            );
        return $query->getResult();
    }
}
