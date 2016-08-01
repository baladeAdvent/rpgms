<?php

namespace RpgmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Dice
 *
 * @ORM\Entity
 * @ORM\Table(name="dice")
 */
class Dice
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

    /**
     * @var int
     *
     * @ORM\Column(name="minRange", type="integer")
     */
    private $minRange;

    /**
     * @var int
     *
     * @ORM\Column(name="maxRange", type="integer")
     */
    private $maxRange;
    ////////////
    // Many dice to many dice bags
    /**
     * @ORM\ManyToMany(targetEntity="World", mappedBy="diceBag")
     */
    private $worlds;

    public function __construct()
    {
        $this->worlds = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->name;
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
     * @return Dice
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
     * Set minRange
     *
     * @param integer $minRange
     *
     * @return Dice
     */
    public function setMinRange($minRange)
    {
        $this->minRange = $minRange;

        return $this;
    }

    /**
     * Get minRange
     *
     * @return integer
     */
    public function getMinRange()
    {
        return $this->minRange;
    }

    /**
     * Set maxRange
     *
     * @param integer $maxRange
     *
     * @return Dice
     */
    public function setMaxRange($maxRange)
    {
        $this->maxRange = $maxRange;

        return $this;
    }

    /**
     * Get maxRange
     *
     * @return integer
     */
    public function getMaxRange()
    {
        return $this->maxRange;
    }

    /**
     * Add world
     *
     * @param \RpgmsBundle\Entity\World $world
     *
     * @return Dice
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
}
