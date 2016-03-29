<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dice
 *
 * @ORM\Table(name="dice")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DiceRepository")
 */
class Dice
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
     * @var string
     *
     * @ORM\Column(name="dice", type="string", length=255)
     */
    private $dice;

    /**
     * @var int
     *
     * @ORM\Column(name="rangeMin", type="integer")
     */
    private $rangeMin;

    /**
     * @var int
     *
     * @ORM\Column(name="rangeMax", type="integer")
     */
    private $rangeMax;


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
     * Set dice
     *
     * @param string $dice
     * @return Dice
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
     * Set rangeMin
     *
     * @param integer $rangeMin
     * @return Dice
     */
    public function setRangeMin($rangeMin)
    {
        $this->rangeMin = $rangeMin;

        return $this;
    }

    /**
     * Get rangeMin
     *
     * @return integer 
     */
    public function getRangeMin()
    {
        return $this->rangeMin;
    }

    /**
     * Set rangeMax
     *
     * @param integer $rangeMax
     * @return Dice
     */
    public function setRangeMax($rangeMax)
    {
        $this->rangeMax = $rangeMax;

        return $this;
    }

    /**
     * Get rangeMax
     *
     * @return integer 
     */
    public function getRangeMax()
    {
        return $this->rangeMax;
    }
}
