<?php
// src/Dev/CoreBundle/Document/Trello/Card.php

namespace Dev\CoreBundle\Document\Trello;

use Dev\CoreBundle\Document\Trello\Board;
use Dev\CoreBundle\Document\Trello\Comment;


use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
/**
 * @MongoDB\Document(collection="TrelloCard")
 */
class Card
{
	/**
     * @MongoDB\Id
     */
    protected $id;

    /**
     * @MongoDB\String
     */
    protected $idTrello;

    /**
     * @MongoDB\String
     */
    protected $name;

    /**
     * @MongoDB\String
     */
    protected $shortUrl;

    /**
     * @MongoDB\String
     */
    protected $desc;

    /**
     * @MongoDB\TimeStamp
     */
    protected $dateLastActivity;

    /**
     * @MongoDB\ReferenceOne(
     *  targetDocument="Document\Trello\Board",
     *  inversedBy = "cards"
     * )
     */
    protected $board;

    /**
     * @MongoDB\ReferenceMany(
     *  targetDocument="Document\Trello\Comment",
     *  mappedBy = "card"
     * )
     */
    protected $comments;

    public function __construct()
    {
        $this->comments = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Get id
     *
     * @return id $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set shortUrl
     *
     * @param string $shortUrl
     * @return self
     */
    public function setShortUrl($shortUrl)
    {
        $this->shortUrl = $shortUrl;
        return $this;
    }

    /**
     * Get shortUrl
     *
     * @return string $shortUrl
     */
    public function getShortUrl()
    {
        return $this->shortUrl;
    }

    /**
     * Set desc
     *
     * @param string $desc
     * @return self
     */
    public function setDesc($desc)
    {
        $this->desc = $desc;
        return $this;
    }

    /**
     * Get desc
     *
     * @return string $desc
     */
    public function getDesc()
    {
        return $this->desc;
    }

    /**
     * Set dateLastActivity
     *
     * @param string $dateLastActivity
     * @return self
     */
    public function setDateLastActivity($dateLastActivity)
    {
        $this->dateLastActivity = $dateLastActivity;
        return $this;
    }

    /**
     * Get dateLastActivity
     *
     * @return string $dateLastActivity
     */
    public function getDateLastActivity()
    {
        return $this->dateLastActivity;
    }

    /**
     * Set board
     *
     * @param Document\Trello\Board $board
     * @return self
     */
    public function setBoard(Board $board)
    {
        $this->board = $board;
        return $this;
    }

    /**
     * Get board
     *
     * @return Document\Trello\Board $board
     */
    public function getBoard()
    {
        return $this->board;
    }

    /**
     * Add comment
     *
     * @param Document\Trello\Comment $comment
     */
    public function addComment(Comment $comment)
    {
        $this->comments[] = $comment;
    }

    /**
     * Remove comment
     *
     * @param Document\Trello\Comment $comment
     */
    public function removeComment(Comment $comment)
    {
        $this->comments->removeElement($comment);
    }

    /**
     * Get comments
     *
     * @return Doctrine\Common\Collections\Collection $comments
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Set idTrello
     *
     * @param string $idTrello
     * @return self
     */
    public function setIdTrello($idTrello)
    {
        $this->idTrello = $idTrello;
        return $this;
    }

    /**
     * Get idTrello
     *
     * @return string $idTrello
     */
    public function getIdTrello()
    {
        return $this->idTrello;
    }
}
