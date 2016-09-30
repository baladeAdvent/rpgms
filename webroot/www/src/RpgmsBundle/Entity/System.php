<?php

namespace RpgmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * System
 *
 * @ORM\Table(name="system")
 * @ORM\Entity(repositoryClass="RpgmsBundle\Repository\SystemRepository")
 */
class System
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
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}

