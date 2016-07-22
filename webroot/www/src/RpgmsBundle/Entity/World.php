<?php

// RpgmsBundle/Entity/World.php

namespace RpgmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
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
    // One dicebag, many Dice
    /**
     * @ORM\ManyToMany(targetEntity="Dice", inversedBy="worlds")
     * @ORM\JoinColumn(name="dice", referencedColumnName="id")
     */
    private $diceBag;
    
    // One world, Many Roll Sets
    /**
     * @ORM\OneToMany(targetEntity="RollSet", mappedBy="world")
     */
    private $rollSets;

    public function __construct()
    {
        $this->dicebag = new ArrayCollection();
        $this->rollsets = new ArrayCollection();
        
        // Set generic D20 dice in Dicebag
    }

}
