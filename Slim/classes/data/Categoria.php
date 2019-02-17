<?php

namespace data;

/**
 * @Entity @Table(name="categoria")
 */
class Categoria {

    use Common;
    
    /**
     * @Id
     * @Column(type="integer") @GeneratedValue
     */
    private $id;
    /**
     * @Column(type="string", length=100, unique=true, nullable=false)
     */
    private $nombre;
    /**
     * @OneToMany(targetEntity="Zapato", mappedBy="categoria")
     */
    private $zapatos = null;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->zapatos = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Categoria
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Add zapato
     *
     * @param \Zapato $zapato
     *
     * @return Categoria
     */
    public function addZapato(\Zapato $zapato)
    {
        $this->zapatos[] = $zapato;

        return $this;
    }

    /**
     * Remove zapato
     *
     * @param \Zapato $zapato
     */
    public function removeZapato(\Zapato $zapato)
    {
        $this->zapatos->removeElement($zapato);
    }

    /**
     * Get zapatos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getZapatos()
    {
        return $this->zapatos;
    }

}