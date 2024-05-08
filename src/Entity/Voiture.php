<?php

namespace App\Entity;

use App\Repository\VoitureRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VoitureRepository::class)]
class Voiture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $marque = null;

    #[ORM\Column(length: 255)]
    private ?string $modele = null;

    #[ORM\OneToOne(mappedBy: 'véhiculelié', cascade: ['persist', 'remove'])]
    private ?Disponibilité $estdisponible = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMarque(): ?string
    {
        return $this->marque;
    }

    public function setMarque(string $marque): static
    {
        $this->marque = $marque;

        return $this;
    }

    public function getModele(): ?string
    {
        return $this->modele;
    }

    public function setModele(string $modele): static
    {
        $this->modele = $modele;

        return $this;
    }

    public function getEstdisponible(): ?Disponibilité
    {
        return $this->estdisponible;
    }

    public function setEstdisponible(Disponibilité $estdisponible): static
    {
        // set the owning side of the relation if necessary
        if ($estdisponible->getVéhiculelié() !== $this) {
            $estdisponible->setVéhiculelié($this);
        }

        $this->estdisponible = $estdisponible;

        return $this;
    }
}
