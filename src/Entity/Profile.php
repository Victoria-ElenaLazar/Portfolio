<?php

namespace App\Entity;

use App\Repository\ProfileRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProfileRepository::class)]
class Profile
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $phone = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $bio = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image = null;

    #[ORM\Column(length: 255)]
    private ?string $location = null;

    #[ORM\OneToMany(targetEntity: Recommendations::class, mappedBy: 'profile')]
    private Collection $recommendations;

    #[ORM\OneToMany(targetEntity: Projects::class, mappedBy: 'profile')]
    private Collection $projects;

    #[ORM\OneToMany(targetEntity: Resume::class, mappedBy: 'profile')]
    private Collection $resume;

    public function __construct()
    {
        $this->recommendations = new ArrayCollection();
        $this->projects = new ArrayCollection();
        $this->resume = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): static
    {
        $this->phone = $phone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getBio(): ?string
    {
        return $this->bio;
    }

    public function setBio(string $bio): static
    {
        $this->bio = $bio;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image = $image;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): static
    {
        $this->location = $location;

        return $this;
    }

    /**
     * @return Collection<int, Recommendations>
     */
    public function getRecommendations(): Collection
    {
        return $this->recommendations;
    }

    public function addRecommendation(Recommendations $recommendation): static
    {
        if (!$this->recommendations->contains($recommendation)) {
            $this->recommendations->add($recommendation);
            $recommendation->setProfile($this);
        }

        return $this;
    }

    public function removeRecommendation(Recommendations $recommendation): static
    {
        if ($this->recommendations->removeElement($recommendation)) {
            // set the owning side to null (unless already changed)
            if ($recommendation->getProfile() === $this) {
                $recommendation->setProfile(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Projects>
     */
    public function getProjects(): Collection
    {
        return $this->projects;
    }

    public function addProject(Projects $project): static
    {
        if (!$this->projects->contains($project)) {
            $this->projects->add($project);
            $project->setProfile($this);
        }

        return $this;
    }

    public function removeProject(Projects $project): static
    {
        if ($this->projects->removeElement($project)) {
            // set the owning side to null (unless already changed)
            if ($project->getProfile() === $this) {
                $project->setProfile(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Resume>
     */
    public function getResume(): Collection
    {
        return $this->resume;
    }

    public function addResume(Resume $resume): static
    {
        if (!$this->resume->contains($resume)) {
            $this->resume->add($resume);
            $resume->setProfile($this);
        }

        return $this;
    }

    public function removeResume(Resume $resume): static
    {
        if ($this->resume->removeElement($resume)) {
            // set the owning side to null (unless already changed)
            if ($resume->getProfile() === $this) {
                $resume->setProfile(null);
            }
        }

        return $this;
    }
}
