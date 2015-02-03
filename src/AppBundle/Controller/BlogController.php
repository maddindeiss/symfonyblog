<?php
/**
 * Created by PhpStorm.
 * User: martindeiss
 * Date: 03.02.15
 * Time: 12:33
 */


namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Blog controller.
 */
class BlogController extends Controller
{
    /**
     * Show a blog entry
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $blog = $em->getRepository('AppBundle:Blog')->find($id);

        if (!$blog) {
            throw $this->createNotFoundException('Unable to find Blog post.');
        }

        return $this->render('AppBundle:Blog:show.html.twig', array(
            'blog'      => $blog,
        ));
    }
}