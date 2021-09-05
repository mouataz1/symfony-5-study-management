<?php

namespace App\Entity;

use App\Repository\TpRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TpRepository::class)
 */
class Tp
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
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $tpFile;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $correction;

    /**
     * @ORM\ManyToOne(targetEntity=Chapitre::class, inversedBy="tp")
     * @ORM\JoinColumn(nullable=false)
     */
    private $chapitre;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getTpFile(): ?string
    {
        return $this->tpFile;
    }

    public function setTpFile(?string $tpFile): self
    {
        $this->tpFile = $tpFile;

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
