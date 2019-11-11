<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
/**
 * Episode
 * @ORM\Entity(repositoryClass="App\Repository\EpisodeRepository")
 */
class Episode
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
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
     * @var float
     *
     * @ORM\Column(name="Duration", type="float")
     */
    private $duration;
    /**
     * @var string
     *
     * @ORM\Column(name="Producer", type="text", nullable=true)
     */
    private $producer;
    /**
     * @var string
     *
     * @ORM\Column(name="Distributor",type="text", nullable=true)
     */
    private $distributor;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $image;
    /**
     * @Vich\UploadableField(mapping="episode_images", fileNameProperty="image")
     * @var File
     */
    private $imageFile;
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Season", inversedBy="episodes")
     */
    private $season;

    /**
     * Get id
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * Set name
     *
     * @param string $name
     *
     * @return Episode
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * Set duration
     *
     * @param float $duration
     *
     * @return Episode
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;
        return $this;
    }
    /**
     * Get duration
     *
     * @return float
     */
    public function getDuration()
    {
        return $this->duration;
    }
    /**
     * Set producer
     *
     * @param string $producer
     *
     * @return Episode
     */
    public function setProducer($producer)
    {
        $this->producer = $producer;
        return $this;
    }
    /**
     * Get producer
     *
     * @return string
     */
    public function getProducer()
    {
        return $this->producer;
    }
    /**
     * Set distributor
     *
     * @param string $distributor
     *
     * @return Episode
     */
    public function setDistributor($distributor)
    {
        $this->distributor = $distributor;
        return $this;
    }
    /**
     * Get distributor
     *
     * @return string
     */
    public function getDistributor()
    {
        return $this->distributor;
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
     * @return mixed
     */
    public function getSeason()
    {
        return $this->season;
    }
    /**
     * @param mixed $season
     */
    public function setSeason($season)
    {
        $this->season = $season;
    }
}