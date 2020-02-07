<?php


namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use App\Twig\AppExtension;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UploadFileRepository")
 * @UniqueEntity("name1")
 * @Vich\Uploadable
 */

class UploadFile
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
    private $name1;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description1;

    /**
     * @ORM\Column(type="integer")
     */
    private $order1;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @var string|null
     */
    private $fileName;

    /**
     * @Vich\UploadableField(mapping="upload", fileNameProperty="fileName", size="fileSize")
     * @var File|null
     */
    private $fileFile;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @var int|null
     */
    private $fileSize;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     *
     * @var \DateTimeInterface|null
     */
    private $fileUpdatedAt;

    public function __construct()
    {
        $this->UploadFiles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName1(): ?string
    {
        return $this->name1;
    }

    public function setName1(string $name1): self
    {
        $this->name1 = $name1;

        return $this;
    }

    public function getFileName(): ?string
    {
        return $this->fileName;
    }

    public function setFileName(?string $fileName): self
    {
        $this->fileName = $fileName;

        return $this;
    }

    public function getDescription1(): ?string
    {
        return $this->description1;
    }

    public function setDescription1(?string $description1): self
    {
        //TODO figure out how to run AppExtension add breaks at this point
//        require_once ('../../src/Twig/AppExtension.php');
//        $description = $this->appExtension->addBreaks($description);
        $this->description1 = $description1;
        return $this;
    }

    public function getOrder1(): ?int
    {
        return $this->order1;
    }

    public function setOrder1(?int $order1): self
    {
        $this->order1 = $order1;
        return $this;
    }

    public function getType1(): ?string
    {
        return $this->type1;
    }

    public function setType1(?string $type1): self
    {
        $this->type1 = $type1;
        return $this;
    }

    public function getFileFile()
    {
        return $this->fileFile;
    }

    public function setFileFile($fileFile): self
    {
        $this->fileFile = $fileFile;

        if (null !== $fileFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->fileUpdatedAt = new \DateTimeImmutable();
        }

        return $this;
    }

    public function getFileSize(): ?int
    {
        return $this->fileSize;
    }

    public function setFileSize(?int $fileSize): self
    {
        $this->fileSize = $fileSize;

        return $this;
    }

}