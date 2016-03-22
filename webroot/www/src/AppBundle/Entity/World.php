<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 *  @ORM\Entity
 * @ORM\Table(name="world")
 */
Class World
{
    protected $gm_id;
    protected $w_Name;
    protected $w_Description;
    
}