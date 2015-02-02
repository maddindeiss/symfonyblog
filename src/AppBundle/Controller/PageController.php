<?php
/**
 * Created by PhpStorm.
 * User: martindeiss
 * Date: 02.02.15
 * Time: 15:24
 */


namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PageController extends Controller
{
    public function indexAction()
    {
        return $this->render('AppBundle::index.html.twig');
    }

    public function aboutAction()
    {
        return $this->render('AppBundle:Page:about.html.twig');

    }

}