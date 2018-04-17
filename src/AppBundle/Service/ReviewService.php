<?php

namespace AppBundle\Service;

use Doctrine\ORM\EntityManagerInterface;
use AppBundle\Entity\Review;
use AppBundle\Model\ReviewModel;
use Symfony\Component\HttpFoundation\RequestStack;

class ReviewService
{
    
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;
    
    /**
     * @var RequestStack
     */
    private $requestStack;
    
    /**
     * @param EntityManagerInterface $entityManager
     *
     * @return self
     *
     * @required
     */
    public function setEntityManager(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        
        return $this;
    }
    
    /**
     * @param RequestStack $requestStack
     *
     * @return self
     *
     * @required
     */
    public function setRequestStack(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
        
        return $this;
    }
    
    /**
     * Creates a review from the contact form, and store it.
     *
     * @param ReviewModel $reviewModel The content of the form
     *
     * @return Review The created object
     */
    public function createReview(ReviewModel $reviewModel)
    {
        $review = new Review();
        
        $ipAddress = $this->requestStack->getCurrentRequest()->getClientIp();
        $date = new \DateTime();
        $review->setIpAddress($ipAddress);
        $review->setDate($date);
        $review->setName($reviewModel->getName());
        $review->setEmail($reviewModel->getEmail());
        $review->setSatisfaction($reviewModel->getSatisfaction());
        $review->setQuality($reviewModel->getQuality());
        $review->setReview($reviewModel->getReview());
        
        $this->entityManager->persist($review);
        $this->entityManager->flush();
        
        return $review;
    }
    
    public function listReviews()
    {
        $reviews = $this->entityManager->getRepository(Review::class)->findReviews();
        
        return $reviews;
    }
}
