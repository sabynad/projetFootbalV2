<?php

namespace App\Entity;

use Vich\UploadableField;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\JoueurRepository;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;


#[ORM\Entity(repositoryClass: JoueurRepository::class)]
#[Vich\Uploadable]
class Joueur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_naissance = null;

    #[ORM\Column]
    private ?int $numero = null;

    #[ORM\Column(length: 255)]
    private ?string $poste = null;

    #[ORM\Column(nullable: true)]
    private ?int $numero_licence = null;

    #[ORM\Column]
    private ?int $cartonJaune = null;

    #[ORM\Column]
    private ?int $cartonRouge = null;

    #[ORM\Column]
    private ?int $matchJoue = null;

    #[ORM\Column(nullable: true)]
    private ?int $nbrPasse = null;

    #[ORM\Column(nullable: true)]
    private ?int $nbrPasseDecisif = null;

    #[ORM\Column(nullable: true)]
    private ?int $nbrTir = null;

    #[ORM\Column(nullable: true)]
    private ?int $nbrBut = null;

    #[ORM\Column(nullable: true)]
    private ?int $arretGardien = null;

    #[ORM\Column(nullable: true)]
    private ?int $butEncaisser = null;

    #[ORM\Column(nullable: true)]
    private ?int $penaltyDispute = null;

    #[ORM\Column(nullable: true)]
    private ?int $penaltyArrete = null;

    #[ORM\ManyToOne(inversedBy: 'joueurs')]
    private ?Equipe $equipe = null;

    #[ORM\Column(length: 255)]
    private ?string $joueur_image_name = null;



   
    #[Vich\UploadableField(mapping: 'logo_images', fileNameProperty: 'joueurImageName')]
    private ?File $imageFile = null;

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;

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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->date_naissance;
    }

    public function setDateNaissance(\DateTimeInterface $date_naissance): static
    {
        $this->date_naissance = $date_naissance;

        return $this;
    }

    public function getNumero(): ?int
    {
        return $this->numero;
    }

    public function setNumero(int $numero): static
    {
        $this->numero = $numero;

        return $this;
    }

    public function getPoste(): ?string
    {
        return $this->poste;
    }

    public function setPoste(string $poste): static
    {
        $this->poste = $poste;

        return $this;
    }

    public function getNumeroLicence(): ?int
    {
        return $this->numero_licence;
    }

    public function setNumeroLicence(?int $numero_licence): static
    {
        $this->numero_licence = $numero_licence;

        return $this;
    }

    public function getCartonJaune(): ?int
    {
        return $this->cartonJaune;
    }

    public function setCartonJaune(int $cartonJaune): static
    {
        $this->cartonJaune = $cartonJaune;

        return $this;
    }

    public function getCartonRouge(): ?int
    {
        return $this->cartonRouge;
    }

    public function setCartonRouge(int $cartonRouge): static
    {
        $this->cartonRouge = $cartonRouge;

        return $this;
    }

    public function getMatchJoue(): ?int
    {
        return $this->matchJoue;
    }

    public function setMatchJoue(int $matchJoue): static
    {
        $this->matchJoue = $matchJoue;

        return $this;
    }

    public function getNbrPasse(): ?int
    {
        return $this->nbrPasse;
    }

    public function setNbrPasse(?int $nbrPasse): static
    {
        $this->nbrPasse = $nbrPasse;

        return $this;
    }

    public function getNbrPasseDecisif(): ?int
    {
        return $this->nbrPasseDecisif;
    }

    public function setNbrPasseDecisif(?int $nbrPasseDecisif): static
    {
        $this->nbrPasseDecisif = $nbrPasseDecisif;

        return $this;
    }

    public function getNbrTir(): ?int
    {
        return $this->nbrTir;
    }

    public function setNbrTir(?int $nbrTir): static
    {
        $this->nbrTir = $nbrTir;

        return $this;
    }

    public function getNbrBut(): ?int
    {
        return $this->nbrBut;
    }

    public function setNbrBut(?int $nbrBut): static
    {
        $this->nbrBut = $nbrBut;

        return $this;
    }

    public function getArretGardien(): ?int
    {
        return $this->arretGardien;
    }

    public function setArretGardien(?int $arretGardien): static
    {
        $this->arretGardien = $arretGardien;

        return $this;
    }

    public function getButEncaisser(): ?int
    {
        return $this->butEncaisser;
    }

    public function setButEncaisser(?int $butEncaisser): static
    {
        $this->butEncaisser = $butEncaisser;

        return $this;
    }

    public function getPenaltyDispute(): ?int
    {
        return $this->penaltyDispute;
    }

    public function setPenaltyDispute(?int $penaltyDispute): static
    {
        $this->penaltyDispute = $penaltyDispute;

        return $this;
    }

    public function getPenaltyArrete(): ?int
    {
        return $this->penaltyArrete;
    }

    public function setPenaltyArrete(?int $penaltyArrete): static
    {
        $this->penaltyArrete = $penaltyArrete;

        return $this;
    }

    public function getEquipe(): ?Equipe
    {
        return $this->equipe;
    }

    public function setEquipe(?Equipe $equipe): static
    {
        $this->equipe = $equipe;

        return $this;
    }

    public function getJoueurImageName(): ?string
    {
        return $this->joueur_image_name;
    }

    public function setJoueurImageName(string $joueur_image_name): static
    {
        $this->joueur_image_name = $joueur_image_name;

        return $this;
    }

 





}
