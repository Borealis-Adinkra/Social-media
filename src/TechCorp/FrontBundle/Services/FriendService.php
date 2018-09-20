<?php
namespace TechCorp\FrontBundle\Services;

use Doctrine\ORM\EntityManager;
use TechCorp\FrontBundle\Entity\User;

class FriendService
{
    private $entitymanager;
    
    public function __construct(EntityManager $manager)
    {
        $this->entitymanager=$manager;
    }
    
    public function addfriend( User $authenticatedUser,$friendId)
    {
        $userRepository=$this->entitymanager->getRepository('TechCorpFrontBundle:User');
        
        $friend=$userRepository->findOneById($friendId);
        $result=false;
        
        if($friend && !$authenticatedUser->hasFriend($friend))
        {
            $authenticatedUser->addFriend($friend);
            $this->entitymanager->persist($authenticatedUser);
            $this->entitymanager->flush();
            $result=true;
        }
        return $result;
    }
    
    public function removeFriend(User $authenticatedUser,$friendId)
    {
        $userRepository=$this->entitymanager->getRepository('TechCorpFrontBundle:User');
        
        $friend=$userRepository->findOneById($friendId);
        $result=false;
        if($friend)
        {
            $authenticatedUser->removeFriend($friend);
            $this->entitymanager->persist($authenticatedUser);
            $this->entitymanager->flush();
            $result=true;
            
        }
        return $result;
    }
    
    
}