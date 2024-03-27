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
    #[ORM\ManyToOne(inversedBy: 'resume')]
    private ?Profile $profile = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $companyName = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $companyLocation = null;

    #[ORM\Column(length: 500, nullable: true)]
    private ?string $companyRole = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $companyDuration = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $companyDescription = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $companyAchievements = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $companyTools = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $educationInstitute = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $educationGraduation = null;

    #[ORM\Column(length: 500, nullable: true)]
    private ?string $educationTopic = null;

    #[ORM\Column(length: 500, nullable: true)]
    private ?string $skillProgramming = null;

    #[ORM\Column(length: 500, nullable: true)]
    private ?string $skillFramework = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $skillDb = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $skillBug = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $skillOther = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $skillLanguage = null;

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
    public function getProfile(): ?Profile
    {
        return $this->profile;
    }

    public function setProfile(?Profile $profile): static
    {
        $this->profile = $profile;

        return $this;
    }

    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }

    public function setCompanyName(?string $companyName): static
    {
        $this->companyName = $companyName;

        return $this;
    }

    public function getCompanyLocation(): ?string
    {
        return $this->companyLocation;
    }

    public function setCompanyLocation(?string $companyLocation): static
    {
        $this->companyLocation = $companyLocation;

        return $this;
    }

    public function getCompanyRole(): ?string
    {
        return $this->companyRole;
    }

    public function setCompanyRole(?string $companyRole): static
    {
        $this->companyRole = $companyRole;

        return $this;
    }

    public function getCompanyDuration(): ?string
    {
        return $this->companyDuration;
    }

    public function setCompanyDuration(?string $companyDuration): static
    {
        $this->companyDuration = $companyDuration;

        return $this;
    }

    public function getCompanyDescription(): ?string
    {
        return $this->companyDescription;
    }

    public function setCompanyDescription(?string $companyDescription): static
    {
        $this->companyDescription = $companyDescription;

        return $this;
    }

    public function getCompanyAchievements(): ?string
    {
        return $this->companyAchievements;
    }

    public function setCompanyAchievements(?string $companyAchievements): static
    {
        $this->companyAchievements = $companyAchievements;

        return $this;
    }

    public function getCompanyTools(): ?string
    {
        return $this->companyTools;
    }

    public function setCompanyTools(?string $companyTools): static
    {
        $this->companyTools = $companyTools;

        return $this;
    }

    public function getEducationInstitute(): ?string
    {
        return $this->educationInstitute;
    }

    public function setEducationInstitute(?string $educationInstitute): static
    {
        $this->educationInstitute = $educationInstitute;

        return $this;
    }

    public function getEducationGraduation(): ?string
    {
        return $this->educationGraduation;
    }

    public function setEducationGraduation(?string $educationGraduation): static
    {
        $this->educationGraduation = $educationGraduation;

        return $this;
    }

    public function getEducationTopic(): ?string
    {
        return $this->educationTopic;
    }

    public function setEducationTopic(?string $educationTopic): static
    {
        $this->educationTopic = $educationTopic;

        return $this;
    }

    public function getSkillProgramming(): ?string
    {
        return $this->skillProgramming;
    }

    public function setSkillProgramming(?string $skillProgramming): static
    {
        $this->skillProgramming = $skillProgramming;

        return $this;
    }

    public function getSkillFramework(): ?string
    {
        return $this->skillFramework;
    }

    public function setSkillFramework(?string $skillFramework): static
    {
        $this->skillFramework = $skillFramework;

        return $this;
    }

    public function getSkillDb(): ?string
    {
        return $this->skillDb;
    }

    public function setSkillDb(?string $skillDb): static
    {
        $this->skillDb = $skillDb;

        return $this;
    }

    public function getSkillBug(): ?string
    {
        return $this->skillBug;
    }

    public function setSkillBug(?string $skillBug): static
    {
        $this->skillBug = $skillBug;

        return $this;
    }

    public function getSkillOther(): ?string
    {
        return $this->skillOther;
    }

    public function setSkillOther(?string $skillOther): static
    {
        $this->skillOther = $skillOther;

        return $this;
    }

    public function getSkillLanguage(): ?string
    {
        return $this->skillLanguage;
    }

    public function setSkillLanguage(?string $skillLanguage): static
    {
        $this->skillLanguage = $skillLanguage;

        return $this;
    }
}
