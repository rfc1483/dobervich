<?php

namespace Company\BlogBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Company\BlogBundle\Repository\PostRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Post {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer", name="post_id")
     * @ORM\GeneratedValue(strategy="AUTO")
     * 
     * @var integer $postId
     */
    protected $postId;
    /**
     * @ORM\Column(type="string", length="255")
     * 
     * @var string $title
     */
    protected $title;
    /**
     * @ORM\Column(type="string", length="255")
     * 
     * @var string $slug
     */
    protected $slug;
    /**
     * @ORM\Column(type="text")
     * 
     * @var string $content
     */
    protected $content;
    /**
     * @ORM\Column(type="datetime", name="created_at")
     * 
     * @var DateTime $createdAt
     */
    protected $createdAt;
    /**
     * @ORM\Column(type="datetime", name="updated_at", nullable="true")
     * 
     * @var DateTime $updatedAt
     */
    protected $updatedAt;
    /**
     * @ORM\ManyToOne(targetEntity="Categories")
     * @ORM\JoinColumn(name="categories_category_id", referencedColumnName="category_id")
     * 
     * @var Category $category
     */
    protected $category;
    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="post")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="user_id")
     * 
     * @var User $user
     */
    protected $user;
    /**
     * @ORM\ManyToMany(targetEntity="Tags")
     * @ORM\JoinTable(name="posts_tags",
     *     joinColumns={@ORM\JoinColumn(name="post_id", referencedColumnName="post_id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="tag_id", referencedColumnName="tag_id")}
     * )
     * 
     * @var ArrayCollection $tags
     */
    protected $tags;

    /**
     * Gets the id.
     * 
     * @return integer The id
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Gets the title of the post.
     * 
     * @return string The title
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * Sets the title of the post.
     * 
     * @param string $value The title
     */
    public function setTitle($value) {
        $this->title = $value;
    }

    /**
     * Gets the slut for the post.
     * 
     * @return string The slug
     */
    public function getSlug() {
        return $this->slug;
    }

    /**
     * Sets the slug for the post.
     * 
     * @param string $value The slug
     */
    public function setSlug($value) {
        $this->slug = $value;
    }

    /**
     * Gets the content of the post.
     * 
     * @return string The post content
     */
    public function getContent() {
        return $this->content;
    }

    /**
     * Sets the post content.
     * 
     * @param string $value The post content
     */
    public function setContent($value) {
        $this->content = $value;
    }

    /**
     * Gets an object representing the date and time the post was created.
     * 
     * @return DateTime A DateTime object
     */
    public function getCreatedAt() {
        return $this->createdAt;
    }

    /**
     * Gets an object representing the date and time the post was updated.
     * 
     * @return DateTime A DateTime object
     */
    public function getUpdatedAt() {
        return $this->updatedAt;
    }

    /**
     * Gets the category the post is in.
     * 
     * @return Categories A Category object
     */
    public function getCategory() {
        return $this->category;
    }

    /**
     * Sets the category of the post.
     * 
     * @param Category $value The category
     */
    public function setCategory(Category $value) {
        $this->category = $value;
    }

    /**
     * Gets the user who created the post.
     * 
     * @return Users A User object
     */
    public function getUser() {
        return $this->user;
    }

    /**
     * Sets the user who created the post.
     * 
     * @param Users $value The user
     */
    public function setUser(Users $value) {
        $this->user = $value;
    }

    /**
     * Gets the post tags.
     * 
     * @return ArrayCollection The tags
     */
    public function getTags() {
        return $this->tags;
    }

    /**
     * Constructs a new instance of Post.
     */
    public function __construct() {
        $this->createdAt = new \DateTime();
        $this->tags = new ArrayCollection();
    }

    /**
     * Invoked before the entity is updated.
     * 
     * @ORM\PreUpdate
     */
    public function preUpdate() {
        $this->updatedAt = new \DateTime();
    }

    /**
     * Get postId
     *
     * @return integer $postId
     */
    public function getPostId() {
        return $this->postId;
    }

    /**
     * Set createdAt
     *
     * @param datetime $createdAt
     */
    public function setCreatedAt($createdAt) {
        $this->createdAt = $createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param datetime $updatedAt
     */
    public function setUpdatedAt($updatedAt) {
        $this->updatedAt = $updatedAt;
    }

    /**
     * Add tags
     *
     * @param Company\BlogBundle\Entity\Tags $tags
     */
    public function addTags(\Company\BlogBundle\Entity\Tags $tags) {
        $this->tags[] = $tags;
    }

}