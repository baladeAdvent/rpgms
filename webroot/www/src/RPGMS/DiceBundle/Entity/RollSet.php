<?php

namespace RPGMS\DiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * RollSet
 *
 * @ORM\Table(name="roll_set")
 * @ORM\Entity(repositoryClass="RPGMS\DiceBundle\Repository\RollSetRepository")
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
     *  @ORM\OneToMany(targetEntity="Product", mappedBy="rollset")
     */
    private $rolls;

    /**
     * @var int
     *
     * @ORM\Column(name="w_id", type="integer")
     */
    private $wId;

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
     * @ORM\Column(name="session", type="integer")
     */
    private $session;

    public function __construct()
    {
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
     * Set rollDice
     *
     * @param string $rollDice
     *
     * @return RollSet
     */
    public function setRollDice($rollDice)
    {
        $this->rollDice = $rollDice;

        return $this;
    }

    /**
     * Get rollDice
     *
     * @return string
     */
    public function getRollDice()
    {
        return $this->rollDice;
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
     * Set session
     *
     * @param integer $session
     *
     * @return RollSet
     */
    public function setSession($session)
    {
        $this->session = $session;

        return $this;
    }

    /**
     * Get session
     *
     * @return integer
     */
    public function getSession()
    {
        return $this->session;
    }


    /**
     * Add roll
     *
     * @param \RPGMS\DiceBundle\Entity\Product $roll
     *
     * @return RollSet
     */
    public function addRoll(\RPGMS\DiceBundle\Entity\Product $roll)
    {
        $this->rolls[] = $roll;

        return $this;
    }

    /**
     * Remove roll
     *
     * @param \RPGMS\DiceBundle\Entity\Product $roll
     */
    public function removeRoll(\RPGMS\DiceBundle\Entity\Product $roll)
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
}
