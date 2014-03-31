<?php
// KoT/CoreBundle/Document/Game.php

namespace KoT\CoreBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
/**
 * @MongoDB\Document(collection="Game", repositoryClass="KoT\CoreBundle\Document\Repository\GameRepository")
 */
class Game
{

    const MAX_PLAYER_NUMBER = 4;
    const MAX_HEART_NUMBER = 12;

    public function __construct()
    {
        $this->setCreated(time());
        $this->setUpdated(time());
    }

    /**
     * @MongoDB\preUpdate
     */
    public function setUpdatedValue(array &$data)
    {
       $this->setUpdated(time());
        //quand on passe le jeux à started, on selectionne un joeur au hasard pour être le current player
       if(isset($data['started']) && $data['started'] == true){
            $players = $data['players'];
            $data['currentPlayer'] = $players[1];
       }

    }
    /**
    * @MongoDB\PreLoad
    **/
    
    /**
     * @MongoDB\Id
     */
    protected $id;

    /**
     * @MongoDB\ReferenceMany(
     *  targetDocument="Player",
     *  inversedBy="game"
     * )
     */
    protected $players;

 
    /**
     * @MongoDB\ReferenceOne(
     *  targetDocument="Player"
     * )
     */
    protected $currentPlayer;

    /**
     * @MongoDB\Boolean
     */
    protected $started = false;

    /**
     * @MongoDB\Int
     */
    protected $configStars = 20;
    
    /**
     * @MongoDB\Int
     */
    protected $configHearts = 10;

    
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
     * Add player
     *
     * @param KoT\CoreBundle\Document\Player $player
     */
    public function addPlayer(\KoT\CoreBundle\Document\Player $player)
    {
        $this->players[] = $player;
        if(count($this->players) == Game::MAX_PLAYER_NUMBER){
            $this->started = true;
        } 
    }

    /**
     * Remove player
     *
     * @param KoT\CoreBundle\Document\Player $player
     */
    public function removePlayer(\KoT\CoreBundle\Document\Player $player)
    {
        $this->players->removeElement($player);
    }

    /**
     * Get players
     *
     * @return Doctrine\Common\Collections\Collection $players
     */
    public function getPlayers()
    {
        return $this->players;
    }

   
    /**
     * Set currentPlayer
     *
     * @param KoT\CoreBundle\Document\Player $currentPlayer
     * @return self
     */
    public function setCurrentPlayer(\KoT\CoreBundle\Document\Player $currentPlayer)
    {
        $this->currentPlayer = $currentPlayer;
        return $this;
    }

    /**
     * Get currentPlayer
     *
     * @return KoT\CoreBundle\Document\Player $currentPlayer
     */
    public function getCurrentPlayer()
    {
        return $this->currentPlayer;
    }

    /**
     * Set started
     *
     * @param boolean $started
     * @return self
     */
    public function setStarted($started)
    {
        $this->started = $started;
        return $this;
    }

    /**
     * Get started
     *
     * @return boolean $started
     */
    public function getStarted()
    {
        return $this->started;
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
     * Set configStars
     *
     * @param int $configStars
     * @return self
     */
    public function setConfigStars($configStars)
    {
        $this->configStars = $configStars;
        return $this;
    }

    /**
     * Get configStars
     *
     * @return int $configStars
     */
    public function getConfigStars()
    {
        return $this->configStars;
    }

    /**
     * Set configHearts
     *
     * @param int $configHearts
     * @return self
     */
    public function setConfigHearts($configHearts)
    {
        $this->configHearts = $configHearts;
        return $this;
    }

    /**
     * Get configHearts
     *
     * @return int $configHearts
     */
    public function getConfigHearts()
    {
        return $this->configHearts;
    }

    public function getPlayerInTokyo(){
        foreach ($this->getPlayers() as $player) {
            if($player->getInTokyo()){
                return $player;
            }
        }
        return null;
    }

    public function getPlayerInTokyoName(){
        if(!is_null($this->getPlayerInTokyo())){
            return $this->getPlayerInTokyo()->getPlayerName();
        }else{
            return "Pas de joueur dans tokyo";
        }
    }
    
    public function getCurrentPlayerName(){
        if(!is_null($this->getCurrentPlayer())){
            return $this->getCurrentPlayer()->getPlayerName();
        }
        return null;
    }
}
