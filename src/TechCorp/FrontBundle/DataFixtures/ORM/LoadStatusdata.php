<?php
namespace TechCorp\FrontBundle\DataFixtures\ORM;


use Doctrine\Common\Persistence\ObjectManager;
use TechCorp\FrontBundle\Entity\Status;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;


class LoadStatusData extends AbstractFixture implements OrderedFixtureInterface
{
	const MAX_NB_STATUS=20;
	
    public function load(ObjectManager $manager)
    {
     $faker=\Faker\Factory::create();
     for($i=0;$i<self::MAX_NB_STATUS;$i++)
     {
     	$status=new Status();
     	$status->setContent($faker->text(250));
     	$status->setDeleted($faker->boolean);
     	$user=$this->getReference('user'.rand(0,9));
     	$status->setUser($user);
    
     	$this->addReference('status'.$i, $status);
     	$manager->persist($status);
     }
        $manager->flush();
    }
    public function getOrder()
    {
        return 2;
    }


    
}