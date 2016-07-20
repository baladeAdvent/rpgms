<?php

namespace RpgmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * RollSet
 *
 * @ORM\Table(name="Roll_set")
 * @ORM\Entity(repositoryClass="RpgmsBundle\Repository\RollSetRepository")
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
     * @ORM\ManyToOne(targetEntity="World", inversedBy="rollsets")
     * @ORM\JoinColumn(name="w_id", referencedColumnName="id")
     */
    private $wId;

    /**
     * @var \DateTime
     */
    private $date;

    /**
     *  @ORM\OneToMany(targetEntity="Roll", mappedBy="RollSet")
     */
    private $rolls;

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

    public function __construct()
    {
        $this->date = new \DateTime();
        $this->rolls = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set RollDice
     *
     * @param string $RollDice
     *
     * @return RollSet
     */
    public function setRollDice($RollDice)
    {
        $this->RollDice = $RollDice;

        return $this;
    }

    /**
     * Get RollDice
     *
     * @return string
     */
    public function getRollDice()
    {
        return $this->RollDice;
    }

    /**
     * Set wId
     *
     * @param integer $wId
     *
     * @return RollSet
     */
    public function setWId($wId)
    {
        $this->wId = $wId;

        return $this;
    }

    /**
     * Get wId
     *
     * @return int
     */
    public function getWId()
    {
        return $this->wId;
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
     * @return int
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
     * @return int
     */
    public function getPenalty()
    {
        return $this->penalty;
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
     * Add Roll
     *
     * @param \RpgmsBundle\Entity\Roll $Roll
     *
     * @return RollSet
     */
    public function addRoll(\RpgmsBundle\Entity\Roll $Roll)
    {
        $this->rolls[] = $Roll;

        return $this;
    }

    /**
     * Remove Roll
     *
     * @param \RpgmsBundle\Entity\Roll $Roll
     */
    public function removeRoll(\RpgmsBundle\Entity\Roll $Roll)
    {
        $this->rolls->removeElement($Roll);
    }

    /**
     * Get Rolls
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRolls()
    {
        return $this->rolls;
    }
}
