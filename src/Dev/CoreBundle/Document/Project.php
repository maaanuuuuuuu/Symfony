<?php
// src/Dev/CoreBundle/Document/Project.php

namespace Dev\CoreBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * This class represents Projects
 * 
 * @MongoDB\Document(collection="Project", repositoryClass="Dev\CoreBundle\Document\ProjectRepository")
 * @MongoDB\HasLifecycleCallbacks
 */
class Project
{
    /**
     * Le constructeur de blog.     
     * 
     */
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
    protected $title;

    /**
     * @MongoDB\String
     */
    protected $text;

    /**
     * @MongoDB\String
     */
    protected $indexRouteName;

    /**
     * @MongoDB\ReferenceMany(
     *  targetDocument="Blog",
     *  inversedBy = "projects"
     * )
     */
    protected $blogs;

    /**
     * @MongoDB\String
     */
    protected $googleDocLink;

    /**
     * @MongoDB\String
     */
    protected $trelloBoardLink;

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
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param  string  $title
     * @return Project
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set text
     *
     * @param  string  $text
     * @return Project
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set created
     *
     * @param  \DateTime $created
     * @return Project
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param  \DateTime $updated
     * @return Blog
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Add blog
     *
     * @param Blog $blog
     */
    public function addBlog(Blog $blog)
    {
        $this->blogs[] = $blog;
    }

    /**
     * Remove blog
     *
     * @param Blog $blog
     */
    public function removeBlog(Blog $blog)
    {
        $this->blogs->removeElement($blog);
    }

    /**
     * Get blogs
     *
     * @return Doctrine\Common\Collections\Collection $blogs
     */
    public function getBlogs()
    {
        return $this->blogs;
    }

    /**
     * Set googleDocLink
     *
     * @param  string $googleDocLink
     * @return self
     */
    public function setGoogleDocLink($googleDocLink)
    {
        $this->googleDocLink = $googleDocLink;

        return $this;
    }

    /**
     * Get googleDocLink
     *
     * @return string
     */
    public function getGoogleDocLink()
    {
        return $this->googleDocLink;
    }

    /**
     * Set trelloBoardLink
     *
     * @param  string  $trelloBoardLink
     * @return Project
     */
    public function setTrelloBoardLink($trelloBoardLink)
    {
        $this->trelloBoardLink = $trelloBoardLink;

        return $this;
    }

    /**
     * Get trelloBoardLink
     *
     * @return string
     */
    public function getTrelloBoardLink()
    {
        return $this->trelloBoardLink;
    }

    /**
     * Set indexRouteName
     *
     * @param  string  $indexRouteName
     * @return Project
     */
    public function setIndexRouteName($indexRouteName)
    {
        $this->indexRouteName = $indexRouteName;

        return $this;
    }

    /**
     * Get indexRouteName
     *
     * @return string
     */
    public function getIndexRouteName()
    {
        return $this->indexRouteName;
    }
}
