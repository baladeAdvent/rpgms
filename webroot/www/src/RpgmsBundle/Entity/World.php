<?php

// RpgmsBundle/Entity/World.php

namespace AppBundle\Entity;

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
     */
    private $date;
    
    ////////////
    /**
     * @ORM\Column(type="integer")
     */
    private $dicebag;
    /**
     * @ORM\OneToMany(targetEntity="RollSet", mappedBy="wId")
     */
    private $rollsets;

    public function __construct()
    {
        $this->dicebag = new ArrayCollection();
        $this->rollsets = new ArrayCollection();
        
        // Set generic D20 dice in Dicebag
    }

}
