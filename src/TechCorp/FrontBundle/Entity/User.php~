<?php

namespace TechCorp\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\Common\Collections\ArrayCollection;
use FOS\UserBundle\Model\User as BaseUser;



/**
 * User
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="TechCorp\FrontBundle\Entity\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * 
     * @ORM\OneToMany(targetEntity="Status",mappedBy="user")
     * 
     */
    protected $statuses;

    
    /**
     * 
     * @ORM\ManyToMany(targetEntity="User",inversedBy="friendswithme")
     * @ORM\JoinTable(name="friends",joinColumns={@ORM\JoinColumn(name="user_id",referencedColumnName="id")},
     *                inverseJoinColumns={@ORM\JoinColumn(name="friend_user_id",referencedColumnName="id")})
     */
    private $friends;
    
    /**
     * @ORM\ManyToMany(targetEntity="User",mappedBy="friends")
     */
    private $friendswithme;
    
    
    /**
     *
     * @ORM\OneToMany(targetEntity="Comment",mappedBy="user")
     *
     */
    protected $comments;
    
    public function __construct()
    {
        parent::__construct();
        $this->statuses=new ArrayCollection();
        $this->friends=new ArrayCollection();
        $this->friendswithme=new ArrayCollection();
        $this->comments=new ArrayCollection();
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
     * Set username
     *
     * @param string $username
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Add statuses
     *
     * @param \TechCorp\FrontBundle\Entity\status $statuses
     * @return User
     */
    public function addStatus(\TechCorp\FrontBundle\Entity\status $statuses)
    {
        $this->statuses[] = $statuses;

        return $this;
    }

    /**
     * Remove statuses
     *
     * @param \TechCorp\FrontBundle\Entity\status $statuses
     */
    public function removeStatus(\TechCorp\FrontBundle\Entity\status $statuses)
    {
        $this->statuses->removeElement($statuses);
    }

    /**
     * Get statuses
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getStatuses()
    {
        return $this->statuses;
    }

    /**
     * Add friends
     *
     * @param \TechCorp\FrontBundle\Entity\User $friends
     * @return User
     */
    public function addFriend(\TechCorp\FrontBundle\Entity\User $friends)
    {
        $this->friends[] = $friends;

        return $this;
    }

    /**
     * Remove friends
     *
     * @param \TechCorp\FrontBundle\Entity\User $friends
     */
    public function removeFriend(\TechCorp\FrontBundle\Entity\User $friends)
    {
        $this->friends->removeElement($friends);
    }

    /**
     * Get friends
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFriends()
    {
        return $this->friends;
    }

    /**
     * Add friendswithme
     *
     * @param \TechCorp\FrontBundle\Entity\User $friendswithme
     * @return User
     */
    public function addFriendswithme(\TechCorp\FrontBundle\Entity\User $friendswithme)
    {
        $this->friendswithme[] = $friendswithme;

        return $this;
    }

    /**
     * Remove friendswithme
     *
     * @param \TechCorp\FrontBundle\Entity\User $friendswithme
     */
    public function removeFriendswithme(\TechCorp\FrontBundle\Entity\User $friendswithme)
    {
        $this->friendswithme->removeElement($friendswithme);
    }

    /**
     * Get friendswithme
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFriendswithme()
    {
        return $this->friendswithme;
    }
    
    
    /** 
     * hasfriend friend 
     * @param User $friend
     * @return boolean
     */
    
    public function hasFriend(User $friend)
    {
        return $this->friends->contains($friend);
    }
    
    /**
     * canAddfriend friend
     * @param User $friend
     * return boolean
     */
    public function canAddfriend(User $friend)
    {
      return $this!=$friend && !$this->hasFriend($friend);   
    }
    
    
    

    /**
     * Add comments
     *
     * @param \TechCorp\FrontBundle\Entity\Comment $comments
     * @return User
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
