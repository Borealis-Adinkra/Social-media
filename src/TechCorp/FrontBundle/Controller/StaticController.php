<?php
namespace  TechCorp\FrontBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Response;


Class StaticController extends Controller
{
    
    public function homepageAction()
    {
        
        return $this->render('TechCorpFrontBundle:Static:homepage.html.twig');
    }
    
    
    public function HelloAction($person)
    {
        return new response(json_encode(array('person'=>$person),JSON_HEX_AMP));
    }
    
    public function AboutAction()
    {
        return $this->render('TechCorpFrontBundle:Static:about.html.twig');
    }
    
}