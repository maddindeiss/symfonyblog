<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class MyControllerController extends Controller
{

    public function testAction($name)
    {
        //return array('name' => $name);
        return $this->render('AppBundle:Default:index.html.twig', array('name' => $name));
    }
}
