<?php
    /**
     * Created by PhpStorm.
     * User: andrey
     * Date: 08.04.18
     * Time: 20:43
     */

    namespace AppBundle\Repository;


    use Doctrine\ORM\EntityRepository;

    class NewsRepository extends EntityRepository
    {

        public function findFiveRecent($category)
        {
            return $this->createQueryBuilder('topnews')
                ->andWhere('topnews.isActive=:isActive')
                ->andWhere('topnews.category=:category')
                ->setParameter('isActive',1)
                ->setParameter("category",$category)
                ->orderBy('topnews.createdAt','DESC')
                ->setMaxResults(5)
                ->getQuery()
                ->execute();
        }


        public function findImageRecent()
        {
            return $this->createQueryBuilder('topnews')
                ->andWhere('topnews.isActive=:isActive')
                ->setParameter('isActive',1)
                ->orderBy('topnews.createdAt','DESC')
                ->setMaxResults(5)
                ->getQuery()
                ->execute();
        }


        public function findFivebyCategory($category,$limit,$offset)
        {
            return $this->createQueryBuilder('fivenews')

                ->leftJoin('fivenews.category','fc')

                ->andWhere('fc.categoryDescr=:category')
                ->setMaxResults($limit)
                ->setFirstResult($offset)
                ->setParameter("category",$category)
                ->orderBy('fivenews.createdAt','ASC')
                ->getQuery()
                ->execute();



        }

        public function countAllNews($category)
        {
            return $this->createQueryBuilder('topnews')
                ->select('count(topnews.id)')
                ->andWhere('topnews.isActive=:isActive')
                ->andWhere('topnews.title=:category')
                ->setParameter('isActive',1)
                ->setParameter("category",$category)
                ->getQuery()
                ->execute();



        }


        public function getOneNew($category,$newsID)
        {
            return $this->createQueryBuilder('onenews')
                //->select('count(onenews.id)')
                ->leftJoin('onenews.comments','c')
                ->andWhere('onenews.isActive=:isActive')
                ->andWhere('onenews.title=:category')
                ->andWhere('onenews.id=:newsID')
                ->setParameter('isActive',1)
                ->setParameter("category",$category)
                ->setParameter("newsID",$newsID)
                ->getQuery()
                ->execute();


//            return $this->createQueryBuilder('onenews')
//                //->select('count(onenews.id)')
//                ->andWhere('onenews.isActive=:isActive')
//                ->andWhere('onenews.title=:category')
//                ->andWhere('onenews.id=:newsID')
//                ->setParameter('isActive',1)
//                ->setParameter("category",$category)
//                ->setParameter("newsID",$newsID)
//                ->getQuery()
//                ->execute();

        }








    }