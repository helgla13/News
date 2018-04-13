<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comments
 *
 * @ORM\Table(name="comments", indexes={@ORM\Index(name="fk_comments_users", columns={"user_id"}), @ORM\Index(name="fk_comments_news", columns={"news_id"})})
 * @ORM\Entity
 *
 */
class Comments
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\News", inversedBy="comments")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="text", length=65535, nullable=false)
     */
    private $comment;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_active", type="boolean", nullable=false)
     */
    private $isActive;

    /**
     * @var integer
     *
     * @ORM\Column(name="vote_like", type="integer", nullable=false)
     */
    private $voteLike;

    /**
     * @var integer
     *
     * @ORM\Column(name="vote_dislike", type="integer", nullable=false)
     */
    private $voteDislike;

    /**
     * @var integer
     *
     * @ORM\Column(name="user_id", type="integer", nullable=false)
     */
    private $userId;

    /**
     * @var integer
     *
     * @ORM\Column(name="news_id", type="integer", nullable=false)
     */
    private $newsId;


    /**
     *@ORM\ManyToOne(targetEntity="AppBundle\Entity\News", inversedBy="comments")
     * @ORM\JoinColumn()
     */
    private $news;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @return bool
     */
    public function isActive()
    {
        return $this->isActive;
    }

    /**
     * @return int
     */
    public function getVoteLike()
    {
        return $this->voteLike;
    }

    /**
     * @return int
     */
    public function getVoteDislike()
    {
        return $this->voteDislike;
    }

    /**
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @return int
     */
    public function getNewsId()
    {
        return $this->newsId;
    }

    /**
     * @return News
     */
    public function getNews()
    {
        return $this->news;
    }




}

