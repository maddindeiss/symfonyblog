<?php
/**
 * Created by PhpStorm.
 * User: martindeiss
 * Date: 09.02.15
 * Time: 13:25
 */

namespace AppBundle\Manager;

use AppBundle\Entity\Comment;
use AppBundle\Entity\Repository\CommentRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

class CommentManager {

    /**
     * @var ManagerRegistry
     */
    protected $managerRegistry;


    protected $modelClass;


    /**
     * @var CommentRepository;
     */
    protected $repository;


    function __construct(ManagerRegistry $managerRegistry, $modelClass)
    {
        $this->managerRegistry = $managerRegistry;
        $this->modelClass = $modelClass;
    }

    public function create()
    {
        return new Comment();
    }

    public function persist(Comment $comment, $flush = true)
    {
        $this->managerRegistry->getManager()->persist($comment);
        if ($flush) {
            $this->managerRegistry->getManager()->flush();
        }
    }

    /**
     * @return CommentRepository
     */
    public function getRepository()
    {
        if (!$this->repository) {
            $this->setRepository($this->managerRegistry->getRepository($this->modelClass));
        }

        return $this->repository;
    }

    /**
     * @param CommentRepository $repository
     */
    public function setRepository(CommentRepository $repository)
    {
        $this->repository = $repository;
    }

}