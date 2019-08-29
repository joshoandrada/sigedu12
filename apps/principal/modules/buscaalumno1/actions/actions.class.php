<?php

/**
 * buscaalumno1 actions.
 *
 * @package    alba
 * @subpackage buscaalumno1
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 5125 2007-09-16 00:53:55Z dwhittle $
 */
class buscaalumno1Actions extends autobuscaalumno1Actions
{

 public function executeOrden()
 {
  $idalu=(int)$this->getRequestParameter('idalumno');
  $ncur=(int)$this->getRequestParameter('idrendida');

     $h1= sfPropelFinder::from('Alumno')->
	     where ('Id','like',$idalu)->
	     find();
	 foreach ($h1 as $alu1)  
         {
	 $matrialu= $alu1->getMatricula();
          } 

     $h2= sfPropelFinder::from('Llamadoa')->
	     where ('Id','like',1)->
	     find();
	 foreach ($h2 as $alu2)  
         {
	 $llamada= $alu2->getFkLlamadosId();
          } 

 // $cr=sfPropelFinder::from('RelAlumnoDivision')->
 //          where('FkAlumnoId', 'like',$idalu)->
 //         find();
 //               foreach ($cr as $ccr)
 //        	{
 //		 $iddiv=$ccr->getFkDivisionId();
 //                } 

  //if ($iddiv === 0 || $iddiv === null )
  // {  

   // $mensaje= "Alumno sin division asignada.."; 
   // return $this->redirect('buscaalumno1/list?idrendida='.$ncur.'&msj='.$mensaje);

   //}
   //else
   //	{ 
  	if ($ncur === 0 || $ncur === null )
   	{  
 	    $c = RendidaPeer::Ingresaren($idalu,$matrialu,$llamada);
 	    $c1=new Criteria();
            $c1->addAscendingOrderByColumn(RendidaPeer::ID);
            $c3 = RendidaPeer::DoSelect($c1);
            foreach ($c3 as $cs3)
            {
            $ncur = $cs3->getid();
            }
         }
         else
         { 
            $c2=new Criteria();
            $c2->add(RendidaPeer::ID,"%$ncur%", Criteria::LIKE);
            $c = RendidaPeer::DoSelect($c2);
            foreach ($c as $cs)
            {
            $cs->setFkAlumnoId($idalu);
            $cs->setFkLlamadaId($llamada);
            $cs->setMatricula($matrialu);
            $cs->save();
            }
         }
        return $this->redirect('Rendida/edit?id='.$ncur);
   //}
   

  }



}
