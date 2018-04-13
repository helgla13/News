<?php
    /**
     * Created by PhpStorm.
     * User: andrey
     * Date: 12.04.18
     * Time: 21:20
     */

    namespace AppBundle\Repository;


    use Doctrine\ORM\EntityRepository;

    class CommentsRepository extends EntityRepository
    {
        public function findComments($newsID)
        {

            return $this->createQueryBuilder('comm')
                ->andWhere('comm.isActive=:isActive')
                ->andWhere('comm.newsId=:newsId')
                ->setParameter('isActive',1)
                ->setParameter("newsID",$newsID)
                ->getQuery()
                ->execute();

        }

    }