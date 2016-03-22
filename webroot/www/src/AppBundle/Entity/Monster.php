<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 *  @ORM\Entity
 * @ORM\Table(name="monster")
 */
Class Monster
{
    protected $world_id;
    protected $m_Name;
    protected $m_HP;
    protected $m_MP;
}