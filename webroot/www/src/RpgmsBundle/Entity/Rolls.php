<?php

namespace RpgmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rolls
 *
 * @ORM\Table(name="rolls")
 * @ORM\Entity(repositoryClass="RpgmsBundle\Repository\RollsRepository")
 */
class Rolls
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
     * @ORM\Column(name="dice", type="integer")
     */
    private $dice;

    /**
     * @var int
     *
     * @ORM\Column(name="result", type="integer")
     */
    private $result;

    //////////////////////////////////////////////////////////////////////
    /**
     *  @ORM\ManyToOne(targetEntity="RollSet", inversedBy="rolls")
     *  @ORM\JoinColumn(name="rollSet", referencedColumnName="id")
     */
    private $rollSet;
    //////////////////////////////////////////////////////////////////////


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
     * Set rollSet
     *
     * @param integer $rollSet
     *
     * @return Rolls
     */
    public function setRollSet($rollSet)
    {
        $this->rollSet = $rollSet;

        return $this;
    }

    /**
     * Get rollSet
     *
     * @return int
     */
    public function getRollSet()
    {
        return $this->rollSet;
    }

    /**
     * Set dice
     *
     * @param integer $dice
     *
     * @return Rolls
     */
    public function setDice($dice)
    {
        $this->dice = $dice;

        return $this;
    }

    /**
     * Get dice
     *
     * @return int
     */
    public function getDice()
    {
        return $this->dice;
    }

    /**
     * Set result
     *
     * @param integer $result
     *
     * @return Rolls
     */
    public function setResult($result)
    {
        $this->result = $result;

        return $this;
    }

    /**
     * Get result
     *
     * @return int
     */
    public function getResult()
    {
        return $this->result;
    }
}
