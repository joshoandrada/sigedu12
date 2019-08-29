<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">
<?php	    $c2=sfPropelFinder::from('Llamadoa')->
            where('Id', 'like', 1)->
            find();
	    foreach ($c2 as $a2)  
            {
            $idlla = $a2->getFkLlamadosId();
            }

	    $c3=sfPropelFinder::from('Llamados')->
            where('Id', 'like', $idlla)->
            find();
	    foreach ($c3 as $a3)  
            {
            $fi = $a3->getFechai();
            $ff = $a3->getFechaf();
            
            $lla = $a3->getLlamado();
            $tur = $a3->getTurno();
            }
$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
 
$fecha2 = $meses[date('n',strtotime($fi))-1]. " ".date('Y',strtotime($fi));

$nomlla = $tur." Turno - ".$lla." Llamado - ".$fecha2;

?>

<h1><?php echo __('Actas de llamado actual : '.$nomlla, 
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('actas/edit_header', array('llamadoacta' => $llamadoacta)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('actas/edit_messages', array('llamadoacta' => $llamadoacta, 'labels' => $labels)) ?>
<?php include_partial('actas/edit_form', array('llamadoacta' => $llamadoacta, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('actas/edit_footer', array('llamadoacta' => $llamadoacta)) ?>
</div>

</div>
