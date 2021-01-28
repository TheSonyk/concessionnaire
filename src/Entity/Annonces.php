<?php

namespace App\Entity;

use App\Repository\AnnoncesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AnnoncesRepository::class)
 */
class Annonces
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="integer")
     */
    private $kilom�trage;

    /**
     * @ORM\Column(type="integer")
     */
    private $chevaux;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $couleur;

    /**
     * @ORM\Column(type="float")
     */
    private $prix;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $image;

    /**
     * @ORM\Column(type="string", length=2)
     */
    private $boite;

    /**
     * @ORM\OneToMany(targetEntity=carburant::class, mappedBy="annonces")
     */
    private $carburant_id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $test;

    public function __construct()
    {
        $this->carburant_id = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

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

    public function getKilom�trage(): ?int
    {
        return $this->kilom�trage;
    }

    public function setKilom�trage(int $kilom�trage): self
    {
        $this->kilom�trage = $kilom�trage;

        return $this;
    }

    public function getChevaux(): ?int
    {
        return $this->chevaux;
    }

    public function setChevaux(int $chevaux): self
    {
        $this->chevaux = $chevaux;

        return $this;
    }

    public function getCouleur(): ?string
    {
        return $this->couleur;
    }

    public function setCouleur(string $couleur): self
    {
        $this->couleur = $couleur;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getBoite(): ?string
    {
        return $this->boite;
    }

    public function setBoite(string $boite): self
    {
        $this->boite = $boite;

        return $this;
    }

    /**
     * @return Collection|carburant[]
     */
    public function getCarburantId(): Collection
    {
        return $this->carburant_id;
    }

    public function addCarburantId(carburant $carburantId): self
    {
        if (!$this->carburant_id->contains($carburantId)) {
            $this->carburant_id[] = $carburantId;
            $carburantId->setAnnonces($this);
        }

        return $this;
    }

    public function removeCarburantId(carburant $carburantId): self
    {
        if ($this->carburant_id->removeElement($carburantId)) {
            // set the owning side to null (unless already changed)
            if ($carburantId->getAnnonces() === $this) {
                $carburantId->setAnnonces(null);
            }
        }

        return $this;
    }

    public function getTest(): ?string
    {
        return $this->test;
    }

    public function setTest(string $test): self
    {
        $this->test = $test;

        return $this;
    }

}
