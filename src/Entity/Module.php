<?php

namespace App\Entity;

use App\Repository\ModuleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ModuleRepository::class)
 */
class Module
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
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateControle;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateExam;

    /**
     * @ORM\ManyToOne(targetEntity=Niveau::class, inversedBy="module")
     * @ORM\JoinColumn(nullable=false)
     */
    private $niveau;

    /**
     * @ORM\OneToMany(targetEntity=Chapitre::class, mappedBy="module")
     */
    private $chapitre;

    
    public function __construct()
    {
        $this->chapitre = new ArrayCollection();
    }

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

    public function getDateControle(): ?\DateTimeInterface
    {
        return $this->dateControle;
    }

    public function setDateControle(?\DateTimeInterface $dateControle): self
    {
        $this->dateControle = $dateControle;

        return $this;
    }

    public function getDateExam(): ?\DateTimeInterface
    {
        return $this->dateExam;
    }

    public function setDateExam(?\DateTimeInterface $dateExam): self
    {
        $this->dateExam = $dateExam;

        return $this;
    }

    public function getNiveau(): ?Niveau
    {
        return $this->niveau;
    }
    

    public function setNiveau(?Niveau $niveau): self
    {
        $this->niveau = $niveau;

        return $this;
    }
   

    /**
     * @return Collection|Chapitre[]
     */
    public function getChapitre(): Collection
    {
        return $this->chapitre;
    }

    public function addChapitre(Chapitre $chapitre): self
    {
        if (!$this->chapitre->contains($chapitre)) {
            $this->chapitre[] = $chapitre;
            $chapitre->setModule($this);
        }

        return $this;
    }

    public function removeChapitre(Chapitre $chapitre): self
    {
        if ($this->chapitre->removeElement($chapitre)) {
            // set the owning side to null (unless already changed)
            if ($chapitre->getModule() === $this) {
                $chapitre->setModule(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        return $this->name;
    }
}
