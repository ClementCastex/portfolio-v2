<?php
// src/Entity/Project.php
namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "project")]
class Project
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 255)]
    private ?string $shortDescription = null;

    #[ORM\Column(type: "text")]
    private ?string $description = null;

    #[ORM\Column(length: 50)]
    private ?string $category = null;

    #[ORM\Column(nullable: true)]
    private ?string $githubLink = null;

    #[ORM\Column(nullable: true)]
    private ?string $detailPage = null;

    #[ORM\Column(type: 'string', length: 20)]
    private ?string $status = null;
    

    #[ORM\OneToMany(mappedBy: "project", targetEntity: Image::class, cascade: ["persist", "remove"])]
    private Collection $images;

    #[ORM\ManyToMany(targetEntity: Tag::class, inversedBy: "projects", cascade: ["persist"])]
    #[ORM\JoinTable(name: "project_tag")]
    private Collection $tags;
    

    public function __construct()
    {
    $this->images = new ArrayCollection();
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

    public function getShortDescription(): ?string
    {
        return $this->shortDescription;
    }

    public function setShortDescription(string $shortDescription): self
    {
        $this->shortDescription = $shortDescription;
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

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): self
    {
        $this->category = $category;
        return $this;
    }

    public function getGithubLink(): ?string
    {
        return $this->githubLink;
    }

    public function setGithubLink(?string $githubLink): self
    {
        $this->githubLink = $githubLink;
        return $this;
    }

    public function getDetailPage(): ?string
    {
        return $this->detailPage;
    }

    public function setDetailPage(?string $detailPage): self
    {
        $this->detailPage = $detailPage;
        return $this;
    }

    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(Image $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images->add($image);
            $image->setProject($this);
        }
        return $this;
    }

public function getStatus(): ?ProjectStatus
{
    return $this->status ? ProjectStatus::from($this->status) : null;
}

public function setStatus(ProjectStatus $status): self
{
    $this->status = $status->value;
    return $this;
}

    public function getTags(): Collection
    {
    return $this->tags;
    }

    public function addTag(Tag $tag): self
    {
    if (!$this->tags->contains($tag)) {
        $this->tags->add($tag);
    }
    return $this;
    }

    public function removeTag(Tag $tag): self
    {
    $this->tags->removeElement($tag);
    return $this;
    }
}
