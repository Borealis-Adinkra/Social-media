<?php

namespace TechCorp\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comment
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="TechCorp\FrontBundle\Entity\CommentRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Comment
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
     * @var \DateTime
     * 
     * 
     * @ORM\Column(name="createdAt", type="datetime")
     */
    private $createdAt;
    
    /**
     * 
     * @var \DateTime
     * 
     * @ORM\Column(name="updatedAt",type="datetime")
     * 
     */
    private $updatedAt;

    /**
     * @ORM\ManyToOne(targetEntity="Status", inversedBy="comments")
     * @ORM\joinColumns({@ORM\JoinColumn(name="status_id",referencedColumnName="id")})
     * 
     */
    protected $status;
    
    /**
     * @ORM\ManyToOne(targetEntity="User",inversedBy="comments")
     * @ORM\JoinColumn(name="user_id",referencedColumnName="id")
     */
    protected $user;

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
     * @return Comment
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Comment
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set status
     *
     * @param \TechCorp\FrontBundle\Entity\Status $status
     * @return Comment
     */
    public function setStatus(\TechCorp\FrontBundle\Entity\Status $status = null)
    {
        $this->status = $status;

        return $this;
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
     * Get status
     *
     * @return \TechCorp\FrontBundle\Entity\Status 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set user
     *
     * @param \TechCorp\FrontBundle\Entity\User $user
     * @return Comment
     */
    public function setUser(\TechCorp\FrontBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \TechCorp\FrontBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return Comment
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
}
