<?php

namespace App\Entity;

use App\Repository\ARepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ARepository::class)
 */
class A
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;


    public function __construct()
    {

    }

    public function getId(): ?int
    {
        return $this->id;
    }


    public function editMe(): static
    {
        return $this;
    }
}
