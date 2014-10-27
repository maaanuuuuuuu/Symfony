<?php

namespace Dev\CoreBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * This class represents a tag associated to a Blog post. These are key words in the article.
 * 
 * @MongoDB\Document(collection="Tag")
 * @MongoDB\HasLifecycleCallbacks
 */
class Tag
{
    /**
     * @MongoDB\Id
     */
    protected $id;

    /**
     * @MongoDB\String
     */
    protected $title;

    /**
     * @MongoDB\ReferenceMany(
     *  targetDocument="Blog",
     *  inversedBy = "tags"
     * )
     */
    protected $blogs;
   

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
    public function __construct()
    {
        $this->blogs = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Set title
     *
     * @param string $title
     * @return self
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * Get title
     *
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Add blog
     *
     * @param Dev\CoreBundle\Document\Blog $blog
     */
    public function addBlog(\Dev\CoreBundle\Document\Blog $blog)
    {
        $this->blogs[] = $blog;
    }

    /**
     * Remove blog
     *
     * @param Dev\CoreBundle\Document\Blog $blog
     */
    public function removeBlog(\Dev\CoreBundle\Document\Blog $blog)
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
}
