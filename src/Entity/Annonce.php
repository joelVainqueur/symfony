<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;




/**
 * @ORM\Entity(repositoryClass="App\Repository\AnnonceRepository")
 * @Vich\Uploadable
 */
class Annonce
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
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $price;

    /**
     * @ORM\Column(type="boolean",options={"default":false})
     */
    private $sold = false;

   /**
     * @ORM\Column(type="datetime")
     *
     * @var \DateTime|null
     */
    private $updatedAt;

    //    le nom de la colonne dans la bdd qui va contenir le nom du fichier
    /**
     * @var string|null
     * @ORM\column(type="string", nullable=true)
     *
     */
    private $photopath;

    /**
     * @Vich\UploadableField(mapping="annonce_image", fileNameProperty="photopath")
     *
     * @var File|null
     */
    protected $photo;

  
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

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(?int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getSold(): ?bool
    {
        return $this->sold;
    }

    public function setSold(bool $sold): self
    {
        $this->sold = $sold;

        return $this;
    }
     /**
     * @return \DateTime|null
     */
    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime|null $updatedAt
     */
    public function setUpdatedAt(?\DateTime $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

     /**
     * @return string|null
     */
    public function getPhotopath(): ?string
    {
        return $this->photopath;
    }

    /**
     * @param string|null
     */
    public function setPhotopath(?string $photopath): void
    {
        $this->photopath = $photopath;
    }

    /**
     * @return File|null
     */
    public function getPhoto(): ?File
    {
        return $this->photo;
    }

    /**
     * @param File|null $photo
     */
    public function setPhoto(?File $photo): void
    {
        $this->photo = $photo;
        if ($this->photo instanceof UploadedFile) {
            $this->updatedAt = new \DateTime('2019-11-22');
        }
    }

    /**
     * @return File|null
     */
    public function getPhotpath(): ?File
    {
        return $this->photpath;
    }

    /**
     * @param File|null
     */
    public function setPhotpath(?File $photpath): void
    {
        $this->photpath = $photpath;
    }

}