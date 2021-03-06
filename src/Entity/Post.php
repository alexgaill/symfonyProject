<?php

namespace App\Entity;

use App\Repository\PostRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=PostRepository::class)
 */
class Post
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\NotBlank()
     * @Assert\NotNull()
     * @Assert\Length(
     *  min=10,
     *  minMessage="C'est trop court"
     * )
     * @Assert\Type(
     *  type="string",
     *  message="Le type {{type}} ne correspond pas à celui attendu. On s'attend à avoir une chaine de caractère"
     * )
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    private $subContent;

    // public function __construct()
    // {
    //     $this->subContent = substr($this->content, 0, 35)." ...";
    // }

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

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get the value of subContent
     */ 
    public function getSubContent()
    {
        $this->subContent = substr($this->content, 0, 35)." ...";
        return $this->subContent;
    }

    /**
     * Set the value of subContent
     *
     * @return  self
     */ 
    public function setSubContent($subContent)
    {
        $this->subContent = $subContent;

        return $this;
    }
}
