<?php

namespace RPGMS\DiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RNGRolls
 *
 * @ORM\Table(name="rng_rolls")
 * @ORM\Entity(repositoryClass="RPGMS\DiceBundle\Repository\RNGRollsRepository")
 */
class RNGRolls
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
     * @var int
     *
     * @ORM\Column(name="world", type="integer")
     */
    private $world;

    /**
     * @var string
     *
     * @ORM\Column(name="dice", type="string", length=255)
     */
    private $dice;

    /**
     * @var string
     *
     * @ORM\Column(name="results", type="string", length=255)
     */
    private $results;

    /**
     * @var string
     *
     * @ORM\Column(name="action", type="string", length=255)
     */
    private $action;

    /**
     * @var int
     *
     * @ORM\Column(name="bonus", type="integer", nulable=true)
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
     * Set world
     *
     * @param integer $world
     *
     * @return RNGRolls
     */
    public function setWorld($world)
    {
        $this->world = $world;

        return $this;
    }

    /**
     * Get world
     *
     * @return int
     */
    public function getWorld()
    {
        return $this->world;
    }

    /**
     * Set dice
     *
     * @param string $dice
     *
     * @return RNGRolls
     */
    public function setDice($dice)
    {
        $this->dice = $dice;

        return $this;
    }

    /**
     * Get dice
     *
     * @return string
     */
    public function getDice()
    {
        return $this->dice;
    }

    /**
     * Set results
     *
     * @param string $results
     *
     * @return RNGRolls
     */
    public function setResults($results)
    {
        $this->results = $results;

        return $this;
    }

    /**
     * Get results
     *
     * @return string
     */
    public function getResults()
    {
        return $this->results;
    }

    /**
     * Set action
     *
     * @param string $action
     *
     * @return RNGRolls
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
     * @return RNGRolls
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
     * @return RNGRolls
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
     * Set session
     *
     * @param integer $session
     *
     * @return RNGRolls
     */
    public function setSession($session)
    {
        $this->session = $session;

        return $this;
    }

    /**
     * Get session
     *
     * @return int
     */
    public function getSession()
    {
        return $this->session;
    }
}

