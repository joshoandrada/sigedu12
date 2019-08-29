<?php

class Llamados extends BaseLlamados
{
   public function __toString() {
        return $this->getTurno()."º turrno -". $this->getLlamado()."º llamado - desde: ".$this->getFechai(). " hasta: ".$this->getFechaf(); 
    }
}
