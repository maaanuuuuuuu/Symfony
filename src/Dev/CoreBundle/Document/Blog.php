<?php
// src/Dev/CoreBundle/Document/Blog.php

namespace Dev\CoreBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Cette classe représente un blog. C'est à dire un poste 
 * 
 * @MongoDB\Document(collection="Blog", repositoryClass="Dev\CoreBundle\Document\BlogRepository")
 */
class Blog
{
    /**
     * Le constructeur de blog.     
     * 
     */
    public function __construct()
    {
        $this->setCreated(time());
        $this->setUpdated(time());
        $this->tags = new ArrayCollection();
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
     * @MongoDB\ReferenceMany(
     *  targetDocument="Document\Project",
     *  mappedBy = "blogs"
     * )
     */
    protected $projects;
    
    /**
     * @MongoDB\ReferenceMany(
     *  targetDocument="Document\Tag",
     *  mappedBy = "blogs"
     * )
     */
    protected $tags;

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
     * @param  string $title
     * @return Blog
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
     * @param  string $text
     * @return Blog
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
     * @return Blog
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
     * Add project
     *
     * @param Document\Project $project
     */
    public function addProject(Project $project)
    {
        $this->projects[] = $project;
    }

    /**
     * Remove project
     *
     * @param Document\Project $project
     */
    public function removeProject(Project $project)
    {
        $this->projects->removeElement($project);
    }

    /**
     * Get projects
     *
     * @return Doctrine\Common\Collections\Collection $projects
     */
    public function getProjects()
    {
        return $this->projects;
    }

    /**
     * Add tag
     *
     * @param Document\Tag $tag
     */
    public function addTag(\Document\Tag $tag)
    {
        $this->tags[] = $tag;
    }

    /**
     * Remove tag
     *
     * @param Document\Tag $tag
     */
    public function removeTag(\Document\Tag $tag)
    {
        $this->tags->removeElement($tag);
    }

    /**
     * Get tags
     *
     * @return Doctrine\Common\Collections\Collection $tags
     */
    public function getTags()
    {
        return $this->tags;
    }
}
