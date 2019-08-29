<?php

/**
 * bcomun actions.
 *
 * @package    alba
 * @subpackage bcomun
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 5125 2007-09-16 00:53:55Z dwhittle $
 */
class bcomunActions extends autobcomunActions
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

public function executeAgregacomun()
 {  
    $ord=(int)$this->getRequestParameter('orden');
    $cur=(int)$this->getRequestParameter('idcursada');
    $act=(int)$this->getRequestParameter('idactividad');
 
$mat='';

   $vu=sfPropelFinder::from('Detallecursada')->
  where('FkCursadaId','like',$cur)->
    where('FkActividadId','like',$act)->
  find();
     foreach ($vu as $cs1)
       {
       $mat = $cs1->getFkActividadId();
       //$estado = $cs1->getFkActividadId();
       }

    $tvu=sfPropelFinder::from('Cursada')->
  where('Id','like',$cur)->
  find();
     foreach ($tvu as $cs2)
       {
       $alu = $cs2->getFkAlumnoId();
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
                    $var1= new Detallecursada();
                      $var1->setFkActividadId(66);
                          $var1->setFkCursadaId($cur);
                          $var1->setFkDcursadaId(6);
                          $var1->setFkAlumnoId($alu);
                          $var1->setEstado($est);
                          $var1->setOrden(8);
                          $var1->setResult(0);
                          $var1->save();

                          $uu1=sfPropelFinder::from('Detallerendir')->
                     where('FkAlumnoId','like',$alu)->
                    where('FkActividadId','like',211)->
                     find();
                          foreach ($uu1 as $uc1)
                              {
                              $uc1->setFkActividadId(59);
                              $uc1->save();
                              }

                          $uu2=sfPropelFinder::from('Detallerendir')->
                     where('FkAlumnoId','like',$alu)->
                    where('FkActividadId','like',212)->
                     find();
                          foreach ($uu2 as $uc2)
                              {
                              $uc2->setFkActividadId(60);
                              $uc2->save();
                              }

                          $uu3=sfPropelFinder::from('Detallerendir')->
                     where('FkAlumnoId','like',$alu)->
                    where('FkActividadId','like',213)->
                     find();
                          foreach ($uu3 as $uc3)
                              {
                              $uc3->setFkActividadId(61);
                              $uc3->save();
                              }

                          $uu4=sfPropelFinder::from('Detallerendir')->
                     where('FkAlumnoId','like',$alu)->
                    where('FkActividadId','like',214)->
                     find();
                          foreach ($uu4 as $uc4)
                              {
                              $uc4->setFkActividadId(62);
                              $uc4->save();
                              }

                          $uu5=sfPropelFinder::from('Detallerendir')->
                     where('FkAlumnoId','like',$alu)->
                    where('FkActividadId','like',215)->
                     find();
                          foreach ($uu5 as $uc5)
                              {
                              $uc5->setFkActividadId(63);
                              $uc5->save();
                              }

                          $uu6=sfPropelFinder::from('Detallerendir')->
                     where('FkAlumnoId','like',$alu)->
                    where('FkActividadId','like',216)->
                     find();
                          foreach ($uu6 as $uc6)
                              {
                              $uc6->setFkActividadId(64);
                              $uc6->save();
                              }
                           
                          $uu7=sfPropelFinder::from('Detallerendir')->
                     where('FkAlumnoId','like',$alu)->
                    where('FkActividadId','like',218)->
                     find();
                          foreach ($uu7 as $uc7)
                              {
                              $uc7->setFkActividadId(65);
                              $uc7->save();
                              }
                          $uu8=sfPropelFinder::from('Detallerendir')->
                     where('FkAlumnoId','like',$alu)->
                    where('FkActividadId','like',223)->
                     find();
                          foreach ($uu8 as $uc8)
                              {
                              $uc8->setFkActividadId(67);
                              $uc8->save();
                              }

                          $vu1=sfPropelFinder::from('Detallecursada')->
                     where('FkAlumnoId','like',$alu)->
                    where('FkActividadId','like',211)->
                     find();
                          foreach ($vu1 as $c1)
                              {
                              $c1->setFkActividadId(59);
                              $c1->save();
                              }

                          $vu2=sfPropelFinder::from('Detallecursada')->
                     where('FkAlumnoId','like',$alu)->
                    where('FkActividadId','like',212)->
                     find();
                          foreach ($vu2 as $c2)
                              {
                              $c2->setFkActividadId(60);
                              $c2->save();
                              }

                          $vu3=sfPropelFinder::from('Detallecursada')->
                     where('FkAlumnoId','like',$alu)->
                    where('FkActividadId','like',213)->
                     find();
                          foreach ($vu3 as $c3)
                              {
                              $c3->setFkActividadId(61);
                              $c3->save();
                              }

                          $vu4=sfPropelFinder::from('Detallecursada')->
                     where('FkAlumnoId','like',$alu)->
                    where('FkActividadId','like',214)->
                     find();
                          foreach ($vu4 as $c4)
                              {
                              $c4->setFkActividadId(62);
                              $c4->save();
                              }

                          $vu5=sfPropelFinder::from('Detallecursada')->
                     where('FkAlumnoId','like',$alu)->
                    where('FkActividadId','like',215)->
                     find();
                          foreach ($vu5 as $c5)
                              {
                              $c5->setFkActividadId(63);
                              $c5->save();
                              }

                          $vu6=sfPropelFinder::from('Detallecursada')->
                     where('FkAlumnoId','like',$alu)->
                    where('FkActividadId','like',216)->
                     find();
                          foreach ($vu6 as $c6)
                              {
                              $c6->setFkActividadId(64);
                              $c6->save();
                              }
                           
                          $vu7=sfPropelFinder::from('Detallecursada')->
                     where('FkAlumnoId','like',$alu)->
                    where('FkActividadId','like',218)->
                     find();
                          foreach ($vu7 as $c7)
                              {
                              $c7->setFkActividadId(65);
                              $c7->save();
                              }

                          $vu8=sfPropelFinder::from('Detallecursada')->
                     where('FkAlumnoId','like',$alu)->
                    where('FkActividadId','like',223)->
                     find();
                          foreach ($vu8 as $c8)
                              {
                              $c8->setFkActividadId(67);
                              $c8->setOrden(9);
                              $c8->save();
                              }

                          $mensaje= "Materia nueva, ".$nommate; 
                          return $this->redirect('cursada/edit?id='.$cur);   
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
                    $var1= new Detallecursada();
                      $var1->setFkActividadId(183);
                          $var1->setFkCursadaId($cur);
                          $var1->setFkDcursadaId(6);
                          $var1->setFkAlumnoId($alu);
                          $var1->setEstado($est);
                          $var1->setOrden(8);
                          $var1->setResult(0);
                          $var1->save();

                          $uu1=sfPropelFinder::from('Detallerendir')->
                     where('FkAlumnoId','like',$alu)->
                    where('FkActividadId','like',211)->
                     find();
                          foreach ($uu1 as $uc1)
                              {
                              $uc1->setFkActividadId(176);
                              $uc1->save();
                              }

                          $uu2=sfPropelFinder::from('Detallerendir')->
                     where('FkAlumnoId','like',$alu)->
                    where('FkActividadId','like',212)->
                     find();
                          foreach ($uu2 as $uc2)
                              {
                              $uc2->setFkActividadId(177);
                              $uc2->save();
                              }

                          $uu3=sfPropelFinder::from('Detallerendir')->
                     where('FkAlumnoId','like',$alu)->
                    where('FkActividadId','like',213)->
                     find();
                          foreach ($uu3 as $uc3)
                              {
                              $uc3->setFkActividadId(178);
                              $uc3->save();
                              }

                          $uu4=sfPropelFinder::from('Detallerendir')->
                     where('FkAlumnoId','like',$alu)->
                    where('FkActividadId','like',214)->
                     find();
                          foreach ($uu4 as $uc4)
                              {
                              $uc4->setFkActividadId(179);
                              $uc4->save();
                              }

                          $uu5=sfPropelFinder::from('Detallerendir')->
                     where('FkAlumnoId','like',$alu)->
                    where('FkActividadId','like',215)->
                     find();
                          foreach ($uu5 as $uc5)
                              {
                              $uc5->setFkActividadId(180);
                              $uc5->save();
                              }

                          $uu6=sfPropelFinder::from('Detallerendir')->
                     where('FkAlumnoId','like',$alu)->
                    where('FkActividadId','like',216)->
                     find();
                          foreach ($uu6 as $uc6)
                              {
                              $uc6->setFkActividadId(181);
                              $uc6->save();
                              }
                           
                          $uu7=sfPropelFinder::from('Detallerendir')->
                     where('FkAlumnoId','like',$alu)->
                    where('FkActividadId','like',218)->
                     find();
                          foreach ($uu7 as $uc7)
                              {
                              $uc7->setFkActividadId(182);
                              $uc7->save();
                              }   

                          $uu8=sfPropelFinder::from('Detallerendir')->
                     where('FkAlumnoId','like',$alu)->
                    where('FkActividadId','like',223)->
                     find();
                          foreach ($uu8 as $uc8)
                              {
                              $uc8->setFkActividadId(184);
                              $uc8->setOrden(9);
                              $uc8->save();
                              }   

                          $vu1=sfPropelFinder::from('Detallecursada')->
                     where('FkAlumnoId','like',$alu)->
                    where('FkActividadId','like',211)->
                     find();
                          foreach ($vu1 as $c1)
                              {
                              $c1->setFkActividadId(176);
                              $c1->save();
                              }

                          $vu2=sfPropelFinder::from('Detallecursada')->
                     where('FkAlumnoId','like',$alu)->
                    where('FkActividadId','like',212)->
                     find();
                          foreach ($vu2 as $c2)
                              {
                              $c2->setFkActividadId(177);
                              $c2->save();
                              }

                          $vu3=sfPropelFinder::from('Detallecursada')->
                     where('FkAlumnoId','like',$alu)->
                    where('FkActividadId','like',213)->
                     find();
                          foreach ($vu3 as $c3)
                              {
                              $c3->setFkActividadId(178);
                              $c3->save();
                              }

                          $vu4=sfPropelFinder::from('Detallecursada')->
                     where('FkAlumnoId','like',$alu)->
                    where('FkActividadId','like',214)->
                     find();
                          foreach ($vu4 as $c4)
                              {
                              $c4->setFkActividadId(179);
                              $c4->save();
                              }

                          $vu5=sfPropelFinder::from('Detallecursada')->
                     where('FkAlumnoId','like',$alu)->
                    where('FkActividadId','like',215)->
                     find();
                          foreach ($vu5 as $c5)
                              {
                              $c5->setFkActividadId(180);
                              $c5->save();
                              }

                          $vu6=sfPropelFinder::from('Detallecursada')->
                     where('FkAlumnoId','like',$alu)->
                    where('FkActividadId','like',216)->
                     find();
                          foreach ($vu6 as $c6)
                              {
                              $c6->setFkActividadId(181);
                              $c6->save();
                              }
                           
                          $vu7=sfPropelFinder::from('Detallecursada')->
                     where('FkAlumnoId','like',$alu)->
                    where('FkActividadId','like',218)->
                     find();
                          foreach ($vu7 as $c7)
                              {
                              $c7->setFkActividadId(182);
                              $c7->save();
                              }
                           
                          $vu8=sfPropelFinder::from('Detallecursada')->
                     where('FkAlumnoId','like',$alu)->
                    where('FkActividadId','like',223)->
                     find();
                          foreach ($vu8 as $c8)
                              {
                              $c8->setFkActividadId(184);
                              $c8->setOrden(9);
                              $c8->save();
                              }

                          $mensaje= "Materia nueva, ".$nommate; 
                          return $this->redirect('cursada/edit?id='.$cur);
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
                    $var1= new Detallecursada();
                      $var1->setFkActividadId(110);
                          $var1->setFkCursadaId($cur);
                          $var1->setFkDcursadaId(6);
                          $var1->setFkAlumnoId($alu);
                          $var1->setEstado($est);
                          $var1->setOrden(8);
                          $var1->setResult(0);
                          $var1->save();

                          $uu1=sfPropelFinder::from('Detallerendir')->
                     where('FkAlumnoId','like',$alu)->
                    where('FkActividadId','like',211)->
                     find();
                          foreach ($uu1 as $uc1)
                              {
                              $uc1->setFkActividadId(103);
                              $uc1->save();
                              }

                          $uu2=sfPropelFinder::from('Detallerendir')->
                     where('FkAlumnoId','like',$alu)->
                    where('FkActividadId','like',212)->
                     find();
                          foreach ($uu2 as $uc2)
                              {
                              $uc2->setFkActividadId(104);
                              $uc2->save();
                              }

                          $uu3=sfPropelFinder::from('Detallerendir')->
                     where('FkAlumnoId','like',$alu)->
                    where('FkActividadId','like',213)->
                     find();
                          foreach ($uu3 as $uc3)
                              {
                              $uc3->setFkActividadId(105);
                              $uc3->save();
                              }

                          $uu4=sfPropelFinder::from('Detallerendir')->
                     where('FkAlumnoId','like',$alu)->
                    where('FkActividadId','like',214)->
                     find();
                          foreach ($uu4 as $uc4)
                              {
                              $uc4->setFkActividadId(106);
                              $uc4->save();
                              }

                          $uu5=sfPropelFinder::from('Detallerendir')->
                     where('FkAlumnoId','like',$alu)->
                    where('FkActividadId','like',215)->
                     find();
                          foreach ($uu5 as $uc5)
                              {
                              $uc5->setFkActividadId(107);
                              $uc5->save();
                              }

                          $uu6=sfPropelFinder::from('Detallerendir')->
                     where('FkAlumnoId','like',$alu)->
                    where('FkActividadId','like',216)->
                     find();
                          foreach ($uu6 as $uc6)
                              {
                              $uc6->setFkActividadId(108);
                              $uc6->save();
                              }
                           
                          $uu7=sfPropelFinder::from('Detallerendir')->
                     where('FkAlumnoId','like',$alu)->
                    where('FkActividadId','like',218)->
                     find();
                          foreach ($uu7 as $uc7)
                              {
                              $uc7->setFkActividadId(109);
                              $uc7->save();
                              }
                          $uu8=sfPropelFinder::from('Detallerendir')->
                     where('FkAlumnoId','like',$alu)->
                    where('FkActividadId','like',223)->
                     find();
                          foreach ($uu8 as $uc8)
                              {
                              $uc8->setFkActividadId(111);
                              $uc8->setOrden(9);
                              $uc8->save();
                              }

                          $vu1=sfPropelFinder::from('Detallecursada')->
                     where('FkAlumnoId','like',$alu)->
                    where('FkActividadId','like',211)->
                     find();
                          foreach ($vu1 as $c1)
                              {
                              $c1->setFkActividadId(103);
                              $c1->save();
                              }

                          $vu2=sfPropelFinder::from('Detallecursada')->
                     where('FkAlumnoId','like',$alu)->
                    where('FkActividadId','like',212)->
                     find();
                          foreach ($vu2 as $c2)
                              {
                              $c2->setFkActividadId(104);
                              $c2->save();
                              }

                          $vu3=sfPropelFinder::from('Detallecursada')->
                     where('FkAlumnoId','like',$alu)->
                    where('FkActividadId','like',213)->
                     find();
                          foreach ($vu3 as $c3)
                              {
                              $c3->setFkActividadId(105);
                              $c3->save();
                              }

                          $vu4=sfPropelFinder::from('Detallecursada')->
                     where('FkAlumnoId','like',$alu)->
                    where('FkActividadId','like',214)->
                     find();
                          foreach ($vu4 as $c4)
                              {
                              $c4->setFkActividadId(106);
                              $c4->save();
                              }

                          $vu5=sfPropelFinder::from('Detallecursada')->
                     where('FkAlumnoId','like',$alu)->
                    where('FkActividadId','like',215)->
                     find();
                          foreach ($vu5 as $c5)
                              {
                              $c5->setFkActividadId(107);
                              $c5->save();
                              }

                          $vu6=sfPropelFinder::from('Detallecursada')->
                     where('FkAlumnoId','like',$alu)->
                    where('FkActividadId','like',216)->
                     find();
                          foreach ($vu6 as $c6)
                              {
                              $c6->setFkActividadId(108);
                              $c6->save();
                              }
                           
                          $vu7=sfPropelFinder::from('Detallecursada')->
                     where('FkAlumnoId','like',$alu)->
                    where('FkActividadId','like',218)->
                     find();
                          foreach ($vu7 as $c7)
                              {
                              $c7->setFkActividadId(109);
                              $c7->save();
                              }

                          $vu8=sfPropelFinder::from('Detallecursada')->
                     where('FkAlumnoId','like',$alu)->
                    where('FkActividadId','like',223)->
                     find();
                          foreach ($vu8 as $c8)
                              {
                              $c8->setFkActividadId(111);
                              $c8->setOrden(9);
                              $c8->save();
                              }

                          $mensaje= "Materia nueva, ".$nommate; 
                          return $this->redirect('cursada/edit?id='.$cur);
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
                    $var1= new Detallecursada();
                      $var1->setFkActividadId(147);
                          $var1->setFkCursadaId($cur);
                          $var1->setFkDcursadaId(6);
                          $var1->setFkAlumnoId($alu);
                          $var1->setEstado($est);
                          $var1->setOrden(8);
                          $var1->setResult(0);
                          $var1->save();

                          $uu1=sfPropelFinder::from('Detallerendir')->
                     where('FkAlumnoId','like',$alu)->
                    where('FkActividadId','like',211)->
                     find();
                          foreach ($uu1 as $uc1)
                              {
                              $uc1->setFkActividadId(140);
                              $uc1->save();
                              }

                          $uu2=sfPropelFinder::from('Detallerendir')->
                     where('FkAlumnoId','like',$alu)->
                    where('FkActividadId','like',212)->
                     find();
                          foreach ($uu2 as $uc2)
                              {
                              $uc2->setFkActividadId(141);
                              $uc2->save();
                              }

                          $uu3=sfPropelFinder::from('Detallerendir')->
                     where('FkAlumnoId','like',$alu)->
                    where('FkActividadId','like',213)->
                     find();
                          foreach ($uu3 as $uc3)
                              {
                              $uc3->setFkActividadId(142);
                              $uc3->save();
                              }

                          $uu4=sfPropelFinder::from('Detallerendir')->
                     where('FkAlumnoId','like',$alu)->
                    where('FkActividadId','like',214)->
                     find();
                          foreach ($uu4 as $uc4)
                              {
                              $uc4->setFkActividadId(143);
                              $uc4->save();
                              }

                          $uu5=sfPropelFinder::from('Detallerendir')->
                     where('FkAlumnoId','like',$alu)->
                    where('FkActividadId','like',215)->
                     find();
                          foreach ($uu5 as $uc5)
                              {
                              $uc5->setFkActividadId(144);
                              $uc5->save();
                              }

                          $uu6=sfPropelFinder::from('Detallerendir')->
                     where('FkAlumnoId','like',$alu)->
                    where('FkActividadId','like',216)->
                     find();
                          foreach ($uu6 as $uc6)
                              {
                              $uc6->setFkActividadId(145);
                              $uc6->save();
                              }
                           
                          $uu7=sfPropelFinder::from('Detallerendir')->
                     where('FkAlumnoId','like',$alu)->
                    where('FkActividadId','like',218)->
                     find();
                          foreach ($uu7 as $uc7)
                              {
                              $uc7->setFkActividadId(146);
                              $uc7->save();
                              }

                          $uu8=sfPropelFinder::from('Detallerendir')->
                     where('FkAlumnoId','like',$alu)->
                    where('FkActividadId','like',223)->
                     find();
                          foreach ($uu8 as $uc8)
                              {
                              $uc8->setFkActividadId(148);
                              $uc8->setOrden(9);
                              $uc8->save();
                              }
                              
                          $vu1=sfPropelFinder::from('Detallecursada')->
                     where('FkAlumnoId','like',$alu)->
                    where('FkActividadId','like',211)->
                     find();
                          foreach ($vu1 as $c1)
                              {
                              $c1->setFkActividadId(140);
                              $c1->save();
                              }

                          $vu2=sfPropelFinder::from('Detallecursada')->
                     where('FkAlumnoId','like',$alu)->
                    where('FkActividadId','like',212)->
                     find();
                          foreach ($vu2 as $c2)
                              {
                              $c2->setFkActividadId(141);
                              $c2->save();
                              }

                          $vu3=sfPropelFinder::from('Detallecursada')->
                     where('FkAlumnoId','like',$alu)->
                    where('FkActividadId','like',213)->
                     find();
                          foreach ($vu3 as $c3)
                              {
                              $c3->setFkActividadId(142);
                              $c3->save();
                              }

                          $vu4=sfPropelFinder::from('Detallecursada')->
                     where('FkAlumnoId','like',$alu)->
                    where('FkActividadId','like',214)->
                     find();
                          foreach ($vu4 as $c4)
                              {
                              $c4->setFkActividadId(143);
                              $c4->save();
                              }

                          $vu5=sfPropelFinder::from('Detallecursada')->
                     where('FkAlumnoId','like',$alu)->
                    where('FkActividadId','like',215)->
                     find();
                          foreach ($vu5 as $c5)
                              {
                              $c5->setFkActividadId(144);
                              $c5->save();
                              }

                          $vu6=sfPropelFinder::from('Detallecursada')->
                     where('FkAlumnoId','like',$alu)->
                    where('FkActividadId','like',216)->
                     find();
                          foreach ($vu6 as $c6)
                              {
                              $c6->setFkActividadId(145);
                              $c6->save();
                              }
                           
                          $vu7=sfPropelFinder::from('Detallecursada')->
                     where('FkAlumnoId','like',$alu)->
                    where('FkActividadId','like',218)->
                     find();
                          foreach ($vu7 as $c7)
                              {
                              $c7->setFkActividadId(146);
                              $c7->save();
                              }

                          $vu8=sfPropelFinder::from('Detallecursada')->
                     where('FkAlumnoId','like',$alu)->
                    where('FkActividadId','like',223)->
                     find();
                          foreach ($vu8 as $c8)
                              {
                              $c8->setFkActividadId(148);
                              $c8->setOrden(9);
                              $c8->save();
                              }

                          $mensaje= "Materia nueva, ".$nommate; 
                          return $this->redirect('cursada/edit?id='.$cur);
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
                  return $this->redirect('bcomun/list?idcursada='.$cur.'&idal='.$alu);   

         }
         else
         {
           $mensaje= "Materia ya regularizada, de ser necesario ver otra cursada : ".$nommate; 
           return $this->redirect('bcomun/list?idcursada='.$cur.'&idal='.$alu);   
         }

 }

public function executeBorrarcomun()
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

 public function executeNota()
 {  
   $cur=(int)$this->getRequestParameter('idcursada');
   $act=(int)$this->getRequestParameter('idactividad');
   $can=(int)$this->getRequestParameter('nota');

      $va=sfPropelFinder::from('Detallecursada')->
        where('FkCursadaId', 'like', $cur)->
    where('FkActividadId', 'like', $act)->
        find();  

     foreach ($va as $cs)
       {
  $cs->setResult($can);
        $cs->save();
       }

     return $this->redirect('bcomun/list?idcursada='.$cur);
  }
}

