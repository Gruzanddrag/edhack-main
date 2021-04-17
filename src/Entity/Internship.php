<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\InternshipRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     collectionOperations={
 *          "get"={"normalization_context"={"groups"="internship:collection:get"}},
 *          "post"
 *     },
 *     itemOperations={
 *          "get"={"normalization_context"={"groups"="internship:item:get"}},
 *          "put"
 *     }
 * )
 * @ORM\Entity(repositoryClass=InternshipRepository::class)
 */
class Internship
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=8000)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=1000)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity=Organization::class, inversedBy="internships")
     */
    private $organization;

    /**
     * @ORM\OneToMany(targetEntity=InternshipResponse::class, mappedBy="internship")
     */
    private $internshipResponses;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateStart;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateEnd;

    /**
     * @ORM\ManyToOne(targetEntity=InternshipCategory::class, inversedBy="internships")
     */
    private $category;

    public function __construct()
    {
        $this->internshipResponses = new ArrayCollection();
    }

    /**
     * @Groups({
     *     "internship:collection:get",
     *     "internship:item:get",
     *     "user:read",
     *     "tag:collection:get",
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
     *     "user:read",
     *     "organization:read"
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
     *     "user:read",
     *     "organization:read"
     * })
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @Groups({
     *     "internship:collection:get",
     *     "internship:item:get",
     *     "user:read"
     * })
     * @return Organization|null
     */
    public function getOrganization(): ?Organization
    {
        return $this->organization;
    }

    public function setOrganization(?Organization $organization): self
    {
        $this->organization = $organization;

        return $this;
    }


    /**
     * @Groups({
     *     "internship:collection:get",
     *     "internship:item:get"
     * })
     * @return array
     */
    public function getRequiredSkills(): array
    {
        return [
            [
                'name' => 'C#'
            ],
            [
                'name' => 'SQL'
            ],
        ];
    }

    /**
     * @Groups({
     *     "organization:read"
     * })
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
            $internshipResponse->setInternship($this);
        }

        return $this;
    }

    public function removeInternshipResponse(InternshipResponse $internshipResponse): self
    {
        if ($this->internshipResponses->removeElement($internshipResponse)) {
            // set the owning side to null (unless already changed)
            if ($internshipResponse->getInternship() === $this) {
                $internshipResponse->setInternship(null);
            }
        }

        return $this;
    }

    public function getDateStart(): ?\DateTimeInterface
    {
        return $this->dateStart;
    }

    public function setDateStart(\DateTimeInterface $dateStart): self
    {
        $this->dateStart = $dateStart;

        return $this;
    }

    public function getDateEnd(): ?\DateTimeInterface
    {
        return $this->dateEnd;
    }

    public function setDateEnd(\DateTimeInterface $dateEnd): self
    {
        $this->dateEnd = $dateEnd;

        return $this;
    }

    public function getCategory(): ?InternshipCategory
    {
        return $this->category;
    }

    public function setCategory(?InternshipCategory $catrgory): self
    {
        $this->category = $catrgory;

        return $this;
    }
}
