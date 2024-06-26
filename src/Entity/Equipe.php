<?php

namespace App\Entity;

use App\Repository\EquipeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use symfony\component\HttpFoundation\File\File;


#[ORM\Entity(repositoryClass: EquipeRepository::class)]

#[Vich\Uploadable]
class Equipe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $categorie = null;

    #[ORM\Column(length: 255)]
    private ?string $championnat = null;

    #[ORM\Column(nullable: true)]
    private ?int $total_point = null;



    //vich upload
    #[Vich\UploadableField(mapping: 'logo_images', fileNameProperty: 'ImageName')]
    private ?File $imageFile = null;

    #[ORM\Column(type: 'string')]
    private ?string $imageName = null;
    //----------------
    

    #[ORM\OneToMany(targetEntity: Opposition::class, mappedBy: 'equipe1')]
    private Collection $oppositions;

    #[ORM\OneToMany(targetEntity: Entrainer::class, mappedBy: 'equipe')]
    private Collection $entrainers;

    #[ORM\OneToMany(targetEntity: Joueur::class, mappedBy: 'equipe')]
    private Collection $joueurs;

    public function __construct()
    {
        $this->oppositions = new ArrayCollection();
        $this->entrainers = new ArrayCollection();
        $this->joueurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getCategorie(): ?string
    {
        return $this->categorie;
    }

    public function setCategorie(string $categorie): static
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getChampionnat(): ?string
    {
        return $this->championnat;
    }

    public function setChampionnat(string $championnat): static
    {
        $this->championnat = $championnat;

        return $this;
    }

    public function getTotalPoint(): ?int
    {
        return $this->total_point;
    }

    public function setTotalPoint(?int $total_point): static
    {
        $this->total_point = $total_point;

        return $this;
    }

    

    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;

        // if (null !== $imageFile) {
        //     $this->updatedAt = new \DataTimeImmutable();
        // }
    }
    //vich upload---------
    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }
    public function setImageName(?string $imageName): void
    {
        $this->imageName = $imageName;
    }
    public function getImageName(): ?string
    {
        return $this->imageName;
    }
    //---------------------

    /**
     * @return Collection<int, Opposition>
     */
    public function getOppositions(): Collection
    {
        return $this->oppositions;
    }

    public function addOpposition(Opposition $opposition): static
    {
        if (!$this->oppositions->contains($opposition)) {
            $this->oppositions->add($opposition);
            $opposition->setEquipe1($this);
        }

        return $this;
    }

    public function removeOpposition(Opposition $opposition): static
    {
        if ($this->oppositions->removeElement($opposition)) {
            // set the owning side to null (unless already changed)
            if ($opposition->getEquipe1() === $this) {
                $opposition->setEquipe1(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Entrainer>
     */
    public function getEntrainers(): Collection
    {
        return $this->entrainers;
    }

    public function addEntrainer(Entrainer $entrainer): static
    {
        if (!$this->entrainers->contains($entrainer)) {
            $this->entrainers->add($entrainer);
            $entrainer->setEquipe($this);
        }

        return $this;
    }

    public function removeEntrainer(Entrainer $entrainer): static
    {
        if ($this->entrainers->removeElement($entrainer)) {
            // set the owning side to null (unless already changed)
            if ($entrainer->getEquipe() === $this) {
                $entrainer->setEquipe(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Joueur>
     */
    public function getJoueurs(): Collection
    {
        return $this->joueurs;
    }

    public function addJoueur(Joueur $joueur): static
    {
        if (!$this->joueurs->contains($joueur)) {
            $this->joueurs->add($joueur);
            $joueur->setEquipe($this);
        }

        return $this;
    }

    public function removeJoueur(Joueur $joueur): static
    {
        if ($this->joueurs->removeElement($joueur)) {
            // set the owning side to null (unless already changed)
            if ($joueur->getEquipe() === $this) {
                $joueur->setEquipe(null);
            }
        }

        return $this;
    }

    //methode pour récupérer le total des oppositions 
    public function getNombreMatch(): ?int
    {
        return $this->getOppositions()->count();
    }

}
