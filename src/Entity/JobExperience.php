<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\JobExperienceRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=JobExperienceRepository::class)
 */
class JobExperience
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=1000)
     */
    private $companyName;

    /**
     * @ORM\Column(type="string", length=1000)
     */
    private $position;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $jobTimePeriod;

    /**
     * @ORM\ManyToOne(targetEntity=UserProfile::class, inversedBy="jobExperienses")
     */
    private $userProfile;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @Groups("user:read")
     * @return string|null
     */
    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }

    public function setCompanyName(string $companyName): self
    {
        $this->companyName = $companyName;

        return $this;
    }

    /**
     * @Groups("user:read")
     * @return string|null
     */
    public function getPosition(): ?string
    {
        return $this->position;
    }

    public function setPosition(string $position): self
    {
        $this->position = $position;

        return $this;
    }

    /**
     * @Groups("user:read")
     * @return string|null
     */
    public function getJobTimePeriod(): ?string
    {
        return $this->jobTimePeriod;
    }

    public function setJobTimePeriod(string $jobTimePeriod): self
    {
        $this->jobTimePeriod = $jobTimePeriod;

        return $this;
    }

    public function getUserProfile(): ?UserProfile
    {
        return $this->userProfile;
    }

    public function setUserProfile(?UserProfile $userProfile): self
    {
        $this->userProfile = $userProfile;

        return $this;
    }
}
