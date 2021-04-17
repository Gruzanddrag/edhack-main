<?php

namespace App\Entity;

use App\Repository\InternshipCategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InternshipCategoryRepository::class)
 */
class InternshipCategory
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=3000)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=Internship::class, mappedBy="catrgory")
     */
    private $internships;

    public function __construct()
    {
        $this->internships = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

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
            $internship->setCatrgory($this);
        }

        return $this;
    }

    public function removeInternship(Internship $internship): self
    {
        if ($this->internships->removeElement($internship)) {
            // set the owning side to null (unless already changed)
            if ($internship->getCatrgory() === $this) {
                $internship->setCatrgory(null);
            }
        }

        return $this;
    }
}
