<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $username = null;

    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Annonce::class)]
    private Collection $annonces;

    #[ORM\OneToMany(mappedBy: 'userS', targetEntity: Discussion::class)]
    private Collection $discussionsS;

    #[ORM\OneToMany(mappedBy: 'userR', targetEntity: Discussion::class)]
    private Collection $discussionsR;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Message::class)]
    private Collection $messages;

    #[ORM\OneToMany(mappedBy: 'userRecS', targetEntity: Reclamation::class)]
    private Collection $reclamationsS;

    #[ORM\OneToMany(mappedBy: 'userRecR', targetEntity: Reclamation::class)]
    private Collection $reclamationsR;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: ReservationVisite::class)]
    private Collection $reservationVisites;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $fullName = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $genreUser = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $email = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $region = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $municipalite = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $telephone = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $adresseAgence = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $jourTravail = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $heureTravail = null;

    public function __construct()
    {
        $this->annonces = new ArrayCollection();
        $this->discussionsS = new ArrayCollection();
        $this->discussionsR = new ArrayCollection();
        $this->messages = new ArrayCollection();
        $this->reclamationsS = new ArrayCollection();
        $this->reclamationsR = new ArrayCollection();
        $this->reservationVisites = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
     */
    public function getUsername(): string
    {
        return (string) $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->username;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    /**
     * @return Collection<int, Annonce>
     */
    public function getAnnonces(): Collection
    {
        return $this->annonces;
    }

    public function addAnnonce(Annonce $annonce): self
    {
        if (!$this->annonces->contains($annonce)) {
            $this->annonces->add($annonce);
            $annonce->setUser($this);
        }

        return $this;
    }

    public function removeAnnonce(Annonce $annonce): self
    {
        if ($this->annonces->removeElement($annonce)) {
            // set the owning side to null (unless already changed)
            if ($annonce->getUser() === $this) {
                $annonce->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Discussion>
     */
    public function getDiscussionsS(): Collection
    {
        return $this->discussionsS;
    }

    public function addDiscussionS(Discussion $userR): self
    {
        if (!$this->discussionsS->contains($userR)) {
            $this->discussionsS->add($userR);
            $userR->setUserS($this);
        }

        return $this;
    }

    public function removeDiscussionS(Discussion $userR): self
    {
        if ($this->discussionsS->removeElement($userR)) {
            // set the owning side to null (unless already changed)
            if ($userR->getUserS() === $this) {
                $userR->setUserS(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Discussion>
     */
    public function getDiscussionsR(): Collection
    {
        return $this->discussionsR;
    }

    public function addDiscussionR(Discussion $userR): self
    {
        if (!$this->discussionsR->contains($userR)) {
            $this->discussionsR->add($userR);
            $userR->setUserR($this);
        }

        return $this;
    }

    public function removeDiscussionR(Discussion $userR): self
    {
        if ($this->discussionsR->removeElement($userR)) {
            // set the owning side to null (unless already changed)
            if ($userR->getUserR() === $this) {
                $userR->setUserR(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Message>
     */
    public function getMessages(): Collection
    {
        return $this->messages;
    }

    public function addMessage(Message $message): self
    {
        if (!$this->messages->contains($message)) {
            $this->messages->add($message);
            $message->setUser($this);
        }

        return $this;
    }

    public function removeMessage(Message $message): self
    {
        if ($this->messages->removeElement($message)) {
            // set the owning side to null (unless already changed)
            if ($message->getUser() === $this) {
                $message->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Reclamation>
     */
    public function getReclamationsS(): Collection
    {
        return $this->reclamationsS;
    }

    public function addReclamations(Reclamation $reclamations): self
    {
        if (!$this->reclamationsS->contains($reclamations)) {
            $this->reclamationsS->add($reclamations);
            $reclamations->setUserRecS($this);
        }

        return $this;
    }

    public function removeReclamations(Reclamation $reclamations): self
    {
        if ($this->reclamationsS->removeElement($reclamations)) {
            // set the owning side to null (unless already changed)
            if ($reclamations->getUserRecS() === $this) {
                $reclamations->setUserRecS(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Reclamation>
     */
    public function getReclamationsR(): Collection
    {
        return $this->reclamationsR;
    }

    public function addReclamationsR(Reclamation $reclamationsR): self
    {
        if (!$this->reclamationsR->contains($reclamationsR)) {
            $this->reclamationsR->add($reclamationsR);
            $reclamationsR->setUserRecR($this);
        }

        return $this;
    }

    public function removeReclamationsR(Reclamation $reclamationsR): self
    {
        if ($this->reclamationsR->removeElement($reclamationsR)) {
            // set the owning side to null (unless already changed)
            if ($reclamationsR->getUserRecR() === $this) {
                $reclamationsR->setUserRecR(null);
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
            $reservationVisite->setUser($this);
        }

        return $this;
    }

    public function removeReservationVisite(ReservationVisite $reservationVisite): self
    {
        if ($this->reservationVisites->removeElement($reservationVisite)) {
            // set the owning side to null (unless already changed)
            if ($reservationVisite->getUser() === $this) {
                $reservationVisite->setUser(null);
            }
        }

        return $this;
    }

    public function getFullName(): ?string
    {
        return $this->fullName;
    }

    public function setFullName(?string $fullName): self
    {
        $this->fullName = $fullName;

        return $this;
    }

    public function getGenreUser(): ?string
    {
        return $this->genreUser;
    }

    public function setGenreUser(?string $genreUser): self
    {
        $this->genreUser = $genreUser;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getRegion(): ?string
    {
        return $this->region;
    }

    public function setRegion(?string $region): self
    {
        $this->region = $region;

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

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(?string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getAdresseAgence(): ?string
    {
        return $this->adresseAgence;
    }

    public function setAdresseAgence(?string $adresseAgence): self
    {
        $this->adresseAgence = $adresseAgence;

        return $this;
    }

    public function getJourTravail(): ?string
    {
        return $this->jourTravail;
    }

    public function setJourTravail(?string $jourTravail): self
    {
        $this->jourTravail = $jourTravail;

        return $this;
    }

    public function getHeureTravail(): ?string
    {
        return $this->heureTravail;
    }

    public function setHeureTravail(?string $heureTravail): self
    {
        $this->heureTravail = $heureTravail;

        return $this;
    }
}
