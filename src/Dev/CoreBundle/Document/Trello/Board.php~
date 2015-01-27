<?php
// src/Dev/CoreBundle/Document/Trello/Board.php

namespace Dev\CoreBundle\Document\Trello;

use Dev\CoreBundle\Document\Trello\Card;


use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
/**
 * @MongoDB\Document(collection="TrelloBoard")
 */
class Board
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
    protected $url;

    /**
     * @MongoDB\ReferenceMany(
     *  targetDocument="Document\Trello\Card",
     *  mappedBy = "board"
     * )
     */
    protected $cards;

    public function __construct()
    {
        $this->cards = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set url
     *
     * @param string $url
     * @return self
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * Get url
     *
     * @return string $url
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Add card
     *
     * @param Document\Trello\Card $card
     */
    public function addCard(Card $card)
    {
        $this->cards[] = $card;
    }

    /**
     * Remove card
     *
     * @param Document\Trello\Card $card
     */
    public function removeCard(Card $card)
    {
        $this->cards->removeElement($card);
    }

    /**
     * Get cards
     *
     * @return Doctrine\Common\Collections\Collection $cards
     */
    public function getCards()
    {
        return $this->cards;
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
