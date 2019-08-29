<?php

class Estadomate extends BaseEstadomate
{
 public function __toString() {
        return $this->getNombre();
    }
}
