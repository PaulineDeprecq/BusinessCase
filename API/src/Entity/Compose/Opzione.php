<?php

namespace App\Entity\Compose;

use App\Repository\Compose\OpzioneRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=OpzioneRepository::class)
 */
class Opzione
{
    /**
     * @Groups({"option"})
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Groups({"option", "ad_extended"})
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $name;

    /**
     * @Groups({"option"})
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $icon;

    /**
     * @ORM\ManyToMany(targetEntity=Ad::class, mappedBy="options")
     */
    private $ads;

    public function __construct()
    {
        $this->ads = new ArrayCollection();
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

    public function getIcon(): ?string
    {
        return $this->icon;
    }

    public function setIcon(string $icon): self
    {
        $this->icon = $icon;

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
        }

        return $this;
    }

    public function removeAd(Ad $ad): self
    {
        $this->ads->removeElement($ad);

        return $this;
    }
}
