<?php

namespace AppBundle\Model;

use Symfony\Component\Validator\Constraints as Assert;
use EWZ\Bundle\RecaptchaBundle\Validator\Constraints as Recaptcha;

class ReviewModel {

    /**
     * @Assert\NotNull(message = "The name can't be empty.")
     * @Assert\Length(
     *      min = 3,
     *      max = 150,
     *      minMessage = "The name is too short.",
     *      maxMessage = "The maximum length is {{ limit }} characters."
     * )
     */
    public $name;
    
    /**
     * @Assert\Email(
     *     message = "The email address is not valid.", strict = false
     * )
     * @Assert\Length(
     *      min = 6,
     *      max = 254,
     *      minMessage = "The email is too short.",
     *      maxMessage = "The maximum length is {{ limit }} characters."
     * )
     */
    public $email;
    
    /**
     * @Assert\NotNull()
     */
    public $satisfaction;
    
    /**
     * @Assert\NotNull()
     */
    public $quality;
    
    /**
     * @Assert\NotNull(message = "The review can't be empty.")
     * @Assert\Length(
     *      min = 10,
     *      max = 1000,
     *      minMessage = "The minimum length is {{ limit }} characters.",
     *      maxMessage = "The maximum length is {{ limit }} characters."
     * )
     */
    public $review;
    
    /**
     * @Recaptcha\IsTrue(message = "The recaptcha is mandatory.")
     */
    public $recaptcha;
    
    public function __construct() {
        
    }
    
    public function getName() {
        return $this->name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getRecaptcha() {
        return $this->recaptcha;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setEmail($email) {
        $this->email = $email;
    }


    public function setRecaptcha($recaptcha) {
        $this->recaptcha = $recaptcha;
    }
    
    public function getSatisfaction() {
        return $this->satisfaction;
    }

    public function setSatisfaction($satisfaction) {
        $this->satisfaction = $satisfaction;
    }
    
    public function getQuality() {
        return $this->quality;
    }

    public function setQuality($quality) {
        $this->quality = $quality;
    }
    
    public function getReview() {
        return $this->review;
    }

    public function setReview($review) {
        $this->review = $review;
    }
}
