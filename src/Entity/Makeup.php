<?php

namespace App\Entity;

use App\Repository\MakeupRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MakeupRepository::class)
 */
class Makeup
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="datetime")
     */
    private $datemakeup;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $keywords = [];

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $timemakeup;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $makeupby;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $makeupused = [];

    /**
     * @ORM\Column(type="boolean")
     */
    private $portfolio;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $file;

    /**
     * @ORM\ManyToOne(targetEntity=user::class, inversedBy="makeups")
     * @ORM\JoinColumn(nullable=false)
     */
    private $users;

    /**
     * @ORM\ManyToMany(targetEntity=category::class, inversedBy="makeups")
     */
    private $categories;

    /**
     * @ORM\ManyToOne(targetEntity=prestation::class, inversedBy="makeups")
     */
    private $prestations;

    public function __construct()
    {
        $this->categories = new ArrayCollection();
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

    public function getDatemakeup(): ?\DateTimeInterface
    {
        return $this->datemakeup;
    }

    public function setDatemakeup(\DateTimeInterface $datemakeup): self
    {
        $this->datemakeup = $datemakeup;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getKeywords(): ?array
    {
        return $this->keywords;
    }

    public function setKeywords(?array $keywords): self
    {
        $this->keywords = $keywords;

        return $this;
    }

    public function getTimemakeup(): ?\DateTimeInterface
    {
        return $this->timemakeup;
    }

    public function setTimemakeup(?\DateTimeInterface $timemakeup): self
    {
        $this->timemakeup = $timemakeup;

        return $this;
    }

    public function getMakeupby(): ?string
    {
        return $this->makeupby;
    }

    public function setMakeupby(?string $makeupby): self
    {
        $this->makeupby = $makeupby;

        return $this;
    }

    public function getMakeupused(): ?array
    {
        return $this->makeupused;
    }

    public function setMakeupused(?array $makeupused): self
    {
        $this->makeupused = $makeupused;

        return $this;
    }

    public function getPortfolio(): ?bool
    {
        return $this->portfolio;
    }

    public function setPortfolio(bool $portfolio): self
    {
        $this->portfolio = $portfolio;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getFile(): ?string
    {
        return $this->file;
    }

    public function setFile(string $file): self
    {
        $this->file = $file;

        return $this;
    }

    public function getUsers(): ?user
    {
        return $this->users;
    }

    public function setUsers(?user $users): self
    {
        $this->users = $users;

        return $this;
    }

    /**
     * @return Collection|category[]
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(category $category): self
    {
        if (!$this->categories->contains($category)) {
            $this->categories[] = $category;
        }

        return $this;
    }

    public function removeCategory(category $category): self
    {
        $this->categories->removeElement($category);

        return $this;
    }

    public function getPrestations(): ?prestation
    {
        return $this->prestations;
    }

    public function setPrestations(?prestation $prestations): self
    {
        $this->prestations = $prestations;

        return $this;
    }
}
