<?php
	namespace App\Entity;

	class Docente {

    	private $curp;

    	public function getCurp() {
        	return $this->curp;
    	}

    	public function setCurp($curp) {
    		$this->curp = $curp;
    	}
	}