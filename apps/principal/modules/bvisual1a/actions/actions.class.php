<?php

/**
 * bvisual1aa actions.
 *
 * @package    alba
 * @subpackage bvisual1aa
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 5125 2007-09-16 00:53:55Z dwhittle $
 */
class bvisual1aActions extends autobvisual1aActions
{

 public function executeList($request)
  {
    $this->processSort();

    $this->processFilters();


    // pager
    $this->pager = new sfPropelPager('Visual', 37);
    $c = new Criteria();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', $this->getUser()->getAttribute('page', 1, 'sf_admin/visual')));
    $this->pager->init();
    // save page
    if ($this->getRequestParameter('page')) {
        $this->getUser()->setAttribute('page', $this->getRequestParameter('page'), 'sf_admin/visual');
    }
  }
  
public function executeAgregavisual1()
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
         _or('FkDcursadaId','like', 10)->
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
                case 8:
                       $regu=0;
                      $fwa=sfPropelFinder::from('Detallecursada')->
                      where('FkAlumnoId','like',$alu)->
                      find();
                      foreach ($fwa as $c1)
                          {
                             $idestado1 = $c1->getFkDcursadaId();   
                             $actividad1 = $c1->getFkActividadId();
                             $ord1 = $c1->getOrden();
                             if ($ord1 == 8 && $idestado1 == 1) 
                                {
                                 $regu = 1;
                                }
                           }
                       $var1= new Detallerendir();
                       if ($regu == 1)         
                           {
                          $est="Sin Estado";
                          $var1->setFkDcursadaId(6);
                            }                              
                        else
                            {
                           $est="Libre";
                           $var1->setFkDcursadaId(8);
                            }                                        
                        $var1->setFkActividadId($act);
                        $var1->setFkCursadaId($cur);
                        $var1->setFkLlamadaId($lla);
                        $var1->setFkAlumnoId($alu);
                        $var1->setEstado($est);
                        $var1->setOrden($ordenmate);
                        $var1->setResult(0);
                        $var1->save();
                        $mensaje= "Controlar Materias 1-Pedagogia General-Aprobada, "; 
                        return $this->redirect('bneuro1a/list?idrendida='.$cur.'&ida='.$nomape);

                     break;
                case 2:
                      $regu=0;
                      $fwa=sfPropelFinder::from('Detallecursada')->
                      where('FkAlumnoId','like',$alu)->
                      find();
                      foreach ($fwa as $c1)
                          {
                             $idestado1 = $c1->getFkDcursadaId();   
                             $actividad1 = $c1->getFkActividadId();
                             $ord1 = $c1->getOrden();
                             if ($ord1 == 2 && $idestado1 == 1) 
                                {
                                 $regu = 1;
                                }
                           }
                       $var1= new Detallerendir();
                       if ($regu == 1)         
                           {
                          $est="Sin Estado";
                          $var1->setFkDcursadaId(6);
                            }                              
                        else
                            {
                           $est="Libre";
                           $var1->setFkDcursadaId(8);
                            }                                        
                        $var1->setFkActividadId($act);
                        $var1->setFkCursadaId($cur);
                        $var1->setFkLlamadaId($lla);
                        $var1->setFkAlumnoId($alu);
                        $var1->setEstado($est);
                        $var1->setOrden($ordenmate);
                        $var1->setResult(0);
                        $var1->save();
                        $mensaje= "Controlar Materias 1-Pedagogia General-Aprobada, "; 
                        return $this->redirect('bneuro1a/list?idrendida='.$cur.'&ida='.$nomape);
                    break;
                case 10:
                       $a=0;
                       $b=0;
                       $c=0;
                       $d=0;
                      $fwa=sfPropelFinder::from('Detallecursada')->
                      where('FkAlumnoId','like',$alu)->
                      find();
                      foreach ($fwa as $c1)
                          {
                             $idestado1 = $c1->getFkDcursadaId();   
                             $actividad1 = $c1->getFkActividadId();
                             $ord1 = $c1->getOrden();
                             if ($ord1 == 1 && ($idestado1 == 4 || $idestado1 == 5|| $idestado1 == 8)) 
                                {
                                 $c = 1;
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
                         if ($ord1 == 1 && $idestado1 == 2 ) 
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
                               $mensaje= "Controlar Materias 1-Pedagogia General-Aprobada, "; 
                               return $this->redirect('bvisual1a/list?idrendida='.$cur.'&msj='.$mensaje.'&ida='.$nomape);   
                            } 

                            break;
                case 11:
                       $a=0;
                       $b=0;
                       $c=0;
                       $d=0; 
                      $fwa=sfPropelFinder::from('Detallecursada')->
                      where('FkAlumnoId','like',$alu)->
                      find();
                      foreach ($fwa as $c1)
                          {
                             $idestado1 = $c1->getFkDcursadaId();   
                             $actividad1 = $c1->getFkActividadId();
                             $ord1 = $c1->getOrden();
                             if ($ord1 == 5 && ($idestado1 == 4 || $idestado1 == 5|| $idestado1 == 8)) 
                                {
                                 $c = 1;
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
                         if ($ord1 == 5 &&  $idestado1 == 2 ) 
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
                               $mensaje= "Controlar Materias 5-Problematicas Contemporaneas de la Educacion Especial-Aprobada, "; 
                               return $this->redirect('bvisual1a/list?idrendida='.$cur.'&msj='.$mensaje.'&ida='.$nomape);   
                            } 
                            break;
                case 12:
                       $a=0;
                       $b=0;
                       $c=0;
                       $d=0; 
                      $fwa=sfPropelFinder::from('Detallecursada')->
                      where('FkAlumnoId','like',$alu)->
                      find();
                      foreach ($fwa as $c1)
                          {
                             $idestado1 = $c1->getFkDcursadaId();   
                             $actividad1 = $c1->getFkActividadId();
                             $ord1 = $c1->getOrden();
                             if ($ord1 == 5 && ($idestado1 == 4 || $idestado1 == 5|| $idestado1 == 8)) 
                                {
                                 $c = 1;
                                }
                           }
                       $fww1=sfPropelFinder::from('Detallerendir')->
 	               where('FkAlumnoId','like',$alu)->
                       find();
                       foreach ($fww1 as $cs41)
                          {
                          $idestado = $cs41->getFkDcursadaId();   
                          $actividad = $cs41->getFkActividadId();
                          $ord = $cs41->getOrden();
                         if ($ord == 5 &&  $idestado == 2 ) 
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
                               $mensaje= "Controlar Materias 5-Problematicas Contemporaneas de la Educacion Especial-Aprobada, "; 
                               return $this->redirect('bvisual1a/list?idrendida='.$cur.'&msj='.$mensaje.'&ida='.$nomape);   
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
                         if ($ord1 == 6 &&  $idestado1 == 2 ) 
                            {
                               $c=1;
                            } 
                          }
                       $fwa=sfPropelFinder::from('Detallecursada')->
                      where('FkAlumnoId','like',$alu)->
                      find();
                      foreach ($fwa as $c1)
                          {
                             $idestado = $c1->getFkDcursadaId();   
                             $actividad = $c1->getFkActividadId();
                             $ord = $c1->getOrden();
                             if ($ord == 6 && $idestado == 8)
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
                               $mensaje= "Controlar Materias 6-El Sujeto de la Educacion Especial-Aprobada, "; 
                               return $this->redirect('bvisual1a/list?idrendida='.$cur.'&msj='.$mensaje.'&ida='.$nomape);   
                            } 
                            else
                            {
                             if ($c==0)         
                               {
                               $mensaje= "Materia 6-El Sujeto de la Educacion Especial-No Aprobada"; 
                               return $this->redirect('bvisual1a/list?idrendida='.$cur.'&msj='.$mensaje.'&ida='.$nomape);   
                               }

                            }
                            break;
                case 16:
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
                         if ($ord1 == 1 &&  $idestado1 == 2 ) 
                            {
                               $c=1;
                            } 
                           }
                        $fwa=sfPropelFinder::from('Detallecursada')->
                      where('FkAlumnoId','like',$alu)->
                      find();
                      foreach ($fwa as $c1)
                          {
                             $idestado = $c1->getFkDcursadaId();   
                             $actividad = $c1->getFkActividadId();
                             $ord = $c1->getOrden();
                             if ($ord == 1 && ($idestado == 4|| $idestado == 5  || $idestado == 8))
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
                               $mensaje= "Controlar Materias 1-Pedagogia General-Aprobada, "; 
                               return $this->redirect('bvisual1a/list?idrendida='.$cur.'&msj='.$mensaje.'&ida='.$nomape);   
                            } 
                            else
                            {
                             if ($c==0)         
                               {
                               $mensaje= "Materia 1-Pedagogia General-No Aprobada"; 
                               return $this->redirect('bvisual1a/list?idrendida='.$cur.'&msj='.$mensaje.'&ida='.$nomape);   
                               }

                            }
                            break;
                case 19:
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
                         if ($ord1 == 7 &&  $idestado1 == 2 ) 
                            {
                               $c=1;
                            } 
                          }
                        $fwa=sfPropelFinder::from('Detallecursada')->
                      where('FkAlumnoId','like',$alu)->
                      find();
                      foreach ($fwa as $c1)
                          {
                             $idestado = $c1->getFkDcursadaId();   
                             $actividad = $c1->getFkActividadId();
                             $ord = $c1->getOrden();
                             if ($ord == 7 && $idestado == 8)
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
                               $mensaje= "Controlar Materias 7-Bases Neuropsicobiologicas del Aprendizaje-Aprobada, "; 
                               return $this->redirect('bvisual1a/list?idrendida='.$cur.'&msj='.$mensaje.'&ida='.$nomape);   
                            } 
                            else
                            {
                             if ($c==0)         
                               {
                               $mensaje= "Materia 7-Bases Neuropsicobiologicas del Aprendizaje-No Aprobada"; 
                               return $this->redirect('bvisual1a/list?idrendida='.$cur.'&msj='.$mensaje.'&ida='.$nomape);   
                               }

                            }
                            break;
                case 21:
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
                         if ($ord1 == 12 &&  ($idestado1 == 2 || $idestado1 == 10)) 
                            {
                               $c=1;
                            } 
                          }
                      $fwa=sfPropelFinder::from('Detallecursada')->
                      where('FkAlumnoId','like',$alu)->
                      find();
                      foreach ($fwa as $c1)
                          {
                             $idestado = $c1->getFkDcursadaId();   
                             $actividad = $c1->getFkActividadId();
                             $ord = $c1->getOrden();
                             if ($ord == 12 && ($idestado == 4|| $idestado == 5  || $idestado == 8))
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
                               $mensaje= "Controlar Materias 12Sociologia de la Educacion-Aprobada, "; 
                               return $this->redirect('bvisual1a/list?idrendida='.$cur.'&msj='.$mensaje.'&ida='.$nomape);   
                            } 
                            else
                            {
                             if ($c==0)         
                               {
                               $mensaje= "Materia 12-Sociologia de la Educacion-No Aprobada"; 
                               return $this->redirect('bvisual1a/list?idrendida='.$cur.'&msj='.$mensaje.'&ida='.$nomape);   
                               }

                            }
                            break;
                case 23:
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
                         if ($ord1 == 10 && $idestado1 == 2 ) 
                            {
                               $c=1;
                            } 
                          }
                      $fwa=sfPropelFinder::from('Detallecursada')->
                      where('FkAlumnoId','like',$alu)->
                      find();
                      foreach ($fwa as $c1)
                          {
                             $idestado = $c1->getFkDcursadaId();   
                             $actividad = $c1->getFkActividadId();
                             $ord = $c1->getOrden();
                             if ($ord == 10 && $idestado == 8)
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
                               $mensaje= "Controlar Materias 10-Didactica General-Aprobada, "; 
                               return $this->redirect('bvisual1a/list?idrendida='.$cur.'&msj='.$mensaje.'&ida='.$nomape);   
                            } 
                            else
                            {
                             if ($c==0)         
                               {
                               $mensaje= "Materia 10-Didactica General-No Aprobada"; 
                               return $this->redirect('bvisual1a/list?idrendida='.$cur.'&msj='.$mensaje.'&ida='.$nomape);   
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
                         if ($ord1 == 10 && $idestado1 == 2 ) 
                            {
                               $c=1;
                            } 
                          }
                      $fwa=sfPropelFinder::from('Detallecursada')->
                      where('FkAlumnoId','like',$alu)->
                      find();
                      foreach ($fwa as $c1)
                          {
                             $idestado = $c1->getFkDcursadaId();   
                             $actividad = $c1->getFkActividadId();
                             $ord = $c1->getOrden();
                             if ($ord == 10 && $idestado == 8)
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
                               $mensaje= "Controlar Materias 10-Didactica General-Aprobada, "; 
                               return $this->redirect('bvisual1a/list?idrendida='.$cur.'&msj='.$mensaje.'&ida='.$nomape);   
                            } 
                            else
                            {
                             if ($c==0)         
                               {
                               $mensaje= "Materia 10-Didactica General-No Aprobada"; 
                               return $this->redirect('bvisual1a/list?idrendida='.$cur.'&msj='.$mensaje.'&ida='.$nomape);   
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
                         if ($ord1 == 10 && $idestado1 == 2 ) 
                            {
                               $c=1;
                            } 
                          }
                      $fwa=sfPropelFinder::from('Detallecursada')->
                      where('FkAlumnoId','like',$alu)->
                      find();
                      foreach ($fwa as $c1)
                          {
                             $idestado = $c1->getFkDcursadaId();   
                             $actividad = $c1->getFkActividadId();
                             $ord = $c1->getOrden();
                             if ($ord == 10 && $idestado == 8)
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
                               $mensaje= "Controlar Materias 10-Didactica General-Aprobada, "; 
                               return $this->redirect('bvisual1a/list?idrendida='.$cur.'&msj='.$mensaje.'&ida='.$nomape);   
                            } 
                            else
                            {
                             if ($c==0)         
                               {
                               $mensaje= "Materia 10-Didactica General-No Aprobada"; 
                               return $this->redirect('bvisual1a/list?idrendida='.$cur.'&msj='.$mensaje.'&ida='.$nomape);   
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
                         if ($ord1 == 10 && $idestado1 == 2 ) 
                            {
                               $c=1;
                            } 
                          }
                      $fwa=sfPropelFinder::from('Detallecursada')->
                      where('FkAlumnoId','like',$alu)->
                      find();
                      foreach ($fwa as $c1)
                          {
                             $idestado = $c1->getFkDcursadaId();   
                             $actividad = $c1->getFkActividadId();
                             $ord = $c1->getOrden();
                             if ($ord == 10 && $idestado == 8)
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
                               $mensaje= "Controlar Materias 10-Didactica General-Aprobada, "; 
                               return $this->redirect('bvisual1a/list?idrendida='.$cur.'&msj='.$mensaje.'&ida='.$nomape);   
                            } 
                            else
                            {
                             if ($c==0)         
                               {
                               $mensaje= "Materia 10-Didactica General-No Aprobada"; 
                               return $this->redirect('bvisual1a/list?idrendida='.$cur.'&msj='.$mensaje.'&ida='.$nomape);   
                               }

                            }
                            break;

                case 34:
                       $a=0;
                       $b=0;
                       $c=0;
                       $d=0; 
                      $fwa=sfPropelFinder::from('Detallecursada')->
                      where('FkAlumnoId','like',$alu)->
                      find();
                      foreach ($fwa as $c1)
                          {
                             $idestado = $c1->getFkDcursadaId();   
                             $actividad = $c1->getFkActividadId();
                             $ord = $c1->getOrden();
                             if ($ord == 29 && ($idestado == 4|| $idestado == 5  || $idestado == 8))
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
                               $mensaje= "Controlar Materias 29-Orientacion Movilidad y Habilidades de la Vida Diaria-Aprobada, "; 
                               return $this->redirect('bvisual1a/list?idrendida='.$cur.'&msj='.$mensaje.'&ida='.$nomape);   
                            } 
                            else
                            {
                             if ($c==0)         
                               {
                               $mensaje= "Materia 29-Orientacion Movilidad y Habilidades de la Vida Diaria-No Aprobada"; 
                               return $this->redirect('bvisual1a/list?idrendida='.$cur.'&msj='.$mensaje.'&ida='.$nomape);   
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
                  return $this->redirect('bvisual1a/list?idrendida='.$cur.'&msj='.$mensaje.'&ida='.$nomape);   
         }
         else
         {
           $mensaje= "Materia ya regularizada, de ser necesario ver otra rendida : ".$nommate; 
           return $this->redirect('bvisual1a/list?idrendida='.$cur.'&msj='.$mensaje.'&ida='.$nomape);   
         }
 }

public function executeBorrarvisual1()
 {  
   $cur=(int)$this->getRequestParameter('idrendida');
   $act=(int)$this->getRequestParameter('idactividad');
     $nom=(string)$this->getRequestParameter('ida');
  
   $va=sfPropelFinder::from('Detallerendir')->
	where('FkCursadaId','like',$cur)->
		where('FkActividadId','like',$act)->
	delete();
   return $this->redirect('bvisual1a/list?idrendida='.$cur.'&ida='.$nom);

 }

}
