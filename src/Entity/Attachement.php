<?php

namespace App\Entity;

use App\Repository\AttachementRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AttachementRepository::class)]
class Attachement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'attachements')]
    private ?Annonce $annonce = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nomAttachement = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $src = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $format = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnnonce(): ?Annonce
    {
        return $this->annonce;
    }

    public function setAnnonce(?Annonce $annonce): self
    {
        $this->annonce = $annonce;

        return $this;
    }

    public function getNomAttachement(): ?string
    {
        return $this->nomAttachement;
    }

    public function setNomAttachement(?string $nomAttachement): self
    {
        $this->nomAttachement = $nomAttachement;

        return $this;
    }

    public function getSrc(): ?string
    {
        return $this->src;
    }

    public function setSrc(?string $src): self
    {
        $this->src = $src;

        return $this;
    }

    public function getFormat(): ?string
    {
        return $this->format;
    }

    public function setFormat(?string $format): self
    {
        $this->format = $format;

        return $this;
    }
}
