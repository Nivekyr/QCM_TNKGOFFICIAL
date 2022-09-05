<?php

namespace App\Entity;

use App\Repository\ThemeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ThemeRepository::class)]
class Theme
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Theme_name = null;

    #[ORM\Column(length: 255)]
    private ?string $Theme_image = null;

    #[ORM\OneToMany(mappedBy: 'theme', targetEntity: Topic::class)]
    private Collection $topics;

    public function __construct()
    {
        $this->topics = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getThemeName(): ?string
    {
        return $this->Theme_name;
    }

    public function setThemeName(string $Theme_name): self
    {
        $this->Theme_name = $Theme_name;

        return $this;
    }

    public function getThemeImage(): ?string
    {
        return $this->Theme_image;
    }

    public function setThemeImage(string $Theme_image): self
    {
        $this->Theme_image = $Theme_image;

        return $this;
    }

    /**
     * @return Collection<int, Topic>
     */
    public function getTopics(): Collection
    {
        return $this->topics;
    }

    public function addTopic(Topic $topic): self
    {
        if (!$this->topics->contains($topic)) {
            $this->topics->add($topic);
            $topic->setTheme($this);
        }

        return $this;
    }

    public function removeTopic(Topic $topic): self
    {
        if ($this->topics->removeElement($topic)) {
            // set the owning side to null (unless already changed)
            if ($topic->getTheme() === $this) {
                $topic->setTheme(null);
            }
        }

        return $this;
    }

}