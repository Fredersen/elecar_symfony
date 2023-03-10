<?php

namespace App\Entity;

use App\Repository\CarRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: CarRepository::class)]
class Car
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['car:read'])]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['car:read'])]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['car:read'])]
    private ?string $model = null;

    #[ORM\Column]
    #[Groups(['car:read'])]
    private ?bool $isHeader = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['car:read'])]
    private ?string $frontImage = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['car:read'])]
    private ?string $leftSideImage = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['car:read'])]
    private ?string $rightSideImage = null;

    #[ORM\Column(nullable: true)]
    #[Groups(['car:read'])]
    private ?int $speed = null;

    #[ORM\Column(nullable: true)]
    #[Groups(['car:read'])]
    private ?float $acceleration = null;

    #[ORM\Column(nullable: true)]
    #[Groups(['car:read'])]
    private ?int $autonomy = null;

    #[ORM\Column(nullable: true)]
    #[Groups(['car:read'])]
    private ?int $price = null;

    #[ORM\OneToOne(mappedBy: 'car', cascade: ['persist', 'remove'])]
    private ?Header $header = null;

    #[ORM\ManyToOne(inversedBy: 'car')]
    private ?Brand $brand = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }


    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(?string $model): self
    {
        $this->model = $model;

        return $this;
    }

    public function isIsHeader(): ?bool
    {
        return $this->isHeader;
    }

    public function setIsHeader(bool $isHeader): self
    {
        $this->isHeader = $isHeader;

        return $this;
    }

    public function getFrontImage(): ?string
    {
        return $this->frontImage;
    }

    public function setFrontImage(?string $frontImage): self
    {
        $this->frontImage = $frontImage;

        return $this;
    }

    public function getLeftSideImage(): ?string
    {
        return $this->leftSideImage;
    }

    public function setLeftSideImage(?string $leftSideImage): self
    {
        $this->leftSideImage = $leftSideImage;

        return $this;
    }

    public function getRightSideImage(): ?string
    {
        return $this->rightSideImage;
    }

    public function setRightSideImage(?string $rightSideImage): self
    {
        $this->rightSideImage = $rightSideImage;

        return $this;
    }

    public function getSpeed(): ?int
    {
        return $this->speed;
    }

    public function setSpeed(?int $speed): self
    {
        $this->speed = $speed;

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

    public function getAutonomy(): ?int
    {
        return $this->autonomy;
    }

    public function setAutonomy(?int $autonomy): self
    {
        $this->autonomy = $autonomy;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(?int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getHeader(): ?Header
    {
        return $this->header;
    }

    public function setHeader(Header $header): self
    {
        // set the owning side of the relation if necessary
        if ($header->getCar() !== $this) {
            $header->setCar($this);
        }

        $this->header = $header;

        return $this;
    }

    public function __toString()
    {
        return $this->getName() . '_' . $this->getModel();
    }

    public function getBrand(): ?Brand
    {
        return $this->brand;
    }

    public function setBrand(?Brand $brand): self
    {
        $this->brand = $brand;

        return $this;
    }
}
