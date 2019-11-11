<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
/**
 * Serial
 *
 * @Vich\Uploadable
 * @ORM\Entity(repositoryClass="App\Repository\SerialRepository")
 */
class Serial
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @var string
     *
     * @ORM\Column(name="Name", type="text", nullable=true)
     */
    private $name;
    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="text", nullable=true)
     */
    private $description;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Created_at", type="datetime")
     */
    private $createdAt;
    /**
     * @var string
     *
     * @ORM\Column(name="Genre", type="text", nullable=true)
     */
    private $genre;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $image;
    /**
     * @Vich\UploadableField(mapping="serial_images", fileNameProperty="image")
     * @var File
     */
    private $imageFile;
    /**
     * @var Season[]| Collection
     * @ORM\OneToMany(targetEntity="App\Entity\Season", mappedBy="serial")
     */
    private $seasons;

    public function __construct()
    {
        $this->seasons = new ArrayCollection();
    }

    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;
    }

    public function getImageFile()
    {
        return $this->imageFile;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function getImage()
    {
        return $this->image;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * @param string $name
     *
     * @return Serial
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * @param string $description
     *
     * @return Serial
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }
    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
    /**
     * @param \DateTime $createdAt
     *
     * @return Serial
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }
    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }
    /**
     * @param string $genre
     *
     * @return Serial
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;
        return $this;
    }
    /**
     * @return string
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * @return Season[]|Collection
     */
    public function getSeasons()
    {
        return $this->seasons;
    }
    /**
     * @param Season[]|Collection $seasons
     */
    public function setSeasons($seasons)
    {
        $this->seasons = $seasons;
    }
    /**
     * @param Season $season
     *
     * @return Serial
     */
    public function addSeason(Season $season)
    {
        $this->seasons[] = $season;
        $season->setSerial($this);
        return $this;
    }
    /**
     * @param Season $season
     */
    public function removeSeason (Season $season)
    {
        $this->seasons->removeElement($season);
        $season->setSerial(null);
    }
}