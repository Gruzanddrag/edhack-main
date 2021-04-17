<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\OrganizationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     collectionOperations={
 *          "get",
 *          "post"
 *     },
 *     itemOperations={
 *          "get"={"normalization_context"={"groups"="university:read"}},
 *          "put"
 *     })
 * @ORM\Entity(repositoryClass=OrganizationRepository::class)
 */
class University
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=1000, nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=7000)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=2000)
     */
    private $address;

    /**
     * @ORM\Column(type="float")
     */
    private $rating;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $telegram;

    /**
     * @ORM\OneToMany(targetEntity=Internship::class, mappedBy="organization")
     */
    private $internships;

    /**
     * @ORM\Column(type="string", length=1000)
     */
    private $agentName;

    /**
     * @ORM\Column(type="string", length=1000)
     */
    private $agentEmail;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $city;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="university")
     */
    private $user;

    public function __construct()
    {
        //
    }

    /**
     * @Groups({
     *     "internship:collection:get",
     *     "internship:item:get",
     *     "job:collection:get",
     *     "job:item:get",
     *     "user:read",
     *     "organization:read"
     * })
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @Groups({
     *     "internship:collection:get",
     *     "internship:item:get",
     *     "job:collection:get",
     *     "job:item:get",
     *     "user:read",
     *     "organization:read"
     * })
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @Groups({
     *     "internship:collection:get",
     *     "internship:item:get",
     *     "job:collection:get",
     *     "job:item:get",
     *     "user:read"
     * })
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @Groups({
     *     "internship:collection:get",
     *     "internship:item:get",
     *     "job:collection:get",
     *     "job:item:get",
     *     "user:read",
     *     "organization:read"
     * })
     * @return string|null
     */
    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @Groups({
     *     "internship:collection:get",
     *     "internship:item:get",
     *     "job:collection:get",
     *     "job:item:get",
     *     "user:read",
     *     "organization:read"
     * })
     * @return float|null
     */
    public function getRating(): ?float
    {
        return $this->rating;
    }

    public function setRating(float $rating): self
    {
        $this->rating = $rating;

        return $this;
    }

    /**
     * @Groups({
     *     "internship:collection:get",
     *     "internship:item:get",
     *     "job:collection:get",
     *     "job:item:get",
     *     "organization:read"
     * })
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
     * @Groups({
     *     "internship:collection:get",
     *     "internship:item:get",
     *     "job:collection:get",
     *     "job:item:get",
     *     "organization:read"
     * })
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
     * @Groups({
     *     "internship:collection:get",
     *     "internship:item:get",
     *     "job:collection:get",
     *     "job:item:get",
     *     "organization:read"
     * })
     * @return string|null
     */
    public function getAgentName(): ?string
    {
        return $this->agentName;
    }

    public function setAgentName(string $agentName): self
    {
        $this->agentName = $agentName;

        return $this;
    }

    /**
     * @Groups({
     *     "internship:collection:get",
     *     "internship:item:get",
     *     "job:collection:get",
     *     "job:item:get",
     *     "organization:read"
     * })
     * @return string|null
     */
    public function getAgentEmail(): ?string
    {
        return $this->agentEmail;
    }

    public function setAgentEmail(string $agentEmail): self
    {
        $this->agentEmail = $agentEmail;

        return $this;
    }

    /**
     * @Groups({
     *     "internship:collection:get",
     *     "internship:item:get",
     *     "job:collection:get",
     *     "job:item:get",
     *     "user:read",
     *     "organization:read"
     * })
     * @return string|null
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
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
}