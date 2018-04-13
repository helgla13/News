<?php
    /**
     * Created by PhpStorm.
     * User: andrey
     * Date: 08.04.18
     * Time: 11:41
     */

    namespace AppBundle\Controller;


    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
    use Symfony\Bundle\FrameworkBundle\Controller\Controller;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Response;

    class PagesController extends Controller
    {

        /**
         * @Route("/")
         *
         */

        public function showAction()

        {
            //$category=['Происшествия', 'Спорт', 'Экономика', 'Политика', 'Технологии', 'Мир', 'Наука'];

            $em = $this->getDoctrine()->getManager();
            $categ=$em->getRepository('AppBundle:Category')->findAll();



            for ($i=0;$i<count($categ);$i++) {
                $em = $this->getDoctrine()->getManager();
                $news[$i] = $em->getRepository('AppBundle:News')->findFiveRecent($categ[$i]);

            }

            $em = $this->getDoctrine()->getManager();
            $img_rec=$em->getRepository('AppBundle:News')->findImageRecent();
            dump($img_rec[1]);




            return $this->render('news/show.main.twig',[
                'news1'=>$news[0],
                'news2'=>$news[1],
                'news3'=>$news[2],
                'news4'=>$news[3],
                'news5'=>$news[4],
                'news6'=>$news[5],
                'news7'=>$news[6],
                'img1'=>$img_rec[0],
                'img2'=>$img_rec[1],
                'img3'=>$img_rec[2],
                'img4'=>$img_rec[3],
                'img5'=>$img_rec[4]

            ]);


        }


        /**
         * @Route("/{category}", name="categories",requirements={
         *     "category":"accidents|sport|economics|politics|technology|world|science"}))
         */

        public function showCategoryAction($category)

        {
            //$category='1';
            $cat_arr=
                ['accidents'=>'Происшествия',
                 'sport'=>'Спорт',
                 'economics'=>'Экономика',
                 'politics'=>'Политика',
                 'technology'=>'Технологии',
                 'world'=>'Мир',
                 'science'=>'Наука'
                ];
            $val=$cat_arr[$category];
            $em = $this->getDoctrine()->getManager();
            $news = $em->getRepository('AppBundle:News')->findFivebyCategory($val,5,0);
       //     dump(($news));


            return $this->render('news/show.category.twig',[
                'news'=>$news,
                'category'=>$category,
                'category_ru'=>$val,

            ]);



        }




        /**
         * @Route("/{category}/{newsID}", name="news_description", requirements={
         *     "newsID": "\d+"})
         *
         */
        public function showSingleNewsAction($category,$newsID)
        {
            $cat_arr=
                ['accidents'=>'Происшествия',
                    'sport'=>'Спорт',
                    'economics'=>'Экономика',
                    'politics'=>'Политика',
                    'technology'=>'Технологии',
                    'world'=>'Мир',
                    'science'=>'Наука'
                ];
            $val=$cat_arr[$category];

            $em = $this->getDoctrine()->getManager();
            $res = $em->getRepository('AppBundle:News')->getOneNew($val,$newsID);
            dump($res['0']);

            $em = $this->getDoctrine()->getManager();
           // $com=$em->getRepository('AppBundle:Comments')->findComments($newsID);
      //      dump($com);
            return $this->render('news/show.news.twig',[
                'category'=>$val,
                'news'=>$res[0],
                'title'=>$res[0],

            ]);
        }


        /**
         * @Route("/{category}/page{pageID}", requirements={"pageID": "\d+"})
         */

        public function paginationAction($category,$pageID)
        {
            $newsPerPage=5;
            $cat_arr=
                ['accidents'=>'Происшествия',
                    'sport'=>'Спорт',
                    'economics'=>'Экономика',
                    'politics'=>'Политика',
                    'technology'=>'Технологии',
                    'world'=>'Мир',
                    'science'=>'Наука'
                ];
            $val=$cat_arr[$category];
            $em = $this->getDoctrine()->getManager();
            $cnt = $em->getRepository('AppBundle:News')->countAllNews($val);
            dump($val);
            dump($cnt[0][1]);
            $numpages=ceil($cnt[0][1]/$newsPerPage);
            $offset=$pageID*$newsPerPage-$newsPerPage;
            $news = $em->getRepository('AppBundle:News')->findFivebyCategory($val,$newsPerPage,$offset);
            dump($news);
            return $this->render('news/show.category.pagination.twig',[
                'numpages'=>$numpages,
                'news'=>$news,
                'category_ru'=>$val,
                'category'=>$category,

            ]);


        }





    }