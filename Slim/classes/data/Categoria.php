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
    public $id = null;
    
    /**
     * @Column(type="string", length=100, unique=true, nullable=false)
     */
    public $nombre;
    
    
    /**
     * Constructor
     */
    public function __construct($nombre, $id) {
       $this->id = $id;
       $this->nombre = $nombre;
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
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Categoria
     */
    public function setNombre($nombre) {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre() {
        return $this->nombre;
    }
}