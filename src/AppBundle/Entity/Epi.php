<?php

namespace AppBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;

/**
 * Epi
 *
 * @ORM\Table(name="epi")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EpiRepository")
 * @Gedmo\Loggable
 */
class Epi
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
     * @ORM\Column(name="libelle", type="string", length=10)
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
     * @ORM\Column(name="nbface", type="integer", nullable=true)
     */
    private $nbface;

    /**
     * @var int
     *
     * @ORM\Column(name="nbrayon", type="integer", nullable=true)
     */
    private $nbrayon;

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
    * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Rayonnage", inversedBy="epis")
    * @ORM\JoinColumn(name="rayonnage_id", referencedColumnName="id")
    */
    private $rayonnage;

    /**
     * @var string
     *
     * @ORM\Column(name="tampon", type="string", length=10, nullable=true)
     */
    private $tampon;

    /**
    * @ORM\OneToMany(targetEntity="AppBundle\Entity\Definitive", mappedBy="epi")
    */
    private $definitives;


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
     * @return Epi
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
     * @return Epi
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
     * Set nbface
     *
     * @param integer $nbface
     *
     * @return Epi
     */
    public function setNbface($nbface)
    {
        $this->nbface = $nbface;

        return $this;
    }

    /**
     * Get nbface
     *
     * @return int
     */
    public function getNbface()
    {
        return $this->nbface;
    }

    /**
     * Set nbrayon
     *
     * @param integer $nbrayon
     *
     * @return Epi
     */
    public function setNbrayon($nbrayon)
    {
        $this->nbrayon = $nbrayon;

        return $this;
    }

    /**
     * Get nbrayon
     *
     * @return int
     */
    public function getNbrayon()
    {
        return $this->nbrayon;
    }

    /**
     * Set statut
     *
     * @param boolean $statut
     *
     * @return Epi
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
     * @return Epi
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
     * @return Epi
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
     * @return Epi
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
     * @return Epi
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
     * Set rayonnage
     *
     * @param \AppBundle\Entity\Rayonnage $rayonnage
     *
     * @return Epi
     */
    public function setRayonnage(\AppBundle\Entity\Rayonnage $rayonnage = null)
    {
        $this->rayonnage = $rayonnage;

        return $this;
    }

    /**
     * Get rayonnage
     *
     * @return \AppBundle\Entity\Rayonnage
     */
    public function getRayonnage()
    {
        return $this->rayonnage;
    }

    /**
     * Set tampon
     *
     * @param string $tampon
     *
     * @return Epi
     */
    public function setTampon($tampon)
    {
        $this->tampon = $tampon;

        return $this;
    }

    /**
     * Get tampon
     *
     * @return string
     */
    public function getTampon()
    {
        return $this->tampon;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->definitives = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add definitive
     *
     * @param \AppBundle\Entity\Definitive $definitive
     *
     * @return Epi
     */
    public function addDefinitive(\AppBundle\Entity\Definitive $definitive)
    {
        $this->definitives[] = $definitive;

        return $this;
    }

    /**
     * Remove definitive
     *
     * @param \AppBundle\Entity\Definitive $definitive
     */
    public function removeDefinitive(\AppBundle\Entity\Definitive $definitive)
    {
        $this->definitives->removeElement($definitive);
    }

    /**
     * Get definitives
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDefinitives()
    {
        return $this->definitives;
    }
}
