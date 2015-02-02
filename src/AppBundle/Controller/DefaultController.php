<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{

    public function indexAction($name)
    {
        //return array('name' => $name);
        return $this->render('AppBundle:Default:index.html.twig', array('name' => $name));
    }
}
