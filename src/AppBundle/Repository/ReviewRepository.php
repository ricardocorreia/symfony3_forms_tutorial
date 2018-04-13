<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Review;
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
                . "FROM AppBundle:Review r "
                . "ORDER BY r.id DESC"
            );
        return $query->getResult();
    }
}
