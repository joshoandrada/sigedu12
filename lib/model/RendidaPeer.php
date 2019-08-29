<?php

class RendidaPeer extends BaseRendidaPeer
{

public static function Ingresaren($idalu,$matrialu,$llamada)
{
$dia=date("Y-m-d H:i:s");
$cc= new Rendida();
$cc->setFkAlumnoId($idalu);
$cc->setFkLlamadaId($llamada);
$cc->setMatricula($matrialu);
$cc->setAuxi(0);
$cc->setFecha($dia);
$cc->save();
}

}
