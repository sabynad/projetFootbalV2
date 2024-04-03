<?php

namespace App\Entity;

use App\Repository\OppositionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OppositionRepository::class)]
class Opposition
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(nullable: true)]
    private ?int $score_equipe1 = null;

    #[ORM\Column(nullable: true)]
    private ?int $score_equipe2 = null;

    #[ORM\ManyToOne(inversedBy: 'oppositions')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Equipe $equipe1 = null;

    #[ORM\ManyToOne(inversedBy: 'oppositions')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Equipe $equipe2 = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getScoreEquipe1(): ?int
    {
        return $this->score_equipe1;
    }

    public function setScoreEquipe1(?int $score_equipe1): static
    {
        $this->score_equipe1 = $score_equipe1;

        return $this;
    }

    public function getScoreEquipe2(): ?int
    {
        return $this->score_equipe2;
    }

    public function setScoreEquipe2(?int $score_equipe2): static
    {
        $this->score_equipe2 = $score_equipe2;

        return $this;
    }

    public function getEquipe1(): ?Equipe
    {
        return $this->equipe1;
    }

    public function setEquipe1(?Equipe $equipe1): static
    {
        $this->equipe1 = $equipe1;

        return $this;
    }

    public function getEquipe2(): ?Equipe
    {
        return $this->equipe2;
    }

    public function setEquipe2(?Equipe $equipe2): static
    {
        $this->equipe2 = $equipe2;

        return $this;
    }


}
