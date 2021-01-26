<?php

namespace App\Entity\Compose;

use App\Repository\Compose\CritAirRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=CritAirRepository::class)
 */
class CritAir
{
    /**
     * @Groups({"critair", "ad"})
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Groups({"critair", "ad"})
     * @ORM\Column(type="integer", unique=true)
     */
    private $certificate;

    /**
     * @ORM\OneToMany(targetEntity=Ad::class, mappedBy="critAir")
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

    public function getCertificate(): ?int
    {
        return $this->certificate;
    }

    public function setCertificate(int $certificate): self
    {
        $this->certificate = $certificate;

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
            $ad->setCritAir($this);
        }

        return $this;
    }

    public function removeAd(Ad $ad): self
    {
        if ($this->ads->removeElement($ad)) {
            // set the owning side to null (unless already changed)
            if ($ad->getCritAir() === $this) {
                $ad->setCritAir(null);
            }
        }

        return $this;
    }
}
