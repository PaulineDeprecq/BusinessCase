<?php

namespace App\Entity\Compose;

use App\Entity\Basis\Color;
use App\Entity\Basis\Fuel;
use App\Entity\User\Garage;
use App\Repository\Compose\AdRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AdRepository::class)
 */
class Ad
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $body;

    /**
     * @ORM\Column(type="datetime")
     */
    private $circulationDate;

    /**
     * @ORM\Column(type="integer")
     */
    private $mileage;

    /**
     * @ORM\Column(type="integer")
     */
    private $price;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $reference;

    /**
     * @ORM\Column(type="datetime")
     */
    private $publishedAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $hasFiveDoors;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $hasMechanicalGearbox;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $CO2emission;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $seatNbr;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $speedNbr;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $consumptionL100;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isLeatherUpholstery;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $displacement;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $dinPower;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $fiscalPower;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $maxSpeed;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $acceleration;

    /**
     * @ORM\ManyToOne(targetEntity=Fuel::class, inversedBy="ads")
     * @ORM\JoinColumn(nullable=false)
     */
    private $fuel;

    /**
     * @ORM\ManyToOne(targetEntity=Color::class, inversedBy="ads")
     */
    private $color;

    /**
     * @ORM\ManyToOne(targetEntity=Car::class, inversedBy="ads")
     * @ORM\JoinColumn(nullable=false)
     */
    private $car;

    /**
     * @ORM\ManyToOne(targetEntity=CritAir::class, inversedBy="ads")
     */
    private $critAir;

    /**
     * @ORM\ManyToMany(targetEntity=Option::class, mappedBy="ads")
     */
    private $options;

    /**
     * @ORM\ManyToOne(targetEntity=Garage::class, inversedBy="ads")
     * @ORM\JoinColumn(nullable=false)
     */
    private $garage;

    public function __construct()
    {
        $this->options = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getBody(): ?string
    {
        return $this->body;
    }

    public function setBody(string $body): self
    {
        $this->body = $body;

        return $this;
    }

    public function getCirculationDate(): ?\DateTimeInterface
    {
        return $this->circulationDate;
    }

    public function setCirculationDate(\DateTimeInterface $circulationDate): self
    {
        $this->circulationDate = $circulationDate;

        return $this;
    }

    public function getMileage(): ?int
    {
        return $this->mileage;
    }

    public function setMileage(int $mileage): self
    {
        $this->mileage = $mileage;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getPublishedAt(): ?\DateTimeInterface
    {
        return $this->publishedAt;
    }

    public function setPublishedAt(\DateTimeInterface $publishedAt): self
    {
        $this->publishedAt = $publishedAt;

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

    public function getHasFiveDoors(): ?bool
    {
        return $this->hasFiveDoors;
    }

    public function setHasFiveDoors(?bool $hasFiveDoors): self
    {
        $this->hasFiveDoors = $hasFiveDoors;

        return $this;
    }

    public function getHasMechanicalGearbox(): ?bool
    {
        return $this->hasMechanicalGearbox;
    }

    public function setHasMechanicalGearbox(?bool $hasMechanicalGearbox): self
    {
        $this->hasMechanicalGearbox = $hasMechanicalGearbox;

        return $this;
    }

    public function getCO2emission(): ?int
    {
        return $this->CO2emission;
    }

    public function setCO2emission(?int $CO2emission): self
    {
        $this->CO2emission = $CO2emission;

        return $this;
    }

    public function getSeatNbr(): ?int
    {
        return $this->seatNbr;
    }

    public function setSeatNbr(?int $seatNbr): self
    {
        $this->seatNbr = $seatNbr;

        return $this;
    }

    public function getSpeedNbr(): ?int
    {
        return $this->speedNbr;
    }

    public function setSpeedNbr(?int $speedNbr): self
    {
        $this->speedNbr = $speedNbr;

        return $this;
    }

    public function getConsumptionL100(): ?int
    {
        return $this->consumptionL100;
    }

    public function setConsumptionL100(?int $consumptionL100): self
    {
        $this->consumptionL100 = $consumptionL100;

        return $this;
    }

    public function getIsLeatherUpholstery(): ?bool
    {
        return $this->isLeatherUpholstery;
    }

    public function setIsLeatherUpholstery(?bool $isLeatherUpholstery): self
    {
        $this->isLeatherUpholstery = $isLeatherUpholstery;

        return $this;
    }

    public function getDisplacement(): ?int
    {
        return $this->displacement;
    }

    public function setDisplacement(?int $displacement): self
    {
        $this->displacement = $displacement;

        return $this;
    }

    public function getDinPower(): ?int
    {
        return $this->dinPower;
    }

    public function setDinPower(?int $dinPower): self
    {
        $this->dinPower = $dinPower;

        return $this;
    }

    public function getFiscalPower(): ?int
    {
        return $this->fiscalPower;
    }

    public function setFiscalPower(?int $fiscalPower): self
    {
        $this->fiscalPower = $fiscalPower;

        return $this;
    }

    public function getMaxSpeed(): ?int
    {
        return $this->maxSpeed;
    }

    public function setMaxSpeed(?int $maxSpeed): self
    {
        $this->maxSpeed = $maxSpeed;

        return $this;
    }

    public function getAcceleration(): ?float
    {
        return $this->acceleration;
    }

    public function setAcceleration(?float $acceleration): self
    {
        $this->acceleration = $acceleration;

        return $this;
    }

    public function getFuel(): ?Fuel
    {
        return $this->fuel;
    }

    public function setFuel(?Fuel $fuel): self
    {
        $this->fuel = $fuel;

        return $this;
    }

    public function getColor(): ?Color
    {
        return $this->color;
    }

    public function setColor(?Color $color): self
    {
        $this->color = $color;

        return $this;
    }

    public function getCar(): ?Car
    {
        return $this->car;
    }

    public function setCar(?Car $car): self
    {
        $this->car = $car;

        return $this;
    }

    public function getCritAir(): ?CritAir
    {
        return $this->critAir;
    }

    public function setCritAir(?CritAir $critAir): self
    {
        $this->critAir = $critAir;

        return $this;
    }

    /**
     * @return Collection|Option[]
     */
    public function getOptions(): Collection
    {
        return $this->options;
    }

    public function addOption(Option $option): self
    {
        if (!$this->options->contains($option)) {
            $this->options[] = $option;
            $option->addAd($this);
        }

        return $this;
    }

    public function removeOption(Option $option): self
    {
        if ($this->options->removeElement($option)) {
            $option->removeAd($this);
        }

        return $this;
    }

    public function getGarage(): ?Garage
    {
        return $this->garage;
    }

    public function setGarage(?Garage $garage): self
    {
        $this->garage = $garage;

        return $this;
    }
}
