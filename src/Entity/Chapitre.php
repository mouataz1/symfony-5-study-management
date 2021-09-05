<?php

namespace App\Entity;

use App\Repository\ChapitreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ChapitreRepository::class)
 */
class Chapitre
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
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity=Module::class, inversedBy="chapitre")
     * @ORM\JoinColumn(nullable=false)
     */
    private $module;

    /**
     * @ORM\OneToMany(targetEntity=Cours::class, mappedBy="chapitre")
     */
    private $cours;

    /**
     * @ORM\OneToMany(targetEntity=Td::class, mappedBy="chapitre")
     */
    private $td;

    /**
     * @ORM\OneToMany(targetEntity=Tp::class, mappedBy="chapitre")
     */
    private $tp;

    public function __construct()
    {
        $this->cours = new ArrayCollection();
        $this->td = new ArrayCollection();
        $this->tp = new ArrayCollection();
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

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getModule(): ?Module
    {
        return $this->module;
    }

    public function setModule(?Module $module): self
    {
        $this->module = $module;

        return $this;
    }

    /**
     * @return Collection|Cours[]
     */
    public function getCours(): Collection
    {
        return $this->cours;
    }

    public function addCour(Cours $cour): self
    {
        if (!$this->cours->contains($cour)) {
            $this->cours[] = $cour;
            $cour->setChapitre($this);
        }

        return $this;
    }

    public function removeCour(Cours $cour): self
    {
        if ($this->cours->removeElement($cour)) {
            // set the owning side to null (unless already changed)
            if ($cour->getChapitre() === $this) {
                $cour->setChapitre(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Td[]
     */
    public function getTd(): Collection
    {
        return $this->td;
    }

    public function addTd(Td $td): self
    {
        if (!$this->td->contains($td)) {
            $this->td[] = $td;
            $td->setChapitre($this);
        }

        return $this;
    }

    public function removeTd(Td $td): self
    {
        if ($this->td->removeElement($td)) {
            // set the owning side to null (unless already changed)
            if ($td->getChapitre() === $this) {
                $td->setChapitre(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Tp[]
     */
    public function getTp(): Collection
    {
        return $this->tp;
    }

    public function addTp(Tp $tp): self
    {
        if (!$this->tp->contains($tp)) {
            $this->tp[] = $tp;
            $tp->setChapitre($this);
        }

        return $this;
    }

    public function removeTp(Tp $tp): self
    {
        if ($this->tp->removeElement($tp)) {
            // set the owning side to null (unless already changed)
            if ($tp->getChapitre() === $this) {
                $tp->setChapitre(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        return $this->nom;
    }
}
