<?php

// src/RpgmsBundle/Entity/Tag.php
namespace RpgmsBundle\Entity;

class Tag
{
    private $name;
    
    public function addTask(Task $task)
    {
        if (!$this->tasks->contains($task)) {
            $this->tasks->add($task);
        }
    }
}