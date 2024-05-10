<?php

namespace App\Entity;

use App\Repository\CarRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CarRepository::class)]
class Car
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $Model = null;

    #[ORM\Column(length: 50)]
    private ?string $Brand = null;

    #[ORM\OneToOne(mappedBy: 'LinkCar', cascade: ['persist', 'remove'])]
    private ?Availability $LinkedCar = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getModel(): ?string
    {
        return $this->Model;
    }

    public function setModel(string $Model): static
    {
        $this->Model = $Model;

        return $this;
    }

    public function getBrand(): ?string
    {
        return $this->Brand;
    }

    public function setBrand(string $Brand): static
    {
        $this->Brand = $Brand;

        return $this;
    }

    public function getLinkedCar(): ?Availability
    {
        return $this->LinkedCar;
    }

    public function setLinkedCar(Availability $LinkedCar): static
    {
        
        if ($LinkedCar->getLinkedCar() !== $this) {
            $LinkedCar->setLinkedCar($this);
        }

        $this->LinkedCar = $LinkedCar;

        return $this;
    }

    public function __toString()
    {
        return $this->Model;
    }
}

