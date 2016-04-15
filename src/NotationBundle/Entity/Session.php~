<?php

namespace NotationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Session
 *
 * @ORM\Table(name="session")
 * @ORM\Entity(repositoryClass="NotationBundle\Repository\SessionRepository")
 */
class Session
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
     * @ORM\Column(name="intitule", type="string", length=255)
     */
    private $intitule;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datedebut", type="date")
     */
    private $datedebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datefin", type="date")
     */
    private $datefin;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set intitule
     *
     * @param string $intitule
     * @return Session
     */
    public function setIntitule($intitule)
    {
        $this->intitule = $intitule;

        return $this;
    }

    /**
     * Get intitule
     *
     * @return string 
     */
    public function getIntitule()
    {
        return $this->intitule;
    }

    /**
     * Set datedebut
     *
     * @param \DateTime $datedebut
     * @return Session
     */
    public function setDatedebut($datedebut)
    {
        $this->datedebut = $datedebut;

        return $this;
    }

    /**
     * Get datedebut
     *
     * @return \DateTime 
     */
    public function getDatedebut()
    {
        return $this->datedebut;
    }

    /**
     * Set datefin
     *
     * @param \DateTime $datefin
     * @return Session
     */
    public function setDatefin($datefin)
    {
        $this->datefin = $datefin;

        return $this;
    }

    /**
     * Get datefin
     *
     * @return \DateTime 
     */
    public function getDatefin()
    {
        return $this->datefin;
    }


    /**
 *
 * @ORM\ManyToOne(targetEntity="Person", inversedBy="Session")
 * @ORM\JoinColumn(name="enseignant_id", referencedColumnName="id")
 */
    private $enseignant;




    /**
     * Set enseignant
     *
     * @param \NotationBundle\Entity\Person $enseignant
     * @return Session
     */
    public function setEnseignant(\NotationBundle\Entity\Person $enseignant = null)
    {
        $this->enseignant = $enseignant;

        return $this;
    }

    /**
     * Get enseignant
     *
     * @return \NotationBundle\Entity\Person
     */
    public function getEnseignant()
    {
        return $this->enseignant;
    }










    /**
     *
     * @ORM\ManyToMany(targetEntity="Eleve", inversedBy="Session")
     * @ORM\JoinColumn(name="eleve_id", referencedColumnName="id")
     */
    private $eleve;




    /**
     * Set eleve
     *
     * @param \NotationBundle\Entity\Eleve $eleve
     * @return Session
     */
    public function setEleve(\NotationBundle\Entity\Eleve $eleve = null)
    {
        $this->eleve = $eleve;

        return $this;
    }

    /**
     * Get eleve
     *
     * @return \NotationBundle\Entity\Eleve
     */
    public function getEleve()
    {
        return $this->eleve;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->eleve = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add eleve
     *
     * @param \NotationBundle\Entity\Eleve $eleve
     * @return Session
     */
    public function addGroupe(\NotationBundle\Entity\Eleve $eleve)
    {
        $this->eleve[] = $eleve;

        return $this;
    }

    /**
     * Remove eleve
     *
     * @param \NotationBundle\Entity\Eleve $eleve
     */
    public function removeEleve(\NotationBundle\Entity\Eleve $eleve)
    {
        $this->eleve->removeElement($eleve);
    }

    /**
     * Add eleve
     *
     * @param \NotationBundle\Entity\Eleve $eleve
     * @return Session
     */
    public function addEleve(\NotationBundle\Entity\Eleve $eleve)
    {
        $this->eleve[] = $eleve;

        return $this;
    }
}
