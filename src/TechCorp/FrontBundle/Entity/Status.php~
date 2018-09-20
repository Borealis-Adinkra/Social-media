<?php

namespace TechCorp\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Column;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Status
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="TechCorp\FrontBundle\Entity\StatusRepository")
 * @ORM\HasLifecycleCallbacks()
 * 
 */
class Status
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="string", length=255)
     */
    private $content;

    /**
     * @var boolean
     *
     * @ORM\Column(name="deleted", type="boolean")
     */
    private $deleted;

    /**
     * 
     * @var \DateTime
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;
    
    /**
     *
     * @var \DateTime
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $updatedAt;
    
    /**
     * 
     * @ORM\ManyToOne(targetEntity="User",inversedBy="statuses")
     * @ORM\JoinColumn(name="user_id",referencedColumnName="id")
     */
    protected $user;
    
    
    /**
     * 
     * @ORM\OneToMany(targetEntity="Comment",mappedBy="status")
     * 
     */
    protected $comments;
    
    
    public function __construct()
    {
        $this->comments=new ArrayCollection();
    }
    
    /**
     * @return DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @return DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param DateTime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @param DateTime $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return Status
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set deleted
     *
     * @param boolean $deleted
     * @return Status
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;

        return $this;
    }

    /**
     * Get deleted
     *
     * @return boolean 
     */
    public function getDeleted()
    {
        return $this->deleted;
    }
    
    /**
     * @ORM\PrePersist()
     * 
     */
    public function prePersistEvent()
    {
        $this->createdAt=new \DateTime();
        $this->updatedAt=new \DateTime();
    }
    
    
    /**
     * @ORM\PreUpdate()
     */
    public function preUpdateEvent()
    {
        $this->updatedAt=new \DateTime();
    }
    

    /**
     * Set user
     *
     * @param \TechCorp\FrontBundle\Entity\user $user
     * @return Status
     */
    public function setUser(\TechCorp\FrontBundle\Entity\user $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \TechCorp\FrontBundle\Entity\user 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Add comments
     *
     * @param \TechCorp\FrontBundle\Entity\Comment $comments
     * @return Status
     */
    public function addComment(\TechCorp\FrontBundle\Entity\Comment $comments)
    {
        $this->comments[] = $comments;

        return $this;
    }

    /**
     * Remove comments
     *
     * @param \TechCorp\FrontBundle\Entity\Comment $comments
     */
    public function removeComment(\TechCorp\FrontBundle\Entity\Comment $comments)
    {
        $this->comments->removeElement($comments);
    }

    /**
     * Get comments
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getComments()
    {
        return $this->comments;
    }
}
