<?php

namespace RpgmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * PlayerCharacter
 *
 * @ORM\Entity
 * @ORM\Table(name="player_character")
 */
class PlayerCharacter
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
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="race", type="string", length=255, nullable=true)
     */
    private $race;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;

    ////////////
    /**
     * @ORM\ManyToOne(targetEntity="World", inversedBy="playerCharacters")
     * @ORM\JoinColumn(name="world", referencedColumnName="id")
     */
    private $world;
    
    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="characters")
     * @ORM\JoinColumn(name="user", referencedColumnName="id")
     */
    private $user;


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
     * @return PlayerCharacter
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
     * Set race
     *
     * @param string $race
     *
     * @return PlayerCharacter
     */
    public function setRace($race)
    {
        $this->race = $race;

        return $this;
    }

    /**
     * Get race
     *
     * @return string
     */
    public function getRace()
    {
        return $this->race;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return PlayerCharacter
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
     * Set world
     *
     * @param \RpgmsBundle\Entity\World $world
     *
     * @return PlayerCharacter
     */
    public function setWorld(\RpgmsBundle\Entity\World $world = null)
    {
        $this->world = $world;

        return $this;
    }

    /**
     * Get world
     *
     * @return \RpgmsBundle\Entity\World
     */
    public function getWorld()
    {
        return $this->world;
    }

    /**
     * Set user
     *
     * @param \RpgmsBundle\Entity\User $user
     *
     * @return PlayerCharacter
     */
    public function setUser(\RpgmsBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \RpgmsBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
