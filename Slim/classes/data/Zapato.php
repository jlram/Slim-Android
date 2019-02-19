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
    public $id = null;
    
    /**
     * @Column(type="string", length=40, nullable=false)
     */
    public $marca;
    
    /**
     * @Column(type="string", length=255, nullable=false)
     */
    public $modelo;
    
    /**
     * @Column(type="decimal", precision=7, scale=2, nullable=false)
     */
    public $precio;
   
    /**
     * Constructor
     */
    public function __construct($id, $nombre, $modelo, $precio) {
       $this->id = $id;
       $this->nombre = $nombre;
       $this->modelo = $modelo;
       $this->precio = $precio;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set marca
     *
     * @param string $marca
     *
     * @return Zapato
     */
    public function setMarca($marca) {
        $this->marca = $marca;

        return $this;
    }

    /**
     * Get marca
     *
     * @return string
     */
    public function getMarca() {
        return $this->marca;
    }

    /**
     * Set modelo
     *
     * @param string $modelo
     *
     * @return Zapato
     */
    public function setModelo($modelo) {
        $this->modelo = $modelo;

        return $this;
    }

    /**
     * Get modelo
     *
     * @return string
     */
    public function getModelo() {
        return $this->modelo;
    }

    /**
     * Set precio
     *
     * @param string $precio
     *
     * @return Zapato
     */
    public function setPrecio($precio) {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get precio
     *
     * @return string
     */
    public function getPrecio() {
        return $this->precio;
    }
}
