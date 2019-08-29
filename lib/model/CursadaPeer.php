<?php

class CursadaPeer extends BaseCursadaPeer
{
public static function Ingresacur($idalu,$matrialu,$llamada)
{
$dia=date("Y-m-d H:i:s");
$cc= new Cursada();
$cc->setFkAlumnoId($idalu);
$cc->setMatricula($matrialu);
$cc->setFkLlamadaId($llamada);
$cc->setAuxi(0);
$cc->setFecha($dia);
$cc->save();
}
}
