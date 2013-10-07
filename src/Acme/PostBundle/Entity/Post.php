<?php
/**
 * Created by JetBrains PhpStorm.
 * User: boss
 * Date: 07.10.13
 * Time: 21:12
 * To change this template use File | Settings | File Templates.
 */

namespace Acme\PostBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="post")
 */
class Post
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column()
     */
    protected $title;

    /**
     * @ORM\Column(type="text")
     */
    protected $description;

    /**
     * @ORM\Column()
     */
    protected $unsername;

    /**
     * @ORM\Column(type="integer")
     */
    protected $date_create;

    /**
     * Set id
     *
     * @param integer $id
     * @return Post
     */
    public function setId($id)
    {
        $this->id = $id;
    
        return $this;
    }

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
     * @param string $title
     * @return Post
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
     * Set description
     *
     * @param string $description
     * @return Post
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set unsername
     *
     * @param string $unsername
     * @return Post
     */
    public function setUnsername($unsername)
    {
        $this->unsername = $unsername;
    
        return $this;
    }

    /**
     * Get unsername
     *
     * @return string 
     */
    public function getUnsername()
    {
        return $this->unsername;
    }

    /**
     * Set date_create
     *
     * @param integer $dateCreate
     * @return Post
     */
    public function setDateCreate($dateCreate)
    {
        $this->date_create = $dateCreate;
    
        return $this;
    }

    /**
     * Get date_create
     *
     * @return integer 
     */
    public function getDateCreate()
    {
        return $this->date_create;
    }
}