<?php

// RpgmsBundle/Entity/World.php

namespace RpgmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * World
 * 
 * @ORM\Entity
 * @ORM\Table(name="world")
 */
class World
{

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;
    
    ////////////

    // Many worlds, One GM
    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="worlds")
     * @ORM\JoinColumn(name="gm", referencedColumnName="id")
     */
    private $gm;
    
    // One dicebag, many Dice
    /**
     * @ORM\ManyToMany(targetEntity="Dice", inversedBy="worlds")
     * @ORM\JoinTable(name="world_dice")
     */
    private $diceBag;
    
    // One World, Many Characters
    /**
     * @ORM\OneToMany(targetEntity="PlayerCharacter", mappedBy="world")
     */
    private $playerCharacters;
    
    // One world, Many Roll Sets
    /**
     * @ORM\OneToMany(targetEntity="RollSet", mappedBy="world")
     */
    private $rollSets;

    public function __construct()
    {
        $this->diceBag = new ArrayCollection();
        $this->playerCharacters = new ArrayCollection();
        $this->rollSets = new ArrayCollection();
        
        // Set generic D20 dice in Dicebag
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
     * @return World
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
     * Set description
     *
     * @param string $description
     *
     * @return World
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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return World
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Add diceBag
     *
     * @param \RpgmsBundle\Entity\Dice $diceBag
     *
     * @return World
     */
    public function addDice(\RpgmsBundle\Entity\Dice $diceBag)
    {
        $this->diceBag[] = $diceBag;

        return $this;
    }

    /**
     * Remove diceBag
     *
     * @param \RpgmsBundle\Entity\Dice $diceBag
     */
    public function removeDice(\RpgmsBundle\Entity\Dice $diceBag)
    {
        $this->diceBag->removeElement($diceBag);
    }

    /**
     * Get diceBag
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDiceBag()
    {
        return $this->diceBag;
    }

    /**
     * Add rollSet
     *
     * @param \RpgmsBundle\Entity\RollSet $rollSet
     *
     * @return World
     */
    public function addRollSet(\RpgmsBundle\Entity\RollSet $rollSet)
    {
        $this->rollSets[] = $rollSet;

        return $this;
    }

    /**
     * Remove rollSet
     *
     * @param \RpgmsBundle\Entity\RollSet $rollSet
     */
    public function removeRollSet(\RpgmsBundle\Entity\RollSet $rollSet)
    {
        $this->rollSets->removeElement($rollSet);
    }

    /**
     * Get rollSets
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRollSets()
    {
        return $this->rollSets;
    }

    /**
     * Add playerCharacter
     *
     * @param \RpgmsBundle\Entity\PlayerCharacter $playerCharacter
     *
     * @return World
     */
    public function addPlayerCharacter(\RpgmsBundle\Entity\PlayerCharacter $playerCharacter)
    {
        $this->playerCharacters[] = $playerCharacter;

        return $this;
    }

    /**
     * Remove playerCharacter
     *
     * @param \RpgmsBundle\Entity\PlayerCharacter $playerCharacter
     */
    public function removePlayerCharacter(\RpgmsBundle\Entity\PlayerCharacter $playerCharacter)
    {
        $this->playerCharacters->removeElement($playerCharacter);
    }

    /**
     * Get playerCharacters
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPlayerCharacters()
    {
        return $this->playerCharacters;
    }

    /**
     * Set gm
     *
     * @param \RpgmsBundle\Entity\User $gm
     *
     * @return World
     */
    public function setGm(\RpgmsBundle\Entity\User $gm = null)
    {
        $this->gm = $gm;

        return $this;
    }

    /**
     * Get gm
     *
     * @return \RpgmsBundle\Entity\User
     */
    public function getGm()
    {
        return $this->gm;
    }

    /**
     * Add diceBag
     *
     * @param \RpgmsBundle\Entity\Dice $diceBag
     *
     * @return World
     */
    public function addDiceBag(\RpgmsBundle\Entity\Dice $diceBag)
    {
        $this->diceBag[] = $diceBag;

        return $this;
    }

    /**
     * Remove diceBag
     *
     * @param \RpgmsBundle\Entity\Dice $diceBag
     */
    public function removeDiceBag(\RpgmsBundle\Entity\Dice $diceBag)
    {
        $this->diceBag->removeElement($diceBag);
    }
}
