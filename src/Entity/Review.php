<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ReviewRepository")
 */
class Review
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=191)
     */
    private $Name;

    /**
     * @ORM\Column(type="string", length=191)
     */
    private $Hyperlink;

    /**
     * @ORM\Column(type="text")
     */
    private $Review;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Book", inversedBy="Reviews")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Book;

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

    public function getHyperlink(): ?string
    {
        return $this->Hyperlink;
    }

    public function setHyperlink(string $Hyperlink): self
    {
        $this->Hyperlink = $Hyperlink;

        return $this;
    }

    public function getReview(): ?string
    {
        return $this->Review;
    }

    public function setReview(string $Review): self
    {
        $this->Review = $Review;

        return $this;
    }

    public function getBook(): ?Book
    {
        return $this->Book;
    }

    public function setBook(?Book $Book): self
    {
        $this->Book = $Book;

        return $this;
    }
}
