<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DiceRoll
 *
 * @ORM\Table(name="dice_roll")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DiceRollRepository")
 */
class DiceRoll
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
     * @ORM\Column(name="d2", type="integer", nullable=true)
     */
    private $d2;

    /**
     * @var int
     *
     * @ORM\Column(name="d3", type="integer", nullable=true)
     */
    private $d3;

    /**
     * @var int
     *
     * @ORM\Column(name="d4", type="integer", nullable=true)
     */
    private $d4;

    /**
     * @var int
     *
     * @ORM\Column(name="d6", type="integer", nullable=true)
     */
    private $d6;

    /**
     * @var int
     *
     * @ORM\Column(name="d8", type="integer", nullable=true)
     */
    private $d8;

    /**
     * @var int
     *
     * @ORM\Column(name="d10", type="integer", nullable=true)
     */
    private $d10;

    /**
     * @var int
     *
     * @ORM\Column(name="d12", type="integer", nullable=true)
     */
    private $d12;

    /**
     * @var int
     *
     * @ORM\Column(name="d20", type="integer", nullable=true)
     */
    private $d20;

    /**
     * @var int
     *
     * @ORM\Column(name="d100", type="integer", nullable=true)
     */
    private $d100;

    /**
     * @var int
     *
     * @ORM\Column(name="d2Result", type="integer")
     */
    private $d2Result;

    /**
     * @var int
     *
     * @ORM\Column(name="d3Result", type="integer")
     */
    private $d3Result;

    /**
     * @var int
     *
     * @ORM\Column(name="d4Result", type="integer")
     */
    private $d4Result;

    /**
     * @var int
     *
     * @ORM\Column(name="d6Result", type="integer")
     */
    private $d6Result;

    /**
     * @var int
     *
     * @ORM\Column(name="d8Result", type="integer")
     */
    private $d8Result;

    /**
     * @var int
     *
     * @ORM\Column(name="d10Result", type="integer")
     */
    private $d10Result;

    /**
     * @var int
     *
     * @ORM\Column(name="d12Result", type="integer")
     */
    private $d12Result;

    /**
     * @var int
     *
     * @ORM\Column(name="d20Result", type="integer")
     */
    private $d20Result;

    /**
     * @var int
     *
     * @ORM\Column(name="d100Result", type="integer")
     */
    private $d100Result;

    /**
     * @var string
     *
     * @ORM\Column(name="rollAction", type="string", length=255, nullable=true)
     */
    private $rollAction;

    /**
     * @var int
     *
     * @ORM\Column(name="playerCharacter", type="integer")
     */
    private $playerCharacter;

    /**
     * @var int
     *
     * @ORM\Column(name="monsterCharacter", type="integer", nullable=true)
     */
    private $monsterCharacter;

    /**
     * @var int
     *
     * @ORM\Column(name="nonPlayerCharacter", type="integer", nullable=true)
     */
    private $nonPlayerCharacter;

    /**
     * @var int
     *
     * @ORM\Column(name="worldId", type="integer")
     */
    private $worldId;


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
     * Set d2
     *
     * @param integer $d2
     * @return DiceRoll
     */
    public function setD2($d2)
    {
        $this->d2 = $d2;

        return $this;
    }

    /**
     * Get d2
     *
     * @return integer 
     */
    public function getD2()
    {
        return $this->d2;
    }

    /**
     * Set d3
     *
     * @param integer $d3
     * @return DiceRoll
     */
    public function setD3($d3)
    {
        $this->d3 = $d3;

        return $this;
    }

    /**
     * Get d3
     *
     * @return integer 
     */
    public function getD3()
    {
        return $this->d3;
    }

    /**
     * Set d4
     *
     * @param integer $d4
     * @return DiceRoll
     */
    public function setD4($d4)
    {
        $this->d4 = $d4;

        return $this;
    }

    /**
     * Get d4
     *
     * @return integer 
     */
    public function getD4()
    {
        return $this->d4;
    }

    /**
     * Set d6
     *
     * @param integer $d6
     * @return DiceRoll
     */
    public function setD6($d6)
    {
        $this->d6 = $d6;

        return $this;
    }

    /**
     * Get d6
     *
     * @return integer 
     */
    public function getD6()
    {
        return $this->d6;
    }

    /**
     * Set d8
     *
     * @param integer $d8
     * @return DiceRoll
     */
    public function setD8($d8)
    {
        $this->d8 = $d8;

        return $this;
    }

    /**
     * Get d8
     *
     * @return integer 
     */
    public function getD8()
    {
        return $this->d8;
    }

    /**
     * Set d10
     *
     * @param integer $d10
     * @return DiceRoll
     */
    public function setD10($d10)
    {
        $this->d10 = $d10;

        return $this;
    }

    /**
     * Get d10
     *
     * @return integer 
     */
    public function getD10()
    {
        return $this->d10;
    }

    /**
     * Set d12
     *
     * @param integer $d12
     * @return DiceRoll
     */
    public function setD12($d12)
    {
        $this->d12 = $d12;

        return $this;
    }

    /**
     * Get d12
     *
     * @return integer 
     */
    public function getD12()
    {
        return $this->d12;
    }

    /**
     * Set d20
     *
     * @param integer $d20
     * @return DiceRoll
     */
    public function setD20($d20)
    {
        $this->d20 = $d20;

        return $this;
    }

    /**
     * Get d20
     *
     * @return integer 
     */
    public function getD20()
    {
        return $this->d20;
    }

    /**
     * Set d100
     *
     * @param integer $d100
     * @return DiceRoll
     */
    public function setD100($d100)
    {
        $this->d100 = $d100;

        return $this;
    }

    /**
     * Get d100
     *
     * @return integer 
     */
    public function getD100()
    {
        return $this->d100;
    }

    /**
     * Set d2Result
     *
     * @param integer $d2Result
     * @return DiceRoll
     */
    public function setD2Result($d2Result)
    {
        $this->d2Result = $d2Result;

        return $this;
    }

    /**
     * Get d2Result
     *
     * @return integer 
     */
    public function getD2Result()
    {
        return $this->d2Result;
    }

    /**
     * Set d3Result
     *
     * @param integer $d3Result
     * @return DiceRoll
     */
    public function setD3Result($d3Result)
    {
        $this->d3Result = $d3Result;

        return $this;
    }

    /**
     * Get d3Result
     *
     * @return integer 
     */
    public function getD3Result()
    {
        return $this->d3Result;
    }

    /**
     * Set d4Result
     *
     * @param integer $d4Result
     * @return DiceRoll
     */
    public function setD4Result($d4Result)
    {
        $this->d4Result = $d4Result;

        return $this;
    }

    /**
     * Get d4Result
     *
     * @return integer 
     */
    public function getD4Result()
    {
        return $this->d4Result;
    }

    /**
     * Set d6Result
     *
     * @param integer $d6Result
     * @return DiceRoll
     */
    public function setD6Result($d6Result)
    {
        $this->d6Result = $d6Result;

        return $this;
    }

    /**
     * Get d6Result
     *
     * @return integer 
     */
    public function getD6Result()
    {
        return $this->d6Result;
    }

    /**
     * Set d8Result
     *
     * @param integer $d8Result
     * @return DiceRoll
     */
    public function setD8Result($d8Result)
    {
        $this->d8Result = $d8Result;

        return $this;
    }

    /**
     * Get d8Result
     *
     * @return integer 
     */
    public function getD8Result()
    {
        return $this->d8Result;
    }

    /**
     * Set d10Result
     *
     * @param integer $d10Result
     * @return DiceRoll
     */
    public function setD10Result($d10Result)
    {
        $this->d10Result = $d10Result;

        return $this;
    }

    /**
     * Get d10Result
     *
     * @return integer 
     */
    public function getD10Result()
    {
        return $this->d10Result;
    }

    /**
     * Set d12Result
     *
     * @param integer $d12Result
     * @return DiceRoll
     */
    public function setD12Result($d12Result)
    {
        $this->d12Result = $d12Result;

        return $this;
    }

    /**
     * Get d12Result
     *
     * @return integer 
     */
    public function getD12Result()
    {
        return $this->d12Result;
    }

    /**
     * Set d20Result
     *
     * @param integer $d20Result
     * @return DiceRoll
     */
    public function setD20Result($d20Result)
    {
        $this->d20Result = $d20Result;

        return $this;
    }

    /**
     * Get d20Result
     *
     * @return integer 
     */
    public function getD20Result()
    {
        return $this->d20Result;
    }

    /**
     * Set d100Result
     *
     * @param integer $d100Result
     * @return DiceRoll
     */
    public function setD100Result($d100Result)
    {
        $this->d100Result = $d100Result;

        return $this;
    }

    /**
     * Get d100Result
     *
     * @return integer 
     */
    public function getD100Result()
    {
        return $this->d100Result;
    }

    /**
     * Set rollAction
     *
     * @param string $rollAction
     * @return DiceRoll
     */
    public function setRollAction($rollAction)
    {
        $this->rollAction = $rollAction;

        return $this;
    }

    /**
     * Get rollAction
     *
     * @return string 
     */
    public function getRollAction()
    {
        return $this->rollAction;
    }

    /**
     * Set playerCharacter
     *
     * @param integer $playerCharacter
     * @return DiceRoll
     */
    public function setPlayerCharacter($playerCharacter)
    {
        $this->playerCharacter = $playerCharacter;

        return $this;
    }

    /**
     * Get playerCharacter
     *
     * @return integer 
     */
    public function getPlayerCharacter()
    {
        return $this->playerCharacter;
    }

    /**
     * Set monsterCharacter
     *
     * @param integer $monsterCharacter
     * @return DiceRoll
     */
    public function setMonsterCharacter($monsterCharacter)
    {
        $this->monsterCharacter = $monsterCharacter;

        return $this;
    }

    /**
     * Get monsterCharacter
     *
     * @return integer 
     */
    public function getMonsterCharacter()
    {
        return $this->monsterCharacter;
    }

    /**
     * Set nonPlayerCharacter
     *
     * @param integer $nonPlayerCharacter
     * @return DiceRoll
     */
    public function setNonPlayerCharacter($nonPlayerCharacter)
    {
        $this->nonPlayerCharacter = $nonPlayerCharacter;

        return $this;
    }

    /**
     * Get nonPlayerCharacter
     *
     * @return integer 
     */
    public function getNonPlayerCharacter()
    {
        return $this->nonPlayerCharacter;
    }

    /**
     * Set worldId
     *
     * @param integer $worldId
     * @return DiceRoll
     */
    public function setWorldId($worldId)
    {
        $this->worldId = $worldId;

        return $this;
    }

    /**
     * Get worldId
     *
     * @return integer 
     */
    public function getWorldId()
    {
        return $this->worldId;
    }
}
