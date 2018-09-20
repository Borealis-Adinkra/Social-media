<?php

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use TechCorp\FrontBundle\DataFixtures\ORM\LoadStatusData;
use TechCorp\FrontBundle\Entity\Comment;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class LoadCommentdata extends AbstractFixture implements OrderedFixtureInterface
{
    const MAX_NB_COMMENTS=5;
    
    public function load(ObjectManager $manager)
    {
       
       $faker=\Faker\Factory::create();
       for($i=0;$i<LoadStatusData::MAX_NB_STATUS;$i++)
       {
           $status=$this->getReference('status'.$i);
           $comment=new Comment();
           $comment->setContent($faker->text(250));
           $comment->setStatus($status);
           $comment->setUser($this->getReference('user'.rand(0,9)));
           $manager->persist($comment);
           
           
       }
       
       $manager->flush();
            
    }
    public function getOrder()
    {
        return 4;
    }


    
}