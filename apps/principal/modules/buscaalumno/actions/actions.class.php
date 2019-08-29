<?php

/**
 * buscaalumno actions.
 *
 * @package    alba
 * @subpackage buscaalumno
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 5125 2007-09-16 00:53:55Z dwhittle $
 */
class buscaalumnoActions extends autobuscaalumnoActions
{
///// modificaciones 
 public function executeOrden()
 {
  $idalu=(int)$this->getRequestParameter('idalumno');
  $ncur=(int)$this->getRequestParameter('idcursada');

     $h1= sfPropelFinder::from('Alumno')->
	     where ('Id','like',$idalu)->
	     find();
	 foreach ($h1 as $alu1)  
         {
	 $matrialu= $alu1->getMatricula();
          } 

    $h2= sfPropelFinder::from('Llamadoacur')->
	     where ('Id','like',1)->
	     find();
	 foreach ($h2 as $alu2)  
         {
	 $llamada= $alu2->getFkLlamadoscurId();
          } 

//$llamada=$llamada+10;

  if ($ncur === 0 || $ncur === null )
   {  
 
    $c = CursadaPeer::Ingresacur($idalu,$matrialu,$llamada);
    $c1=new Criteria();
    $c1->addAscendingOrderByColumn(CursadaPeer::ID);
    $c3 = CursadaPeer::DoSelect($c1);
     foreach ($c3 as $cs3)
    {
    $ncur = $cs3->getid();
    }
    }
  else
   { 
    $c2=new Criteria();
    $c2->add(CursadaPeer::ID,"%$ncur%", Criteria::LIKE);
    $c = CursadaPeer::DoSelect($c2);
    foreach ($c as $cs)
       {
       $cs->setFkAlumnoId($idalu);
       $cs->setFkLlamadaId($llamada);
       $cs->setMatricula($matrialu);
       $cs->save();
       }
   }
  return $this->redirect('cursadaa/edit?id='.$ncur);
  }

}
