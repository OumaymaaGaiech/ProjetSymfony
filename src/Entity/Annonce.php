<?php

namespace App\Entity;

use App\Repository\AnnonceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnnonceRepository::class)]
class Annonce
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'annonces')]
    private ?User $user = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $adresseAnnonce = null;

    #[ORM\Column(nullable: true)]
    private ?float $prixAnnonce = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $regionAnnonce = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $municipalite = null;

    #[ORM\Column(nullable: true)]
    private ?int $codePostal = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $typeOpertaion = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $categorie = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $longitude = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $latitude = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $statut = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $superficie = null;

    #[ORM\Column(nullable: true)]
    private ?int $archiveAnnonce = null;

    #[ORM\OneToMany(mappedBy: 'annonce', targetEntity: Attachement::class)]
    private Collection $attachements;

    #[ORM\OneToMany(mappedBy: 'annonceRec', targetEntity: Reclamation::class)]
    private Collection $reclamations;

    #[ORM\OneToMany(mappedBy: 'annonce', targetEntity: ReservationVisite::class)]
    private Collection $reservationVisites;

    public function __construct()
    {
        $this->attachements = new ArrayCollection();
        $this->reclamations = new ArrayCollection();
        $this->reservationVisites = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getAdresseAnnonce(): ?string
    {
        return $this->adresseAnnonce;
    }

    public function setAdresseAnnonce(?string $adresseAnnonce): self
    {
        $this->adresseAnnonce = $adresseAnnonce;

        return $this;
    }

    public function getPrixAnnonce(): ?float
    {
        return $this->prixAnnonce;
    }

    public function setPrixAnnonce(?float $prixAnnonce): self
    {
        $this->prixAnnonce = $prixAnnonce;

        return $this;
    }

    public function getRegionAnnonce(): ?string
    {
        return $this->regionAnnonce;
    }

    public function setRegionAnnonce(?string $regionAnnonce): self
    {
        $this->regionAnnonce = $regionAnnonce;

        return $this;
    }

    public function getMunicipalite(): ?string
    {
        return $this->municipalite;
    }

    public function setMunicipalite(?string $municipalite): self
    {
        $this->municipalite = $municipalite;

        return $this;
    }

    public function getCodePostal(): ?int
    {
        return $this->codePostal;
    }

    public function setCodePostal(?int $codePostal): self
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    public function getTypeOpertaion(): ?string
    {
        return $this->typeOpertaion;
    }

    public function setTypeOpertaion(?string $typeOpertaion): self
    {
        $this->typeOpertaion = $typeOpertaion;

        return $this;
    }

    public function getCategorie(): ?string
    {
        return $this->categorie;
    }

    public function setCategorie(?string $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getLongitude(): ?string
    {
        return $this->longitude;
    }

    public function setLongitude(?string $longitude): self
    {
        $this->longitude = $longitude;

        return $this;
    }

    public function getLatitude(): ?string
    {
        return $this->latitude;
    }

    public function setLatitude(?string $latitude): self
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(?string $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getSuperficie(): ?string
    {
        return $this->superficie;
    }

    public function setSuperficie(?string $superficie): self
    {
        $this->superficie = $superficie;

        return $this;
    }

    public function getArchiveAnnonce(): ?int
    {
        return $this->archiveAnnonce;
    }

    public function setArchiveAnnonce(?int $archiveAnnonce): self
    {
        $this->archiveAnnonce = $archiveAnnonce;

        return $this;
    }

    /**
     * @return Collection<int, Attachement>
     */
    public function getAttachements(): Collection
    {
        return $this->attachements;
    }

    public function addAttachement(Attachement $attachement): self
    {
        if (!$this->attachements->contains($attachement)) {
            $this->attachements->add($attachement);
            $attachement->setAnnonce($this);
        }

        return $this;
    }

    public function removeAttachement(Attachement $attachement): self
    {
        if ($this->attachements->removeElement($attachement)) {
            // set the owning side to null (unless already changed)
            if ($attachement->getAnnonce() === $this) {
                $attachement->setAnnonce(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Reclamation>
     */
    public function getReclamations(): Collection
    {
        return $this->reclamations;
    }

    public function addReclamation(Reclamation $reclamation): self
    {
        if (!$this->reclamations->contains($reclamation)) {
            $this->reclamations->add($reclamation);
            $reclamation->setAnnonceRec($this);
        }

        return $this;
    }

    public function removeReclamation(Reclamation $reclamation): self
    {
        if ($this->reclamations->removeElement($reclamation)) {
            // set the owning side to null (unless already changed)
            if ($reclamation->getAnnonceRec() === $this) {
                $reclamation->setAnnonceRec(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ReservationVisite>
     */
    public function getReservationVisites(): Collection
    {
        return $this->reservationVisites;
    }

    public function addReservationVisite(ReservationVisite $reservationVisite): self
    {
        if (!$this->reservationVisites->contains($reservationVisite)) {
            $this->reservationVisites->add($reservationVisite);
            $reservationVisite->setAnnonce($this);
        }

        return $this;
    }

    public function removeReservationVisite(ReservationVisite $reservationVisite): self
    {
        if ($this->reservationVisites->removeElement($reservationVisite)) {
            // set the owning side to null (unless already changed)
            if ($reservationVisite->getAnnonce() === $this) {
                $reservationVisite->setAnnonce(null);
            }
        }

        return $this;
    }
}
