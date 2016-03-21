<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 *  @ORM\Entity
 * @ORM\Table(name="character")
 */
Class Character
{
    protected $world_id;
    protected $c_Name;
    protected $c_HP;
    protected $c_MP;
}