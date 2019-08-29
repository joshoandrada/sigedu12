<script>
	var my<?php echo sfConfig::get("app_alba_menutheme")?>Base = "<?php echo sfContext::getInstance()->getRequest()->getRelativeUrlRoot() . '/js/jsmenu/themes/' .sfConfig::get("app_alba_menutheme"). '/'?>";
</script>
<script src="<?php echo sfContext::getInstance()->getRequest()->getRelativeUrlRoot() . '/js/jsmenu/themes/'.sfConfig::get("app_alba_menutheme").'/theme.js'?>">
</script>

<?php $idusu=$sf_user->getAttribute('id');?>

<?php $h13= sfPropelFinder::from('UsuarioRol')->
     where ('FkUsuarioId','like',$idusu)->
     find();
     foreach ($h13 as $c13)  
       {
       $rolusu=$c13->getFkRolId();        
       }
?>

<?php $h10= sfPropelFinder::from('Usuario')->
     where ('Id','like',$idusu)->
     find();
     foreach ($h10 as $c10)  
       {
       $alu=$c10->getFKAlumno();        
        }
?>

<?php $h11= sfPropelFinder::from('Alumno')->
     where ('Id','like',$alu)->
     find();
     foreach ($h11 as $c11)  
       {
       $idcarre=$c11->getFKCarreraId();        
        }
?>



<?php if ($rolusu == 1) {?>

<div id="menu" align="center">
	<ul>
    <li><span></span><a href="#">&nbsp;&nbsp;&nbsp;Administraci&oacute;n&nbsp;&nbsp;&nbsp;</a>
        <ul>
         <!-- 
         <li><span></span><a href="#">General</a>
              <ul>
                <li><span></span><?php echo link_to("Definir Organizaci&oacute;n","organizacion/edit?id=1")?></li>
                <li><span></span><?php echo link_to("Definir Establecimiento","establecimiento/index")?></li>
              </ul>
          </li>  
        -->
          <li><span></span><a href="#">Configuraciones Previas</a>
            <ul>
              <li><span></span><a href="#">Generales</a>
                <ul>
                 <!-- 
                 <li><span></span><?php echo link_to("Definir Pa&iacute;ses","pais/index")?></li>
                  <li><span></span><?php echo link_to("Definir Provincias",'provincia/index')?></li>
                  <li><span></span><?php echo link_to("Definir Distritos Escolares","distritoescolar/index")?></li>
                  <li><span></span><?php echo link_to("Definir Categor&iacute;a de IVA","tipoiva/index")?></li> 
                -->
               <!--   
                <li><span></span><?php echo link_to("Tipo Documento","tipodocumento/index")?></li> 
              -->
                <!-- 
                 <li><span></span><?php echo link_to("Tipo Nivel","tiponivel/index")?></li> 
               -->
                </ul>
              </li>
              <li><span></span><a href="#">Alumnos</a>
                <ul>
               <!-- 
                 <li><span></span><?php echo link_to("Definir tipo de bajas","conceptobaja/index")?></li>
                  <li><span></span><?php echo link_to("Definir tipo de asistencia","tipoasistencia/index")?></li>
                  <li><span></span><?php echo link_to("Definir Escala de notas","escalanota/index")?></li> 
                -->
                  <li><span></span><?php echo link_to("Definir Estados de alumnos","estadosalumnos/index")?></li>
                <!-- 
                 <li><span></span><?php echo link_to("Tipos de entrada al legajo pedag&oacute;gico","legajocategoria/index")?></li>
                  <li><span></span><?php echo link_to("Definir Categor&iacute;as del Bolet&iacute;n de Concepto","concepto/index")?></li> 
                -->
                </ul>
              </li>
              <li><span></span><a href="#">Docentes</a>
                <ul>
                  <li><span></span><?php echo link_to("Tipos de docentes",'tipodocente/index')?></li>
                  <li><span></span><?php echo link_to("Motivos de baja", "cargobaja/index")?></li>
                </ul>
              </li>
              <!--
              <li><span></span><a href="#">Calendarios y Horarios</a>
                <ul>
                -->
                 <!-- 
                 <li><span></span><?php echo link_to("Definir Ciclos Lectivos","ciclolectivo/index")?></li>
                  <li><span></span><?php echo link_to("Definir Períodos","ciclolectivo/agregarTurnosYPeriodos/index")?></li> 
                -->
                 <!-- 
                  <li><span></span><?php echo link_to("Definir turnos","turno/index")?></li> 
                 -->
                 <!-- 
                 li><span></span><?php echo link_to("Tipos de intevalos de horario escolar","horarioescolartipo/index")?></li>
                  <li><span></span><?php echo link_to("Definir feriados del a&ntilde;o","feriado/index")?></li>
                  <li><span></span><?php echo link_to("Calendario de vacunas","calendariovacunacion/index")?></li>
                   -->
              <!-- 
               </ul>
              </li> 
            -->
              
              <!--
              <li><span></span><a href="#">Gesti&oacute;n de Espacios</a>
                <ul>
                  <li><span></span><?php echo link_to("Definir tipos de Locaciones","tipolocacion/index")?></li>
                  <li><span></span><?php echo link_to("Definir tipos de Espacios","tipoespacio/index")?></li>
                </ul>
              </li> 
            -->

            </ul>
          </li>
          <li><span></span><a href="#">Seguridad</a>
            <ul>
              <li><span></span><?php echo link_to("Usuarios","usuarioa/index")?></li>
              <li><span></span><?php echo link_to("Roles","rol/index")?></li>
            </ul>
          </li>
      </ul>
    </li>
    <li><span></span><a href="#">&nbsp;&nbsp;&nbsp;Alumnos&nbsp;&nbsp;&nbsp;</a>
      <ul>
        <!-- 
          <li><span></span><?php echo link_to("Habilitar Alumno","alumno3/index")?></li>
        -->
        <li><span></span><?php echo link_to("Ingresar Nuevo","alumno2a/create")?></li>
        <li><span></span><?php echo link_to("Listar Alumnos","alumno2a/index")?></li>
        <li><span></span><?php echo link_to("Designar Carrera","alumno4/list")?></li>
        <!--
          <li><span></span><?php echo link_to("Pasar de a&ntilde;o","ciclolectivo/pasajeAlumnos")?></li> 
        -->
      </ul>
    </li>

    <li><span></span><a href="#">&nbsp;&nbsp;&nbsp;Administrar Cursadas&nbsp;&nbsp;&nbsp;</a>
      <ul>
        <li><span></span><?php echo link_to("Habilitar Alumno a Cursar","alumno3/index")?></li>
        <li><span></span><?php echo link_to("Cursadas por alumno","detallecur/list")?></li>
        <li><span></span><?php echo link_to("Inscripcion a Cursadas","cursadaa/index")?></li>
 	<li><span></span><?php echo link_to("Definir Llamados a Cursar","llamadoscur/index")?></li>
 	<li><span></span><?php echo link_to("Cambiar Llamado a Cursar","llamadoacur/edit")?></li>
 	
        <!--
          <li><span></span><?php echo link_to("Listados cursadas ","actas/edit")?></li>
        -->

        <!--
          <li><span></span><?php echo link_to("Cerrar cursadas","ciclolectivo/pasajeAlumnos")?></li>
        -->


        <li><span></span><?php echo link_to("Permitir cursadas","actcur/edit?id=1")?></li>
      </ul>
    </li>

    <li><span></span><a href="#">&nbsp;&nbsp;&nbsp;Administrar Rendidas&nbsp;&nbsp;&nbsp;</a>
      <ul>
        <li><span></span><?php echo link_to("Habilitar Alumno a Rendir","alumno3/index")?></li>
        <li><span></span><?php echo link_to("Inscripcion a Rendir","Rendida/index")?></li>
        <!--
          li><span></span><?php echo link_to("Definir Carrera por Alumno","Calu/index")?></li> 
        -->
 	<li><span></span><?php echo link_to("Definir Llamados a Rendir","llamados/index")?></li>
 	<li><span></span><?php echo link_to("Cambiar Llamado a Rendir","llamadoa/edit")?></li>
 	<li><span></span><?php echo link_to("Listado de Actas ","actas/edit")?></li>
        <li><span></span><?php echo link_to("Permitir Rendidas","actrend/edit?id=1")?></li>
      </ul>
    </li>


    <li><span></span><a href="#">&nbsp;&nbsp;&nbsp;Docentes&nbsp;&nbsp;&nbsp;</a>
      <ul>
        <li><span></span><?php echo link_to("Ingresar Nuevo","docente/create")?></li>
	<li><span></span><?php echo link_to("Buscar Docente","docente/index")?></li>
	<li><span></span><?php echo link_to("Actualizar Horas por Materia","horasdocente/list")?></li>
      </ul>
    </li>
    <li><span></span><a href="#">&nbsp;&nbsp;&nbsp;Gesti&oacute;n Escolar&nbsp;&nbsp;&nbsp;</a>
      <ul>


       <li><span></span><?php echo link_to("Definir Carreras","carrera/index")?></li>
        <li><span></span><?php echo link_to("Definir A&ntilde;os","anio/index")?></li>
        <li><span></span><?php echo link_to("Definir Orientaciones","orientacion/index")?></li>
        <li><span></span><?php echo link_to("Definir Divisiones","division/index")?></li> 
        <li><span></span><?php echo link_to("Asignar Actividad a Division","relactdiv/index")?></li> 
        <li><span></span><?php echo link_to("Administrar Divisiones","relAlumnoDivision/list")?></li>
<!--        <li><span></span><?php echo link_to("Ingresar Materias/Actividades","actividad/index")?></li> -->
        <li><span></span><?php echo link_to("Listar Actividades por A&ntilde;o","relAnioActividad/index")?></li>
      </ul>
    </li>
    <li><span></span><a href="#">&nbsp;&nbsp;&nbsp;Horarios&nbsp;&nbsp;&nbsp;</a>
      <ul>
        <li><span></span><?php echo link_to("Ir a Ciclo Lectivo Actual","ciclolectivo/agregarTurnosYPeriodos")?></li>
        <li><span></span><?php echo link_to("Cambiar de Ciclo Lectivo","ciclolectivo/cambiar")?></li>

       <!-- <li><span></span><a href="#">Gestionar Horario Escolar</a>
          <ul> 
            <li><span></span><?php echo link_to("Definir horario de clases","horarioescolar/index")?></li>
            <li><span></span><?php echo link_to("Generar Horario por secci&oacute;n/divisi&oacute;n","relDivisionActividadDocente/index")?></li>
          </ul>
        </li>
        <li><span></span><a href="#">Ver Horario seg&uacute;n:</a>
          <ul>
            <li><span></span><?php echo link_to("...docentes","calendario/busquedaDocente")?></li>
            <li><span></span><?php echo link_to ("...secci&oacute;n/divisi&oacute;n","calendario/busquedaDivision")?></li>
          </ul>
        </li> -->
      </ul>
    </li>
 <!--   <li><span></span><a href="#">Gesti&oacute;n de Espacios</a>
      <ul>
        <li><span></span><?php echo link_to("Listar Locaciones","locacion/index")?></li>
        <li><span></span><?php echo link_to("Listar Espacios x Locaci&oacute;n","espacios/index")?></li>
      </ul>
    </li>  
    <li><span></span><a href="#">Informes</a>
      <ul>
        <li><span></span><?php echo link_to("Listar informes","informes/index")?></li>
        <?php $informes = InformePeer::doSelect(new Criteria()); ?>
        <?php foreach($informes as $informe): ?>
          <li><span></span><?php echo link_to("- ".$informe->getNombre(),"informes/busqueda?id=".$informe->getId()) ?></li>
        <?php endforeach;?>
        
       <li><span></span><?php echo link_to("Boletines","informes/boletinFormulario","target=_blank")?></li>
      
       </ul>
-->
    </li>
    <li><span></span><?php echo link_to("      Archivos      ","sfMediaLibrary/index")?></li>

    </li>
    <li><span></span><?php echo link_to("      Salir      ","seguridad/logout")?></li>
  </ul>
</div>

<SCRIPT LANGUAGE="JavaScript">
cmDrawFromText ('menu', 'hbr', cm<?php echo sfConfig::get("app_alba_menutheme")?>, '<?php echo sfConfig::get("app_alba_menutheme")?>');
</SCRIPT>
 <?php }?>

<?php if ($rolusu == 5) {?>

<div id="menu" align="center">
  <ul>

     <li><span></span><a href="#">&nbsp;&nbsp;&nbsp;Alumnos&nbsp;&nbsp;&nbsp;</a>
      <ul>
        <li><span></span><?php echo link_to("Ingresar Nuevo","alumno2a/create")?></li>
        <li><span></span><?php echo link_to("Listar Alumnos","alumno2a/index")?></li>
       <li><span></span><?php echo link_to("Designar Carrera","alumno4/list")?></li>
      </ul>
    </li>

    <li><span></span><a href="#">&nbsp;&nbsp;&nbsp;Administrar Cursadas&nbsp;&nbsp;&nbsp;</a>
      <ul>
       <!-- <li><span></span><?php echo link_to("Habilitar Alumno a Cursar","alumno3/index")?></li> -->
        <li><span></span><?php echo link_to("Inscripcion a Cursadas","cursadaa/index")?></li>
       <!-- <li><span></span><?php echo link_to("Definir Llamados a Cursar","llamadoscur/index")?></li> -->
        <li><span></span><?php echo link_to("Cambiar Llamado a Cursar","llamadoacur/edit")?></li>
        <!--<li><span></span><?php echo link_to("Listados cursadas ","actas/edit")?></li>-->
        <!--<li><span></span><?php echo link_to("Cerrar cursadas","ciclolectivo/pasajeAlumnos")?></li>-->
        <li><span></span><?php echo link_to("Permitir cursadas","actcur/edit?id=1")?></li>
      </ul>
    </li>

    <li><span></span><a href="#">&nbsp;&nbsp;&nbsp;Administrar Rendidas&nbsp;&nbsp;&nbsp;</a>
      <ul>
        <!--
          <li><span></span><?php echo link_to("Habilitar Alumno a Rendir","alumno3/index")?></li> 
        -->
        <li><span></span><?php echo link_to("Inscripcion a Rendir","Rendida/index")?></li>
        <!--
          <li><span></span><?php echo link_to("Definir Carrera por Alumno","Calu/index")?></li> 
        

          <li><span></span><?php echo link_to("Definir Llamados a Rendir","llamados/index")?></li> 
        -->
        <li><span></span><?php echo link_to("Cambiar Llamado a Rendir","llamadoa/edit")?></li>
        <!--
          <li><span></span><?php echo link_to("Listado de Actas ","actas/edit")?></li> 
        -->
        <li><span></span><?php echo link_to("Permitir Rendidas","actrend/edit?id=1")?></li>
      </ul>
    </li>

    <li><span></span><a href="#">&nbsp;&nbsp;&nbsp;Gesti&oacute;n Escolar&nbsp;&nbsp;&nbsp;</a>
      <ul>
        <li><span></span><?php echo link_to("Administrar Divisiones","relAlumnoDivision/list")?></li>
      </ul>
    </li>

    <li><span></span><a href="#">&nbsp;&nbsp;&nbsp;Horarios&nbsp;&nbsp;&nbsp;</a>
      <ul>
        <li><span></span><?php echo link_to("Ir a Ciclo Lectivo Actual","ciclolectivo/agregarTurnosYPeriodos")?></li>
        <li><span></span><?php echo link_to("Cambiar de Ciclo Lectivo","ciclolectivo/cambiar")?></li>
      </ul>
    </li>

    <li><span></span><?php echo link_to("      Archivos      ","sfMediaLibrary/index")?></li>

    </li>
    <li><span></span><?php echo link_to("      Salir      ","seguridad/logout")?></li>
  </ul>
</div>

<SCRIPT LANGUAGE="JavaScript">
cmDrawFromText ('menu', 'hbr', cm<?php echo sfConfig::get("app_alba_menutheme")?>, '<?php echo sfConfig::get("app_alba_menutheme")?>');
</SCRIPT>

 <?php }?>

<?php if ($sf_user->getAttribute('id')==9) {?>
<div id="menu" align="left">
  <ul>
     <li><span></span><a href="#">&nbsp;&nbsp;&nbsp;GESTI&oacute;N ESCOLAR&nbsp;&nbsp;&nbsp;</a>
      <ul>
        <li><span></span><?php echo link_to("REGISTRARME ","usuario/create")?></li>
       <li><span></span><?php echo link_to("SALIR","seguridad/logout")?></li>
      </ul>
    </li>
    <li><span></span><?php echo link_to("      ARCHIVOS      ","sfMediaLibrary/index")?></li>
    </li>
    <!--
      <li><span></span><?php echo link_to("      Salir      ","seguridad/logout")?></li> -->
  </ul>
</div>

<SCRIPT LANGUAGE="JavaScript">
cmDrawFromText ('menu', 'hbr', cm<?php echo sfConfig::get("app_alba_menutheme")?>, '<?php echo sfConfig::get("app_alba_menutheme")?>');
</SCRIPT>




<?php } else {?>


<?php if ($rolusu == 4) {?>
<div id="menu" align="left">
  <ul>
     <li><span></span><a href="#">&nbsp;&nbsp;&nbsp;GESTI&oacute;N ESCOLAR&nbsp;&nbsp;&nbsp;</a>
      <ul>
        <li><span></span><?php echo link_to("MIS DATOS PERSONALES","alumno2/edit?id=$alu")?></li>
        <li><span></span><?php echo link_to("DATOS SEGURIDAD ","usuario/edit?id=$idusu")?></li>
        <li><span></span><?php echo link_to("CURSAR MATERIAS","cursada/list")?></li>
       <li><span></span><?php echo link_to("RENDIR MATERIAS","rendir/list")?></li>
       <li><span></span><?php echo link_to("FICHA ACAD&eacute;MICA","alumno2a/Impalumno?idd1=$alu")?></li>
       
       <?php if ($idcarre == 10) {?>
       <li><span></span><?php echo link_to("ESTADO ACAD&eacute;MICO","bneuro1/list?id1=$alu")?></li>  
       <?php }?>
      
       <?php if ($idcarre == 12) {?>
       <li><span></span><?php echo link_to("ESTADO ACAD&eacute;MICO","bintel1/list?id1=$alu")?></li>  
       <?php }?>
       
       <?php if ($idcarre == 11) {?>
       <li><span></span><?php echo link_to("ESTADO ACAD&eacute;MICO","bauditiva1/list?id1=$alu")?></li>  
       <?php }?>
       
       <?php if ($idcarre == 13) {?>
       <li><span></span><?php echo link_to("ESTADO ACAD&eacute;MICO","bvisual1/list?id1=$alu")?></li>  
       <?php }?>

        <?php if ($idcarre == 7) {?>
       <li><span></span><?php echo link_to("ESTADO ACAD&eacute;MICO","bcomun1/list?id1=$alu")?></li>  
       <?php }?>

       <li><span></span><?php echo link_to("SALIR","seguridad/logout")?></li>
      </ul>
    </li>
    <li><span></span><?php echo link_to("      ARCHIVOS      ","sfMediaLibrary/index")?></li>
    </li>
    <!--
      <li><span></span><?php echo link_to("      Salir      ","seguridad/logout")?></li> -->
  </ul>
</div>

<SCRIPT LANGUAGE="JavaScript">
cmDrawFromText ('menu', 'hbr', cm<?php echo sfConfig::get("app_alba_menutheme")?>, '<?php echo sfConfig::get("app_alba_menutheme")?>');
</SCRIPT>

 <?php }?>
 <?php }?>


  
