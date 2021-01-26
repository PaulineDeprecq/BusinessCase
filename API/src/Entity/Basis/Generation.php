<?php

namespace App\Entity\Basis;

use App\Entity\Compose\Car;
use App\Repository\Basis\GenerationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=GenerationRepository::class)
 */
class Generation
{
    /**
     * @Groups({"generation", "ad"})
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Groups({"generation", "car_extended", "ad"})
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $generation;

    /**
     * @Groups({"generation"})
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @Groups({"generation"})
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @ORM\OneToMany(targetEntity=Car::class, mappedBy="generation")
     */
    private $cars;

    public function __construct()
    {
        $this->cars = new ArrayCollection();
        $this->createdAt = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGeneration(): ?string
    {
        return $this->generation;
    }

    public function setGeneration(string $generation): self
    {
        $this->generation = $generation;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return Collection|Car[]
     */
    public function getCars(): Collection
    {
        return $this->cars;
    }

    public function addCar(Car $car): self
    {
        if (!$this->cars->contains($car)) {
            $this->cars[] = $car;
            $car->setGeneration($this);
        }

        return $this;
    }

    public function removeCar(Car $car): self
    {
        if ($this->cars->removeElement($car)) {
            // set the owning side to null (unless already changed)
            if ($car->getGeneration() === $this) {
                $car->setGeneration(null);
            }
        }

        return $this;
    }
}
