<?php

namespace App\Entity;

use App\Repository\BRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BRepository::class)
 */
class B
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=A::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $a;

    /**
     * @ORM\Column(type="string", length=191, unique=true)
     */
    private $slug;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function setA(A $a): self
    {
        $this->a = $a;

        return $this;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }
}
