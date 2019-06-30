<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategoryRepository")
 */
class Category
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Document", mappedBy="category")
     */
    private $Document;

    public function __construct()
    {
        $this->Document = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection|Document[]
     */
    public function getDocument(): Collection
    {
        return $this->Document;
    }

    public function addDocument(Document $document): self
    {
        if (!$this->Document->contains($document)) {
            $this->Document[] = $document;
            $document->setCategory($this);
        }

        return $this;
    }

    public function removeDocument(Document $document): self
    {
        if ($this->Document->contains($document)) {
            $this->Document->removeElement($document);
            // set the owning side to null (unless already changed)
            if ($document->getCategory() === $this) {
                $document->setCategory(null);
            }
        }

        return $this;
    }
}
