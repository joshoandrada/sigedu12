<?php

/**
 * bauditiva1a actions.
 *
 * @package    alba
 * @subpackage bauditiva1a
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 5125 2007-09-16 00:53:55Z dwhittle $
 */
class bauditiva1aActions extends autobauditiva1aActions
{

  public function executeList($request)
  {
    $this->processSort();

    $this->processFilters();


    // pager
    $this->pager = new sfPropelPager('Auditiva', 36);
    $c = new Criteria();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', $this->getUser()->getAttribute('page', 1, 'sf_admin/auditiva')));
    $this->pager->init();
    // save page
    if ($this->getRequestParameter('page')) {
        $this->getUser()->setAttribute('page', $this->getRequestParameter('page'), 'sf_admin/auditiva');
    }
  }

public function executeAgregaauditiva1()
 {  
    $ord=(int)$this->getRequestParameter('orden');
    $cur=(int)$this->getRequestParameter('idrendida');
    $act=(int)$this->getRequestParameter('idactividad');
 
$mat='';

    $tvu=sfPropelFinder::from('Rendida')->
	where('Id','like',$cur)->
	find();
     foreach ($tvu as $cs2)
       {
       $alu = $cs2->getFkAlumnoId();
       $lla = $cs2->getFkLlamadaId();
       }
  $h1= sfPropelFinder::from('Alumno')->
	     where ('Id','like',$alu)->
	     find();
	 foreach ($h1 as $alu1)  
         {
         $alunom = $alu1->getNombre();
         $aluape= $alu1->getApellido();
         $nomape= $alunom." ".$aluape;
          } 

   $vu=sfPropelFinder::from('Detallerendir')->
	where('FkAlumnoId','like',$alu)->
	where('FkActividadId','like',$act)->
        where('FkDcursadaId','like',2 )->
         _or('FkDcursadaId','like', 4)->
         _or('FkDcursadaId','like', 5)->
         _or('FkDcursadaId','like', 8)->
         _or('FkDcursadaId','like', 9)->
	find();
     foreach ($vu as $cs1)
       {
       $mat = $cs1->getFkActividadId();
       $estado = $cs1->getFkActividadId();
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
                case 10:
                       $a=0;
                       $b=0;
                       $c=0;
                       $d=0; 
                       $fww1=sfPropelFinder::from('Detallerendir')->
 	               where('FkAlumnoId','like',$alu)->
                       find();
                       foreach ($fww1 as $cs41)
                          {
                          $idestado1 = $cs41->getFkDcursadaId();   
                          $actividad1 = $cs41->getFkActividadId();
                          $ord1 = $cs41->getOrden();
                         if ($ord1 == 1 && ($idestado1 == 2 || $idestado1 == 9 || $idestado1 == 4|| $idestado1 == 5 || $idestado1 == 8)) 
                            {
                               $c=1;
                            } 
                          }
                           if ($c==1)         
                            {
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
                               $mensaje= "Controlar Materias 1-Pedagogia General -Aprobada, "; 
                               return $this->redirect('bauditiva1a/list?idrendida='.$cur.'&msj='.$mensaje.'&ida='.$nomape);   
                            } 
                            else
                            {
                             if ($c==0)         
                               {
                               $mensaje= "Materia 1-Pedagogia General - No Aprobada"; 
                               return $this->redirect('bauditiva1a/list?idrendida='.$cur.'&msj='.$mensaje.'&ida='.$nomape);   
                               }

                            }
                            break;
                case 11:
                       $a=0;
                       $b=0;
                       $c=0;
                       $d=0; 
                       $fww1=sfPropelFinder::from('Detallerendir')->
 	               where('FkAlumnoId','like',$alu)->
                       find();
                       foreach ($fww1 as $cs41)
                          {
                          $idestado1 = $cs41->getFkDcursadaId();   
                          $actividad1 = $cs41->getFkActividadId();
                          $ord1 = $cs41->getOrden();
                         if ($ord1 == 5 &&  ($idestado1 == 2 || $idestado1 == 9 || $idestado1 == 4|| $idestado1 == 5 || $idestado1 == 8)) 
                            {
                               $c=1;
                            } 
                          }
                           if ($c==1)         
                            {
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
                               $mensaje= "Controlar Materias 5-Problematicas Contemporaneas de la Educacion Especial- Aprobada, "; 
                               return $this->redirect('bauditiva1a/list?idrendida='.$cur.'&msj='.$mensaje.'&ida='.$nomape);   
                            } 
                            else
                            {
                             if ($c==0)         
                               {
                               $mensaje= "Materia 5-Problematicas Contemporaneas de la Educacion Especial- No Aprobada"; 
                               return $this->redirect('bauditiva1a/list?idrendida='.$cur.'&msj='.$mensaje.'&ida='.$nomape);   
                               }

                            }
                            break;
                case 12:
                       $a=0;
                       $b=0;
                       $c=0;
                       $d=0; 
                       $fww1=sfPropelFinder::from('Detallerendir')->
 	               where('FkAlumnoId','like',$alu)->
                       find();
                       foreach ($fww1 as $cs41)
                          {
                          $idestado1 = $cs41->getFkDcursadaId();   
                          $actividad1 = $cs41->getFkActividadId();
                          $ord1 = $cs41->getOrden();
                         if ($ord1 == 5 &&  ($idestado1 == 2 || $idestado1 == 9 || $idestado1 == 4|| $idestado1 == 5 || $idestado1 == 8)) 
                            {
                               $c=1;
                            } 
                          }
                           if ($c==1)         
                            {
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
                               $mensaje= "Controlar Materias 5-Problematicas Contemporaneas de la Educacion Especial- Aprobada, "; 
                               return $this->redirect('bauditiva1a/list?idrendida='.$cur.'&msj='.$mensaje.'&ida='.$nomape);   
                            } 
                            else
                            {
                             if ($c==0)         
                               {
                               $mensaje= "Materia 5-Problematicas Contemporaneas de la Educacion Especial- No Aprobada"; 
                               return $this->redirect('bauditiva1a/list?idrendida='.$cur.'&msj='.$mensaje.'&ida='.$nomape);   
                               }

                            }
                            break;
                case 14:
                       $a=0;
                       $b=0;
                       $c=0;
                       $d=0; 
                       $fww1=sfPropelFinder::from('Detallerendir')->
 	               where('FkAlumnoId','like',$alu)->
                       find();
                       foreach ($fww1 as $cs41)
                          {
                          $idestado1 = $cs41->getFkDcursadaId();   
                          $actividad1 = $cs41->getFkActividadId();
                          $ord1 = $cs41->getOrden();
                         if ($ord1 == 6 &&  ($idestado1 == 2 || $idestado1 == 9 || $idestado1 == 4|| $idestado1 == 5 || $idestado1 == 8)) 
                            {
                               $c=1;
                            } 
                          }
                           if ($c==1)         
                            {
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
                               $mensaje= "Controlar Materias 6-El Sujeto de la Educacion Especial- Aprobada, "; 
                               return $this->redirect('bauditiva1a/list?idrendida='.$cur.'&msj='.$mensaje.'&ida='.$nomape);   
                            } 
                            else
                            {
                             if ($c==0)         
                               {
                               $mensaje= "Materia 6-El Sujeto de la Educacion Especial- No Aprobada"; 
                               return $this->redirect('bauditiva1a/list?idrendida='.$cur.'&msj='.$mensaje.'&ida='.$nomape);   
                               }

                            }
                            break;
                case 17:
                       $a=0;
                       $b=0;
                       $c=0;
                       $d=0; 
                       $fww1=sfPropelFinder::from('Detallerendir')->
 	               where('FkAlumnoId','like',$alu)->
                       find();
                       foreach ($fww1 as $cs41)
                          {
                          $idestado1 = $cs41->getFkDcursadaId();   
                          $actividad1 = $cs41->getFkActividadId();
                          $ord1 = $cs41->getOrden();
                         if ($ord1 == 1 &&  ($idestado1 == 2 || $idestado1 == 9 || $idestado1 == 4|| $idestado1 == 5 || $idestado1 == 8)) 
                            {
                               $c=1;
                            } 
                          }
                           if ($c==1)         
                            {
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
                               $mensaje= "Controlar Materias 1 -Pedagogia General-Aprobada, "; 
                               return $this->redirect('bauditiva1a/list?idrendida='.$cur.'&msj='.$mensaje.'&ida='.$nomape);   
                            } 
                            else
                            {
                             if ($c==0)         
                               {
                               $mensaje= "Materia 1-Pedagogia General- No Aprobada"; 
                               return $this->redirect('bauditiva1a/list?idrendida='.$cur.'&msj='.$mensaje.'&ida='.$nomape);   
                               }

                            }
                            break;
                case 18:
                       $a=0;
                       $b=0;
                       $c=0;
                       $d=0; 
                       $fww1=sfPropelFinder::from('Detallerendir')->
 	               where('FkAlumnoId','like',$alu)->
                       find();
                       foreach ($fww1 as $cs41)
                          {
                          $idestado1 = $cs41->getFkDcursadaId();   
                          $actividad1 = $cs41->getFkActividadId();
                          $ord1 = $cs41->getOrden();
                         if ($ord1 == 1 &&  ($idestado1 == 2 || $idestado1 == 9 || $idestado1 == 4|| $idestado1 == 5 || $idestado1 == 8)) 
                            {
                               $c=1;
                            } 
                          }
                           if ($c==1)         
                            {
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
                               $mensaje= "Controlar Materias 1-Pedagogia General- Aprobada, "; 
                               return $this->redirect('bauditiva1a/list?idrendida='.$cur.'&msj='.$mensaje.'&ida='.$nomape);   
                            } 
                            else
                            {
                             if ($c==0)         
                               {
                               $mensaje= "Materia 1-Pedagogia General- No Aprobada"; 
                               return $this->redirect('bauditiva1a/list?idrendida='.$cur.'&msj='.$mensaje.'&ida='.$nomape);   
                               }

                            }
                            break;
                case 20:
                       $a=0;
                       $b=0;
                       $c=0;
                       $d=0; 
                       $fww1=sfPropelFinder::from('Detallerendir')->
 	               where('FkAlumnoId','like',$alu)->
                       find();
                       foreach ($fww1 as $cs41)
                          {
                          $idestado1 = $cs41->getFkDcursadaId();   
                          $actividad1 = $cs41->getFkActividadId();
                          $ord1 = $cs41->getOrden();
                         if ($ord1 == 12 &&  ($idestado1 == 2 || $idestado1 == 9 || $idestado1 == 4|| $idestado1 == 5 || $idestado1 == 8)) 
                            {
                               $c=1;
                            } 
                          }
                           if ($c==1)         
                            {
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
                               $mensaje= "Controlar Materias 12-Sociologia de la Educacion- Aprobada, "; 
                               return $this->redirect('bauditiva1a/list?idrendida='.$cur.'&msj='.$mensaje.'&ida='.$nomape);   
                            } 
                            else
                            {
                             if ($c==0)         
                               {
                               $mensaje= "Materia 12-Sociologia de la Educacion- No Aprobada"; 
                               return $this->redirect('bauditiva1a/list?idrendida='.$cur.'&msj='.$mensaje.'&ida='.$nomape);   
                               }

                            }
                            break;
                case 22:
                       $a=0;
                       $b=0;
                       $c=0;
                       $d=0; 
                       $fww1=sfPropelFinder::from('Detallerendir')->
 	               where('FkAlumnoId','like',$alu)->
                       find();
                       foreach ($fww1 as $cs41)
                          {
                          $idestado1 = $cs41->getFkDcursadaId();   
                          $actividad1 = $cs41->getFkActividadId();
                          $ord1 = $cs41->getOrden();
                         if ($ord1 == 7 &&  ($idestado1 == 2 || $idestado1 == 9 || $idestado1 == 4|| $idestado1 == 5 || $idestado1 == 8)) 
                            {
                               $c=1;
                            } 
                         if ($ord1 == 16 &&  ($idestado1 == 2 || $idestado1 == 9 || $idestado1 == 4|| $idestado1 == 5 || $idestado1 == 8)) 
                            {
                               $a=1;
                            } 
                          }
                           if ($a==1 && $c==1)         
                            {
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
                               $mensaje= "Controlar Materias 7 -Bases Neuropsicobiologicas del Aprendizaje-y 16-Lengua de Señas I-Aprobadas, "; 
                               return $this->redirect('bauditiva1a/list?idrendida='.$cur.'&msj='.$mensaje.'&ida='.$nomape);   
                            } 
                            else
                            {
                             if ($a==0)         
                               {
                               $mensaje= "Materia 7-Bases Neuropsicobiologicas del Aprendizaje-No Aprobada"; 
                               return $this->redirect('bauditiva1a/list?idrendida='.$cur.'&msj='.$mensaje.'&ida='.$nomape);   
                               }
                             if ($c==0)         
                               {
                               $mensaje= "Materia 16-Lengua de Señas I- No Aprobada"; 
                               return $this->redirect('bauditiva1a/list?idrendida='.$cur.'&msj='.$mensaje.'&ida='.$nomape);   
                               }

                            }
                            break;
                case 24:
                       $a=0;
                       $b=0;
                       $c=0;
                       $d=0; 
                       $fww1=sfPropelFinder::from('Detallerendir')->
 	               where('FkAlumnoId','like',$alu)->
                       find();
                       foreach ($fww1 as $cs41)
                          {
                          $idestado1 = $cs41->getFkDcursadaId();   
                          $actividad1 = $cs41->getFkActividadId();
                          $ord1 = $cs41->getOrden();
                         if ($ord1 == 10 &&  ($idestado1 == 2 || $idestado1 == 9 || $idestado1 == 4|| $idestado1 == 5 || $idestado1 == 8)) 
                            {
                               $c=1;
                            } 
                          }
                           if ($c==1)         
                            {
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
                               $mensaje= "Controlar Materias 10-Didactica General - Aprobada, "; 
                               return $this->redirect('bauditiva1a/list?idrendida='.$cur.'&msj='.$mensaje.'&ida='.$nomape);   
                            } 
                            else
                            {
                             if ($c==0)         
                               {
                               $mensaje= "Materia 10-Didactica General -No Aprobada"; 
                               return $this->redirect('bauditiva1a/list?idrendida='.$cur.'&msj='.$mensaje.'&ida='.$nomape);   
                               }

                            }
                            break;
                case 25:
                       $a=0;
                       $b=0;
                       $c=0;
                       $d=0; 
                       $fww1=sfPropelFinder::from('Detallerendir')->
 	               where('FkAlumnoId','like',$alu)->
                       find();
                       foreach ($fww1 as $cs41)
                          {
                          $idestado1 = $cs41->getFkDcursadaId();   
                          $actividad1 = $cs41->getFkActividadId();
                          $ord1 = $cs41->getOrden();
                         if ($ord1 == 10 &&  ($idestado1 == 2 || $idestado1 == 9 || $idestado1 == 4|| $idestado1 == 5 || $idestado1 == 8)) 
                            {
                               $c=1;
                            } 
                          }
                           if ($c==1)         
                            {
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
                               $mensaje= "Controlar Materias 10-Didactica General - Aprobada, "; 
                               return $this->redirect('bauditiva1a/list?idrendida='.$cur.'&msj='.$mensaje.'&ida='.$nomape);   
                            } 
                            else
                            {
                             if ($c==0)         
                               {
                               $mensaje= "Materia 10-Didactica General -No Aprobada"; 
                               return $this->redirect('bauditiva1a/list?idrendida='.$cur.'&msj='.$mensaje.'&ida='.$nomape);   
                               }

                            }
                            break;
                case 26:
                       $a=0;
                       $b=0;
                       $c=0;
                       $d=0; 
                       $fww1=sfPropelFinder::from('Detallerendir')->
 	               where('FkAlumnoId','like',$alu)->
                       find();
                       foreach ($fww1 as $cs41)
                          {
                          $idestado1 = $cs41->getFkDcursadaId();   
                          $actividad1 = $cs41->getFkActividadId();
                          $ord1 = $cs41->getOrden();
                         if ($ord1 == 14 &&  ($idestado1 == 2 || $idestado1 == 9 || $idestado1 == 4|| $idestado1 == 5 || $idestado1 == 8)) 
                            {
                               $c=1;
                            } 
                          }
                           if ($c==1)         
                            {
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
                               $mensaje= "Controlar Materias 14-Abordajes Pedagogicos en Sujetos con Discapacida Auditiva I- Aprobada, "; 
                               return $this->redirect('bauditiva1a/list?idrendida='.$cur.'&msj='.$mensaje.'&ida='.$nomape);   
                            } 
                            else
                            {
                             if ($c==0)         
                               {
                               $mensaje= "Materia 14-Abordajes Pedagogicos en Sujetos con Discapacida Auditiva I-No Aprobada"; 
                               return $this->redirect('bauditiva1a/list?idrendida='.$cur.'&msj='.$mensaje.'&ida='.$nomape);   
                               }

                            }
                            break;
                case 33:
                       $a=0;
                       $b=0;
                       $c=0;
                       $d=0; 
                       $fww1=sfPropelFinder::from('Detallerendir')->
 	               where('FkAlumnoId','like',$alu)->
                       find();
                       foreach ($fww1 as $cs41)
                          {
                          $idestado1 = $cs41->getFkDcursadaId();   
                          $actividad1 = $cs41->getFkActividadId();
                          $ord1 = $cs41->getOrden();
                         if ($ord1 == 23 &&  ($idestado1 == 2 || $idestado1 == 9 || $idestado1 == 4|| $idestado1 == 5 || $idestado1 == 8)) 
                            {
                               $a=1;
                            } 
                         if ($ord1 == 28 &&  ($idestado1 == 2 || $idestado1 == 9 || $idestado1 == 4|| $idestado1 == 5 || $idestado1 == 8)) 
                            {
                               $b=1;
                            } 
                          }
                           if ($a==1 && $c==1)         
                            {
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
                               $mensaje= "Controlar Materias 23-Abordajes Pedagogicos II: Modelo Educativo Bilingue y su Didactica y 28-Abordaje Pedagogico II: Modelo Educativo Oral y su Didactica-Aprobada, "; 
                               return $this->redirect('bauditiva1a/list?idrendida='.$cur.'&msj='.$mensaje.'&ida='.$nomape);   
                            } 
                            else
                            {
                             if ($a==0)         
                               {
                               $mensaje= "Materia 23-Abordajes Pedagogicos II: Modelo Educativo Bilingue y su Didactica- No Aprobada"; 
                               return $this->redirect('bauditiva1a/list?idrendida='.$cur.'&msj='.$mensaje.'&ida='.$nomape);   
                               }
                             if ($b==0)         
                               {
                               $mensaje= "Materia 28-Abordaje Pedagogico II: Modelo Educativo Oral y su Didactica-No Aprobada"; 
                               return $this->redirect('bauditiva1a/list?idrendida='.$cur.'&msj='.$mensaje.'&ida='.$nomape);   
                               }
                            }
                            break;
                case 34:
                       $a=0;
                       $b=0;
                       $c=0;
                       $d=0; 
                       $fww1=sfPropelFinder::from('Detallerendir')->
 	               where('FkAlumnoId','like',$alu)->
                       find();
                       foreach ($fww1 as $cs41)
                          {
                          $idestado1 = $cs41->getFkDcursadaId();   
                          $actividad1 = $cs41->getFkActividadId();
                          $ord1 = $cs41->getOrden();
                         if ($ord1 == 23 &&  ($idestado1 == 2 || $idestado1 == 9 || $idestado1 == 4|| $idestado1 == 5 || $idestado1 == 8)) 
                            {
                               $a=1;
                            } 
                         if ($ord1 == 28 &&  ($idestado1 == 2 || $idestado1 == 9 || $idestado1 == 4|| $idestado1 == 5 || $idestado1 == 8)) 
                            {
                               $b=1;
                            } 
                          }
                           if ($a==1 && $c==1)         
                            {
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
                               $mensaje= "Controlar Materias 23-Abordajes Pedagogicos II: Modelo Educativo Bilingue y su Didactica y 28-Abordaje Pedagogico II: Modelo Educativo Oral y su Didactica-Aprobadas, "; 
                               return $this->redirect('bauditiva1a/list?idrendida='.$cur.'&msj='.$mensaje.'&ida='.$nomape);   
                            } 
                            else
                            {
                             if ($a==0)         
                               {
                               $mensaje= "Materia 23-Abordajes Pedagogicos II: Modelo Educativo Bilingue y su Didactica-No Aprobada"; 
                               return $this->redirect('bauditiva1a/list?idrendida='.$cur.'&msj='.$mensaje.'&ida='.$nomape);   
                               }
                             if ($b==0)         
                               {
                               $mensaje= "Materia 28-Abordaje Pedagogico II: Modelo Educativo Oral y su Didactica-No Aprobada"; 
                               return $this->redirect('bauditiva1a/list?idrendida='.$cur.'&msj='.$mensaje.'&ida='.$nomape);   
                               }
                            }
                            break;
                case 35:
                       $a=0;
                       $b=0;
                       $c=0;
                       $d=0; 
                       $fww1=sfPropelFinder::from('Detallerendir')->
 	               where('FkAlumnoId','like',$alu)->
                       find();
                       foreach ($fww1 as $cs41)
                          {
                          $idestado1 = $cs41->getFkDcursadaId();   
                          $actividad1 = $cs41->getFkActividadId();
                          $ord1 = $cs41->getOrden();
                         if ($ord1 == 23 &&  ($idestado1 == 2 || $idestado1 == 9 || $idestado1 == 4|| $idestado1 == 5 || $idestado1 == 8)) 
                            {
                               $a=1;
                            } 
                         if ($ord1 == 28 &&  ($idestado1 == 2 || $idestado1 == 9 || $idestado1 == 4|| $idestado1 == 5 || $idestado1 == 8)) 
                            {
                               $b=1;
                            } 
                          }
                           if ($a==1 && $c==1)         
                            {
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
                               $mensaje= "Controlar Materias 23-Abordajes Pedagogicos II: Modelo Educativo Bilingue y su Didactica y 28-Abordaje Pedagogico II: Modelo Educativo Oral y su Didactica-Aprobada, "; 
                               return $this->redirect('bauditiva1a/list?idrendida='.$cur.'&msj='.$mensaje.'&ida='.$nomape);   
                            } 
                            else
                            {
                             if ($a==0)         
                               {
                               $mensaje= "Materia 23-Abordajes Pedagogicos II: Modelo Educativo Bilingue y su Didactica-No Aprobada"; 
                               return $this->redirect('bauditiva1a/list?idrendida='.$cur.'&msj='.$mensaje.'&ida='.$nomape);   
                               }
                             if ($b==0)         
                               {
                               $mensaje= "Materia 28-Abordaje Pedagogico II: Modelo Educativo Oral y su Didactica-No Aprobada"; 
                               return $this->redirect('bauditiva1a/list?idrendida='.$cur.'&msj='.$mensaje.'&ida='.$nomape);   
                               }
                            }
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
                  return $this->redirect('bauditiva1a/list?idrendida='.$cur.'&msj='.$mensaje.'&ida='.$nomape);   
         }
         else
         {
           $mensaje= "Materia ya regularizada, de ser necesario ver otra rendida : ".$nommate; 
           return $this->redirect('bauditiva1a/list?idrendida='.$cur.'&msj='.$mensaje.'&ida='.$nomape);   
         }
 }

public function executeBorrarauditiva1()
 {  
   $cur=(int)$this->getRequestParameter('idrendida');
   $act=(int)$this->getRequestParameter('idactividad');
   $nom=(string)$this->getRequestParameter('ida');
      
   $va=sfPropelFinder::from('Detallerendir')->
	where('FkCursadaId','like',$cur)->
		where('FkActividadId','like',$act)->
	delete();
   return $this->redirect('bauditiva1a/list?idrendida='.$cur.'&ida='.$nom);

 }



}
