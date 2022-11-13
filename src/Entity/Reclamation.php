<?php

namespace App\Entity;

use App\Repository\ReclamationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReclamationRepository::class)]
class Reclamation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'reclamations')]
    private ?Categorie $categorieRec = null;

    #[ORM\ManyToOne(inversedBy: 'reclamations')]
    private ?Annonce $annonceRec = null;

    #[ORM\ManyToOne(inversedBy: 'reclamationsS')]
    private ?User $userRecS = null;

    #[ORM\ManyToOne(inversedBy: 'reclamationsR')]
    private ?User $userRecR = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $choiceRec = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $descRec = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $statusRec = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateRec = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategorieRec(): ?Categorie
    {
        return $this->categorieRec;
    }

    public function setCategorieRec(?Categorie $categorieRec): self
    {
        $this->categorieRec = $categorieRec;

        return $this;
    }

    public function getAnnonceRec(): ?Annonce
    {
        return $this->annonceRec;
    }

    public function setAnnonceRec(?Annonce $annonceRec): self
    {
        $this->annonceRec = $annonceRec;

        return $this;
    }

    public function getUserRecS(): ?User
    {
        return $this->userRecS;
    }

    public function setUserRecS(?User $userRecS): self
    {
        $this->userRecS = $userRecS;

        return $this;
    }

    public function getUserRecR(): ?User
    {
        return $this->userRecR;
    }

    public function setUserRecR(?User $userRecR): self
    {
        $this->userRecR = $userRecR;

        return $this;
    }

    public function getChoiceRec(): ?string
    {
        return $this->choiceRec;
    }

    public function setChoiceRec(?string $choiceRec): self
    {
        $this->choiceRec = $choiceRec;

        return $this;
    }

    public function getDescRec(): ?string
    {
        return $this->descRec;
    }

    public function setDescRec(?string $descRec): self
    {
        $this->descRec = $descRec;

        return $this;
    }

    public function getStatusRec(): ?string
    {
        return $this->statusRec;
    }

    public function setStatusRec(?string $statusRec): self
    {
        $this->statusRec = $statusRec;

        return $this;
    }

    public function getDateRec(): ?\DateTimeInterface
    {
        return $this->dateRec;
    }

    public function setDateRec(?\DateTimeInterface $dateRec): self
    {
        $this->dateRec = $dateRec;

        return $this;
    }
}
