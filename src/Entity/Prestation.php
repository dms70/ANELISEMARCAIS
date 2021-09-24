<?php

namespace App\Entity;

use App\Repository\PrestationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PrestationRepository::class)
 */
class Prestation
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
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $price;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @ORM\OneToMany(targetEntity=Makeup::class, mappedBy="prestations")
     */
    private $makeups;

    public function __construct()
    {
        $this->makeups = new ArrayCollection();
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

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): self
    {
        $this->price = $price;

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

    /**
     * @return Collection|Makeup[]
     */
    public function getMakeups(): Collection
    {
        return $this->makeups;
    }

    public function addMakeup(Makeup $makeup): self
    {
        if (!$this->makeups->contains($makeup)) {
            $this->makeups[] = $makeup;
            $makeup->setPrestations($this);
        }

        return $this;
    }

    public function removeMakeup(Makeup $makeup): self
    {
        if ($this->makeups->removeElement($makeup)) {
            // set the owning side to null (unless already changed)
            if ($makeup->getPrestations() === $this) {
                $makeup->setPrestations(null);
            }
        }

        return $this;
    }
}
