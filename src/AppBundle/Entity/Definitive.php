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
        $this->libelle = strtoupper($libelle);

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

    /**
     * Set statut
     *
     * @param boolean $statut
     *
     * @return Definitive
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get statut
     *
     * @return boolean
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
     * @return Definitive
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
     * @return Definitive
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
     * @return Definitive
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
     * @return Definitive
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
     * @return Definitive
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
     * @return Definitive
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
     * Set tampon3
     *
     * @param string $tampon3
     *
     * @return Definitive
     */
    public function setTampon3($tampon3)
    {
        $this->tampon3 = $tampon3;

        return $this;
    }

    /**
     * Get tampon3
     *
     * @return string
     */
    public function getTampon3()
    {
        return $this->tampon3;
    }

    /**
     * Set provisoire
     *
     * @param \AppBundle\Entity\Provisoire $provisoire
     *
     * @return Definitive
     */
    public function setProvisoire(\AppBundle\Entity\Provisoire $provisoire = null)
    {
        $this->provisoire = $provisoire;

        return $this;
    }

    /**
     * Get provisoire
     *
     * @return \AppBundle\Entity\Provisoire
     */
    public function getProvisoire()
    {
        return $this->provisoire;
    }

    /**
     * Set sortfinal
     *
     * @param \AppBundle\Entity\Sortfinal $sortfinal
     *
     * @return Definitive
     */
    public function setSortfinal(\AppBundle\Entity\Sortfinal $sortfinal = null)
    {
        $this->sortfinal = $sortfinal;

        return $this;
    }

    /**
     * Get sortfinal
     *
     * @return \AppBundle\Entity\Sortfinal
     */
    public function getSortfinal()
    {
        return $this->sortfinal;
    }

    /**
     * Set epi
     *
     * @param \AppBundle\Entity\Epi $epi
     *
     * @return Definitive
     */
    public function setEpi(\AppBundle\Entity\Epi $epi = null)
    {
        $this->epi = $epi;

        return $this;
    }

    /**
     * Get epi
     *
     * @return \AppBundle\Entity\Epi
     */
    public function getEpi()
    {
        return $this->epi;
    }
}
