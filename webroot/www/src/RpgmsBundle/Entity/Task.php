<?php

// src/RpgmsBundle/Entity/Task.php

namespace RpgmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

class Task
{

    protected $description;

    /**
     * @ORM\ManyToMany(targetEntity="Tag", cascade={"persist"})
     */
    protected $tags;

}
