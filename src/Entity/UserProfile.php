<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\UserProfileRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=UserProfileRepository::class)
 */
class UserProfile
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=User::class, inversedBy="userProfile", cascade={"persist", "remove"})
     */
    private $user;

    /**
     * @ORM\Column(type="string", length=6000)
     */
    private $aboutMe;

    /**
     * @ORM\Column(type="boolean")
     */
    private $haveJobPermission;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $telegram;

    /**
     * @ORM\OneToMany(targetEntity=JobExperience::class, mappedBy="userProfile")
     */
    private $jobExperienses;

    /**
     * @ORM\OneToOne(targetEntity=Speciality::class, cascade={"persist", "remove"})
     */
    private $speciality;

    public function __construct()
    {
        $this->jobExperienses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @Groups("user:read")
     * @return string|null
     */
    public function getAboutMe(): ?string
    {
        return $this->aboutMe;
    }

    public function setAboutMe(string $aboutMe): self
    {
        $this->aboutMe = $aboutMe;

        return $this;
    }

    /**
     * @Groups("user:read")
     * @return bool|null
     */
    public function getHaveJobPermission(): ?bool
    {
        return $this->haveJobPermission;
    }

    public function setHaveJobPermission(bool $haveJobPermission): self
    {
        $this->haveJobPermission = $haveJobPermission;

        return $this;
    }

    /**
     * @Groups("user:read")
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * @Groups("user:read")
     * @return string|null
     */
    public function getTelegram(): ?string
    {
        return $this->telegram;
    }

    public function setTelegram(string $telegram): self
    {
        $this->telegram = $telegram;

        return $this;
    }

    /**
     * @Groups("user:read")
     * @return Collection|JobExperience[]
     */
    public function getJobExperienses(): Collection
    {
        return $this->jobExperienses;
    }

    public function addJobExperiense(JobExperience $jobExperiense): self
    {
        if (!$this->jobExperienses->contains($jobExperiense)) {
            $this->jobExperienses[] = $jobExperiense;
            $jobExperiense->setUserProfile($this);
        }

        return $this;
    }

    public function removeJobExperiense(JobExperience $jobExperiense): self
    {
        if ($this->jobExperienses->removeElement($jobExperiense)) {
            // set the owning side to null (unless already changed)
            if ($jobExperiense->getUserProfile() === $this) {
                $jobExperiense->setUserProfile(null);
            }
        }

        return $this;
    }


    /**
     * @Groups("user:read")
     * @return Speciality|null
     */
    public function getSpeciality(): ?Speciality
    {
        return $this->speciality;
    }

    public function setSpeciality(?Speciality $speciality): self
    {
        $this->speciality = $speciality;

        return $this;
    }
}
