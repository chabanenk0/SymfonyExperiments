<?php

namespace Tutorial\TotBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * City
 */
class City
{
    /**
     * @var integer
     * ManyToOne(targetEntity="Category", inversedBy="category")
     * JoinColumn(name="id", referencedColumnName="category")
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $info;

    private $tours;
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
     * @return City
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
     * Set info
     *
     * @param string $info
     * @return City
     */
    public function setInfo($info)
    {
        $this->info = $info;
    
        return $this;
    }

    /**
     * Get info
     *
     * @return string 
     */
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * Set info
     *
     * @param string $info
     * @return City
     */
    public function setTours($tours)
    {
        $this->tours = $tours;
    
        return $this;
    }

    /**
     * Get info
     *
     * @return string 
     */
    public function getTours()
    {
        return $this->tours;
    }


    public function __toString()
    {return $id->toString();
    }
	
}