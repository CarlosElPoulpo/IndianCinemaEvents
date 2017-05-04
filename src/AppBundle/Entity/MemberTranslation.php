<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;

/**
 * @ORM\Table(name="member_translation")
 * @ORM\Entity
 */
class MemberTranslation
{
    use ORMBehaviors\Translatable\Translation;

    /**
     * @var string
     * @ORM\Column(name="jobtitle", type="string", length=255, nullable=true)
     */
    private $jobtitle;

    /**
     * @var string
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * Set jobtitle
     *
     * @param string $jobtitle
     *
     * @return MemberTranslation
     */
    public function setJobtitle($jobtitle)
    {
        $this->jobtitle = $jobtitle;

        return $this;
    }

    /**
     * Get jobtitle
     *
     * @return string
     */
    public function getJobtitle()
    {
        return $this->jobtitle;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return MemberTranslation
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
}
