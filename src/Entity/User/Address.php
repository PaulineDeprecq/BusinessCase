<?php

namespace App\Entity\User;

use App\Repository\User\AddressRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=AddressRepository::class)
 */
class Address
{
    /**
     * @Groups({"address"})
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Groups({"address", "garage_extended"})
     * @ORM\Column(type="string", length=255)
     */
    private $firstLine;

    /**
     * @Groups({"address", "garage_extended"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $secondLine;

    /**
     * @Groups({"address", "garage_extended"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $thirdLine;

    /**
     * @Groups({"address", "garage_extended"})
     * @ORM\Column(type="string", length=255)
     */
    private $town;

    /**
     * @Groups({"address", "garage_extended"})
     * @ORM\Column(type="string", length=5)
     */
    private $postCode;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstLine(): ?string
    {
        return $this->firstLine;
    }

    public function setFirstLine(string $firstLine): self
    {
        $this->firstLine = $firstLine;

        return $this;
    }

    public function getSecondLine(): ?string
    {
        return $this->secondLine;
    }

    public function setSecondLine(?string $secondLine): self
    {
        $this->secondLine = $secondLine;

        return $this;
    }

    public function getThirdLine(): ?string
    {
        return $this->thirdLine;
    }

    public function setThirdLine(?string $thirdLine): self
    {
        $this->thirdLine = $thirdLine;

        return $this;
    }

    public function getTown(): ?string
    {
        return $this->town;
    }

    public function setTown(string $town): self
    {
        $this->town = $town;

        return $this;
    }

    public function getPostCode(): ?string
    {
        return $this->postCode;
    }

    public function setPostCode(string $postCode): self
    {
        $this->postCode = $postCode;

        return $this;
    }
}
