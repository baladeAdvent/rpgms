<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 *  @ORM\Entity
 * @ORM\Table(name="npc")
 */
Class Npc
{
    protected $world_id;
    protected $n_Name;
    protected $n_HP;
    protected $n_MP;
}