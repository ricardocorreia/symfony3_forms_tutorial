<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ReviewRepository")
 * @ORM\HasLifecycleCallbacks
 * @ORM\Table(name="`review`")
 */

class Review
{
    
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="date", type="datetime", nullable=false)
     * @Assert\DateTime()
     */
    protected $date;
    
    /**
     * @ORM\Column(name="ip_address", type="text", nullable=false)
     * @Assert\Length(min=8, max=45)
     */
    protected $ipAddress;
    
    /**
     * @ORM\Column(name="name", type="text", nullable=false)
     * @Assert\Length(min=3, max=150)
     */
    protected $name;
    
    /**
     * @ORM\Column(name="email", type="text", nullable=true)
     * @Assert\Length(min=6, max=254)
     */
    protected $email;
    
    /**
     * @ORM\Column(name="satisfaction", type="integer", nullable=false)
     * @Assert\Range(min = 1, max = 5)
     */
    protected $satisfaction;
    
    /**
     * @ORM\Column(name="quality", type="integer", nullable=false)
     * @Assert\Range(min = 1, max = 5)
     */
    protected $quality;
    
    /**
     * @ORM\Column(name="review", type="text", nullable=false)
     * @Assert\Length(min=10, max=1000)
     */
    protected $review;

    
    public function __construct()
    {
    }
    
    public function getId()
    {
        return $this->id;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getIpAddress()
    {
        return $this->ipAddress;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getSatisfaction()
    {
        return $this->satisfaction;
    }

    public function getQuality()
    {
        return $this->quality;
    }

    public function getReview()
    {
        return $this->review;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function setIpAddress($ipAddress)
    {
        $this->ipAddress = $ipAddress;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setSatisfaction($satisfaction)
    {
        $this->satisfaction = $satisfaction;
    }

    public function setQuality($quality)
    {
        $this->quality = $quality;
    }

    public function setReview($review)
    {
        $this->review = $review;
    }
}
