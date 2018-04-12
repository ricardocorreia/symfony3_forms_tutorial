<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\ReviewType;
use AppBundle\Model\ReviewModel;

class ReviewController extends Controller
{
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
                // Form is valid
                
                $this->addFlash('success', 'Your review has been delivered successfuly.');
                
                // Clear the form, since the data was submitted correctly
                $form = $this->createForm(ReviewType::class);
            }else{
                $postedData = null;
                $this->addFlash('error', 'There are errors with your submission. Please solve the errors, and try again.');
            }
        
        }
        
        return $this->render('review/index.html.twig', [
            'form' => $form->createView(),
            'postedData' => $postedData
        ]); 
        
    }
}
