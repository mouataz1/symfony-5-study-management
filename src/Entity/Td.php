<?php

namespace App\Entity;

use App\Repository\TdRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TdRepository::class)
 */
class Td
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
    private $nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $fdFile;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $correction;

    /**
     * @ORM\ManyToOne(targetEntity=Chapitre::class, inversedBy="td")
     * @ORM\JoinColumn(nullable=false)
     */
    private $chapitre;

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

    public function getFdFile(): ?string
    {
        return $this->fdFile;
    }

    public function setFdFile(?string $fdFile): self
    {
        $this->fdFile = $fdFile;

        return $this;
    }

    public function getCorrection(): ?string
    {
        return $this->correction;
    }

    public function setCorrection(?string $correction): self
    {
        $this->correction = $correction;

        return $this;
    }

    public function getChapitre(): ?Chapitre
    {
        return $this->chapitre;
    }

    public function setChapitre(?Chapitre $chapitre): self
    {
        $this->chapitre = $chapitre;

        return $this;
    }
}
