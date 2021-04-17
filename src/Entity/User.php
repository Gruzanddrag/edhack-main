<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;


/**
 * @ApiResource(
 *      attributes={
 *          "normalization_context"={"groups"={"user:read"}}
 *      }
 * )
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User
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
    private $lastname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $thirdname;

    /**
     * @ORM\Column(type="json")
     */
    private $roles;

    /**
     * @ORM\OneToOne(targetEntity=UserProfile::class, mappedBy="user", cascade={"persist", "remove"})
     */
    private $userProfile;

    /**
     * @ORM\OneToMany(targetEntity=JobResponse::class, mappedBy="user")
     */
    private $jobResponses;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\OneToOne(targetEntity=Organization::class, mappedBy="user", cascade={"persist", "remove"})
     */
    private $organization;

    /**
     * @ORM\OneToMany(targetEntity=InternshipResponse::class, mappedBy="user")
     */
    private $internshipResponses;

    public function __construct()
    {
        $this->jobResponses = new ArrayCollection();
        $this->internshipResponses = new ArrayCollection();
    }

    /**
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @Groups("user:read")
     * @return string|null
     */
    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     * @return User
     */
    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * @Groups("user:read")
     * @return string|null
     */
    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * @Groups("user:read")
     * @return string|null
     */
    public function getThirdname(): ?string
    {
        return $this->thirdname;
    }

    public function setThirdname(string $thirdname): self
    {
        $this->thirdname = $thirdname;

        return $this;
    }

    /**
     * @Groups("user:read")
     * @return UserProfile|null
     */
    public function getUserProfile(): ?UserProfile
    {
        return $this->userProfile;
    }

    public function setUserProfile(?UserProfile $userProfile): self
    {
        $this->userProfile = $userProfile;

        // set (or unset) the owning side of the relation if necessary
        $newUser = null === $userProfile ? null : $this;
        if ($userProfile->getUser() !== $newUser) {
            $userProfile->setUser($newUser);
        }

        return $this;
    }

    /**
     * @Groups("user:read")
     * @return mixed
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * @param mixed $roles
     */
    public function setRoles($roles): void
    {
        $this->roles = $roles;
    }

    /**
     * @Groups("user:read")
     * @return Collection|JobResponse[]
     */
    public function getJobResponses(): Collection
    {
        return $this->jobResponses;
    }

    public function addJobResponse(JobResponse $jobResponse): self
    {
        if (!$this->jobResponses->contains($jobResponse)) {
            $this->jobResponses[] = $jobResponse;
            $jobResponse->setUser($this);
        }

        return $this;
    }

    public function removeJobResponse(JobResponse $jobResponse): self
    {
        if ($this->jobResponses->removeElement($jobResponse)) {
            // set the owning side to null (unless already changed)
            if ($jobResponse->getUser() === $this) {
                $jobResponse->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @Groups("user:read")
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @Groups("user:read")
     * @return Organization|null
     */
    public function getOrganization(): ?Organization
    {
        return $this->organization;
    }

    public function setOrganization(?Organization $organization): self
    {
        $this->organization = $organization;

        // set (or unset) the owning side of the relation if necessary
        $newUser = null === $organization ? null : $this;
        if ($organization->getUser() !== $newUser) {
            $organization->setUser($newUser);
        }

        return $this;
    }

    /**
     * @Groups("user:read")
     * @return Collection|InternshipResponse[]
     */
    public function getInternshipResponses(): Collection
    {
        return $this->internshipResponses;
    }

    public function addInternshipResponse(InternshipResponse $internshipResponse): self
    {
        if (!$this->internshipResponses->contains($internshipResponse)) {
            $this->internshipResponses[] = $internshipResponse;
            $internshipResponse->setUser($this);
        }

        return $this;
    }

    public function removeInternshipResponse(InternshipResponse $internshipResponse): self
    {
        if ($this->internshipResponses->removeElement($internshipResponse)) {
            // set the owning side to null (unless already changed)
            if ($internshipResponse->getUser() === $this) {
                $internshipResponse->setUser(null);
            }
        }

        return $this;
    }
}
