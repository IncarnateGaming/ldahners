<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SeriesRepository")
 * @UniqueEntity("Name")
 */
class Series
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
     * @ORM\Column(type="text")
     */
    private $Description;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Book", mappedBy="Series")
     */
    private $books;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Merchandise", mappedBy="Series")
     */
    private $Merchandise;

    /**
     * @ORM\Column(type="integer")
     */
    private $SeriesPriority;

    public function __construct()
    {
        $this->books = new ArrayCollection();
        $this->Merchandise = new ArrayCollection();
    }

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

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    /**
     * @return Collection|Book[]
     */
    public function getBooks(): Collection
    {
        return $this->books;
    }

    public function addBook(Book $book): self
    {
        if (!$this->books->contains($book)) {
            $this->books[] = $book;
            $book->setSeries($this);
        }

        return $this;
    }

    public function removeBook(Book $book): self
    {
        if ($this->books->contains($book)) {
            $this->books->removeElement($book);
            // set the owning side to null (unless already changed)
            if ($book->getSeries() === $this) {
                $book->setSeries(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Merchandise[]
     */
    public function getMerchandise(): Collection
    {
        return $this->Merchandise;
    }

    public function addMerchandise(Merchandise $merchandise): self
    {
        if (!$this->Merchandise->contains($merchandise)) {
            $this->Merchandise[] = $merchandise;
            $merchandise->setSeries($this);
        }

        return $this;
    }

    public function removeMerchandise(Merchandise $merchandise): self
    {
        if ($this->Merchandise->contains($merchandise)) {
            $this->Merchandise->removeElement($merchandise);
            // set the owning side to null (unless already changed)
            if ($merchandise->getSeries() === $this) {
                $merchandise->setSeries(null);
            }
        }

        return $this;
    }

    public function getSeriesPriority(): ?int
    {
        return $this->SeriesPriority;
    }

    public function setSeriesPriority(int $SeriesPriority): self
    {
        $this->SeriesPriority = $SeriesPriority;

        return $this;
    }
}
