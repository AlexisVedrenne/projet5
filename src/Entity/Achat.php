<?php

namespace App\Entity;

use App\Repository\AchatRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Livre;

/**
 * @ORM\Entity(repositoryClass=AchatRepository::class)
 */
class Achat
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dataAchat;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $renvoie;

    /**
     * @ORM\ManyToMany(targetEntity=User::class, inversedBy="achats")
     */
    private $User;

    /**
     * @ORM\ManyToOne(targetEntity=Livre::class, inversedBy="achats")
     */
    private $livre;


    public function __construct()
    {
        $this->User = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDataAchat(): ?\DateTimeInterface
    {
        return $this->dataAchat;
    }

    public function setDataAchat(\DateTimeInterface $dataAchat): self
    {
        $this->dataAchat = $dataAchat;

        return $this;
    }

    public function getRenvoie(): ?\DateTimeInterface
    {
        return $this->renvoie;
    }

    public function setRenvoie(?\DateTimeInterface $renvoie): self
    {
        $this->renvoie = $renvoie;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUser(): Collection
    {
        return $this->User;
    }

    public function addUser(User $user): self
    {
        if (!$this->User->contains($user)) {
            $this->User[] = $user;
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        $this->User->removeElement($user);

        return $this;
    }

    /**
     * @return Livre[]
     */
    public function getLivre():Livre
    {
        return $this->livre;
    }

    public function setLivre(?Livre $livre): self
    {
        $this->livre = $livre;

        return $this;
    }

}
