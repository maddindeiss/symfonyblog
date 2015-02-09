<?php
/**
 * Created by PhpStorm.
 * User: martindeiss
 * Date: 04.02.15
 * Time: 10:43
 */

namespace AppBundle\Controller;

use AppBundle\Manager\CommentManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Comment;
use AppBundle\Form\CommentType;
use Symfony\Component\HttpFoundation\Request;

/**
 * Comment controller.
 */
class CommentController extends Controller
{
    public function newAction($blog_id)
    {
        $blog = $this->getBlog($blog_id);

        $comment = new Comment();
        $comment->setBlog($blog);
        $form   = $this->createForm(new CommentType(), $comment);

        return $this->render('AppBundle:Comment:form.html.twig', array(
            'comment' => $comment,
            'form'   => $form->createView()
        ));
    }

    public function createAction(Request $request, $blog_id)
    {
        $blog = $this->getBlog($blog_id);

        $commentManager = $this->get('blog.manager.comment');

        $comment  = $commentManager->create();
        $comment->setBlog($blog);
        //$request = $this->getRequest();
        $form    = $this->createForm(new CommentType(), $comment);
        //$form->bindRequest($request);
        $form->submit($request);

        if ($form->isValid()) {

            $commentManager->persist($comment);

            return $this->redirect($this->generateUrl('app_blog_show', array(
                    'id' => $comment->getBlog()->getId(),
                    'slug'  => $comment->getBlog()->getSlug())) .
                    '#comment-' . $comment->getId()
            );
        }

        return $this->render('AppBundle:Comment:create.html.twig', array(
            'comment' => $comment,
            'form'    => $form->createView()
        ));
    }

    protected function getBlog($blog_id)
    {
        $em = $this->getDoctrine()
            ->getManager();

        $blog = $em->getRepository('AppBundle:Blog')->find($blog_id);

        if (!$blog) {
            throw $this->createNotFoundException('Unable to find Blog post.');
        }

        return $blog;
    }

}