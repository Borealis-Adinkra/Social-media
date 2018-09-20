<?php
namespace  TechCorp\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

Class SecurityController extends Controller
{
    public function loginAction()
    {
    	
    	return $this->render('TechCorpFrontBundle:Security:login.html.twig');
    }

    public function securedAction()
    {
        $user=$this->getUser();
        return $this->render('TechCorpFrontBundle:Security:secured.html.twig',
                              array('user'=>$user));
    }
    
}