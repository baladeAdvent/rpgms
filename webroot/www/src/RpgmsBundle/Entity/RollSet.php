<?php

namespace RpgmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * RollSet
 *
 * @ORM\Entity
 * @ORM\Table(name="roll_set")
 */
class RollSet
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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="action", type="string", length=255)
     */
    private $action;

    /**
     * @var int
     *
     * @ORM\Column(name="bonus", type="integer", nullable=true)
     */
    private $bonus;

    /**
     * @var int
     *
     * @ORM\Column(name="penalty", type="integer", nullable=true)
     */
    private $penalty;

    /**
     * @var int
     *
     * @ORM\Column(name="result", type="integer")
     */
    private $result;
    
    //////////////

    // Many rollsets, one world
    /**
     * @ORM\ManyToOne(targetEntity="World", inversedBy="rollSets")
     * @ORM\JoinColumn(name="world", referencedColumnName="id")
     */
    private $world;
    
    /**
     *  @ORM\OneToMany(targetEntity="Roll", mappedBy="rollSet")
     */
    private $rolls;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->rolls = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return RollSet
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
     * Set action
     *
     * @param string $action
     *
     * @return RollSet
     */
    public function setAction($action)
    {
        $this->action = $action;

        return $this;
    }

    /**
     * Get action
     *
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * Set bonus
     *
     * @param integer $bonus
     *
     * @return RollSet
     */
    public function setBonus($bonus)
    {
        $this->bonus = $bonus;

        return $this;
    }

    /**
     * Get bonus
     *
     * @return integer
     */
    public function getBonus()
    {
        return $this->bonus;
    }

    /**
     * Set penalty
     *
     * @param integer $penalty
     *
     * @return RollSet
     */
    public function setPenalty($penalty)
    {
        $this->penalty = $penalty;

        return $this;
    }

    /**
     * Get penalty
     *
     * @return integer
     */
    public function getPenalty()
    {
        return $this->penalty;
    }

    /**
     * Set result
     *
     * @param integer $result
     *
     * @return RollSet
     */
    public function setResult($result)
    {
        $this->result = $result;

        return $this;
    }

    /**
     * Get result
     *
     * @return integer
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * Set world
     *
     * @param \RpgmsBundle\Entity\World $world
     *
     * @return RollSet
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
     * Add roll
     *
     * @param \RpgmsBundle\Entity\Roll $roll
     *
     * @return RollSet
     */
    public function addRoll(\RpgmsBundle\Entity\Roll $roll)
    {
        $this->rolls[] = $roll;

        return $this;
    }

    /**
     * Remove roll
     *
     * @param \RpgmsBundle\Entity\Roll $roll
     */
    public function removeRoll(\RpgmsBundle\Entity\Roll $roll)
    {
        $this->rolls->removeElement($roll);
    }

    /**
     * Get rolls
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRolls()
    {
        return $this->rolls;
    }

    /**
     * Get rolls
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRoll()
    {
        return $this->rolls;
    }
}
