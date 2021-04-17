<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Controller\API\InternshipResponse\CreateResponse;
use App\Repository\InternshipResponseRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     collectionOperations={
 *          "get"={"normalization_context"={"groups"="jobResponce:collection:get"}},
 *          "post"={
 *              "normalization_context"={
 *                  "groups"="jobResponce:item:post"
 *              },
 *              "method"="POST",
 *              "controller"=CreateResponse::class
 *          },
 *     },
 *     itemOperations={
 *          "get"={"normalization_context"={"groups"="jobResponce:item:get"}},
 *          "put"={"normalization_context"={"groups"="jobResponce:item:put"}},
 *     })
 * @ORM\Entity(repositoryClass=InternshipResponseRepository::class)
 */
class InternshipResponse
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="internshipResponses")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=Internship::class, inversedBy="internshipResponses")
     */
    private $internship;

    /**
     * @ORM\Column(type="integer")
     */
    private $created_at;

    /**
     * @ORM\Column(type="integer")
     */
    private $status;

    /**
     * @Groups({
     *     "jobResponce:item:get",
     *     "jobResponce:collectoin:get",
     *     "jobResponce:item:post",
     *     "jobResponce:item:put",
     *     "user:read"
     * })
     * @return int|null
     */
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
     * @Groups({
     *     "jobResponce:item:get",
     *     "jobResponce:collectoin:get",
     *     "jobResponce:item:post",
     *     "jobResponce:item:put",
     *     "user:read"
     * })
     * @return Internship|null
     */
    public function getInternship(): ?Internship
    {
        return $this->internship;
    }

    public function setInternship(?Internship $Internship): self
    {
        $this->internship = $Internship;

        return $this;
    }

    /**
     * @Groups({
     *     "jobResponce:item:get",
     *     "jobResponce:collectoin:get",
     *     "jobResponce:item:post",
     *     "jobResponce:item:put",
     *     "user:read"
     * })
     * @return int|null
     */
    public function getCreatedAt(): ?int
    {
        return $this->created_at;
    }

    public function setCreatedAt(int $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * @Groups({
     *     "jobResponce:item:get",
     *     "jobResponce:collectoin:get",
     *     "jobResponce:item:post",
     *     "jobResponce:item:put",
     *     "user:read"
     * })
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return new JobResponseStatus($this->status);
    }

    public function setStatus(int $status): self
    {
        $this->status = $status;

        return $this;
    }
}
