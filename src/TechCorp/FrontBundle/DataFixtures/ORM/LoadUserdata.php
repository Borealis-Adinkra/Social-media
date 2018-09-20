<?php
namespace TechCorp\FrontBundle\DataFixtures\ORM;


use Doctrine\Common\Persistence\ObjectManager;

use TechCorp\FrontBundle\Entity\User;
use Doctrine\Common\DataFixtures\AbstractFixture;
//use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Validator\Constraints\True;


class LoadUserData extends AbstractFixture implements ContainerAwareInterface
{
	const MAX_NB_USER=10;
	/**
	 * 
	 * @var ContainerInterface
	 */
	private $container;
	
	public function setContainer(ContainerInterface $container = null)
	{
	    $this->container=$container;
	    
	}
    public function load(ObjectManager $manager)
    {
     $faker=\Faker\Factory::create();
     $UserManger=$this->container->get('fos_user.user_manager');
     for($i=0;$i<self::MAX_NB_USER;$i++)
     {
     	$user=$UserManger->createUser();
     	$user->setUsername($faker->userName);
     	$user->setEmail($faker->email);
     	$user->setPlainPassword($faker->password);
     	$user->setEnabled(True);
     	$this->addReference('user'.$i, $user);
     	$manager->persist($user);
     	
     }
     $user=$UserManger->createUser();
     $user->setUsername('user');
     $user->setEmail('bbb@ldbc.com');
     $user->setPlainPassword('password');
     $user->setEnabled(True);
     $manager->persist($user);
        $manager->flush();
    }
    public function getOrder()
    {
        return 1;
        
    }
   



    
}