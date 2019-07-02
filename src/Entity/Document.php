<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Beelab\TagBundle\Tag\TaggableInterface;
use Beelab\TagBundle\Tag\TagInterface;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DocumentRepository")
 */
class Document implements TaggableInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     * 
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @var string
     * 
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updated;

    /**
     * @var string
     * 
     * @ORM\Column(type="string", length=255)
     */
    private $path;

    /**
     * @var boolean
     * 
     * @ORM\Column(type="boolean")
     */
    private $active = true;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * 
     * @ORM\ManyToMany(targetEntity="Tag", cascade="persist")
     */

    private $tags;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Category", inversedBy="Document", cascade="persist")
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;

    public function __construct()
    {
        $this->tags = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getUpdated(): ?\DateTimeInterface
    {
        return $this->uploaded_at;
    }

    public function setUpdated()
    {
        $this->updated = new \DateTime("now");

    }


    public function getPath(): ?string
    {
        return $this->path;
    }

    public function setPath(string $path): self
    {
        $this->path = $path;

        return $this;
    }

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): self
    {
        $this->active = $active;

        return $this;
    }

    public function addTag(TagInterface $tag): void
    {
        if (!$this->tags->contains($tag)) {
            $this->tags->add($tag);
        }
    }

    public function removeTag(TagInterface $tag): void
    {
        $this->tags->removeElement($tag);
    }

    public function hasTag(TagInterface $tag): bool
    {
        return $this->tags->contains($tag);
    }

    public function getTags(): iterable
    {
        return $this->tags;
    }

    public function getTagNames(): array
    {
        return empty($this->tagsText) ? [] : \array_map('trim', explode(',', $this->tagsText));
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }
}
