<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\JobSkillRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=JobSkillRepository::class)
 */
class JobSkill
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity=Internship::class, mappedBy="requiredSkills")
     */
    private $internships;


    public function __construct()
    {
        $this->jobs = new ArrayCollection();
        $this->internships = new ArrayCollection();
    }

    /**
     * @Groups({"job:collection:get", "job:item:get","internship:collection:get", "internship:item:get"})
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @Groups({"job:collection:get", "job:item:get","internship:collection:get", "internship:item:get"})
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
     * @return Collection|Internship[]
     */
    public function getInternships(): Collection
    {
        return $this->internships;
    }

    public function addInternship(Internship $internship): self
    {
        if (!$this->internships->contains($internship)) {
            $this->internships[] = $internship;
            $internship->addRequiredSkill($this);
        }

        return $this;
    }

    public function removeInternship(Internship $internship): self
    {
        if ($this->internships->removeElement($internship)) {
            $internship->removeRequiredSkill($this);
        }

        return $this;
    }
}
