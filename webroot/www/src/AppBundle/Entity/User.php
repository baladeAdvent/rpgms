<?php
// src/AppBundle/Entity/User.php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\OneToMany(targetEntity="World", mappedBy="gm")
     */
    private $gm_worlds;
    
    /**
     * @ORM\OneToMany(targetEntity="PlayerCharacter", mappedBy="player")
     */
    private $characters;
    
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    /**
     * Add gm_worlds
     *
     * @param \AppBundle\Entity\World $gmWorlds
     * @return User
     */
    public function addGmWorld(\AppBundle\Entity\World $gmWorlds)
    {
        $this->gm_worlds[] = $gmWorlds;

        return $this;
    }

    /**
     * Remove gm_worlds
     *
     * @param \AppBundle\Entity\World $gmWorlds
     */
    public function removeGmWorld(\AppBundle\Entity\World $gmWorlds)
    {
        $this->gm_worlds->removeElement($gmWorlds);
    }

    /**
     * Get gm_worlds
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGmWorlds()
    {
        return $this->gm_worlds;
    }

    /**
     * Add characters
     *
     * @param \AppBundle\Entity\PlayerCharacter $characters
     * @return User
     */
    public function addCharacter(\AppBundle\Entity\PlayerCharacter $characters)
    {
        $this->characters[] = $characters;

        return $this;
    }

    /**
     * Remove characters
     *
     * @param \AppBundle\Entity\PlayerCharacter $characters
     */
    public function removeCharacter(\AppBundle\Entity\PlayerCharacter $characters)
    {
        $this->characters->removeElement($characters);
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
