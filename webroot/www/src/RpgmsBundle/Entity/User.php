<?php
// src/RPGMS/RpgmsBundle/User.php

namespace RpgmsBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=255)
     */
    private $firstName;
    
    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=255)
     */
    private $lastName;
    
    ////////////////
    
    // One GM, Many worlds
    /**
     * @ORM\OneToMany(targetEntity="World", mappedBy="gm")
     */
    private $worlds;
    
    /**
     * @ORM\OneToMany(targetEntity="PlayerCharacter", mappedBy="user")
     */
    private $characters;
    

    /**
     * Set firstName
     *
     * @param string $firstName
     *
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Add world
     *
     * @param \RpgmsBundle\Entity\World $world
     *
     * @return User
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
     * Add character
     *
     * @param \RpgmsBundle\Entity\PlayerCharacter $character
     *
     * @return User
     */
    public function addCharacter(\RpgmsBundle\Entity\PlayerCharacter $character)
    {
        $this->characters[] = $character;

        return $this;
    }

    /**
     * Remove character
     *
     * @param \RpgmsBundle\Entity\PlayerCharacter $character
     */
    public function removeCharacter(\RpgmsBundle\Entity\PlayerCharacter $character)
    {
        $this->characters->removeElement($character);
    }

    /**
     * Get characters
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCharacters()
    {
        return $this->characters;
    }
}
