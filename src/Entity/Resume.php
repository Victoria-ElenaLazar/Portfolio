<?php

namespace App\Entity;

use App\Repository\ResumeRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ResumeRepository::class)]
class Resume
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $summary = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $skills = null;

    #[ORM\Column(name: 'professional_experience' , type: Types::TEXT)]
    private ?string $professionalExperience = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $education = null;

    #[ORM\ManyToOne(inversedBy: 'resume')]
    private ?Profile $profile = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSummary(): ?string
    {
        return $this->summary;
    }

    public function setSummary(string $summary): static
    {
        $this->summary = $summary;

        return $this;
    }

    public function getSkills(): ?string
    {
        return $this->skills;
    }

    public function setSkills(string $skills): static
    {
        $this->skills = $skills;

        return $this;
    }

    public function getProfessionalExperience(): ?string
    {
        return $this->professionalExperience;
    }

    public function setProfessionalExperience(string $professionalExperience): static
    {
        $this->professionalExperience = $professionalExperience;

        return $this;
    }

    public function getEducation(): ?string
    {
        return $this->education;
    }

    public function setEducation(string $education): static
    {
        $this->education = $education;

        return $this;
    }

    public function getProfile(): ?Profile
    {
        return $this->profile;
    }

    public function setProfile(?Profile $profile): static
    {
        $this->profile = $profile;

        return $this;
    }
}
