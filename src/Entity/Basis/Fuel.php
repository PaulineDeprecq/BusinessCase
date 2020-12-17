<?php

namespace App\Entity\Basis;

use App\Entity\Compose\Ad;
use App\Repository\Basis\FuelRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=FuelRepository::class)
 */
class Fuel
{
    /**
     * @Groups({"fuel"})
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Groups({"fuel", "ad_extended"})
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $type;

    /**
     * @Groups({"fuel"})
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @Groups({"fuel"})
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @Groups({"fuel_extended"})
     * @ORM\OneToMany(targetEntity=Ad::class, mappedBy="fuel", orphanRemoval=true)
     */
    private $ads;

    public function __construct()
    {
        $this->ads = new ArrayCollection();
        $this->createdAt = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

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
     * @return Collection|Ad[]
     */
    public function getAds(): Collection
    {
        return $this->ads;
    }

    public function addAd(Ad $ad): self
    {
        if (!$this->ads->contains($ad)) {
            $this->ads[] = $ad;
            $ad->setFuel($this);
        }

        return $this;
    }

    public function removeAd(Ad $ad): self
    {
        if ($this->ads->removeElement($ad)) {
            // set the owning side to null (unless already changed)
            if ($ad->getFuel() === $this) {
                $ad->setFuel(null);
            }
        }

        return $this;
    }
}
