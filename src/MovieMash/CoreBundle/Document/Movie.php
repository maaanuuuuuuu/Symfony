<?php

namespace MovieMash\CoreBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * The movie class
 * 
 * @MongoDB\Document(collection="Movie", repositoryClass="MovieMash\CoreBundle\Document\Repository\MovieRepository")
 */
class Movie
{
    /**
     * @MongoDB\Id
     */
    protected $id;

    /**
     * @MongoDB\String
     */
    private $name;

    /**
     * @MongoDB\String
     */
    private $coverURL;

    /**
     * @MongoDB\String
     */
    private $eloRating = 1000;

    /**
     * @MongoDB\String
     */
    private $imdbRating;

    /**
     * @MongoDB\String
     */
    private $date;

    /**
     * @MongoDB\String
     */
    private $views;

    /**
     * @MongoDB\Boolean
     */
    private $seen = true;

    /**
     * the contructor
     * @param [type] $name       [description]
     * @param [type] $imdbRating [description]
     * @param [type] $date       [description]
     * @param [type] $views      [description]
     */
    public function __construct($name, $imdbRating, $date, $views)
    {
        $this->name = $name;
        $this->imdbRating = $imdbRating;
        $this->date = $date;
        $this->views = $views;
    }

    /**
     * Gets the value of id.
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Gets the value of name.
     *
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the value of name.
     *
     * @param mixed $name the name
     *
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Gets the value of coverURL.
     *
     * @return mixed
     */
    public function getCoverURL()
    {
        return $this->coverURL;
    }

    /**
     * Sets the value of coverURL.
     *
     * @param mixed $coverURL the cover u r l
     *
     * @return self
     */
    public function setCoverURL($coverURL)
    {
        $this->coverURL = $coverURL;

        return $this;
    }

    /**
     * Gets the value of eloRating.
     *
     * @return mixed
     */
    public function getEloRating()
    {
        return $this->eloRating;
    }

    /**
     * Sets the value of eloRating.
     *
     * @param mixed $eloRating the elo rating
     *
     * @return self
     */
    public function setEloRating($eloRating)
    {
        $this->eloRating = $eloRating;

        return $this;
    }

    /**
     * Gets the value of imdbRating.
     *
     * @return mixed
     */
    public function getImdbRating()
    {
        return $this->imdbRating;
    }

    /**
     * Gets the value of date.
     *
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Gets the value of views.
     *
     * @return mixed
     */
    public function getViews()
    {
        return $this->views;
    }

    /**
     * Sets the value of imdbRating.
     *
     * @param mixed $imdbRating the imdb rating
     *
     * @return self
     */
    public function setImdbRating($imdbRating)
    {
        $this->imdbRating = $imdbRating;

        return $this;
    }

    /**
     * Sets the value of date.
     *
     * @param mixed $date the date
     *
     * @return self
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Sets the value of views.
     *
     * @param mixed $views the views
     *
     * @return self
     */
    public function setViews($views)
    {
        $this->views = $views;

        return $this;
    }

    /**
     * Gets the value of seen.
     *
     * @return mixed
     */
    public function getSeen()
    {
        return $this->seen;
    }

    /**
     * Sets the value of seen.
     *
     * @param mixed $seen the seen
     *
     * @return self
     */
    public function setSeen($seen)
    {
        $this->seen = $seen;

        return $this;
    }
}
