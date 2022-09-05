<?php

namespace App\Entity;

use App\Repository\QuizzRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: QuizzRepository::class)]
class Quizz
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'quizzs')]
    private ?Topic $topic = null;

    #[ORM\Column(length: 255)]
    private ?string $question = null;

    #[ORM\Column(length: 255)]
    private ?string $question_image = null;

    #[ORM\Column(length: 255)]
    private ?string $goodanswer = null;

    #[ORM\Column(length: 255)]
    private ?string $wronganswer = null;

    #[ORM\Column(length: 255)]
    private ?string $difficulty = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTopic(): ?Topic
    {
        return $this->topic;
    }

    public function setTopic(?Topic $topic): self
    {
        $this->topic = $topic;

        return $this;
    }

    public function getQuestion(): ?string
    {
        return $this->question;
    }

    public function setQuestion(string $question): self
    {
        $this->question = $question;

        return $this;
    }

    public function getQuestionImage(): ?string
    {
        return $this->question_image;
    }

    public function setQuestionImage(string $question_image): self
    {
        $this->question_image = $question_image;

        return $this;
    }

    public function getGoodanswer(): ?string
    {
        return $this->goodanswer;
    }

    public function setGoodanswer(string $goodanswer): self
    {
        $this->goodanswer = $goodanswer;

        return $this;
    }

    public function getWronganswer(): ?string
    {
        return $this->wronganswer;
    }

    public function setWronganswer(string $wronganswer): self
    {
        $this->wronganswer = $wronganswer;

        return $this;
    }

    public function getDifficulty(): ?string
    {
        return $this->difficulty;
    }

    public function setDifficulty(string $difficulty): self
    {
        $this->difficulty = $difficulty;

        return $this;
    }
}
