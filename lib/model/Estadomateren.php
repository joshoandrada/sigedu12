<?php

class Estadomateren extends BaseEstadomateren
{
public function __toString() {
        return $this->getNombre();
    }
}
