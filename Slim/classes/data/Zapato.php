<?php

namespace data;

/**
 * @Entity @Table(name="zapato")
 */
class Zapato {
    /**
     * @Id
     * @Column(type="integer") @GeneratedValue
     */
    private $id;
    /**
     * @Column(type="string", length=40, nullable=false)
     */
    private $marca;
    /**
     * @Column(type="string", length=255, nullable=false)
     */
    private $modelo;
    
    /**
     * @ManyToOne(targetEntity="Categoria", inversedBy="zapatos")
     * @JoinColumn(name="idcategoria", referencedColumnName="id", nullable=false)
     */
    private $categoria;

    /**
     * @ManyToOne(targetEntity="Destinatario", inversedBy="zapatos")
     * @JoinColumn(name="iddestinatario", referencedColumnName="id", nullable=false)
     */
    private $destinatario;
    
    /**
     * @Column(type="decimal", precision=7, scale=2, nullable=false)
     */
    private $precio;
    /**
     * @Column(type="string", length=30, nullable=false)
     */
    private $color;
    /**
     * @Column(type="string",length=50, nullable=true)
     */
    private $material_cubierta;
    
    /**
     * @Column(type="string",length=50, nullable=true)
     */
    private $material_forro;
    
    /**
     * @Column(type="string",length=50, nullable=true)
     */
    private $material_suela;
    
    /**
     * @Column(type="integer", nullable=false)
     */
    private $numero_desde;
    /**
     * @Column(type="integer", nullable=false)
     */
    private $numero_hasta;
    
    /**
     * @Column(type="string", length=250, nullable=true)
     */
    private $descripcion;
    
    /**
     * @Column(type="boolean", nullable=false, options={"default":0})
     */
    private $disponibilidad;
    
    /**
     * @OneToMany(targetEntity="Detalle", mappedBy="zapato")
     */
    private $detalles = null;
   
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->detalles = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set marca
     *
     * @param string $marca
     *
     * @return Zapato
     */
    public function setMarca($marca)
    {
        $this->marca = $marca;

        return $this;
    }

    /**
     * Get marca
     *
     * @return string
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * Set modelo
     *
     * @param string $modelo
     *
     * @return Zapato
     */
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;

        return $this;
    }

    /**
     * Get modelo
     *
     * @return string
     */
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * Set precio
     *
     * @param string $precio
     *
     * @return Zapato
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get precio
     *
     * @return string
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set color
     *
     * @param string $color
     *
     * @return Zapato
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set materialCubierta
     *
     * @param string $materialCubierta
     *
     * @return Zapato
     */
    public function setMaterialCubierta($materialCubierta)
    {
        $this->material_cubierta = $materialCubierta;

        return $this;
    }

    /**
     * Get materialCubierta
     *
     * @return string
     */
    public function getMaterialCubierta()
    {
        return $this->material_cubierta;
    }

    /**
     * Set materialForro
     *
     * @param string $materialForro
     *
     * @return Zapato
     */
    public function setMaterialForro($materialForro)
    {
        $this->material_forro = $materialForro;

        return $this;
    }

    /**
     * Get materialForro
     *
     * @return string
     */
    public function getMaterialForro()
    {
        return $this->material_forro;
    }

    /**
     * Set materialSuela
     *
     * @param string $materialSuela
     *
     * @return Zapato
     */
    public function setMaterialSuela($materialSuela)
    {
        $this->material_suela = $materialSuela;

        return $this;
    }

    /**
     * Get materialSuela
     *
     * @return string
     */
    public function getMaterialSuela()
    {
        return $this->material_suela;
    }

    /**
     * Set numeroDesde
     *
     * @param integer $numeroDesde
     *
     * @return Zapato
     */
    public function setNumeroDesde($numeroDesde)
    {
        $this->numero_desde = $numeroDesde;

        return $this;
    }

    /**
     * Get numeroDesde
     *
     * @return integer
     */
    public function getNumeroDesde()
    {
        return $this->numero_desde;
    }

    /**
     * Set numeroHasta
     *
     * @param integer $numeroHasta
     *
     * @return Zapato
     */
    public function setNumeroHasta($numeroHasta)
    {
        $this->numero_hasta = $numeroHasta;

        return $this;
    }

    /**
     * Get numeroHasta
     *
     * @return integer
     */
    public function getNumeroHasta()
    {
        return $this->numero_hasta;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Zapato
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set disponibilidad
     *
     * @param boolean $disponibilidad
     *
     * @return Zapato
     */
    public function setDisponibilidad($disponibilidad)
    {
        $this->disponibilidad = $disponibilidad;

        return $this;
    }

    /**
     * Get disponibilidad
     *
     * @return boolean
     */
    public function getDisponibilidad()
    {
        return $this->disponibilidad;
    }

    /**
     * Set categoria
     *
     * @param \Categoria $categoria
     *
     * @return Zapato
     */
    public function setCategoria(\Categoria $categoria)
    {
        $this->categoria = $categoria;

        return $this;
    }

    /**
     * Get categoria
     *
     * @return \Categoria
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * Set destinatario
     *
     * @param \Destinatario $destinatario
     *
     * @return Zapato
     */
    public function setDestinatario(\Destinatario $destinatario)
    {
        $this->destinatario = $destinatario;

        return $this;
    }

    /**
     * Get destinatario
     *
     * @return \Destinatario
     */
    public function getDestinatario()
    {
        return $this->destinatario;
    }

    /**
     * Add detalle
     *
     * @param \Detalle $detalle
     *
     * @return Zapato
     */
    public function addDetalle(\Detalle $detalle)
    {
        $this->detalles[] = $detalle;

        return $this;
    }

    /**
     * Remove detalle
     *
     * @param \Detalle $detalle
     */
    public function removeDetalle(\Detalle $detalle)
    {
        $this->detalles->removeElement($detalle);
    }

    /**
     * Get detalles
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDetalles()
    {
        return $this->detalles;
    }
}
