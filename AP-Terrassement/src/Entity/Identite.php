<?php

namespace App\Entity;

use App\Repository\IdentiteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=IdentiteRepository::class)
 */
class Identite
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $NomSiteWeb;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $proprietaire;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $responsablePublication;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $conceptionRealisation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $animation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $hebergement;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomSiteWeb(): ?string
    {
        return $this->NomSiteWeb;
    }

    public function setNomSiteWeb(string $NomSiteWeb): self
    {
        $this->NomSiteWeb = $NomSiteWeb;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getProprietaire(): ?string
    {
        return $this->proprietaire;
    }

    public function setProprietaire(string $proprietaire): self
    {
        $this->proprietaire = $proprietaire;

        return $this;
    }

    public function getResponsablePublication(): ?string
    {
        return $this->responsablePublication;
    }

    public function setResponsablePublication(string $responsablePublication): self
    {
        $this->responsablePublication = $responsablePublication;

        return $this;
    }

    public function getConceptionRealisation(): ?string
    {
        return $this->conceptionRealisation;
    }

    public function setConceptionRealisation(string $conceptionRealisation): self
    {
        $this->conceptionRealisation = $conceptionRealisation;

        return $this;
    }

    public function getAnimation(): ?string
    {
        return $this->animation;
    }

    public function setAnimation(string $animation): self
    {
        $this->animation = $animation;

        return $this;
    }

    public function getHebergement(): ?string
    {
        return $this->hebergement;
    }

    public function setHebergement(string $hebergement): self
    {
        $this->hebergement = $hebergement;

        return $this;
    }
}
