<?php
	namespace App\Entity;

    use Doctrine\ORM\Mapping as ORM;

    /**
     * @ORM\Entity(repositoryClass="App\Repository\PlazaRepository")
    */
	class Plaza {

        /**
        * @ORM\Id
        * @ORM\Column(name="noPlaza")
        */
    	private $noPlaza;
        private $codigoPago;
        private $noUnidad;
        private $noSubunidad;
        private $noPuesto;
        private $horas;
        private $noConsecutivo;
        private $noNomina;
        private $codigoContratacion;
        private $fechaAntiguedad;
        private $fechaInicio;
        private $fechaVencimiento;
        private $claveArea;

    	public function getNoPlaza() {
        	return $this->noPlaza;
    	}

    	public function setCurp($noPlaza) {
    		$this->noPlaza = $noPlaza;
    	}

        public function getCodigoPago() {
            return $this->codigoPago;
        }

        public function setCodigoPago($codigoPago) {
            $this->codigoPago = $codigoPago;
        }

        public function getNoUnidad() {
            return $this->noUnidad;
        }

        public function getNoSubunidad()
        {
            return $this->noSubunidad;
        }

    public function getNoPuesto()
    {
        return $this->noPuesto;
    }

    public function getHoras()
    {
        return $this->horas;
    }

    public function getNoConsecutivo()
    {
        return $this->noConsecutivo;
    }

    public function getNoNomina()
    {
        return $this->noNomina;
    }

    public function getCodigoContratacion()
    {
        return $this->codigoContratacion;
    }

    public function getFechaAntiguedad()
    {
        return $this->fechaAntiguedad;
    }

    public function getFechaInicio()
    {
        return $this->fechaInicio;
    }

    public function getFechaVencimiento()
    {
        return $this->fechaVencimiento;
    }

    public function getClaveArea()
    {
        return $this->claveArea;
    }
}