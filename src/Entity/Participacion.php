<?php

namespace App\Entity;

use App\Repository\ParticipacionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ParticipacionRepository::class)]
class Participacion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'ParticipanEvento')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Evento $Evento = null;

    #[ORM\ManyToOne(inversedBy: 'ParticipanUsuario')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Usuario $Usuario = null;

    #[ORM\Column]
    private ?bool $Asiste = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEvento(): ?Evento
    {
        return $this->Evento;
    }

    public function setEvento(?Evento $Evento): self
    {
        $this->Evento = $Evento;

        return $this;
    }

    public function getUsuario(): ?Usuario
    {
        return $this->Usuario;
    }

    public function setUsuario(?Usuario $Usuario): self
    {
        $this->Usuario = $Usuario;

        return $this;
    }

    public function isAsiste(): ?bool
    {
        return $this->Asiste;
    }

    public function setAsiste(bool $Asiste): self
    {
        $this->Asiste = $Asiste;

        return $this;
    }
}