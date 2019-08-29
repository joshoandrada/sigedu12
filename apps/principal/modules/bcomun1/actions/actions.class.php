<?php

/**
 * bcomun1 actions.
 *
 * @package    alba
 * @subpackage bcomun1
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 5125 2007-09-16 00:53:55Z dwhittle $
 */
class bcomun1Actions extends autobcomun1Actions
{

public function executeList($request)
  {
    $this->processSort();

    $this->processFilters();


    // pager
    $this->pager = new sfPropelPager('Comun', 13);
    $c = new Criteria();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', $this->getUser()->getAttribute('page', 1, 'sf_admin/comun')));
    $this->pager->init();
    // save page
    if ($this->getRequestParameter('page')) {
        $this->getUser()->setAttribute('page', $this->getRequestParameter('page'), 'sf_admin/comun');
    }
  }

public function executeAgregacomun1()
 {  
    $ord=(int)$this->getRequestParameter('orden');
    $cur=(int)$this->getRequestParameter('idrendida');
    $act=(int)$this->getRequestParameter('idactividad');
 
$mat='';

   $vu=sfPropelFinder::from('Detallerendir')->
	where('FkCursadaId','like',$cur)->
		where('FkActividadId','like',$act)->
	find();
     foreach ($vu as $cs1)
       {
       $mat = $cs1->getFkActividadId();
       $estado = $cs1->getFkActividadId();
       }

    $tvu=sfPropelFinder::from('Rendida')->
	where('Id','like',$cur)->
	find();
     foreach ($tvu as $cs2)
       {
       $alu = $cs2->getFkAlumnoId();
       $lla = $cs2->getFkLlamadaId();
       }


       if ($mat === '' || $mat === null || $mat ===0)
         {
             $fvu=sfPropelFinder::from('Actividad')->
         	where('Id','like',$act)->
  	        find();
             foreach ($fvu as $cs3)
                 {
                 $ordenmate = $cs3->getNro();
                 $nommate = $cs3->getNombre();   
                 }
             switch ($ordenmate) {

                case 8:
                       $fq=sfPropelFinder::from('Alumno')->
 	               where('Id','like',$alu)->
                       find();
                       foreach ($fq as $cs2)
                          {
                       	  $cs2->setFkCarreraId(10);
                          $cs2->save();
                          }
                          $est="Sin Estado"; 
                 	  $var1= new Detallerendir();
                  	  $var1->setFkActividadId(66);
                          $var1->setFkCursadaId($cur);
                          $var1->setFkLlamadaId($lla);
                          $var1->setFkDcursadaId(6);
                          $var1->setFkAlumnoId($alu);
                          $var1->setEstado($est);
                          $var1->setOrden($ordenmate);
                          $var1->setResult(0);
                          $var1->save();

                          $vu1=sfPropelFinder::from('Detallerendir')->
	                   where('FkAlumnoId','like',$alu)->
		                where('FkActividadId','like',211)->
	                   find();
                          foreach ($vu1 as $c1)
                              {
                              $c1->setFkActividadId(59);
                              $c1->save();
                              }

                          $vu2=sfPropelFinder::from('Detallerendir')->
	                   where('FkAlumnoId','like',$alu)->
		                where('FkActividadId','like',212)->
	                   find();
                          foreach ($vu2 as $c2)
                              {
                              $c2->setFkActividadId(60);
                              $c2->save();
                              }

                          $vu3=sfPropelFinder::from('Detallerendir')->
	                   where('FkAlumnoId','like',$alu)->
		                where('FkActividadId','like',213)->
	                   find();
                          foreach ($vu3 as $c3)
                              {
                              $c3->setFkActividadId(61);
                              $c3->save();
                              }

                          $vu4=sfPropelFinder::from('Detallerendir')->
	                   where('FkAlumnoId','like',$alu)->
		                where('FkActividadId','like',214)->
	                   find();
                          foreach ($vu4 as $c4)
                              {
                              $c4->setFkActividadId(62);
                              $c4->save();
                              }

                          $vu5=sfPropelFinder::from('Detallerendir')->
	                   where('FkAlumnoId','like',$alu)->
		                where('FkActividadId','like',215)->
	                   find();
                          foreach ($vu5 as $c5)
                              {
                              $c5->setFkActividadId(63);
                              $c5->save();
                              }

                          $vu6=sfPropelFinder::from('Detallerendir')->
	                   where('FkAlumnoId','like',$alu)->
		                where('FkActividadId','like',216)->
	                   find();
                          foreach ($vu6 as $c6)
                              {
                              $c6->setFkActividadId(64);
                              $c6->save();
                              }
                           
                          $vu7=sfPropelFinder::from('Detallerendir')->
	                   where('FkAlumnoId','like',$alu)->
		                where('FkActividadId','like',218)->
	                   find();
                          foreach ($vu7 as $c7)
                              {
                              $c7->setFkActividadId(65);
                              $c7->save();
                              }

                          $vu8=sfPropelFinder::from('Detallerendir')->
                     where('FkAlumnoId','like',$alu)->
                    where('FkActividadId','like',223)->
                     find();
                          foreach ($vu8 as $c8)
                              {
                              $c8->setFkActividadId(67);
                              $c8->save();
                              }

                          $mensaje= "Con ".$nommate." elijio la carrera de Neuromotor"; 
                          return $this->redirect('bneuro1/list?idrendida='.$cur.'&msj='.$mensaje);   
                          break;
                case 9:
                       $fq=sfPropelFinder::from('Alumno')->
 	               where('Id','like',$alu)->
                       find();
                       foreach ($fq as $cs2)
                          {
                       	  $cs2->setFkCarreraId(12);
                          $cs2->save();
                          }
                          $est="Sin Estado"; 
                 	  $var1= new Detallerendir();
                  	  $var1->setFkActividadId(183);
                          $var1->setFkCursadaId($cur);
                          $var1->setFkLlamadaId($lla);
                          $var1->setFkDcursadaId(6);
                          $var1->setFkAlumnoId($alu);
                          $var1->setEstado($est);
                          $var1->setOrden($ordenmate);
                          $var1->setResult(0);
                          $var1->save();


                          $vu1=sfPropelFinder::from('Detallerendir')->
	                   where('FkAlumnoId','like',$alu)->
		                where('FkActividadId','like',211)->
	                   find();
                          foreach ($vu1 as $c1)
                              {
                              $c1->setFkActividadId(176);
                              $c1->save();
                              }

                          $vu2=sfPropelFinder::from('Detallerendir')->
	                   where('FkAlumnoId','like',$alu)->
		                where('FkActividadId','like',212)->
	                   find();
                          foreach ($vu2 as $c2)
                              {
                              $c2->setFkActividadId(177);
                              $c2->save();
                              }

                          $vu3=sfPropelFinder::from('Detallerendir')->
	                   where('FkAlumnoId','like',$alu)->
		                where('FkActividadId','like',213)->
	                   find();
                          foreach ($vu3 as $c3)
                              {
                              $c3->setFkActividadId(178);
                              $c3->save();
                              }

                          $vu4=sfPropelFinder::from('Detallerendir')->
	                   where('FkAlumnoId','like',$alu)->
		                where('FkActividadId','like',214)->
	                   find();
                          foreach ($vu4 as $c4)
                              {
                              $c4->setFkActividadId(179);
                              $c4->save();
                              }

                          $vu5=sfPropelFinder::from('Detallerendir')->
	                   where('FkAlumnoId','like',$alu)->
		                where('FkActividadId','like',215)->
	                   find();
                          foreach ($vu5 as $c5)
                              {
                              $c5->setFkActividadId(180);
                              $c5->save();
                              }

                          $vu6=sfPropelFinder::from('Detallerendir')->
	                   where('FkAlumnoId','like',$alu)->
		                where('FkActividadId','like',216)->
	                   find();
                          foreach ($vu6 as $c6)
                              {
                              $c6->setFkActividadId(181);
                              $c6->save();
                              }
                           
                          $vu7=sfPropelFinder::from('Detallerendir')->
	                   where('FkAlumnoId','like',$alu)->
		                where('FkActividadId','like',218)->
	                   find();
                          foreach ($vu7 as $c7)
                              {
                              $c7->setFkActividadId(182);
                              $c7->save();
                              }
                           
                          $vu8=sfPropelFinder::from('Detallerendir')->
                     where('FkAlumnoId','like',$alu)->
                    where('FkActividadId','like',223)->
                     find();
                          foreach ($vu8 as $c8)
                              {
                              $c8->setFkActividadId(184);
                              $c8->save();
                              }


                         $mensaje= "Con ".$nommate." elijio la carrera de Intelectual"; 
                          return $this->redirect('bintel1/list?idrendida='.$cur.'&msj='.$mensaje);
                          break;
                case 10:
                       $fq=sfPropelFinder::from('Alumno')->
 	               where('Id','like',$alu)->
                       find();
                       foreach ($fq as $cs2)
                          {
                       	  $cs2->setFkCarreraId(13);
                          $cs2->save();
                          }
                          $est="Sin Estado"; 
                 	  $var1= new Detallerendir();
                  	  $var1->setFkActividadId(110);
                          $var1->setFkCursadaId($cur);
                          $var1->setFkLlamadaId($lla);
                          $var1->setFkDcursadaId(6);
                          $var1->setFkAlumnoId($alu);
                          $var1->setEstado($est);
                          $var1->setOrden($ordenmate);
                          $var1->setResult(0);
                          $var1->save();

                          $vu1=sfPropelFinder::from('Detallerendir')->
	                   where('FkAlumnoId','like',$alu)->
		                where('FkActividadId','like',211)->
	                   find();
                          foreach ($vu1 as $c1)
                              {
                              $c1->setFkActividadId(103);
                              $c1->save();
                              }

                          $vu2=sfPropelFinder::from('Detallerendir')->
	                   where('FkAlumnoId','like',$alu)->
		                where('FkActividadId','like',212)->
	                   find();
                          foreach ($vu2 as $c2)
                              {
                              $c2->setFkActividadId(104);
                              $c2->save();
                              }

                          $vu3=sfPropelFinder::from('Detallerendir')->
	                   where('FkAlumnoId','like',$alu)->
		                where('FkActividadId','like',213)->
	                   find();
                          foreach ($vu3 as $c3)
                              {
                              $c3->setFkActividadId(105);
                              $c3->save();
                              }

                          $vu4=sfPropelFinder::from('Detallerendir')->
	                   where('FkAlumnoId','like',$alu)->
		                where('FkActividadId','like',214)->
	                   find();
                          foreach ($vu4 as $c4)
                              {
                              $c4->setFkActividadId(106);
                              $c4->save();
                              }

                          $vu5=sfPropelFinder::from('Detallerendir')->
	                   where('FkAlumnoId','like',$alu)->
		                where('FkActividadId','like',215)->
	                   find();
                          foreach ($vu5 as $c5)
                              {
                              $c5->setFkActividadId(107);
                              $c5->save();
                              }

                          $vu6=sfPropelFinder::from('Detallerendir')->
	                   where('FkAlumnoId','like',$alu)->
		                where('FkActividadId','like',216)->
	                   find();
                          foreach ($vu6 as $c6)
                              {
                              $c6->setFkActividadId(108);
                              $c6->save();
                              }
                           
                          $vu7=sfPropelFinder::from('Detallerendir')->
	                   where('FkAlumnoId','like',$alu)->
		                where('FkActividadId','like',218)->
	                   find();
                          foreach ($vu7 as $c7)
                              {
                              $c7->setFkActividadId(109);
                              $c7->save();
                              }
                           
                          $vu8=sfPropelFinder::from('Detallerendir')->
                     where('FkAlumnoId','like',$alu)->
                    where('FkActividadId','like',223)->
                     find();
                          foreach ($vu8 as $c8)
                              {
                              $c8->setFkActividadId(111);
                              $c8->save();
                              }


                         $mensaje= "Con ".$nommate." elijio la carrera de Ciego"; 
                          return $this->redirect('bvisual1/list?idrendida='.$cur.'&msj='.$mensaje);
                          break;
                case 11:
                       $fq=sfPropelFinder::from('Alumno')->
 	               where('Id','like',$alu)->
                       find();
                       foreach ($fq as $cs2)
                          {
                       	  $cs2->setFkCarreraId(11);
                          $cs2->save();
                          }
                          $est="Sin Estado"; 
                 	  $var1= new Detallerendir();
                  	  $var1->setFkActividadId(147);
                          $var1->setFkCursadaId($cur);
                          $var1->setFkLlamadaId($lla);
                          $var1->setFkDcursadaId(6);
                          $var1->setFkAlumnoId($alu);
                          $var1->setEstado($est);
                          $var1->setOrden($ordenmate);
                          $var1->setResult(0);
                          $var1->save();


                          $vu1=sfPropelFinder::from('Detallerendir')->
	                   where('FkAlumnoId','like',$alu)->
		                where('FkActividadId','like',211)->
	                   find();
                          foreach ($vu1 as $c1)
                              {
                              $c1->setFkActividadId(140);
                              $c1->save();
                              }

                          $vu2=sfPropelFinder::from('Detallerendir')->
	                   where('FkAlumnoId','like',$alu)->
		                where('FkActividadId','like',212)->
	                   find();
                          foreach ($vu2 as $c2)
                              {
                              $c2->setFkActividadId(141);
                              $c2->save();
                              }

                          $vu3=sfPropelFinder::from('Detallerendir')->
	                   where('FkAlumnoId','like',$alu)->
		                where('FkActividadId','like',213)->
	                   find();
                          foreach ($vu3 as $c3)
                              {
                              $c3->setFkActividadId(142);
                              $c3->save();
                              }

                          $vu4=sfPropelFinder::from('Detallerendir')->
	                   where('FkAlumnoId','like',$alu)->
		                where('FkActividadId','like',214)->
	                   find();
                          foreach ($vu4 as $c4)
                              {
                              $c4->setFkActividadId(143);
                              $c4->save();
                              }

                          $vu5=sfPropelFinder::from('Detallerendir')->
	                   where('FkAlumnoId','like',$alu)->
		                where('FkActividadId','like',215)->
	                   find();
                          foreach ($vu5 as $c5)
                              {
                              $c5->setFkActividadId(144);
                              $c5->save();
                              }

                          $vu6=sfPropelFinder::from('Detallerendir')->
	                   where('FkAlumnoId','like',$alu)->
		                where('FkActividadId','like',216)->
	                   find();
                          foreach ($vu6 as $c6)
                              {
                              $c6->setFkActividadId(145);
                              $c6->save();
                              }
                           
                          $vu7=sfPropelFinder::from('Detallerendir')->
	                   where('FkAlumnoId','like',$alu)->
		                where('FkActividadId','like',218)->
	                   find();
                          foreach ($vu7 as $c7)
                              {
                              $c7->setFkActividadId(146);
                              $c7->save();
                              }
                           
                          $vu8=sfPropelFinder::from('Detallerendir')->
                     where('FkAlumnoId','like',$alu)->
                    where('FkActividadId','like',223)->
                     find();
                          foreach ($vu8 as $c8)
                              {
                              $c8->setFkActividadId(148);
                              $c8->save();
                              }

                          $mensaje= "Con ".$nommate." elijio la carrera de Sordos"; 
                          return $this->redirect('bauditiva1/list?idrendida='.$cur.'&msj='.$mensaje);
                          break;
                   }

                  $est="Sin Estado"; 
                  $var1= new Detallerendir();
                  $var1->setFkActividadId($act);
                  $var1->setFkCursadaId($cur);
                  $var1->setFkLlamadaId($lla);
                  $var1->setFkDcursadaId(6);
                  $var1->setFkAlumnoId($alu);
                  $var1->setEstado($est);
                  $var1->setOrden($ordenmate);
                  $var1->setResult(0);
                  $var1->save();
                  $mensaje= "Materia nueva, ".$ordenmate."-".$nommate; 
                  return $this->redirect('bcomun1/list?idrendida='.$cur.'&msj='.$mensaje);   
         }
         else
         {
           $mensaje= "Materia ya regularizada, de ser necesario ver otra rendida : ".$nommate; 
           return $this->redirect('bcomun1/list?idrendida='.$cur.'&msj='.$mensaje);   
         }
 }

public function executeBorrarcomun1()
 {  
     $cur=(int)$this->getRequestParameter('idcursada');
    $act=(int)$this->getRequestParameter('idactividad');
    $alu=(int)$this->getRequestParameter('idalumno');

 $va=sfPropelFinder::from('Detallecursada')->
    where('FkCursadaId','like',$cur)->
    where('FkActividadId','like',$act)->
    delete();

return $this->redirect('bcomun/list?idcursada='.$cur.'&idal='.$alu);  


 }


}
