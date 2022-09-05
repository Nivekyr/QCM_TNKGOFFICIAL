<?php

namespace App\Entity;

use App\Repository\TopicRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TopicRepository::class)]
class Topic
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Topic_name = null;

    #[ORM\Column(length: 255)]
    private ?string $Topic_image = null;

    #[ORM\ManyToOne(inversedBy: 'topics')]
    private ?Theme $theme = null;

    #[ORM\OneToMany(mappedBy: 'topic', targetEntity: Quizz::class)]
    private Collection $quizzs;

    public function __construct()
    {
        $this->quizzs = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTopicName(): ?string
    {
        return $this->Topic_name;
    }

    public function setTopicName(string $Topic_name): self
    {
        $this->Topic_name = $Topic_name;

        return $this;
    }

    public function getTopicImage(): ?string
    {
        return $this->Topic_image;
    }

    public function setTopicImage(string $Topic_image): self
    {
        $this->Topic_image = $Topic_image;

        return $this;
    }

    public function getTheme(): ?Theme
    {
        return $this->theme;
    }

    public function setTheme(?Theme $theme): self
    {
        $this->theme = $theme;

        return $this;
    }

    /**
     * @return Collection<int, Quizz>
     */
    public function getQuizzs(): Collection
    {
        return $this->quizzs;
    }

    public function addQuizz(Quizz $quizz): self
    {
        if (!$this->quizzs->contains($quizz)) {
            $this->quizzs->add($quizz);
            $quizz->setTopic($this);
        }

        return $this;
    }

    public function removeQuizz(Quizz $quizz): self
    {
        if ($this->quizzs->removeElement($quizz)) {
            // set the owning side to null (unless already changed)
            if ($quizz->getTopic() === $this) {
                $quizz->setTopic(null);
            }
        }

        return $this;
    }

}
