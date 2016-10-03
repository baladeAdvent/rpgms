<?php

namespace RpgmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SystemAttribute
 *
 * @ORM\Table(name="system_attribute")
 * @ORM\Entity(repositoryClass="RpgmsBundle\Repository\SystemAttributeRepository")
 */
class SystemAttribute
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
     * @ORM\Column(name="Name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="Type", type="string", length=255)
     */
    private $type;

    /**
     * @var int
     *
     * @ORM\Column(name="sort", type="integer")
     */
    private $sort;
    
    ///////////////
    
    // Many System Attributes, one System
    /**
     * @ORM\ManyToOne(targetEntity="System", inversedBy="systemAttributes")
     * @ORM\JoinColumn(name="system", referencedColumnName="id")
     */
    private $system;

    // One Attribute, One Dice
    /**
     * @ORM\ManyToOne(targetEntity="Dice")
     * @ORM\JoinColumn(name="dice", referencedColumnName="id")
     */
    private $dice;


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
     * @return SystemAttribute
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
     * Set type
     *
     * @param string $type
     *
     * @return SystemAttribute
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set sort
     *
     * @param integer $sort
     *
     * @return SystemAttribute
     */
    public function setSort($sort)
    {
        $this->sort = $sort;

        return $this;
    }

    /**
     * Get sort
     *
     * @return integer
     */
    public function getSort()
    {
        return $this->sort;
    }

    /**
     * Set system
     *
     * @param \RpgmsBundle\Entity\System $system
     *
     * @return SystemAttribute
     */
    public function setSystem(\RpgmsBundle\Entity\System $system = null)
    {
        $this->system = $system;

        return $this;
    }

    /**
     * Get system
     *
     * @return \RpgmsBundle\Entity\System
     */
    public function getSystem()
    {
        return $this->system;
    }

    /**
     * Set dice
     *
     * @param \RpgmsBundle\Entity\Dice $dice
     *
     * @return SystemAttribute
     */
    public function setDice(\RpgmsBundle\Entity\Dice $dice = null)
    {
        $this->dice = $dice;

        return $this;
    }

    /**
     * Get dice
     *
     * @return \RpgmsBundle\Entity\Dice
     */
    public function getDice()
    {
        return $this->dice;
    }
}
