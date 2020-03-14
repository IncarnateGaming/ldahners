<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UpdatesRepository")
 */
class Updates
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Book")
     */
    private $book;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $closeDescription;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $closeLink;

    /**
     * @ORM\Column(type="integer")
     */
    private $priority;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $fontSize;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $fontColor;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBook(): ?Book
    {
        return $this->book;
    }

    public function setBook(?Book $book): self
    {
        $this->book = $book;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCloseDescription(): ?string
    {
        return $this->closeDescription;
    }

    public function setCloseDescription(?string $closeDescription): self
    {
        $this->closeDescription = $closeDescription;

        return $this;
    }

    public function getCloseLink(): ?string
    {
        return $this->closeLink;
    }

    public function setCloseLink(?string $closeLink): self
    {
        $this->closeLink = $closeLink;

        return $this;
    }

    public function getPriority(): ?int
    {
        return $this->priority;
    }

    public function setPriority(int $priority): self
    {
        $this->priority = $priority;

        return $this;
    }

    public function getFontSize(): ?float
    {
        return $this->fontSize;
    }

    public function setFontSize(?float $fontSize): self
    {
        $this->fontSize = $fontSize;

        return $this;
    }

    public function getFontColor(): ?string
    {
        return $this->fontColor;
    }

    public function setFontColor(?string $fontColor): self
    {
        $this->fontColor = $fontColor;

        return $this;
    }
}
