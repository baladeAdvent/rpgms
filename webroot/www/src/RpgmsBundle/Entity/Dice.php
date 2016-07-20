<?php

namespace RpgmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dice
 *
 * @ORM\Table(name="dice")
 * @ORM\Entity(repositoryClass="RpgmsBundle\Repository\DiceRepository")
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
     * @var int
     *
     * @ORM\Column(name="w_id", type="integer")
     */
    private $wId;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="minRange", type="integer")
     */
    private $minRange;

    /**
     * @var int
     *
     * @ORM\Column(name="maxRange", type="integer")
     */
    private $maxRange;


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
     * Set name
     *
     * @param string $name
     *
     * @return Dice
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
     * Set minRange
     *
     * @param integer $minRange
     *
     * @return Dice
     */
    public function setMinRange($minRange)
    {
        $this->minRange = $minRange;

        return $this;
    }

    /**
     * Get minRange
     *
     * @return int
     */
    public function getMinRange()
    {
        return $this->minRange;
    }

    /**
     * Set maxRange
     *
     * @param integer $maxRange
     *
     * @return Dice
     */
    public function setMaxRange($maxRange)
    {
        $this->maxRange = $maxRange;

        return $this;
    }

    /**
     * Get maxRange
     *
     * @return int
     */
    public function getMaxRange()
    {
        return $this->maxRange;
    }
}
