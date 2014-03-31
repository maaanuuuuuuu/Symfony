<?php
// KoT/Dev/CoreBundle/Document/Player.php

namespace KoT\CoreBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
/**
 * @MongoDB\Document(collection="Player")
 */
class Player
{

    public function __construct()
    {
        $this->setCreated(time());
        $this->setUpdated(time());
    }

    /**
     * @MongoDB\preUpdate
     */
    public function setUpdatedValue()
    {
       $this->setUpdated(time());
    }
    
    /**
     * @MongoDB\Id
     */
    protected $id;

    /**
     * @MongoDB\String
     */
    protected $playerName;

    /**
     * @MongoDB\Int
     */
    protected $stars = 0;

    /**
     * @MongoDB\Int
     */
    protected $hearts = 10;

    /**
     * @MongoDB\Int
     */
    protected $maxHeartsNumber = 10;

    /**
     * @MongoDB\Int
     */
    protected $numberOfDices = 6;

    /**
     * @MongoDB\ReferenceMany(
     *  targetDocument="Card"
     * )
     */
    protected $cards;

    /**
     * @MongoDB\Boolean
     */
    protected $inTokyo = false;

    /**
     * @MongoDB\ReferenceOne(
     *  targetDocument="Game",
     *  mappedBy="players"
     * )
     */
    protected $currentGame;

    /**
     * @MongoDB\Timestamp
     */
    protected $created;

    /**
     * @MongoDB\Timestamp
     */
    protected $updated;

    

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
     * Set playerName
     *
     * @param string $playerName
     * @return self
     */
    public function setPlayerName($playerName)
    {
        $this->playerName = $playerName;
        return $this;
    }

    /**
     * Get playerName
     *
     * @return string $playerName
     */
    public function getPlayerName()
    {
        return $this->playerName;
    }

    /**
     * Set stars
     *
     * @param int $stars
     * @return self
     */
    public function setStars($stars)
    {
        $this->stars = $stars;
        return $this;
    }

    /**
     * Get stars
     *
     * @return int $stars
     */
    public function getStars()
    {
        return $this->stars;
    }

    /**
     * Set hearts
     *
     * @param int $hearts
     * @return self
     */
    public function setHearts($hearts)
    {
        $this->hearts = $hearts;
        return $this;
    }

    /**
     * Get hearts
     *
     * @return int $hearts
     */
    public function getHearts()
    {
        return $this->hearts;
    }

    /**
     * Set numberOfDices
     *
     * @param int $numberOfDices
     * @return self
     */
    public function setNumberOfDices($numberOfDices)
    {
        $this->numberOfDices = $numberOfDices;
        return $this;
    }

    /**
     * Get numberOfDices
     *
     * @return int $numberOfDices
     */
    public function getNumberOfDices()
    {
        return $this->numberOfDices;
    }

    /**
     * Add card
     *
     * @param KoT\CoreBundle\Document\Card $card
     */
    public function addCard(\KoT\CoreBundle\Document\Card $card)
    {
        $this->cards[] = $card;
    }

    /**
     * Remove card
     *
     * @param KoT\CoreBundle\Document\Card $card
     */
    public function removeCard(\KoT\CoreBundle\Document\Card $card)
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
     * Set inTokyo
     *
     * @param boolean $inTokyo
     * @return self
     */
    public function setInTokyo($inTokyo)
    {
        $this->inTokyo = $inTokyo;
        return $this;
    }

    /**
     * Get inTokyo
     *
     * @return boolean $inTokyo
     */
    public function getInTokyo()
    {
        return $this->inTokyo;
    }

    /**
     * Set currentGame
     *
     * @param KoT\CoreBundle\Document\Game $currentGame
     * @return self
     */
    public function setCurrentGame(\KoT\CoreBundle\Document\Game $currentGame)
    {
        $this->currentGame = $currentGame;
        return $this;
    }

    /**
     * Get currentGame
     *
     * @return KoT\CoreBundle\Document\Game $currentGame
     */
    public function getCurrentGame()
    {
        return $this->currentGame;
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

    /**
     * Set maxHeartsNumber
     *
     * @param int $maxHeartsNumber
     * @return self
     */
    public function setMaxHeartsNumber($maxHeartsNumber)
    {
        $this->maxHeartsNumber = $maxHeartsNumber;
        return $this;
    }

    /**
     * Get maxHeartsNumber
     *
     * @return int $maxHeartsNumber
     */
    public function getMaxHeartsNumber()
    {
        return $this->maxHeartsNumber;
    }
}
