<?php

namespace AppBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * Definitive
 *
 * @ORM\Table(name="definitive")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DefinitiveRepository")
 * @Gedmo\Loggable
 */
class Definitive
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
     * @Gedmo\Versioned
     * @ORM\Column(name="libelle", type="string", length=255)
     */
    private $libelle;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var int
     *
     * @ORM\Column(name="etagere", type="integer", nullable=true)
     */
    private $etagere;

    /**
     * @var int
     *
     * @ORM\Column(name="position", type="integer", nullable=true)
     */
    private $position;

    /**
     * @var string
     *
     * @ORM\Column(name="extreme", type="string", length=10, nullable=true)
     */
    private $extreme;

    /**
     * @var string
     *
     * @ORM\Column(name="vie", type="string", length=2, nullable=true)
     */
    private $vie;

    /**
     * @var bool
     *
     * @ORM\Column(name="statut", type="boolean", nullable=true)
     */
    private $statut;

    /**
     * @var string
     *
     * @Gedmo\Blameable(on="create")
     * @ORM\Column(name="publie_par", type="string", length=25, nullable=true)
     */
    private $publiePar;

    /**
     * @var string
     *
     * @Gedmo\Blameable(on="update")
     * @ORM\Column(name="modifie_par", type="string", length=25, nullable=true)
     */
    private $modifiePar;

    /**
     * @var \DateTime
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="publie_le", type="datetimetz", nullable=true)
     */
    private $publieLe;

    /**
     * @var \DateTime
     *
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(name="modifie_le", type="datetimetz", nullable=true)
     */
    private $modifieLe;

    /**
    * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Provisoire", inversedBy="definitives")
    * @ORM\JoinColumn(name="provisoire_id", referencedColumnName="id")
    */
    private $provisoire;

    /**
    * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Sortfinal", inversedBy="definitives")
    * @ORM\JoinColumn(name="sortfinal_id", referencedColumnName="id")
    */
    private $sortfinal;

    /**
    * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Epi", inversedBy="definitives")
    * @ORM\JoinColumn(name="epi_id", referencedColumnName="id")
    */
    private $epi;

    /**
     * @var string
     *
     * @ORM\Column(name="tampon1", type="string", length=10, nullable=true)
     */
    private $tampon1;

    /**
     * @var string
     *
     * @ORM\Column(name="tampon2", type="string", length=10, nullable=true)
     */
    private $tampon2;

    /**
     * @var string
     *
     * @ORM\Column(name="tampon3", type="string", length=10, nullable=true)
     */
    private $tampon3;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set libelle
     *
     * @param string $libelle
     *
     * @return Definitive
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Definitive
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
     * Set etagere
     *
     * @param integer $etagere
     *
     * @return Definitive
     */
    public function setEtagere($etagere)
    {
        $this->etagere = $etagere;

        return $this;
    }

    /**
     * Get etagere
     *
     * @return int
     */
    public function getEtagere()
    {
        return $this->etagere;
    }

    /**
     * Set position
     *
     * @param integer $position
     *
     * @return Definitive
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return int
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set extreme
     *
     * @param string $extreme
     *
     * @return Definitive
     */
    public function setExtreme($extreme)
    {
        $this->extreme = $extreme;

        return $this;
    }

    /**
     * Get extreme
     *
     * @return string
     */
    public function getExtreme()
    {
        return $this->extreme;
    }

    /**
     * Set vie
     *
     * @param string $vie
     *
     * @return Definitive
     */
    public function setVie($vie)
    {
        $this->vie = $vie;

        return $this;
    }

    /**
     * Get vie
     *
     * @return string
     */
    public function getVie()
    {
        return $this->vie;
    }
}
