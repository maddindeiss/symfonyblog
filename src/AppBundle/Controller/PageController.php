<?php
/**
 * Created by PhpStorm.
 * User: martindeiss
 * Date: 02.02.15
 * Time: 15:24
 */


namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

// Import new namespaces
use AppBundle\Entity\Enquiry;
use AppBundle\Form\EnquiryType;
use Symfony\Component\HttpFoundation\Request;

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

    public function contactAction(Request $request)
    {
        $enquiry = new Enquiry();
        $form = $this->createForm(new EnquiryType(), $enquiry);

        //$request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->submit($request);

            if ($form->isValid()) {
                // Perform some action, such as sending an email

                // Redirect - This is important to prevent users re-posting
                // the form if they refresh the page
                return $this->redirect($this->generateUrl('app_contact'));
            }
        }

        return $this->render('AppBundle:Page:contact.html.twig', array(
            'form' => $form->createView()
        ));

    }




}