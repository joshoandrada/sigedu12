<?php

class Llamadoscur extends BaseLlamadoscur
{
    public function __toString() {
        return $this->getLlamado()."º llamado - desde: ".$this->getFechai(). " hasta: ".$this->getFechaf(); 
    }

}
