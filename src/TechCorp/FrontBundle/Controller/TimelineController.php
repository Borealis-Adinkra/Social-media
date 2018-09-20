<?php
namespace  TechCorp\FrontBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use TechCorp\FrontBundle\Entity\Status;
use TechCorp\FrontBundle\Form\StatusType;


Class TimelineController extends Controller
{
    public function timelineAction()
    {
    	$em=$this->getDoctrine()->getManager();
    	
    	$statuses=$em->getRepository('TechCorpFrontBundle:Status')->getStatus()->getResult();
  
    	
    	return $this->render('TechCorpFrontBundle:Timeline:timeline.html.twig',
    			array('statuses'=>$statuses));
    }

    
    public function UserTimeLineAction($userid)
    {
        $em=$this->getDoctrine()->getManager();
        $user=$em->getRepository('TechCorpFrontBundle:User')->findOneById($userid);
        if(!$user)
        {
            $this->createNotFoundException('User not found');    
        }
        $authenticatedUser=$this->get('security.context')->getToken()->getUser();
        $status=new Status();
        $status->setDeleted(false);
        $status->setUser($authenticatedUser);
        $form=$this->createForm(new StatusType(),$status);
        $request=$this->getRequest();
        $form->handleRequest($request);
        if($authenticatedUser && $form->isValid())
        {
        $em->persist($status);
        $em->flush();
        $this->redirect($this->generateUrl('tech_corp_front_usertimeline',array('userid' => $authenticatedUser->getId())));
        }
        $statuses=$em->getRepository('TechCorpFrontBundle:Status')->getUserTimeline($user)->getResult();
        
         return $this->render('TechCorpFrontBundle:Timeline:usertimeline.html.twig',
             array('user'=>$user,'statuses'=>$statuses,'form' =>$form->createView()));
         
        
        
    }
    
    public function FriendsTimeLineAction($userid)
    {
        $em=$this->getDoctrine()->getManager();
        $user=$em->getRepository('TechCorpFrontBundle:User')->findOneById($userid);
        if(!$user)
        {
            $this->createNotFoundException('User not found');
        }
        
        $statuses=$em->getRepository('TechCorpFrontBundle:Status')->getFriendsTimeline($user)->getResult();
        
        return $this->render('TechCorpFrontBundle:Timeline:friendstimeline.html.twig',
            array('user'=>$user,'statuses'=>$statuses));
        
    }
    
}