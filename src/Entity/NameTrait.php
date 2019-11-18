<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

trait Name
{
    /**
     * @var string
     *
     * @ORM\Column(name="Name", type="text", nullable=true)
     */
    private $name;

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}