<?php

namespace RpgmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Roll
 *
 * @ORM\Table(name="roll")
 * @ORM\Entity(repositoryClass="RpgmsBundle\Repository\RollRepository")
 */
class Roll
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
     * @ORM\Column(name="result", type="integer")
     */
    private $result;
    
    //////////////////////////////////////////////////////////////////////
    // One Roll, One Dice
    /**
     * @ORM\ManyToOne(targetEntity="Dice")
     * @ORM\JoinColumn(name="dice", referencedColumnName="id")
     */
    private $dice;
    
    // Many Rolls, One RollSet
    /**
     *  @ORM\ManyToOne(targetEntity="RollSet", inversedBy="rolls")
     *  @ORM\JoinColumn(name="rollSet", referencedColumnName="id")
     */
    private $rollSet;

    //////////////////////////////////////////////////////////////////////


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
     * Set result
     *
     * @param integer $result
     *
     * @return Roll
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
     * Set dice
     *
     * @param \RpgmsBundle\Entity\Dice $dice
     *
     * @return Roll
     */
    public function setDice(\RpgmsBundle\Entity\Dice $dice = null)
    {
        $this->dice = $dice;

        return $this;
    }

    /**
     * Get dice
     *
     * @return \RpgmsBundle\Entity\Dice
     */
    public function getDice()
    {
        return $this->dice;
    }

    /**
     * Set rollSet
     *
     * @param \RpgmsBundle\Entity\RollSet $rollSet
     *
     * @return Roll
     */
    public function setRollSet(\RpgmsBundle\Entity\RollSet $rollSet = null)
    {
        $this->rollSet = $rollSet;

        return $this;
    }

    /**
     * Get rollSet
     *
     * @return \RpgmsBundle\Entity\RollSet
     */
    public function getRollSet()
    {
        return $this->rollSet;
    }
}
