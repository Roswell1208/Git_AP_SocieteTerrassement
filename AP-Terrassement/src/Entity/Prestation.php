<?php

namespace App\Entity;

use App\Repository\PrestationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PrestationRepository::class)
 */
class Prestation
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
    private $titre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $descri_presta;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tarif;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lien_img;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDescriPresta(): ?string
    {
        return $this->descri_presta;
    }

    public function setDescriPresta(string $descri_presta): self
    {
        $this->descri_presta = $descri_presta;

        return $this;
    }

    public function getTarif(): ?string
    {
        return $this->tarif;
    }

    public function setTarif(string $tarif): self
    {
        $this->tarif = $tarif;

        return $this;
    }

    public function getLienImg(): ?string
    {
        return $this->lien_img;
    }

    public function setLienImg(string $lien_img): self
    {
        $this->lien_img = $lien_img;

        return $this;
    }
}
