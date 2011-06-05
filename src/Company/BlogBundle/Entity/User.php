<?php

namespace Company\BlogBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", name="user_id")
     * @ORM\GeneratedValue(strategy="AUTO")
     * 
     * @var integer $userId
     */
    protected $userId;
    
    /**
     * @ORM\Column(type="string", length="255", name="first_name")
     * 
     * @var string $firstName
     */
    protected $firstName;
    
    /**
     * @ORM\Column(type="string", length="255", name="last_name")
     * 
     * @var string $lastName
     */
    protected $lastName;
    
    /**
     * @ORM\Column(type="string", length="255")
     * 
     * @var string $email
     */
    protected $email;
    
    /**
     * @ORM\Column(type="datetime", name="created_at")
     * 
     * @var DateTime $createdAt
     */
    protected $createdAt;
    
    /**
     * @ORM\OneToMany(targetEntity="Posts", mappedBy="users")
     * @ORM\OrderBy({"createdAt" = "DESC"})
     * 
     * @var ArrayCollection $posts
     */
    protected $posts;
    
    /**
     * Gets the id.
     * 
     * @return integer The id
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * Gets the user's first name.
     * 
     * @return string The first name
     */
    public function getFirstName()
    {
        return $this->firstName;
    }
    
    /**
     * Sets the user's first name.
     * 
     * @param string $value The first name
     */
    public function setFirstName( $value )
    {
        $this->firstName = $value;
    }
    
    /**
     * Gets the user's last name.
     * 
     * @return string The last name
     */
    public function getLastName()
    {
        return $this->lastName;
    }
    
    /**
     * Sets the user's last name.
     * 
     * @param string $value The last name
     */
    public function setLastName( $value )
    {
        $this->lastName = $value;
    }
    
    /**
     * Gets the user's email address.
     * 
     * @return string The email
     */
    public function getEmail()
    {
        return $this->email;
    }
    
    /**
     * Sets the user's email address.
     * 
     * @param string $value The email
     */
    public function setEmail( $value )
    {
        $this->email = $value;
    }
    
    /**
     * Gets an object representing the date and time the user was created.
     * 
     * @return DateTime A DateTime object
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }
    
    /**
     * Gets all of the user's posts
     * 
     * @return ArrayCollection The user's posts
     */
    public function getPosts()
    {
        return $this->posts;
    }
    
    /**
     * Constructs a new instance of Users
     */
    public function __construct()
    {
        $this->posts = new ArrayCollection();
        $this->createdAt = new \DateTime();
    }
    
    /**
     * Gets the full name of the user.
     * 
     * @return string The full name
     */
    public function getFullName()
    {
        return sprintf( '%s %s', $this->firstName, $this->lastName );
    }
}