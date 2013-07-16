<?php

namespace Tutorial\TotBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CategTourCon
 */
class CategTourCon
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $category;

    /**
     * @var integer
     */
    private $city;


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
     * Set category
     *
     * @param integer $category
     * @return CategTourCon
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

    /**
     * Set city
     *
     * @param integer $city
     * @return CategTourCon
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
}