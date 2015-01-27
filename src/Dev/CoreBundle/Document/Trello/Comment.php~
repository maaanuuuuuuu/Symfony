<?php
// src/Dev/CoreBundle/Document/Trello/Comment.php

namespace Dev\CoreBundle\Document\Trello;

use Dev\CoreBundle\Document\Trello\Card;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
/**
 * @MongoDB\Document(collection="TrelloComment")
 */
class Comment
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
    protected $text;

    /**
     * @MongoDB\Timestamp
     */
    protected $created;

    /**
     * @MongoDB\Timestamp
     */
    protected $updated;

    /**
     * @MongoDB\ReferenceOne(
     *  targetDocument="Document\Trello\Card",
     *  inversedBy = "comments"
     * )
     */
    protected $card;


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
     * Set text
     *
     * @param string $text
     * @return self
     */
    public function setText($text)
    {
        $this->text = $text;
        return $this;
    }

    /**
     * Get text
     *
     * @return string $text
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set card
     *
     * @param Document\Trello\Card $card
     * @return self
     */
    public function setCard(Card $card)
    {
        $this->card = $card;
        return $this;
    }

    /**
     * Get card
     *
     * @return Document\Trello\Card $card
     */
    public function getCard()
    {
        return $this->card;
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

    /**
     * Set created
     *
     * @param timestamp $created
     * @return self
     */
    public function setCreated($created)
    {
        $this->created = $created;
        return $this;
    }

    /**
     * Get created
     *
     * @return timestamp $created
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param timestamp $updated
     * @return self
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;
        return $this;
    }

    /**
     * Get updated
     *
     * @return timestamp $updated
     */
    public function getUpdated()
    {
        return $this->updated;
    }
}
