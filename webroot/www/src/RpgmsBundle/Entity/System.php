<?php

namespace RpgmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * System
 *
 * @ORM\Table(name="system")
 * @ORM\Entity(repositoryClass="RpgmsBundle\Repository\SystemRepository")
 */
class System
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    ///////////////////////////////////////////////////////////
    // One World, One System
    /**
     * @ORM\OneToMany(targetEntity="World", mappedBy="system")
     */
    private $worlds;
    
    // One System, Many System Attributes
    /**
     * @ORM\OneToMany(targetEntity="SystemAttribute", mappedBy="system")
     */
    private $systemAttributes;
    
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->worlds = new \Doctrine\Common\Collections\ArrayCollection();
        $this->systemAttributes = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name
     *
     * @param string $name
     *
     * @return System
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
     * Add world
     *
     * @param \RpgmsBundle\Entity\World $world
     *
     * @return System
     */
    public function addWorld(\RpgmsBundle\Entity\World $world)
    {
        $this->worlds[] = $world;

        return $this;
    }

    /**
     * Remove world
     *
     * @param \RpgmsBundle\Entity\World $world
     */
    public function removeWorld(\RpgmsBundle\Entity\World $world)
    {
        $this->worlds->removeElement($world);
    }

    /**
     * Get worlds
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getWorlds()
    {
        return $this->worlds;
    }

    /**
     * Add systemAttribute
     *
     * @param \RpgmsBundle\Entity\SystemAttribute $systemAttribute
     *
     * @return System
     */
    public function addSystemAttribute(\RpgmsBundle\Entity\SystemAttribute $systemAttribute)
    {
        $this->systemAttributes[] = $systemAttribute;

        return $this;
    }

    /**
     * Remove systemAttribute
     *
     * @param \RpgmsBundle\Entity\SystemAttribute $systemAttribute
     */
    public function removeSystemAttribute(\RpgmsBundle\Entity\SystemAttribute $systemAttribute)
    {
        $this->systemAttributes->removeElement($systemAttribute);
    }

    /**
     * Get systemAttributes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSystemAttributes()
    {
        return $this->systemAttributes;
    }
    
    public function __toString()
    {
        return $this->name;
    }
}
