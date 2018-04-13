<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\ReviewType;
use AppBundle\Model\ReviewModel;
use AppBundle\Service\ReviewService;

class ReviewController extends Controller
{
    /** @var ReviewService $reviewService */
    private $reviewService;

    /**
     * @param ReviewService $reviewService
     * 
     * @return self
     * 
     * @required
     */
    function setReviewService(ReviewService $reviewService) {
        $this->reviewService = $reviewService;
        
        return $this;
    }
    
    /**
     * @Route("/", name="review")
     */
    public function reviewAction(Request $request)
    {
        $form = $this->createForm(ReviewType::class);
        $postedData = null;
        
        if($request->getMethod() == "POST")
        {
            $postedData = new ReviewModel();
            $form = $this->createForm(ReviewType::class, $postedData);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                // Store the review in the database
                $this->reviewService->createReview($postedData);
                // Set success message
                $this->addFlash('success', 'Your review has been delivered successfuly.');
                // Clear the form, since the data was submitted correctly
                $form = $this->createForm(ReviewType::class);
            }else{
                $postedData = null;
                // Set error message
                $this->addFlash('error', 'There are errors with your submission. Please solve the errors, and try again.');
            }
        }
        
        return $this->render('review/index.html.twig', [
            'form' => $form->createView()
        ]); 
        
    }
    
    /**
     * @Route("/list", name="list")
     */
    public function listAction(Request $request)
    {
        $reviews = $this->reviewService->listReviews();
        
        return $this->render('review/list.html.twig', [
            'reviews' => $reviews
        ]); 
        
    }
}
