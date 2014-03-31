<?php
// KoT/CoreBundle/Document/Card.php

namespace KoT\CoreBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
/**
 * @MongoDB\Document(collection="Card")
 */
class Card
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
    protected $cardCode;

    /**
     * @MongoDB\String
     */
    protected $cardName;

    /**
     * @MongoDB\String
     */
    protected $description;

    /**
     * @MongoDB\String
     */
    protected $imageFileName;

    /**
     * @MongoDB\Int
     */
    protected $price;

    
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
     * Set cardCode
     *
     * @param string $cardCode
     * @return self
     */
    public function setCardCode($cardCode)
    {
        $this->cardCode = $cardCode;
        return $this;
    }

    /**
     * Get cardCode
     *
     * @return string $cardCode
     */
    public function getCardCode()
    {
        return $this->cardCode;
    }

    /**
     * Set cardName
     *
     * @param string $cardName
     * @return self
     */
    public function setCardName($cardName)
    {
        $this->cardName = $cardName;
        return $this;
    }

    /**
     * Get cardName
     *
     * @return string $cardName
     */
    public function getCardName()
    {
        return $this->cardName;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return self
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Get description
     *
     * @return string $description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set imageFileName
     *
     * @param string $imageFileName
     * @return self
     */
    public function setImageFileName($imageFileName)
    {
        $this->imageFileName = $imageFileName;
        return $this;
    }

    /**
     * Get imageFileName
     *
     * @return string $imageFileName
     */
    public function getImageFileName()
    {
        return $this->imageFileName;
    }

    /**
     * Set price
     *
     * @param int $price
     * @return self
     */
    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }

    /**
     * Get price
     *
     * @return int $price
     */
    public function getPrice()
    {
        return $this->price;
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
