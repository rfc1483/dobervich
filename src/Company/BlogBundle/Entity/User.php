<?php

namespace Company\BlogBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity
 */
class User implements UserInterface {

    /**
     * @ORM\ManyToMany(targetEntity="Role")
     * @ORM\JoinTable(name="user_role",
     *     joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="role_id", referencedColumnName="id")}
     * )
     *
     * @var ArrayCollection $userRoles
     */
    protected $userRoles;
    
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     * 
     * @var integer $id
     */
    private $id;
    /**
     * @ORM\Column(type="string")
     * 
     * @var string $firstName
     */
    private $firstName;
    /**
     * @ORM\Column(type="string")
     * 
     * @var string $lastName
     */
    private $lastName;
    /**
     * @ORM\Column(type="string")
     * 
     * @var string $email
     */
    private $email;
    /**
     * @ORM\Column(type="datetime")
     * 
     * @var DateTime $createdAt
     */
    private $createdAt;
    /**
     * Bidireccional - One-To-Many (INVERSE SIDE)
     * 
     * @ORM\OneToMany(targetEntity="Post", mappedBy="user")
     * @ORM\OrderBy({"createdAt" = "DESC"})
     * 
     * @var ArrayCollection $posts
     */
    private $posts;
    
        /**
     * @ORM\Column(type="string", length="255")
     *
     * @var string username
     */
    private $username;
 
    /**
     * @ORM\Column(type="string", length="255")
     *
     * @var string password
     */
    private $password;
 
    /**
     * @ORM\Column(type="string", length="255")
     *
     * @var string salt
     */
    private $salt;

    /**
     * Gets the id.
     * 
     * @return string The id
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Gets the user's first name.
     * 
     * @return string The first name
     */
    public function getFirstName() {
        return $this->firstName;
    }

    /**
     * Sets the user's first name.
     * 
     * @param string $value The first name
     */
    public function setFirstName($value) {
        $this->firstName = $value;
    }

    /**
     * Gets the user's last name.
     * 
     * @return string The last name
     */
    public function getLastName() {
        return $this->lastName;
    }

    /**
     * Sets the user's last name.
     * 
     * @param string $value The last name
     */
    public function setLastName($value) {
        $this->lastName = $value;
    }

    /**
     * Gets the user's email address.
     * 
     * @return string The email
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * Sets the user's email address.
     * 
     * @param string $value The email
     */
    public function setEmail($value) {
        $this->email = $value;
    }

    /**
     * Gets an object representing the date and time the user was created.
     * 
     * @return DateTime A DateTime object
     */
    public function getCreatedAt() {
        return $this->createdAt;
    }

    /**
     * Gets all of the user's posts
     * 
     * @return ArrayCollection The user's posts
     */
    public function getPosts() {
        return $this->posts;
    }

    /**
     * Gets the full name of the user.
     * 
     * @return string The full name
     */
    public function getFullName() {
        return sprintf('%s %s', $this->firstName, $this->lastName);
    }
 
 
    /**
     * Gets the username.
     *
     * @return string The username.
     */
    public function getUsername()
    {
        return $this->username;
    }
 
    /**
     * Sets the username.
     *
     * @param string $value The username.
     */
    public function setUsername($value)
    {
        $this->username = $value;
    }
 
    /**
     * Gets the user password.
     *
     * @return string The password.
     */
    public function getPassword()
    {
        return $this->password;
    }
 
    /**
     * Sets the user password.
     *
     * @param string $value The password.
     */
    public function setPassword($value)
    {
        $this->password = $value;
    }
 
    /**
     * Gets the user salt.
     *
     * @return string The salt.
     */
    public function getSalt()
    {
        return $this->salt;
    }
 
    /**
     * Sets the user salt.
     *
     * @param string $value The salt.
     */
    public function setSalt($value)
    {
        $this->salt = $value;
    }
 
    /**
     * Gets the user roles.
     *
     * @return ArrayCollection A Doctrine ArrayCollection
     */
    public function getUserRoles()
    {
        return $this->userRoles;
    }
 
    /**
     * Constructs a new instance of User
     */
    public function __construct()
    {
        $this->posts = new ArrayCollection();
        $this->userRoles = new ArrayCollection();
        $this->createdAt = new \DateTime();
    }
 
    /**
     * Erases the user credentials.
     */
    public function eraseCredentials()
    {
 
    }
 
    /**
     * Gets an array of roles.
     * 
     * @return array An array of Role objects
     */
    public function getRoles()
    {
        return $this->getUserRoles()->toArray();
    }
 
    /**
     * Compares this user to another to determine if they are the same.
     * 
     * @param UserInterface $user The user
     * @return boolean True if equal, false othwerwise.
     */
    public function equals(UserInterface $user)
    {
        return md5($this->getUsername()) == md5($user->getUsername());
    }

}