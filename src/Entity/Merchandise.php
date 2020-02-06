<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MerchandiseRepository")
 * @UniqueEntity("Name")
 * @Vich\Uploadable
 */
class Merchandise
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=191, unique=true)
     */
    private $Name;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Series", inversedBy="Merchandise")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Series;

    /**
     * @ORM\Column(type="text")
     */
    private $Description;

    /**
     * @ORM\Column(type="string", length=191)
     */
    private $Link;

    /**
     * @ORM\Column(type="string", length=191, nullable=true)
     * @var string|null
     */
    private $imageName;

    /**
     * @Vich\UploadableField(mapping="books", fileNameProperty="imageName", size="imageSize")
     * @var File|null
     */
    private $imageFile;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @var int|null
     */
    private $imageSize;

    /**
     * @ORM\Column(type="datetime")
     *
     * @var \DateTimeInterface|null
     */
    private $updatedAt;

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

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getLink(): ?string
    {
        return $this->Link;
    }

    public function setLink(string $Link): self
    {
        $this->Link = $Link;

        return $this;
    }

    public function getImageName(): ?string
    {
        return $this->imageName;
    }

    public function setImageName(?string $imageName): self
    {
        $this->imageName = $imageName;

        return $this;
    }

    public function getImageFile()
    {
        return $this->imageFile;
    }

    public function setImageFile($imageFile): self
    {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }

        return $this;
    }

    public function getImageSize(): ?int
    {
        return $this->imageSize;
    }

    public function setImageSize(?int $imageSize): self
    {
        $this->imageSize = $imageSize;

        return $this;
    }
}
