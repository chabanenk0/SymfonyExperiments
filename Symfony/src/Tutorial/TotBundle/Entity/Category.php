<?php

namespace Tutorial\TotBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 */
class Category
{
    /**
     * @var integer
     * ManyToMany(targetEntity="Tour")
     * JoinTable(name="TourCategoryConn",
     *      joinColumns={@JoinColumn(name="id", referencedColumnName="category")},
     *      inverseJoinColumns={@JoinColumn(name="category", referencedColumnName="category")}
     *      )
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
     * @return Category
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
     * @return Category
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
    public function __toString()
    {return $id->toString();
    }

}