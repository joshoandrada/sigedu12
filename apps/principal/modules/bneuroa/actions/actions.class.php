<?php

/**
 * bneuroa actions.
 *
 * @package    alba
 * @subpackage bneuroa
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 5125 2007-09-16 00:53:55Z dwhittle $
 */
class bneuroaActions extends autobneuroaActions
{

 public function executeList($request)
  {
    $this->processSort();

    $this->processFilters();


    // pager
    $this->pager = new sfPropelPager('Neuro', 36);
    $c = new Criteria();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', $this->getUser()->getAttribute('page', 1, 'sf_admin/neuro')));
    $this->pager->init();
    // save page
    if ($this->getRequestParameter('page')) {
        $this->getUser()->setAttribute('page', $this->getRequestParameter('page'), 'sf_admin/neuro');
    }
  }


public function executeAgreganeuro()
 {  
    $ord=(int)$this->getRequestParameter('orden');
    $cur=(int)$this->getRequestParameter('idcursada');
    $act=(int)$this->getRequestParameter('idactividad');
   

$mat='';
    $tvu=sfPropelFinder::from('Cursada')->
	where('Id','like',$cur)->
	find();
     foreach ($tvu as $cs2)
       {
       $alu = $cs2->getFkAlumnoId();
       }
       
$aaa=$alu;

   $vu=sfPropelFinder::from('Detallecursada')->
	where('FkAlumnoId','like',$alu)->
	where('FkActividadId','like',$act)->
        where('FkDcursadaId','like',1 )->
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
                       $fww=sfPropelFinder::from('Detallecursada')->
 	               where('FkAlumnoId','like',$alu)->
                       find();
                       foreach ($fww as $cs4)
                          {
                          $idestado = $cs4->getFkDcursadaId();   
                          $actividad = $cs4->getFkActividadId();
                          $ord = $cs4->getOrden();
                         if ($ord == 1 && ($idestado == 1 || $idestado == 4|| $idestado == 5 || $idestado == 8)) 
                            {
                               $a=1;
                            }
                         if ($ord == 5 && ($idestado == 1 || $idestado == 4|| $idestado == 5 || $idestado == 8)) 
                            {
                               $b=1;
                            }  
                           }

                           if ($a==1 && $b==1)         
                            {
                               $est="Sin Estado"; 
                               $var1= new Detallecursada();
                               $var1->setFkActividadId($act);
                               $var1->setFkCursadaId($cur);
                               $var1->setFkDcursadaId(6);
                               $var1->setFkAlumnoId($alu);
                               $var1->setEstado($est);
                               $var1->setOrden($ordenmate);
                               $var1->setResult(0);
                               $var1->save();
                               $mensaje= "Controlar Materias 1 y 5 Regularizadas, "; 
                               return $this->redirect('bneuroa/list?idcursada='.$cur.'&msj='.$mensaje.'&idal='.$aaa);   
                            } 
                            else
                            {
                             if ($a==0)         
                               {
                               $mensaje= "Materia 1 No Regularizada"; 
                               return $this->redirect('bneuroa/list?idcursada='.$cur.'&msj='.$mensaje.'&idal='.$aaa);   
                              }
                             if ($b==0)         
                               {
                               $mensaje= "Materia 5 No Regularizada"; 
                               return $this->redirect('bneuroa/list?idcursada='.$cur.'&msj='.$mensaje.'&idal='.$aaa);   
                               }

                            }
                            break;
                case 11:
                       $a=0;
                       $b=0;
                       $c=0;
                       $d=0; 
                       $fww=sfPropelFinder::from('Detallecursada')->
 	               where('FkAlumnoId','like',$alu)->
                       find();
                       foreach ($fww as $cs4)
                          {
                          $idestado = $cs4->getFkDcursadaId();   
                          $actividad = $cs4->getFkActividadId();
                          $ord = $cs4->getOrden();
                         if ($ord == 1 && ($idestado == 1 || $idestado == 4|| $idestado == 5 || $idestado == 8)) 
                            {
                               $a=1;
                            }
                         if ($ord == 5 && ($idestado == 1 || $idestado == 4|| $idestado == 5 || $idestado == 8)) 
                            {
                               $b=1;
                            }  
                           }
                           if ($a==1 && $b==1)         
                            {
                               $est="Sin Estado"; 
                               $var1= new Detallecursada();
                               $var1->setFkActividadId($act);
                               $var1->setFkCursadaId($cur);
                               $var1->setFkDcursadaId(6);
                               $var1->setFkAlumnoId($alu);
                               $var1->setEstado($est);
                               $var1->setOrden($ordenmate);
                               $var1->setResult(0);
                               $var1->save();
                               $mensaje= "Controlar Materias 1 y 5 Regularizadas, "; 
                               return $this->redirect('bneuroa/list?idcursada='.$cur.'&msj='.$mensaje.'&idal='.$aaa);   
                            } 
                            else
                            {
                             if ($a==0)         
                               {
                               $mensaje= "Materia 1 No Regularizada"; 
                               return $this->redirect('bneuroa/list?idcursada='.$cur.'&msj='.$mensaje.'&idal='.$aaa);   
                              }
                             if ($b==0)         
                               {
                               $mensaje= "Materia 5 No Regularizada"; 
                               return $this->redirect('bneuroa/list?idcursada='.$cur.'&msj='.$mensaje.'&idal='.$aaa);   
                               }

                            }
                            break;
                case 12:
                       $a=0;
                       $b=0;
                       $c=0;
                       $d=0; 
                       $fww=sfPropelFinder::from('Detallecursada')->
 	               where('FkAlumnoId','like',$alu)->
                       find();
                       foreach ($fww as $cs4)
                          {
                          $idestado = $cs4->getFkDcursadaId();   
                          $actividad = $cs4->getFkActividadId();
                          $ord = $cs4->getOrden();
                         if ($ord == 1 && ($idestado == 1 || $idestado == 4|| $idestado == 5 || $idestado == 8)) 
                            {
                               $a=1;
                            }
                         if ($ord == 5 && ($idestado == 1 || $idestado == 4|| $idestado == 5 || $idestado == 8)) 
                            {
                               $b=1;
                            }  
                           }
                           if ($a==1 && $b==1)         
                            {
                               $est="Sin Estado"; 
                               $var1= new Detallecursada();
                               $var1->setFkActividadId($act);
                               $var1->setFkCursadaId($cur);
                               $var1->setFkDcursadaId(6);
                               $var1->setFkAlumnoId($alu);
                               $var1->setEstado($est);
                               $var1->setOrden($ordenmate);
                               $var1->setResult(0);
                               $var1->save();
                               $mensaje= "Controlar Materias 1 y 5 Regularizadas, "; 
                               return $this->redirect('bneuroa/list?idcursada='.$cur.'&msj='.$mensaje.'&idal='.$aaa);   
                            } 
                            else
                            {
                             if ($a==0)         
                               {
                               $mensaje= "Materia 1 No Regularizada"; 
                               return $this->redirect('bneuroa/list?idcursada='.$cur.'&msj='.$mensaje.'&idal='.$aaa);   
                              }
                             if ($b==0)         
                               {
                               $mensaje= "Materia 5 No Regularizada"; 
                               return $this->redirect('bneuroa/list?idcursada='.$cur.'&msj='.$mensaje.'&idal='.$aaa);   
                               }

                            }
                            break;
                case 14:
                       $a=0;
                       $b=0;
                       $c=0;
                       $d=0; 
                       $fww=sfPropelFinder::from('Detallecursada')->
 	               where('FkAlumnoId','like',$alu)->
                       find();
                       foreach ($fww as $cs4)
                          {
                          $idestado = $cs4->getFkDcursadaId();   
                          $actividad = $cs4->getFkActividadId();
                          $ord = $cs4->getOrden();
                         if ($ord == 5 && ($idestado == 1 || $idestado == 4|| $idestado == 5 || $idestado == 8)) 
                            {
                               $a=1;
                            }
                         if ($ord == 6 && ($idestado == 1 || $idestado == 4|| $idestado == 5 || $idestado == 8)) 
                            {
                               $b=1;
                            }
                         if ($ord == 1 && ($idestado == 4|| $idestado == 5 || $idestado == 8)) 
                            {
                               $c=1;
                            }

                           }
                       $fww1=sfPropelFinder::from('Detallerendir')->
 	               where('FkAlumnoId','like',$alu)->
                       find();
                       foreach ($fww1 as $cs41)
                          {
                          $idestado1 = $cs41->getFkDcursadaId();   
                          $actividad1 = $cs41->getFkActividadId();
                          $ord1 = $cs41->getOrden();
                         if ($ord1 == 1 &&  ($idestado1 == 2 || $idestado1 == 9 || $idestado1 == 10 || $idestado1 == 4|| $idestado1 == 5 || $idestado1 == 8)) 
                            {
                               $c=1;
                            } 
                          }


                           if ($a==1 && $b==1 && $c==1)         
                            {
                               $est="Sin Estado"; 
                               $var1= new Detallecursada();
                               $var1->setFkActividadId($act);
                               $var1->setFkCursadaId($cur);
                               $var1->setFkDcursadaId(6);
                               $var1->setFkAlumnoId($alu);
                               $var1->setEstado($est);
                               $var1->setOrden($ordenmate);
                               $var1->setResult(0);
                               $var1->save();
                               $mensaje= "Controlar Materias 5,6 Regularizadas y 1 Aprobada, "; 
                               return $this->redirect('bneuroa/list?idcursada='.$cur.'&msj='.$mensaje.'&idal='.$aaa);   
                            } 
                            else
                            {
                             if ($a==0)         
                               {
                               $mensaje= "Materia 5 No Regularizada"; 
                               return $this->redirect('bneuroa/list?idcursada='.$cur.'&msj='.$mensaje.'&idal='.$aaa);   
                              }
                             if ($b==0)         
                               {
                               $mensaje= "Materia 6 No Regularizada"; 
                               return $this->redirect('bneuroa/list?idcursada='.$cur.'&msj='.$mensaje.'&idal='.$aaa);   
                               }
                             if ($c==0)         
                               {
                               $mensaje= "Materia 1 No Aprobada"; 
                               return $this->redirect('bneuroa/list?idcursada='.$cur.'&msj='.$mensaje.'&idal='.$aaa);   
                               }

                            }
                            break;
                case 15:
                       $a=0;
                       $b=0;
                       $c=0;
                       $d=0; 
                       $fww=sfPropelFinder::from('Detallecursada')->
 	               where('FkAlumnoId','like',$alu)->
                       find();
                       foreach ($fww as $cs4)
                          {
                          $idestado = $cs4->getFkDcursadaId();   
                          $actividad = $cs4->getFkActividadId();
                          $ord = $cs4->getOrden();
                         if ($ord == 7 && ($idestado == 1 || $idestado == 4|| $idestado == 5 || $idestado == 8)) 
                            {
                               $a=1;
                            }
                           }
                           if ($a==1)         
                            {
                               $est="Sin Estado"; 
                               $var1= new Detallecursada();
                               $var1->setFkActividadId($act);
                               $var1->setFkCursadaId($cur);
                               $var1->setFkDcursadaId(6);
                               $var1->setFkAlumnoId($alu);
                               $var1->setEstado($est);
                               $var1->setOrden($ordenmate);
                               $var1->setResult(0);
                               $var1->save();
                               $mensaje= "Controlar Materia 1 Regularizadas, "; 
                               return $this->redirect('bneuroa/list?idcursada='.$cur.'&msj='.$mensaje.'&idal='.$aaa);   
                            } 
                            else
                            {
                             if ($a==0)         
                               {
                               $mensaje= "Materia 1 No Regularizada"; 
                               return $this->redirect('bneuroa/list?idcursada='.$cur.'&msj='.$mensaje.'&idal='.$aaa);   
                              }

                            }
                            break;
                case 16:
                       $a=0;
                       $b=0;
                       $c=0;
                       $d=0; 
                       $fww=sfPropelFinder::from('Detallecursada')->
 	               where('FkAlumnoId','like',$alu)->
                       find();
                       foreach ($fww as $cs4)
                          {
                          $idestado = $cs4->getFkDcursadaId();   
                          $actividad = $cs4->getFkActividadId();
                          $ord = $cs4->getOrden();
                         if ($ord == 7 && ($idestado == 1 || $idestado == 4|| $idestado == 5 || $idestado == 8)) 
                            {
                               $a=1;
                            }
                         if ($ord == 6 && ($idestado == 1 || $idestado == 4|| $idestado == 5 || $idestado == 8)) 
                            {
                               $b=1;
                            } 
                         if ($ord == 4 && ($idestado == 4|| $idestado == 5 || $idestado == 8)) 
                            {
                               $c=1;
                            } 

                           }
                       $fww1=sfPropelFinder::from('Detallerendir')->
 	               where('FkAlumnoId','like',$alu)->
                       find();
                       foreach ($fww1 as $cs41)
                          {
                          $idestado1 = $cs41->getFkDcursadaId();   
                          $actividad1 = $cs41->getFkActividadId();
                          $ord1 = $cs41->getOrden();
                         if ($ord1 == 4 &&  ($idestado1 == 2 || $idestado1 == 9 || $idestado1 == 10 || $idestado1 == 4|| $idestado1 == 5 || $idestado1 == 8)) 
                            {
                               $c=1;
                            } 
                          }


                           if ($a==1 && $b==1 && $c==1)         
                            {
                               $est="Sin Estado"; 
                               $var1= new Detallecursada();
                               $var1->setFkActividadId($act);
                               $var1->setFkCursadaId($cur);
                               $var1->setFkDcursadaId(6);
                               $var1->setFkAlumnoId($alu);
                               $var1->setEstado($est);
                               $var1->setOrden($ordenmate);
                               $var1->setResult(0);
                               $var1->save();
                               $mensaje= "Controlar Materias 6 y 7 Regularizadas y 4 Aprobada, "; 
                               return $this->redirect('bneuroa/list?idcursada='.$cur.'&msj='.$mensaje.'&idal='.$aaa);   
                            } 
                            else
                            {
                             if ($a==0)         
                               {
                               $mensaje= "Materia 7 No Regularizada"; 
                               return $this->redirect('bneuroa/list?idcursada='.$cur.'&msj='.$mensaje.'&idal='.$aaa);   
                              }
                             if ($b==0)         
                               {
                               $mensaje= "Materia 6 No Regularizada"; 
                               return $this->redirect('bneuroa/list?idcursada='.$cur.'&msj='.$mensaje.'&idal='.$aaa);   
                              }

                             if ($c==0)         
                               {
                               $mensaje= "Materia 4 No Aprobada"; 
                               return $this->redirect('bneuroa/list?idcursada='.$cur.'&msj='.$mensaje.'&idal='.$aaa);   
                               }

                            }
                            break;
                case 17:
                       $a=0;
                       $b=0;
                       $c=0;
                       $d=0; 
                       $fww=sfPropelFinder::from('Detallecursada')->
 	               where('FkAlumnoId','like',$alu)->
                       find();
                       foreach ($fww as $cs4)
                          {
                          $idestado = $cs4->getFkDcursadaId();   
                          $actividad = $cs4->getFkActividadId();
                          $ord = $cs4->getOrden();
                         if ($ord == 7 && ($idestado == 1 || $idestado == 4|| $idestado == 5 || $idestado == 8)) 
                            {
                               $a=1;
                            }
                         if ($ord == 8 && ($idestado == 1 || $idestado == 4|| $idestado == 5 || $idestado == 8)) 
                            {
                               $b=1;
                            }
                           }
                           if ($a==1 && $b==1)         
                            {
                               $est="Sin Estado"; 
                               $var1= new Detallecursada();
                               $var1->setFkActividadId($act);
                               $var1->setFkCursadaId($cur);
                               $var1->setFkDcursadaId(6);
                               $var1->setFkAlumnoId($alu);
                               $var1->setEstado($est);
                               $var1->setOrden($ordenmate);
                               $var1->setResult(0);
                               $var1->save();
                               $mensaje= "Controlar Materia 7 y 8 Regularizadas, "; 
                               return $this->redirect('bneuroa/list?idcursada='.$cur.'&msj='.$mensaje.'&idal='.$aaa);   
                            } 
                            else
                            {
                             if ($a==0)         
                               {
                               $mensaje= "Materia 7 No Regularizada"; 
                               return $this->redirect('bneuroa/list?idcursada='.$cur.'&msj='.$mensaje.'&idal='.$aaa);   
                              }
                             if ($b==0)         
                               {
                               $mensaje= "Materia 8 No Regularizada"; 
                               return $this->redirect('bneuroa/list?idcursada='.$cur.'&msj='.$mensaje.'&idal='.$aaa);   
                              }

                            }
                            break;
                case 18:
                       $a=0;
                       $b=0;
                       $c=0;
                       $d=0; 
                       $fww=sfPropelFinder::from('Detallecursada')->
 	               where('FkAlumnoId','like',$alu)->
                       find();
                       foreach ($fww as $cs4)
                          {
                          $idestado = $cs4->getFkDcursadaId();   
                          $actividad = $cs4->getFkActividadId();
                          $ord = $cs4->getOrden();
                         if ($ord == 1 && ($idestado == 1 || $idestado == 4|| $idestado == 5 || $idestado == 8)) 
                            {
                               $a=1;
                            }
                           }
                           if ($a==1)          
                            {
                               $est="Sin Estado"; 
                               $var1= new Detallecursada();
                               $var1->setFkActividadId($act);
                               $var1->setFkCursadaId($cur);
                               $var1->setFkDcursadaId(6);
                               $var1->setFkAlumnoId($alu);
                               $var1->setEstado($est);
                               $var1->setOrden($ordenmate);
                               $var1->setResult(0);
                               $var1->save();
                               $mensaje= "Controlar Materia 1 Regularizadas, "; 
                               return $this->redirect('bneuroa/list?idcursada='.$cur.'&msj='.$mensaje.'&idal='.$aaa);   
                            } 
                            else
                            {
                             if ($a==0)         
                               {
                               $mensaje= "Materia 1 No Regularizada"; 
                               return $this->redirect('bneuroa/list?idcursada='.$cur.'&msj='.$mensaje.'&idal='.$aaa);   
                              }
                            }
                            break;

                case 19:
                       $a=0;
                       $b=0;
                       $c=0;
                       $d=0; 
                       $fww=sfPropelFinder::from('Detallecursada')->
 	               where('FkAlumnoId','like',$alu)->
                       find();
                       foreach ($fww as $cs4)
                          {
                          $idestado = $cs4->getFkDcursadaId();   
                          $actividad = $cs4->getFkActividadId();
                          $ord = $cs4->getOrden();
                         if ($ord == 1 && ($idestado == 1 || $idestado == 4|| $idestado == 5 || $idestado == 8)) 
                            {
                               $a=1;
                            }
                         if ($ord == 3 && ($idestado == 4|| $idestado == 5 || $idestado == 8)) 
                            {
                               $b=1;
                            }
                          }
                       $fww1=sfPropelFinder::from('Detallerendir')->
 	               where('FkAlumnoId','like',$alu)->
                       find();
                       foreach ($fww1 as $cs41)
                          {
                          $idestado1 = $cs41->getFkDcursadaId();   
                          $actividad1 = $cs41->getFkActividadId();
                          $ord1 = $cs41->getOrden();
                         if ($ord1 == 3 &&  ($idestado1 == 2 || $idestado1 == 9 || $idestado1 == 10 || $idestado1 == 4|| $idestado1 == 5 || $idestado1 == 8)) 
                            {
                               $b=1;
                            } 
                          }


                           if ($a==1 && $b==1)         
                            {
                               $est="Sin Estado"; 
                               $var1= new Detallecursada();
                               $var1->setFkActividadId($act);
                               $var1->setFkCursadaId($cur);
                               $var1->setFkDcursadaId(6);
                               $var1->setFkAlumnoId($alu);
                               $var1->setEstado($est);
                               $var1->setOrden($ordenmate);
                               $var1->setResult(0);
                               $var1->save();
                               $mensaje= "Controlar Materias 1 Regularizadas y 3 Aprobada, "; 
                               return $this->redirect('bneuroa/list?idcursada='.$cur.'&msj='.$mensaje.'&idal='.$aaa);   
                            } 
                            else
                            {
                             if ($a==0)         
                               {
                               $mensaje= "Materia 1 No Regularizada"; 
                               return $this->redirect('bneuroa/list?idcursada='.$cur.'&msj='.$mensaje.'&idal='.$aaa);   
                              }
                             if ($b==0)         
                               {
                               $mensaje= "Materia 3 No Aprobada"; 
                               return $this->redirect('bneuroa/list?idcursada='.$cur.'&msj='.$mensaje.'&idal='.$aaa);   
                               }
                            }
                            break;
                case 20:
                       $a=0;
                       $b=0;
                       $c=0;
                       $d=0;
                       $e=0; 
                       $fww=sfPropelFinder::from('Detallecursada')->
 	               where('FkAlumnoId','like',$alu)->
                       find();
                       foreach ($fww as $cs4)
                          {
                          $idestado = $cs4->getFkDcursadaId();   
                          $actividad = $cs4->getFkActividadId();
                          $ord = $cs4->getOrden();
                         if ($ord == 1 && ($idestado == 1 || $idestado == 4|| $idestado == 5 || $idestado == 8)) 
                            {
                               $a=1;
                            }
                         if ($ord == 5 && ($idestado == 1 || $idestado == 4|| $idestado == 5 || $idestado == 8)) 
                            {
                               $b=1;
                            }
                         if ($ord == 6 && ($idestado == 1 || $idestado == 8)) 
                            {
                               $e=1;
                            }

                         if ($ord == 9 && ($idestado == 4|| $idestado == 5 || $idestado == 8)) 
                            {
                               $c=1;
                            }

                           }
                       $fww1=sfPropelFinder::from('Detallerendir')->
 	               where('FkAlumnoId','like',$alu)->
                       find();
                       foreach ($fww1 as $cs41)
                          {
                          $idestado1 = $cs41->getFkDcursadaId();   
                          $actividad1 = $cs41->getFkActividadId();
                          $ord1 = $cs41->getOrden();
                         if ($ord1 == 9 &&  ($idestado1 == 2 || $idestado1 == 9 || $idestado1 == 10 || $idestado1 == 4|| $idestado1 == 5 || $idestado1 == 8)) 
                            {
                               $c=1;
                            } 
                          }


                           if ($a==1 && $b==1 && $c==1 && $e==1)         
                            {
                               $est="Sin Estado"; 
                               $var1= new Detallecursada();
                               $var1->setFkActividadId($act);
                               $var1->setFkCursadaId($cur);
                               $var1->setFkDcursadaId(6);
                               $var1->setFkAlumnoId($alu);
                               $var1->setEstado($est);
                               $var1->setOrden($ordenmate);
                               $var1->setResult(0);
                               $var1->save();
                               $mensaje= "Controlar Materias 1 y 5 Regularizadas y 9 Aprobada, "; 
                               return $this->redirect('bneuroa/list?idcursada='.$cur.'&msj='.$mensaje.'&idal='.$aaa);   
                            } 
                            
                            break;
                case 21:
                       $a=0;
                       $b=0;
                       $c=0;
                       $d=0;
                       $fww=sfPropelFinder::from('Detallecursada')->
 	               where('FkAlumnoId','like',$alu)->
                       find();
                       foreach ($fww as $cs4)
                          {
                          $idestado = $cs4->getFkDcursadaId();   
                          $actividad = $cs4->getFkActividadId();
                          $ord = $cs4->getOrden();
                         if ($ord == 12 && ($idestado == 1 || $idestado == 4|| $idestado == 5 || $idestado == 8)) 
                            {
                               $a=1;
                            }
                         if ($ord == 1 && ($idestado == 4|| $idestado == 5 || $idestado == 8)) 
                            {
                               $b=1;
                            }
                           }
                       $fww1=sfPropelFinder::from('Detallerendir')->
 	               where('FkAlumnoId','like',$alu)->
                       find();
                       foreach ($fww1 as $cs41)
                          {
                          $idestado1 = $cs41->getFkDcursadaId();   
                          $actividad1 = $cs41->getFkActividadId();
                          $ord1 = $cs41->getOrden();
                         if ($ord1 == 1 &&  ($idestado1 == 2 || $idestado1 == 9 )) 
                            {
                               $b=1;
                            } 
                          
                            if ($ord1 == 12 &&  ($idestado1 == 2 || $idestado1 == 9 || $idestado1 == 10 )) 
                            {
                               $a=1;
                            } 
                          }


                           if ($a==1 && $b==1)         
                            {
                               $est="Sin Estado"; 
                               $var1= new Detallecursada();
                               $var1->setFkActividadId($act);
                               $var1->setFkCursadaId($cur);
                               $var1->setFkDcursadaId(6);
                               $var1->setFkAlumnoId($alu);
                               $var1->setEstado($est);
                               $var1->setOrden($ordenmate);
                               $var1->setResult(0);
                               $var1->save();
                               $mensaje= "Controlar Materias 12 Regularizada, "; 
                               return $this->redirect('bneuroa/list?idcursada='.$cur.'&msj='.$mensaje.'&idal='.$aaa);   
                            } 
                            else
                            {
                             if ($a==0)         
                               {
                               $mensaje= "Materia 12 No Regularizada"; 
                               return $this->redirect('bneuroa/list?idcursada='.$cur.'&msj='.$mensaje.'&idal='.$aaa);   
                               }
                             if ($b==0)         
                               {
                               $mensaje= "Materia 12 No Aprobada"; 
                               return $this->redirect('bneuroa/list?idcursada='.$cur.'&msj='.$mensaje.'&idal='.$aaa);   
                               }

                            }
                            break;
                case 22:
                       $a=0;
                       $fww=sfPropelFinder::from('Detallecursada')->
                 where('FkAlumnoId','like',$alu)->
                       find();
                       foreach ($fww as $cs4)
                          {
                          $idestado = $cs4->getFkDcursadaId();   
                          $actividad = $cs4->getFkActividadId();
                          $ord = $cs4->getOrden();
                         if ($ord == 12 && ($idestado == 4|| $idestado == 5 || $idestado == 8)) 
                            {
                               $a=1;
                            }
                          }
                       $fww1=sfPropelFinder::from('Detallerendir')->
 	               where('FkAlumnoId','like',$alu)->
                       find();
                       foreach ($fww1 as $cs41)
                          {
                          $idestado1 = $cs41->getFkDcursadaId();   
                          $actividad1 = $cs41->getFkActividadId();
                          $ord1 = $cs41->getOrden();
                         if ($ord1 == 12 &&  ($idestado1 == 2 || $idestado1 == 9 || $idestado1 == 10 || $idestado1 == 4|| $idestado1 == 5 || $idestado1 == 8)) 
                            {
                               $a=1;
                            } 
                          }
                           if ($a==1)         
                            {
                               $est="Sin Estado"; 
                               $var1= new Detallecursada();
                               $var1->setFkActividadId($act);
                               $var1->setFkCursadaId($cur);
                               $var1->setFkDcursadaId(6);
                               $var1->setFkAlumnoId($alu);
                               $var1->setEstado($est);
                               $var1->setOrden($ordenmate);
                               $var1->setResult(0);
                               $var1->save();
                               $mensaje= "Controlar Materia 12 Aprobada, "; 
                               return $this->redirect('bneuroa/list?idcursada='.$cur.'&msj='.$mensaje.'&idal='.$aaa);   
                            } 
                            else
                            {
                             if ($a==0)         
                               {
                               $mensaje= "Materia 12 No Aprobada"; 
                               return $this->redirect('bneuroa/list?idcursada='.$cur.'&msj='.$mensaje.'&idal='.$aaa);   
                              }
                            }
                            break;

                case 23:
                       $a=0;
                       $b=0;
                       $c=0;
                       $d=0; 
                       $fww=sfPropelFinder::from('Detallecursada')->
 	               where('FkAlumnoId','like',$alu)->
                       find();
                       foreach ($fww as $cs4)
                          {
                          $idestado = $cs4->getFkDcursadaId();   
                          $actividad = $cs4->getFkActividadId();
                          $ord = $cs4->getOrden();
                         if ($ord == 5 && ($idestado == 1 || $idestado == 4|| $idestado == 5 || $idestado == 8)) 
                            {
                               $a=1;
                            }
                         if ($ord == 6 && ($idestado == 1 || $idestado == 4|| $idestado == 5 || $idestado == 8)) 
                            {
                               $b=1;
                            }  
                           }
                           if ($a==1 && $b==1)         
                            {
                               $est="Sin Estado"; 
                               $var1= new Detallecursada();
                               $var1->setFkActividadId($act);
                               $var1->setFkCursadaId($cur);
                               $var1->setFkDcursadaId(6);
                               $var1->setFkAlumnoId($alu);
                               $var1->setEstado($est);
                               $var1->setOrden($ordenmate);
                               $var1->setResult(0);
                               $var1->save();
                               $mensaje= "Controlar Materias 5 y 6 Regularizadas, "; 
                               return $this->redirect('bneuroa/list?idcursada='.$cur.'&msj='.$mensaje.'&idal='.$aaa);   
                            } 
                            else
                            {
                             if ($a==0)         
                               {
                               $mensaje= "Materia 5 No Regularizada"; 
                               return $this->redirect('bneuroa/list?idcursada='.$cur.'&msj='.$mensaje.'&idal='.$aaa);   
                              }
                             if ($b==0)         
                               {
                               $mensaje= "Materia 6 No Regularizada"; 
                               return $this->redirect('bneuroa/list?idcursada='.$cur.'&msj='.$mensaje.'&idal='.$aaa);   
                               }

                            }
                            break;
                case 24:
                       $a=0;
                       $b=0;
                       $c=0;
                       $d=0; 
                       $fww=sfPropelFinder::from('Detallecursada')->
 	               where('FkAlumnoId','like',$alu)->
                       find();
                       foreach ($fww as $cs4)
                          {
                          $idestado = $cs4->getFkDcursadaId();   
                          $actividad = $cs4->getFkActividadId();
                          $ord = $cs4->getOrden();
                         if ($ord == 10 && ($idestado == 1 || $idestado == 4|| $idestado == 5 || $idestado == 8)) 
                            {
                               $a=1;
                            }
                         if ($ord == 14 && ($idestado == 1 || $idestado == 4|| $idestado == 5 || $idestado == 8)) 
                            {
                               $b=1;
                            }  
                           }
                           if ($a==1 && $b==1)         
                            {
                               $est="Sin Estado"; 
                               $var1= new Detallecursada();
                               $var1->setFkActividadId($act);
                               $var1->setFkCursadaId($cur);
                               $var1->setFkDcursadaId(6);
                               $var1->setFkAlumnoId($alu);
                               $var1->setEstado($est);
                               $var1->setOrden($ordenmate);
                               $var1->setResult(0);
                               $var1->save();
                               $mensaje= "Controlar Materias 10 y 14 Regularizadas, "; 
                               return $this->redirect('bneuroa/list?idcursada='.$cur.'&msj='.$mensaje.'&idal='.$aaa);   
                            } 
                            else
                            {
                             if ($a==0)         
                               {
                               $mensaje= "Materia 10 No Regularizada"; 
                               return $this->redirect('bneuroa/list?idcursada='.$cur.'&msj='.$mensaje.'&idal='.$aaa);   
                              }
                             if ($b==0)         
                               {
                               $mensaje= "Materia 14 No Regularizada"; 
                               return $this->redirect('bneuroa/list?idcursada='.$cur.'&msj='.$mensaje.'&idal='.$aaa);   
                               }

                            }
                            break;
                case 25:
                       $a=0;
                       $b=0;
                       $c=0;
                       $d=0; 
                       $fww=sfPropelFinder::from('Detallecursada')->
 	               where('FkAlumnoId','like',$alu)->
                       find();
                       foreach ($fww as $cs4)
                          {
                          $idestado = $cs4->getFkDcursadaId();   
                          $actividad = $cs4->getFkActividadId();
                          $ord = $cs4->getOrden();
                         if ($ord == 14 && ($idestado == 1 || $idestado == 4|| $idestado == 5 || $idestado == 8)) 
                            {
                               $a=1;
                            }
                         if ($ord == 10 && ($idestado == 1 || $idestado == 4|| $idestado == 5 || $idestado == 8)) 
                            {
                               $b=1;
                            }  
                           }
                           if ($a==1 && $b==1)         
                            {
                               $est="Sin Estado"; 
                               $var1= new Detallecursada();
                               $var1->setFkActividadId($act);
                               $var1->setFkCursadaId($cur);
                               $var1->setFkDcursadaId(6);
                               $var1->setFkAlumnoId($alu);
                               $var1->setEstado($est);
                               $var1->setOrden($ordenmate);
                               $var1->setResult(0);
                               $var1->save();
                               $mensaje= "Controlar Materias 10 y 14 Regularizadas "; 
                               return $this->redirect('bneuroa/list?idcursada='.$cur.'&msj='.$mensaje.'&idal='.$aaa);   
                            } 
                            else
                            {
                             if ($a==0)         
                               {
                               $mensaje= "Materia 14 No Regularizada"; 
                               return $this->redirect('bneuroa/list?idcursada='.$cur.'&msj='.$mensaje.'&idal='.$aaa);   
                              }
                             if ($b==0)         
                               {
                               $mensaje= "Materia 10 No Regularizada"; 
                               return $this->redirect('bneuroa/list?idcursada='.$cur.'&msj='.$mensaje.'&idal='.$aaa);   
                               }
                            }
                            break;

/////////////////////////////////////
                case 26:
                       $a=0;
                       $b=0;
                       $c=0;
                       $d=0; 
                       $fww=sfPropelFinder::from('Detallecursada')->
 	               where('FkAlumnoId','like',$alu)->
                       find();
                       foreach ($fww as $cs4)
                          {
                          $idestado = $cs4->getFkDcursadaId();   
                          $actividad = $cs4->getFkActividadId();
                          $ord = $cs4->getOrden();
                         if ($ord == 14 && ($idestado == 1 || $idestado == 4|| $idestado == 5 || $idestado == 8)) 
                            {
                               $a=1;
                            }
                          }
                       $fww1=sfPropelFinder::from('Detallerendir')->
 	               where('FkAlumnoId','like',$alu)->
                       find();
                       foreach ($fww1 as $cs41)
                          {
                          $idestado1 = $cs41->getFkDcursadaId();   
                          $actividad1 = $cs41->getFkActividadId();
                          $ord1 = $cs41->getOrden();
                         if ($ord1 == 16 &&  ($idestado1 == 2 || $idestado1 == 9 || $idestado1 == 10 || $idestado1 == 4|| $idestado1 == 5 || $idestado1 == 8)) 
                            {
                               $b=1;
                            } 
                          }


                           if ($a==1 && $b==1)         
                            {
                               $est="Sin Estado"; 
                               $var1= new Detallecursada();
                               $var1->setFkActividadId($act);
                               $var1->setFkCursadaId($cur);
                               $var1->setFkDcursadaId(6);
                               $var1->setFkAlumnoId($alu);
                               $var1->setEstado($est);
                               $var1->setOrden($ordenmate);
                               $var1->setResult(0);
                               $var1->save();
                               $mensaje= "Controlar Materias 14 Regularizadas y 16 Aprobada, "; 
                               return $this->redirect('bneuroa/list?idcursada='.$cur.'&msj='.$mensaje.'&idal='.$aaa);   
                            } 
                            else
                            {
                             if ($a==0)         
                               {
                               $mensaje= "Materia 14 No Regularizada"; 
                               return $this->redirect('bneuroa/list?idcursada='.$cur.'&msj='.$mensaje.'&idal='.$aaa);   
                              }
                             if ($b==0)         
                               {
                               $mensaje= "Materia 16 No Aprobada"; 
                               return $this->redirect('bneuroa/list?idcursada='.$cur.'&msj='.$mensaje.'&idal='.$aaa);   
                               }
                            }
                            break;
                case 28:
                       $a=0;
                       $b=0;
                       $c=0;
                       $d=0; 
                       $fww=sfPropelFinder::from('Detallecursada')->
 	               where('FkAlumnoId','like',$alu)->
                       find();
                       foreach ($fww as $cs4)
                          {
                          $idestado = $cs4->getFkDcursadaId();   
                          $actividad = $cs4->getFkActividadId();
                          $ord = $cs4->getOrden();
                         if ($ord == 14 && ($idestado == 1 || $idestado == 4|| $idestado == 5 || $idestado == 8)) 
                            {
                               $a=1;
                            }
                         if ($ord == 2 && ($idestado == 4|| $idestado == 5 || $idestado == 8)) 
                            {
                               $b=1;
                            }
                          }
                       $fww1=sfPropelFinder::from('Detallerendir')->
 	               where('FkAlumnoId','like',$alu)->
                       find();
                       foreach ($fww1 as $cs41)
                          {
                          $idestado1 = $cs41->getFkDcursadaId();   
                          $actividad1 = $cs41->getFkActividadId();
                          $ord1 = $cs41->getOrden();
                         if ($ord1 == 2 &&  ($idestado1 == 2 || $idestado1 == 9 || $idestado1 == 10 || $idestado1 == 4|| $idestado1 == 5 || $idestado1 == 8)) 
                            {
                               $b=1;
                            } 
                          }


                           if ($a==1 && $b==1)         
                            {
                               $est="Sin Estado"; 
                               $var1= new Detallecursada();
                               $var1->setFkActividadId($act);
                               $var1->setFkCursadaId($cur);
                               $var1->setFkDcursadaId(6);
                               $var1->setFkAlumnoId($alu);
                               $var1->setEstado($est);
                               $var1->setOrden($ordenmate);
                               $var1->setResult(0);
                               $var1->save();
                               $mensaje= "Controlar Materias 14 Regularizadas y 2 Aprobada, "; 
                               return $this->redirect('bneuroa/list?idcursada='.$cur.'&msj='.$mensaje.'&idal='.$aaa);   
                            } 
                            else
                            {
                             if ($a==0)         
                               {
                               $mensaje= "Materia 14 No Regularizada"; 
                               return $this->redirect('bneuroa/list?idcursada='.$cur.'&msj='.$mensaje.'&idal='.$aaa);   
                              }
                             if ($b==0)         
                               {
                               $mensaje= "Materia 2 No Aprobada"; 
                               return $this->redirect('bneuroa/list?idcursada='.$cur.'&msj='.$mensaje.'&idal='.$aaa);   
                               }
                            }
                            break;
                case 29:
                       $a=0;
                       $b=0;
                       $c=0;
                       $d=0; 
                       $fww=sfPropelFinder::from('Detallecursada')->
 	               where('FkAlumnoId','like',$alu)->
                       find();
                       foreach ($fww as $cs4)
                          {
                          $idestado = $cs4->getFkDcursadaId();   
                          $actividad = $cs4->getFkActividadId();
                          $ord = $cs4->getOrden();
                         if ($ord == 10 && ($idestado == 1 || $idestado == 4|| $idestado == 5 || $idestado == 8)) 
                            {
                               $a=1;
                            }
                         if ($ord == 14 && ($idestado == 1 || $idestado == 4|| $idestado == 5 || $idestado == 8)) 
                            {
                               $b=1;
                            }  
                         if ($ord == 20 && ($idestado == 4|| $idestado == 5 || $idestado == 8)) 
                            {
                               $c=1;
                            }  
                           }
                       $fww1=sfPropelFinder::from('Detallerendir')->
 	               where('FkAlumnoId','like',$alu)->
                       find();
                       foreach ($fww1 as $cs41)
                          {
                          $idestado1 = $cs41->getFkDcursadaId();   
                          $actividad1 = $cs41->getFkActividadId();
                          $ord1 = $cs41->getOrden();
                         if ($ord1 == 20 &&  ($idestado1 == 2 || $idestado1 == 9 || $idestado1 == 10 || $idestado1 == 4|| $idestado1 == 5 || $idestado1 == 8)) 
                            {
                               $c=1;
                            } 
                          }


                           if ($a==1 && $b==1 && $c==1)         
                            {
                               $est="Sin Estado"; 
                               $var1= new Detallecursada();
                               $var1->setFkActividadId($act);
                               $var1->setFkCursadaId($cur);
                               $var1->setFkDcursadaId(6);
                               $var1->setFkAlumnoId($alu);
                               $var1->setEstado($est);
                               $var1->setOrden($ordenmate);
                               $var1->setResult(0);
                               $var1->save();
                               $mensaje= "Controlar Materias 10,14 Regularizadas y 20 Aprobada, "; 
                               return $this->redirect('bneuroa/list?idcursada='.$cur.'&msj='.$mensaje.'&idal='.$aaa);   
                            } 
                            else
                            {
                             if ($a==0)         
                               {
                               $mensaje= "Materia 10 No Regularizada"; 
                               return $this->redirect('bneuroa/list?idcursada='.$cur.'&msj='.$mensaje.'&idal='.$aaa);   
                              }
                             if ($b==0)         
                               {
                               $mensaje= "Materia 14 No Regularizada"; 
                               return $this->redirect('bneuroa/list?idcursada='.$cur.'&msj='.$mensaje.'&idal='.$aaa);   
                               }
                             if ($c==0)         
                               {
                               $mensaje= "Materia 20 No Aprobada"; 
                               return $this->redirect('bneuroa/list?idcursada='.$cur.'&msj='.$mensaje.'&idal='.$aaa);   
                               }

                            }
                            break;
                case 30:
                       $a=0;
                       $b=0;
                       $c=0;
                       $d=0; 
                       $fww=sfPropelFinder::from('Detallecursada')->
 	               where('FkAlumnoId','like',$alu)->
                       find();
                       foreach ($fww as $cs4)
                          {
                          $idestado = $cs4->getFkDcursadaId();   
                          $actividad = $cs4->getFkActividadId();
                          $ord = $cs4->getOrden();
                         if ($ord == 21 && ($idestado == 1 || $idestado == 4|| $idestado == 5 || $idestado == 8)) 
                            {
                               $a=1;
                            }
                         if ($ord == 12 && ($idestado == 4|| $idestado == 5 || $idestado == 8)) 
                            {
                               $c=1;
                            }

                           }
                       $fww1=sfPropelFinder::from('Detallerendir')->
 	               where('FkAlumnoId','like',$alu)->
                       find();
                       foreach ($fww1 as $cs41)
                          {
                          $idestado1 = $cs41->getFkDcursadaId();   
                          $actividad1 = $cs41->getFkActividadId();
                          $ord1 = $cs41->getOrden();
                         if ($ord1 == 12 &&  ($idestado1 == 2 || $idestado1 == 9 || $idestado1 == 10 || $idestado1 == 4|| $idestado1 == 5 || $idestado1 == 8)) 
                            {
                               $c=1;
                            } 
                          }


                           if ($a==1 && $c==1)         
                            {
                               $est="Sin Estado"; 
                               $var1= new Detallecursada();
                               $var1->setFkActividadId($act);
                               $var1->setFkCursadaId($cur);
                               $var1->setFkDcursadaId(6);
                               $var1->setFkAlumnoId($alu);
                               $var1->setEstado($est);
                               $var1->setOrden($ordenmate);
                               $var1->setResult(0);
                               $var1->save();
                               $mensaje= "Controlar Materias 21 Regularizadas y 12 Aprobada, "; 
                               return $this->redirect('bneuroa/list?idcursada='.$cur.'&msj='.$mensaje.'&idal='.$aaa);   
                            } 
                            else
                            {
                             if ($a==0)         
                               {
                               $mensaje= "Materia 21 No Regularizada"; 
                               return $this->redirect('bneuroa/list?idcursada='.$cur.'&msj='.$mensaje.'&idal='.$aaa);   
                              }
                             if ($c==0)         
                               {
                               $mensaje= "Materia 12 No Aprobada"; 
                               return $this->redirect('bneuroa/list?idcursada='.$cur.'&msj='.$mensaje.'&idal='.$aaa);   
                               }
                            }
                            break;

                case 32:
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
                         if ($ord1 == 14 &&  ($idestado1 == 2 || $idestado1 == 9 || $idestado1 == 10 || $idestado1 == 4|| $idestado1 == 5 || $idestado1 == 8)) 
                            {
                               $a=1;
                            } 
                          }
                           if ($a==1)         
                            {
                               $est="Sin Estado"; 
                               $var1= new Detallecursada();
                               $var1->setFkActividadId($act);
                               $var1->setFkCursadaId($cur);
                               $var1->setFkDcursadaId(6);
                               $var1->setFkAlumnoId($alu);
                               $var1->setEstado($est);
                               $var1->setOrden($ordenmate);
                               $var1->setResult(0);
                               $var1->save();
                               $mensaje= "Controlar Materia 14 Aprobada, "; 
                               return $this->redirect('bneuroa/list?idcursada='.$cur.'&msj='.$mensaje.'&idal='.$aaa);   
                            } 
                            else
                            {
                             if ($a==0)         
                               {
                               $mensaje= "Materia 14 No Aprobada"; 
                               return $this->redirect('bneuroa/list?idcursada='.$cur.'&msj='.$mensaje.'&idal='.$aaa);   
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
                         if ($ord1 == 14 &&  ($idestado1 == 2 || $idestado1 == 9 || $idestado1 == 10 || $idestado1 == 4|| $idestado1 == 5 || $idestado1 == 8)) 
                            {
                               $a=1;
                            } 
                          }
                           if ($a==1)         
                            {
                               $est="Sin Estado"; 
                               $var1= new Detallecursada();
                               $var1->setFkActividadId($act);
                               $var1->setFkCursadaId($cur);
                               $var1->setFkDcursadaId(6);
                               $var1->setFkAlumnoId($alu);
                               $var1->setEstado($est);
                               $var1->setOrden($ordenmate);
                               $var1->setResult(0);
                               $var1->save();
                               $mensaje= "Controlar Materia 14 Aprobada, "; 
                               return $this->redirect('bneuroa/list?idcursada='.$cur.'&msj='.$mensaje.'&idal='.$aaa);   
                            } 
                            else
                            {
                             if ($a==0)         
                               {
                               $mensaje= "Materia 14 No Aprobada"; 
                               return $this->redirect('bneuroa/list?idcursada='.$cur.'&msj='.$mensaje.'&idal='.$aaa);   
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
                         if ($ord1 == 14 &&  ($idestado1 == 2 || $idestado1 == 9 || $idestado1 == 10 || $idestado1 == 4|| $idestado1 == 5 || $idestado1 == 8)) 
                            {
                               $a=1;
                            } 
                          }
                           if ($a==1)         
                            {
                               $est="Sin Estado"; 
                               $var1= new Detallecursada();
                               $var1->setFkActividadId($act);
                               $var1->setFkCursadaId($cur);
                               $var1->setFkDcursadaId(6);
                               $var1->setFkAlumnoId($alu);
                               $var1->setEstado($est);
                               $var1->setOrden($ordenmate);
                               $var1->setResult(0);
                               $var1->save();
                               $mensaje= "Controlar Materia 14 Aprobada, "; 
                               return $this->redirect('bneuroa/list?idcursada='.$cur.'&msj='.$mensaje.'&idal='.$aaa);   
                            } 
                            else
                            {
                             if ($a==0)         
                               {
                               $mensaje= "Materia 14 No Aprobada"; 
                               return $this->redirect('bneuroa/list?idcursada='.$cur.'&msj='.$mensaje.'&idal='.$aaa);   
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
                         if ($ord1 == 14 &&  ($idestado1 == 2 || $idestado1 == 9 || $idestado1 == 10 || $idestado1 == 4|| $idestado1 == 5 || $idestado1 == 8)) 
                            {
                               $a=1;
                            } 
                          }
                           if ($a==1)         
                            {
                               $est="Sin Estado"; 
                               $var1= new Detallecursada();
                               $var1->setFkActividadId($act);
                               $var1->setFkCursadaId($cur);
                               $var1->setFkDcursadaId(6);
                               $var1->setFkAlumnoId($alu);
                               $var1->setEstado($est);
                               $var1->setOrden($ordenmate);
                               $var1->setResult(0);
                               $var1->save();
                               $mensaje= "Controlar Materia 14 Aprobada, "; 
                               return $this->redirect('bneuroa/list?idcursada='.$cur.'&msj='.$mensaje.'&idal='.$aaa);   
                            } 
                            else
                            {
                             if ($a==0)         
                               {
                               $mensaje= "Materia 14 No Aprobada"; 
                               return $this->redirect('bneuroa/list?idcursada='.$cur.'&msj='.$mensaje.'&idal='.$aaa);   
                              }
                            }
                            break;
                case 36:
                       $a=0;
                       $b=0;
                       $c=0;
                       $d=0; 
                       $e=0;
                       $f=0;

                       $fww=sfPropelFinder::from('Detallecursada')->
 	               where('FkAlumnoId','like',$alu)->
                       find();
                       foreach ($fww as $cs4)
                          {
                          $idestado = $cs4->getFkDcursadaId();   
                          $actividad = $cs4->getFkActividadId();
                          $ord = $cs4->getOrden();
                         if ($ord == 24 && ($idestado == 1 || $idestado == 4|| $idestado == 5 || $idestado == 8)) 
                            {
                               $a=1;
                            }
                         if ($ord == 25 && ($idestado == 1 || $idestado == 4|| $idestado == 5 || $idestado == 8)) 
                            {
                               $b=1;
                            }
                         if ($ord == 29 && ($idestado == 4|| $idestado == 5 || $idestado == 8)) 
                            {
                               $f=1;
                            }
                           }
                       $fww1=sfPropelFinder::from('Detallerendir')->
 	               where('FkAlumnoId','like',$alu)->
                       find();
                       foreach ($fww1 as $cs41)
                          {
                          $idestado1 = $cs41->getFkDcursadaId();   
                          $actividad1 = $cs41->getFkActividadId();
                          $ord1 = $cs41->getOrden();
                         if ($ord1 == 14 &&  ($idestado1 == 2 || $idestado1 == 9 || $idestado1 == 10 || $idestado1 == 4|| $idestado1 == 5 || $idestado1 == 8)) 
                            {
                               $c=1;
                            } 
                         if ($ord1 == 18 &&  ($idestado1 == 2 || $idestado1 == 9 || $idestado1 == 10 || $idestado1 == 4|| $idestado1 == 5 || $idestado1 == 8)) 
                            {
                               $d=1;
                            } 
                         if ($ord1 == 19 &&  ($idestado1 == 2 || $idestado1 == 9 || $idestado1 == 10 || $idestado1 == 4|| $idestado1 == 5 || $idestado1 == 8)) 
                            {
                               $e=1;
                            } 
                         if ($ord1 == 29 &&  ($idestado1 == 2 || $idestado1 == 9 || $idestado1 == 10 || $idestado1 == 4|| $idestado1 == 5 || $idestado1 == 8)) 
                            {
                               $f=1;
                            } 
                          }


                           if ($a==1 && $b==1 && $c==1 && $d==1 && $e==1 && $f==1)         
                            {
                               $est="Sin Estado"; 
                               $var1= new Detallecursada();
                               $var1->setFkActividadId($act);
                               $var1->setFkCursadaId($cur);
                               $var1->setFkDcursadaId(6);
                               $var1->setFkAlumnoId($alu);
                               $var1->setEstado($est);
                               $var1->setOrden($ordenmate);
                               $var1->setResult(0);
                               $var1->save();
                               $mensaje= "Controlar Materias 24,25 Regularizadas y 14,18,19,29 Aprobada, "; 
                               return $this->redirect('bneuroa/list?idcursada='.$cur.'&msj='.$mensaje.'&idal='.$aaa);   
                            } 
                            else
                            {
                             if ($a==0)         
                               {
                               $mensaje= "Materia 24 No Regularizada"; 
                               return $this->redirect('bneuroa/list?idcursada='.$cur.'&msj='.$mensaje.'&idal='.$aaa);   
                              }
                             if ($b==0)         
                               {
                               $mensaje= "Materia 25 No Regularizada"; 
                               return $this->redirect('bneuroa/list?idcursada='.$cur.'&msj='.$mensaje.'&idal='.$aaa);   
                               }
                             if ($c==0)         
                               {
                               $mensaje= "Materia 14 No Aprobada"; 
                               return $this->redirect('bneuroa/list?idcursada='.$cur.'&msj='.$mensaje.'&idal='.$aaa);   
                               }
                             if ($d==0)         
                               {
                               $mensaje= "Materia 18 No Aprobada"; 
                               return $this->redirect('bneuroa/list?idcursada='.$cur.'&msj='.$mensaje.'&idal='.$aaa);   
                               }
                             if ($e==0)         
                               {
                               $mensaje= "Materia 19 No Aprobada"; 
                               return $this->redirect('bneuroa/list?idcursada='.$cur.'&msj='.$mensaje.'&idal='.$aaa);   
                               }
                             if ($f==0)         
                               {
                               $mensaje= "Materia 29 No Aprobada"; 
                               return $this->redirect('bneuroa/list?idcursada='.$cur.'&msj='.$mensaje.'&idal='.$aaa);   
                               }
                            }
                            break;

                            }
                  $est="Sin Estado"; 
                  $var1= new Detallecursada();
                  $var1->setFkActividadId($act);
                  $var1->setFkCursadaId($cur);
                  $var1->setFkDcursadaId(6);
                  $var1->setFkAlumnoId($alu);
                  $var1->setEstado($est);
                  $var1->setOrden($ordenmate);
                  $var1->setResult(0);
                  $var1->save();
                  $mensaje= "Materia nueva, ".$nommate; 
                  return $this->redirect('bneuroa/list?idcursada='.$cur.'&msj='.$mensaje.'&idal='.$aaa);   

         }
         else
         {
           $mensaje= "Materia ya regularizada, de ser necesario ver otra cursada : ".$nommate; 
           return $this->redirect('bneuroa/list?idcursada='.$cur.'&msj='.$mensaje.'&idal='.$aaa);   
         }

 }



public function executeBorrarneuro()
 {  
   $cur=(int)$this->getRequestParameter('idcursada');
   $act=(int)$this->getRequestParameter('idactividad');

  $va1=sfPropelFinder::from('Detallecursada')->
  where('FkCursadaId','like',$cur)->
  where('FkActividadId','like',$act)->
  find();
   foreach ($va1 as $s44)
      {
        $alu=$s44->getFkAlumnoId();
      }


   $va=sfPropelFinder::from('Detallecursada')->
	where('FkCursadaId','like',$cur)->
		where('FkActividadId','like',$act)->
	delete();
   return $this->redirect('bneuroa/list?idcursada='.$cur.'&idal='.$alu);

 }


 public function executeNota()
 {  
   $cur=(int)$this->getRequestParameter('idcursada');
   $act=(int)$this->getRequestParameter('idactividad');
   $can=(int)$this->getRequestParameter('nota');
   $iii=(int)$this->getRequestParameter('idal');

    	$va=sfPropelFinder::from('Detallecursada')->
        where('FkCursadaId', 'like', $cur)->
		where('FkActividadId', 'like', $act)->
        find();  

     foreach ($va as $cs)
       {
	$cs->setResult($can);
        $cs->save();
       }

     return $this->redirect('bneuroa/list?idcursada='.$cur.'&idal='.$iii);
}

}
