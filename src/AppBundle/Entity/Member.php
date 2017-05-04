<?php
namespace AppBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use BehaviorFixtures\ORM\TranslatableEntity;
use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;
use Sonata\TranslationBundle\Model\TranslatableInterface;

/**
 * @ORM\Table(name="member")
 * @ORM\Entity()
 */
class Member implements TranslatableInterface
{
    use ORMBehaviors\Translatable\Translatable;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=255)
     */
    private $lastname;

    /**
     * @Gedmo\Slug(fields={"name","lastname"})
     * @ORM\Column(name="slug", type="string", length=255, unique=true)
     */
    private $slug;

    /**
     * @ORM\OneToOne(targetEntity="ImageBundle\Entity\Image", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $image;

    /**
     * @var int
     *
     * @ORM\Column(name="arrange", type="integer", nullable=true)
     */
    private $arrange;

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @param string $locale
     * @return $this
     */
    public function setLocale($locale)
    {
        $this->setCurrentLocale($locale);

        return $this;
    }

    /**
     * @return string
     */
    public function getLocale()
    {
        return $this->getCurrentLocale();
    }


    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return Member
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return Member
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set arrange
     *
     * @param integer $arrange
     *
     * @return Member
     */
    public function setArrange($arrange)
    {
        $this->arrange = $arrange;

        return $this;
    }

    /**
     * Get arrange
     *
     * @return integer
     */
    public function getArrange()
    {
        return $this->arrange;
    }

    /**
     * Set image
     *
     * @param \ImageBundle\Entity\Image $image
     *
     * @return Member
     */
    public function setImage(\ImageBundle\Entity\Image $image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return \ImageBundle\Entity\Image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set jobtitle
     *
     * @param string $jobtitle
     * @return $this
     */
    public function setJobtitle($jobtitle)
    {
        $this->translate(null, false)->setDescription($jobtitle);

        return $this;
    }

    /**
     * Get jobtitle
     *
     * @return string
     */
    public function getJobtitle()
    {
        return $this->translate(null, false)->getJobtitle();
    }

    /**
     * Set description
     *
     * @param string $description
     * @return $this
     */
    public function setDescription($description)
    {
        $this->translate(null, false)->setDescription($description);

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->translate(null, false)->getDescription();
    }

    public function getFullname()
    {
        return $this->name." ".$this->lastname;
    }

    public function __toString()
    {
        return $this->getFullname();
    }
}
