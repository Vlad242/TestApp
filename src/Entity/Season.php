<?php
namespace App\Entity;

use App\Traits\Id;
use App\Traits\Name;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Season
 *
 * @Vich\Uploadable
 * @ORM\Entity(repositoryClass="App\Repository\SeasonRepository")
 */
class Season
{
    use Id;

    use Name;

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
     * @ORM\Column(name="Start_date", type="datetime")
     */
    private $startDate;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="End_date", type="datetime")
     */
    private $endDate;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $image;
    /**
     * @Vich\UploadableField(mapping="season_images", fileNameProperty="image")
     * @var File
     */
    private $imageFile;
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Serial", inversedBy="seasons")
     */
    private $serial;
    /**
     * @var Episode[]| ArrayCollection
     * @ORM\OneToMany(targetEntity="App\Entity\Episode", mappedBy="season")
     */
    private $episodes;

    public function __construct()
    {
        $this->episodes = new ArrayCollection();
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
    public function getSerial()
    {
        return $this->serial;
    }
    /**
     * @param mixed $serial
     */
    public function setSerial($serial)
    {
        $this->serial = $serial;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Season
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
     * Set description
     *
     * @param string $description
     *
     * @return Season
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }
    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
    /**
     * Set startDate
     *
     * @param \DateTime $startDate
     *
     * @return Season
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
        return $this;
    }
    /**
     * Get startDate
     *
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->startDate;
    }
    /**
     * Set endDate
     *
     * @param \DateTime $endDate
     *
     * @return Season
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
        return $this;
    }
    /**
     * Get endDate
     *
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->endDate;
    }
    /**
     * @return Episode[]|Collection
     */
    public function getEpisodes()
    {
        return $this->episodes;
    }
    /**
     * @param Episode[]|Collection $episodes
     */
    public function setEpisodes($episodes)
    {
        $this->episodes = $episodes;
    }
    /**
     * @param Episode $episode
     *
     * @return Season
     */
    public function addEpisode(Episode $episode)
    {
        $this->episodes[] = $episode;
        $episode->setSeason($this);
        return $this;
    }
    /**
     * @param Episode $episode
     */
    public function removeEpisode (Episode $episode)
    {
        $this->episodes->removeElement($episode);
        $episode->setSeason(null);
    }
}