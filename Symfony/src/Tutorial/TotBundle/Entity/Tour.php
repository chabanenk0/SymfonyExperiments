<?php

namespace Tutorial\TotBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tour
 */
class Tour
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var integer
     * @ORM\OneToMany(targetEntity="City", mappedBy="id")
     */
    private $city;

    /**
     * @var integer
     * ManyToMany(targetEntity="Category")
     * JoinTable(name="TourCategoryConn",
     *      joinColumns={@JoinColumn(name="category", referencedColumnName="category")},
     *      inverseJoinColumns={@JoinColumn(name="category", referencedColumnName="id")}
     *      )
     */
    private $category;


    /**
     * @var integer
     */
    private $is_public;

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
     * Set name
     *
     * @param string $name
     * @return Tour
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set city
     *
     * @param integer $city
     * @return Tour
     */
    public function setCity($city)
    {
        $this->city = $city;
    
        return $this;
    }

    /**
     * Get city
     *
     * @return integer 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set category
     *
     * @param integer $category
     * @return Tour
     */
    public function setCategory($category)
    {
        $this->category = $category;
    
        return $this;
    }

    /**
     * Get category
     *
     * @return integer 
     */
    public function getCategory()
    {
        return $this->category;
    }
}