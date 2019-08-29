<?php use_helper('I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<?php $idc= $sf_params->get('idcursada'); ?>

<?php
 $fw=sfPropelFinder::from('Cursada')->
  where('Id','like',$idc)->
  find();
  foreach ($fw as $s4)
    {
      $idalu = $s4->getFkAlumnoId();   
    }

 $fw4=sfPropelFinder::from('Alumno')->
  where('Id','like',$idalu)->
  find();
  foreach ($fw4 as $s44)
    {
      $ape = $s44->getApellido();
      $nom = $s44->getNombre();   
    }

?>

<h1><?php echo __('Lista de Materias en Discapacidad Visual- Cursada N&#186:'.$idc, 
array()) ?></h1>

<h2><?php echo "Alumno: ".$ape." ".$nom; ?></h2>

<div id="sf_admin_header">
<?php include_partial('bvisuala/list_header', array('pager' => $pager)) ?>
<?php include_partial('bvisuala/list_messages', array('pager' => $pager)) ?>
</div>

<div id="sf_admin_bar">
<?php include_partial('filters', array('filters' => $filters)) ?>
</div>

<div id="sf_admin_content">
<?php if (!$pager->getNbResults()): ?>
<?php echo __('no result') ?>
<?php else: ?>
<?php include_partial('bvisuala/list', array('pager' => $pager)) ?>
<?php endif; ?>
<?php include_partial('list_batch_actions') ?>

</div>
 
 
<?php   $con= $sf_params->get('idcursada'); 
        //$con= $cursada->getId();
          //$this->getRequestParameter('idoconsulta');
         $c2=new Criteria();
         $c2->add(DetallecursadaPeer::FK_CURSADA_ID,"$con", Criteria::LIKE);
         $numero_reg = DetallecursadaPeer::doCount($c2); ?>

         <?php $c=sfPropelFinder::from('Detallecursada')->
           where('FkCursadaId', 'like', $con)->
           find();
        ?>
  
		<?php
        	$i=array();
       		$e=0;
        	$i1=array();
        	$e1=0;
        	$i2=array();
        	$e2=0;
        	$i3=array();
        	$e3=0;
        	$i4=array();
        	$e4=0;
        	$i5=array();
        	$e5=0;
        	$i6=array();
        	$e6=0;
        	$i7=array();
        	$e7=0;
        	foreach ($c as $cc)
         	{
	  	$c2=sfPropelFinder::from('Actividad')->
            where('Id', 'like', $cc->getFkActividadId())->
            find();
		// detalle cursada
                $i[$e1++]=$cc->getFkActividadId();
		$i4[$e4++]=$cc->getResult();
		$i5[$e5++]=$cc->getEstado();
		$i3[$e3++]=$cc->getId();
                $i7[$e7++]= date("d-m-Y",strtotime($cc->getFecha()));  
                foreach ($c2 as $c3)
		{
                 //  actividad
		 $i1[$e++]= $c3->getNro();
                 $i2[$e2++]=$c3->getDescripcion();
                 //$i3[$e3++]=$c3->getAnio();
                 $i6[$e6++]=$c3->getAnio();
		}
	   }
         ?>
<?php
        $datos = $i; // Envio un array con la denominacion.
	$dato1 = $i1;// Y otro array con los id para poder armar una tabla en la vista..
	$dato2 = $i2; //Envio un array con los codigos.
	$dato3 = $i3; //Envio un array con los costos.
	$dato4 = $i4; //Envio un array con los costos.
	$dato5 = $i5; //Envio un array con los Ac.
	$dato6 = $i6; //Envio un array con los Ac.
	$dato7 = $i7; //Envio un array con los Ac.
	$num= $numero_reg;
?>

<?php include_partial('bvisuala/verdetalles', array('num' => $num,'dato1' => $dato1, 'dato2' => $dato2, 'dato3' => $dato3, 'datos'=>$datos,'dato4' => $dato4,'dato5' => $dato5,'dato6' => $dato6,'dato7' => $dato7)) ?>
<?php include_partial('list_actions') ?>
</div>



<div id="sf_admin_footer">
<?php include_partial('bvisuala/list_footer', array('pager' => $pager)) ?>
</div>

</div>
