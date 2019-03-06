<?php
	namespace App\Entity;

    use Doctrine\ORM\Mapping as ORM;

    /**
     * @ORM\Entity(repositoryClass="App\Repository\BusquedaRepository")
    */
	class Busqueda {

        /**
        * @ORM\Id
        * @ORM\Column(name="curp", type="string")
        */
    	private $curp;
        private $incidencia;

    	public function getCurp() {
        	return $this->curp;
    	}

    	public function setCurp($curp) {
    		$this->curp = $curp;
    	}

        public function getIncidencia() {
            return $this->incidencia;
        }

        public function setIncidencia($incidencia) {
            $this->incidencia = $incidencia;
        }
	}