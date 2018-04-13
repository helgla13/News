<?php
    /**
     * Created by PhpStorm.
     * User: andrey
     * Date: 09.04.18
     * Time: 11:45
     */

    namespace AppBundle\Repository;


    use Doctrine\ORM\EntityRepository;

    class CategoriesRepository extends EntityRepository
    {

//        public function findAllCategories()
//        {
//            return $this->createQueryBuilder('allcategories')
//                ->andWhere('allcategories.isActive=:isActive')
//                ->setParameter('isActive',1)
//                ->orderBy('allcategories.id','ASC')
//                ->getQuery()
//                ->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);
//           //     ->execute();
//
//
//        }


    }