<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rolls
 *
 * @ORM\Table(name="rolls")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RollsRepository")
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
     * @ORM\Column(name="world", type="integer")
     */
    private $world;

    /**
     * @var int
     *
     * @ORM\Column(name="entityid", type="integer")
     */
    private $entityid;

    /**
     * @var string
     *
     * @ORM\Column(name="entitytype", type="integer")
     */
    private $entitytype;
            
    /**
     * @var string
     *
     * @ORM\Column(name="dice", type="string")
     */
    private $dice;

    /**
     * @var int
     *
     * @ORM\Column(name="result", type="integer")
     */
    private $result;
            
    /**
     * @var string
     *
     * @ORM\Column(name="action", type="string")
     */
    private $action;


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
     * Set world
     *
     * @param integer $world
     * @return Rolls
     */
    public function setWorld($world)
    {
        $this->world = $world;

        return $this;
    }

    /**
     * Get world
     *
     * @return integer 
     */
    public function getWorld()
    {
        return $this->world;
    }

    /**
     * Set playerCharacter
     *
     * @param integer $playerCharacter
     * @return Rolls
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
     * Set dice
     *
     * @param string $dice
     * @return Rolls
     */
    public function setDice($dice)
    {
        // Set as JSON
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
     * Set result
     *
     * @param integer $result
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
     * @return integer 
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * Set entityid
     *
     * @param integer $entityid
     * @return Rolls
     */
    public function setEntityid($entityid)
    {
        $this->entityid = $entityid;

        return $this;
    }

    /**
     * Get entityid
     *
     * @return integer 
     */
    public function getEntityid()
    {
        return $this->entityid;
    }

    /**
     * Set entitytype
     *
     * @param string $entitytype
     * @return Rolls
     */
    public function setEntitytype($entitytype)
    {
        // PC/NPC/MOB/OTHER
        $this->entitytype = $entitytype;

        return $this;
    }

    /**
     * Get entitytype
     *
     * @return string 
     */
    public function getEntitytype()
    {
        return $this->entitytype;
    }

    /**
     * Set action
     *
     * @param string $action
     * @return Rolls
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
}
