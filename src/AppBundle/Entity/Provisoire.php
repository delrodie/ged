<?php

namespace AppBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * Provisoire
 *
 * @ORM\Table(name="provisoire")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProvisoireRepository")
 * @Gedmo\Loggable
 */
class Provisoire
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
    * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Conservation", inversedBy="provisoires")
    * @ORM\JoinColumn(name="conservation_id", referencedColumnName="id")
    */
    private $conservation;

    /**
    * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Sousserie", inversedBy="provisoires")
    * @ORM\JoinColumn(name="sousserie_id", referencedColumnName="id")
    */
    private $sousserie;

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
     * @return Provisoire
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
     * @return Provisoire
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
     * Set statut
     *
     * @param boolean $statut
     *
     * @return Provisoire
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get statut
     *
     * @return bool
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Set publiePar
     *
     * @param string $publiePar
     *
     * @return Provisoire
     */
    public function setPubliePar($publiePar)
    {
        $this->publiePar = $publiePar;

        return $this;
    }

    /**
     * Get publiePar
     *
     * @return string
     */
    public function getPubliePar()
    {
        return $this->publiePar;
    }

    /**
     * Set modifiePar
     *
     * @param string $modifiePar
     *
     * @return Provisoire
     */
    public function setModifiePar($modifiePar)
    {
        $this->modifiePar = $modifiePar;

        return $this;
    }

    /**
     * Get modifiePar
     *
     * @return string
     */
    public function getModifiePar()
    {
        return $this->modifiePar;
    }

    /**
     * Set publieLe
     *
     * @param \DateTime $publieLe
     *
     * @return Provisoire
     */
    public function setPublieLe($publieLe)
    {
        $this->publieLe = $publieLe;

        return $this;
    }

    /**
     * Get publieLe
     *
     * @return \DateTime
     */
    public function getPublieLe()
    {
        return $this->publieLe;
    }

    /**
     * Set modifieLe
     *
     * @param \DateTime $modifieLe
     *
     * @return Provisoire
     */
    public function setModifieLe($modifieLe)
    {
        $this->modifieLe = $modifieLe;

        return $this;
    }

    /**
     * Get modifieLe
     *
     * @return \DateTime
     */
    public function getModifieLe()
    {
        return $this->modifieLe;
    }

    /**
     * Set tampon1
     *
     * @param string $tampon1
     *
     * @return Provisoire
     */
    public function setTampon1($tampon1)
    {
        $this->tampon1 = $tampon1;

        return $this;
    }

    /**
     * Get tampon1
     *
     * @return string
     */
    public function getTampon1()
    {
        return $this->tampon1;
    }

    /**
     * Set tampon2
     *
     * @param string $tampon2
     *
     * @return Provisoire
     */
    public function setTampon2($tampon2)
    {
        $this->tampon2 = $tampon2;

        return $this;
    }

    /**
     * Get tampon2
     *
     * @return string
     */
    public function getTampon2()
    {
        return $this->tampon2;
    }

    /**
     * Set conservation
     *
     * @param \AppBundle\Entity\Conservation $conservation
     *
     * @return Provisoire
     */
    public function setConservation(\AppBundle\Entity\Conservation $conservation = null)
    {
        $this->conservation = $conservation;

        return $this;
    }

    /**
     * Get conservation
     *
     * @return \AppBundle\Entity\Conservation
     */
    public function getConservation()
    {
        return $this->conservation;
    }

    /**
     * Set sousserie
     *
     * @param \AppBundle\Entity\Sousserie $sousserie
     *
     * @return Provisoire
     */
    public function setSousserie(\AppBundle\Entity\Sousserie $sousserie = null)
    {
        $this->sousserie = $sousserie;

        return $this;
    }

    /**
     * Get sousserie
     *
     * @return \AppBundle\Entity\Sousserie
     */
    public function getSousserie()
    {
        return $this->sousserie;
    }
}
