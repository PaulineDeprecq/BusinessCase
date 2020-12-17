<?php

namespace App\Entity\Compose;

use App\Entity\Basis\Finish;
use App\Entity\Basis\Generation;
use App\Entity\Basis\Model;
use App\Entity\Basis\Version;
use App\Repository\Compose\CarRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=CarRepository::class)
 */
class Car
{
    /**
     * @Groups({"car", "finish_extended"})
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Groups({"car", "ad_extended"})
     * @ORM\ManyToOne(targetEntity=Generation::class, inversedBy="cars")
     */
    private $generation;

    /**
     * @Groups({"car", "ad_extended"})
     * @ORM\ManyToOne(targetEntity=Version::class, inversedBy="cars")
     */
    private $version;

    /**
     * @Groups({"car", "ad_extended"})
     * @ORM\ManyToMany(targetEntity=Finish::class, inversedBy="cars")
     */
    private $finishs;

    /**
     * @Groups({"car", "ad_extended"})
     * @ORM\ManyToOne(targetEntity=Model::class, inversedBy="cars")
     * @ORM\JoinColumn(nullable=false)
     */
    private $model;

    /**
     * @ORM\OneToMany(targetEntity=Ad::class, mappedBy="car", orphanRemoval=true)
     */
    private $ads;

    /**
     * @Groups({"car"})
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @Groups({"car"})
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;

    public function __construct()
    {
        $this->ads = new ArrayCollection();
        $this->createdAt = new \DateTime();
        $this->finishs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGeneration(): ?Generation
    {
        return $this->generation;
    }

    public function setGeneration(?Generation $generation): self
    {
        $this->generation = $generation;

        return $this;
    }

    public function getVersion(): ?Version
    {
        return $this->version;
    }

    public function setVersion(?Version $version): self
    {
        $this->version = $version;

        return $this;
    }

    /**
     * @return Collection|Finish[]
     */
    public function getFinishs(): Collection
    {
        return $this->finishs;
    }

    public function addFinish(Finish $finish): self
    {
        if (!$this->finishs->contains($finish)) {
            $this->finishs[] = $finish;
        }

        return $this;
    }

    public function removeFinish(Finish $finish): self
    {
        $this->finishs->removeElement($finish);

        return $this;
    }

    public function getModel(): ?Model
    {
        return $this->model;
    }

    public function setModel(?Model $model): self
    {
        $this->model = $model;

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
            $ad->setCar($this);
        }

        return $this;
    }

    public function removeAd(Ad $ad): self
    {
        if ($this->ads->removeElement($ad)) {
            // set the owning side to null (unless already changed)
            if ($ad->getCar() === $this) {
                $ad->setCar(null);
            }
        }

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
}
