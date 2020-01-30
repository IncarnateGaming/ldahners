<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BookRepository")
 * @UniqueEntity("Name")
 */
class Book
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $Name;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Series", inversedBy="books")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Series;

    /**
     * @ORM\Column(type="integer")
     */
    private $OrderInSeries;

    /**
     * @ORM\Column(type="text")
     */
    private $Description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Image;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $AmazonLink;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    public function getSeries(): ?Series
    {
        return $this->Series;
    }

    public function setSeries(?Series $Series): self
    {
        $this->Series = $Series;

        return $this;
    }

    public function getOrderInSeries(): ?int
    {
        return $this->OrderInSeries;
    }

    public function setOrderInSeries(int $OrderInSeries): self
    {
        $this->OrderInSeries = $OrderInSeries;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->Image;
    }

    public function setImage(string $Image): self
    {
        $this->Image = $Image;

        return $this;
    }

    public function getAmazonLink(): ?string
    {
        return $this->AmazonLink;
    }

    public function setAmazonLink(string $AmazonLink): self
    {
        $this->AmazonLink = $AmazonLink;

        return $this;
    }
}
