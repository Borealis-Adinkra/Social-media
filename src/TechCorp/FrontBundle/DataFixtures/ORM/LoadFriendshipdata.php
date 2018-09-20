<?php
namespace TechCorp\FrontBundle\DataFixtures\ORM;


use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use TechCorp\FrontBundle\Entity\User;


class LoadFriendshipdata extends AbstractFixture implements OrderedFixtureInterface
{
	const MAX_NB_FRIENDSHIP=5;
	
    public function load(ObjectManager $manager)
    {
     for($i=0;$i<LoadUserData::MAX_NB_USER;++$i)
     {
     	$curentUser=$this->getReference('user'.$i);
     	$j=0;
     	$nbFriends=rand(0,self::MAX_NB_FRIENDSHIP);
     	
     	while ($j < $nbFriends)
     	{
     	    $curentFriend=$this->getReference('user'.rand(0,9));
     	    if($curentUser->canAddfriend($curentFriend))
     	    {
     	        $curentUser->addFriend($curentFriend);
     	        $j++;
     	    }
     	}
    
     	$manager->persist($curentUser);
     }
        $manager->flush();
    }
    
    public function getOrder()
    {
        return 3;
    }


    
}