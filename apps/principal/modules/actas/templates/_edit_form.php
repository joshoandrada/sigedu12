<?php echo form_tag('actas/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($llamadoacta, 'getId') ?>

<?php	    $c2=sfPropelFinder::from('Llamadoa')->
            where('Id', 'like', 1)->
            find();
	    foreach ($c2 as $a2)  
            {
            $idlla = $a2->getFkLlamadosId();
            }

?>
<?php   
          $c=sfPropelFinder::from('Detallerendir')->
           where('FkLlamadaId', 'like',$idlla)->
           where('FkDcursadaId', 'like',1)->
           _or('FkDcursadaId', 'like',8)->
           orderBy('FkActividadId')->
           orderBy('FkDcursadaId')->

           find();
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
        	$i8=array();
        	$e8=0;
        	$i9=array();
        	$e9=0;
        	$i10=array();
        	$e10=0;
        	$i11=array();
        	$e11=0;

                foreach ($c as $cc)
         	{
		       	$c4=sfPropelFinder::from('Alumno')->
                	where('Id', 'like', $cc->getFkAlumnoId())->
                	find();
                	foreach ($c4 as $c5)
			{
                	$i3[$e3++]=$c5->getNroDocumento();
                        $i4[$e4++]=$c5->getApellidoMaterno();
                	$i[$e1++]=$c5->getMatricula();
                        }
                
		$i7[$e7++]=$cc->getFkDcursadaId();
                $i5[$e5++]=$cc->getFkCursadaId();
                $i8[$e8++]=$cc->getFkActividadId();
               	$c6=sfPropelFinder::from('Actividad')->
               	where('Id', 'like', $cc->getFkActividadId())->
               	find();
               	foreach ($c6 as $c7)
		{
               	$i1[$e++]= $c7->getNombre();
                $i9[$e9++]=$c7->getId();
                $i10[$e10++]=$c7->getFechaf();
                $i11[$e11++]=$c7->getFkCarreraId();
               	}
                 $i2[$e2++]=$cc->getOrden();
                 $i6[$e6++]=$cc->getEstado();

		}

	   
    ?>


<?php
        $datos = $i; // matricula.
	$dato1 = $i1;// nombre materia.
	$dato2 = $i2; //num orden materia.
	$dato3 = $i3; //num docu.
	$dato4 = $i4; //Nombre apellido.
	$dato5 = $i5; //num rendida.
	$dato6 = $i6; //estado rendida nombre.
        $dato7 = $i7; //estado rendida numero.
        $dato10 = $i8; //num materia.
        $dato11 = $i9; //id materia en actividad.
        $dato12 = $i10; //fecha en actividad.
        $dato9=$i11;

       $num = count($datos);

?>

<?php //$dato9 = array_unique($dato2);?>
<?php //$dato8 = array_unique($dato1);?>
<?php //$dato13 = array_unique($dato12);?>

<?php //$dato9 = $dato2;?>
<?php //$dato8 = $dato1;?>
<?php //$dato13 = $dato12;?>


<?php $num = count($dato2);?>
<?php //print_r($dato1);?>
<?php //print_r($dato2);?>
<?php //print_r($dato4);?>
<?php //print_r($dato5);?>
<?php //print_r($dato6);?>
<?php //array_multisort ($dato7, $dato1, $datos, $dato2, $dato3, $dato4, $dato5, $dato6);?>
<?php //print_r($resultado);?>


    <?php include_partial('actas/verdetalles', array('num' => $num,'dato1' => $dato1,'idlla' => $idlla, 'datos'=>$datos,'dato2' => $dato2,'dato3' => $dato3,'dato4' => $dato4,'dato5' => $dato5,'dato6' => $dato6,'dato7' => $dato7,'dato8' => $dato1,'dato9' => $dato9,'dato10' => $dato10,'dato11' => $dato11,'dato12' => $dato12)) ?>


<?php include_partial('edit_actions', array('llamadoacta' => $llamadoacta)) ?>

</form>


