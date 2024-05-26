<?php

namespace App\Domain\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'items')]
class Item
{
    #[ORM\Id]
    #[ORM\Column(type: Types::INTEGER)]
    private int $entityId;

    #[ORM\Column(type: Types::INTEGER)]
    private int $sku;

    #[ORM\Column(type: Types::STRING)]
    private string $name;

    #[ORM\Column(type: Types::STRING)]
    private string $categoryName;

    #[ORM\Column(type: Types::STRING, nullable: true)]
    private string|null $description;

    #[ORM\Column(type: Types::STRING)]
    private string $shortDescription;

    #[ORM\Column(type: "decimal", precision: 10, scale: 2)]
    private float $price;

    #[ORM\Column(type: Types::STRING)]
    private string $link;

    #[ORM\Column(type: Types::STRING)]
    private string $image;

    #[ORM\Column(type: Types::STRING)]
    private string $brand;

    #[ORM\Column(type: Types::INTEGER)]
    private int $rating;

    #[ORM\Column(type: Types::INTEGER)]
    private int $count;

    #[ORM\Column(type: Types::STRING, nullable: true)]
    private string|null $caffeineType;

    #[ORM\Column(type: Types::STRING, nullable: true)]
    private string|null $flavored;

    #[ORM\Column(type: Types::STRING, nullable: true)]
    private string|null $seasonal;

    #[ORM\Column(type: Types::STRING)]
    private string $inStock;

    #[ORM\Column(type: Types::BOOLEAN)]
    private bool $facebook;

    #[ORM\Column(type: Types::BOOLEAN)]
    private bool $isKCup;

    public function __construct(
        int $entityId,
        int $sku,
        string $name,
        string $categoryName,
        ?string $description,
        string $shortDescription,
        float $price,
        string $link,
        string $image,
        string $brand,
        int $rating,
        int $count,
        ?string $caffeineType,
        ?string $flavored,
        ?string $seasonal,
        string $inStock,
        bool $facebook,
        bool $isKCup
    ) {
        $this->entityId = $entityId;
        $this->sku = $sku;
        $this->name = $name;
        $this->categoryName = $categoryName;
        $this->description = $description;
        $this->shortDescription = $shortDescription;
        $this->price = $price;
        $this->link = $link;
        $this->image = $image;
        $this->brand = $brand;
        $this->rating = $rating;
        $this->count = $count;
        $this->caffeineType = $caffeineType;
        $this->flavored = $flavored;
        $this->seasonal = $seasonal;
        $this->inStock = $inStock;
        $this->facebook = $facebook;
        $this->isKCup = $isKCup;
    }

    public function getEntityId(): int
    {
        return $this->entityId;
    }

    public function getSku(): int
    {
        return $this->sku;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCategoryName(): string
    {
        return $this->categoryName;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function getShortDescription(): string
    {
        return $this->shortDescription;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getLink(): string
    {
        return $this->link;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function getBrand(): string
    {
        return $this->brand;
    }

    public function getRating(): int
    {
        return $this->rating;
    }

    public function getCount(): int
    {
        return $this->count;
    }

    public function getCaffeineType(): ?string
    {
        return $this->caffeineType;
    }

    public function getFlavored(): ?string
    {
        return $this->flavored;
    }

    public function getSeasonal(): ?string
    {
        return $this->seasonal;
    }

    public function getInStock(): string
    {
        return $this->inStock;
    }

    public function isFacebook(): bool
    {
        return $this->facebook;
    }

    public function isKCup(): bool
    {
        return $this->isKCup;
    }

}