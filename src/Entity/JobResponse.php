<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\JobResponseRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use App\Controller\API\JobResponse\CreateResponse;

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
 *     }
 *     )
 * @ORM\Entity(repositoryClass=JobResponseRepository::class)
 */
class JobResponse
{
    public const STATUS_ACTIVE = 1;
    public const STATUS_DENY = 2;
    public const STATUS_ACCEPTED = 3;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="jobResponses")
     */
    private $user;

    /**
     * @ORM\Column(type="string", length=5000)
     */
    private $letter;

    /**
     * @ORM\Column(type="integer")
     */
    private $status;

    /**
     * @ORM\Column(type="integer")
     */
    private $created_at;

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
     * @return string|null
     */
    public function getLetter(): ?string
    {
        return $this->letter;
    }

    public function setLetter(string $letter): self
    {
        $this->letter = $letter;

        return $this;
    }

    /**
     * @Groups({
     *     "jobResponce:item:get",
     *     "jobResponce:collectoin:get",
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

    /**
     * @Groups({
     *     "jobResponce:item:get",
     *     "jobResponce:collectoin:get",
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


}
