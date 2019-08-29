<?php if ($sf_user->isAuthenticated()) {?>
<?php $idusu=$sf_user->getAttribute('id');?>
  <input type="hidden" id="id" name="id"  value="<?php echo $idusu; ?>"size="20" maxlength="20">

 <?php $h10= sfPropelFinder::from('Usuario')->
     where ('Id','like',$sf_user->getAttribute('id'))->
     find();
     foreach ($h10 as $c10)  
       {
       $alu=$c10->getFKAlumno();        
        }
?>

<?php $h13= sfPropelFinder::from('UsuarioRol')->
     where ('FkUsuarioId','like',$idusu)->
     find();
     foreach ($h13 as $c13)  
       {
       $rolusu=$c13->getFkRolId();        
        }
?>
<?php if ($rolusu==4) {?>

<<div id="titulo">
    <br/>
    <br/>
    <br/>
    <h1>&iexcl;Bienvenidos al Sistema Autogesti&oacute;n Educativa - Versi&oacute;n 1.0.0 </h1>
            <br>Como est&aacute; en continuo desarrollo, puede encontrar errores que todav&iacute;a no han sido descubiertos. </br>
            <br>Si encuentra alguno, por favor rep&oacute;rtelo al Administrador de Red del Instituto Ing. Lic. en Sistemas JOSE LUIS ANDRADA e-mail: </br>
            <h2>admin_sigedu@isfdcarolinatobargarcia.edu.ar </h2>
</div>

<!--


<div id="edificio">   
</div>
-->

<!--
-->
  




  <div align="left">
     <div id="menua">

     <ul>

<?php $h11= sfPropelFinder::from('Llamadoacur')->
     where ('Id','like',1)->
     find();
     foreach ($h11 as $c11)  
       {
       $hab=$c11->getLlamado();        
        }
?>
<?php $h12= sfPropelFinder::from('Llamadoa')->
     where ('Id','like',1)->
     find();
     foreach ($h12 as $c12)  
       {
       $habr=$c12->getLlamado();        
        }
?>

<input type="hidden" id="alu" name="alu"  value="<?php echo $alu; ?>"size="20" maxlength="20">

 <!-- 
<?php $idusu=$sf_user->getAttribute('id');?>


<?php if ($sf_user->getAttribute('id')==9) {?>
    <li><a href="../index.php/usuario/create" title="Activo" style="color: #ffffff;"><h3>REGISTRO</h3></a></li>
        <li><a href="sfMediaLibrary/index" title="Activo" style="color: #ffffff;"><h3>ARCHIVOS</h3></a></li>
        <li><a href="" title="No Activo" style="color: #9A9A9A;"><h3>MIS DATOS</h3></a></li>
        <li><a href="" title="No Activo" style="color: #9A9A9A;"><h3>CURSADAS</h3></a></li>
        <li><a href="" title="No Activo" style="color: #9A9A9A;"><h3>RENDIR MATERIAS</h3></a></li>
<?php } else {?>
<?php if ($alu!=0 or $alu!="") {?>
    <li><a href="sfMediaLibrary/index" title="Activo" style="color: #ffffff;"><h3>ARCHIVOS </h3></a></li>
      <li><a href="../index.php/alumno2/edit/id/<?php echo $alu; ?>" title="Activo" style="color: #ffffff;"><h3>MIS DATOS</h3></a></li>
      <li><a href="../index.php/usuario/edit/id/<?echo $idusu;?>" title="Activo" style="color: #ffffff;"><h3>SEGURIDAD</h3></a></li>
     <?php if ($hab==1) {?>

                       <li><a href="../index.php/cursada/list" title="Activo" style="color: #ffffff;"><h3>CURSADAS</h3></a></li>
          <?php } else {?>
                       <li><a href="" title="No Activo" style="color: #9A9A9A;"><h3>CURSADAS</h3></a></li>
      
          <?php }?>

     <?php if ($habr==1) {?>

       <li><a href="../index.php/rendir/list" title="Activo" style="color: #ffffff;"><h3>RENDIR MATERIAS</h3></a></li>
         <?php } else {?>
      <li><a href="" title="No Activo" style="color: #9A9A9A;"><h3>RENDIR MATERIAS</h3></a></li>
      <?php }?>


 
      <?php } else {?>
    <li><a href="../index.php/alumno2/create" title="Activo" style="color: #ffffff;"><h3>REGISTRO</h3></a></li>
      <li><a href="" title="No Activo" style="color: #9A9A9A;"><h3>MIS DATOS</h3></a></li>
      <li><a href="../index.php/usuario/edit/id/<?echo $idusu;?>" title="Activo" style="color: #ffffff;"><h3>SEGURIDAD</h3></a></li>
                       <li><a href="" title="No Activo" style="color: #9A9A9A;"><h3>CURSADAS</h3></a></li>
           <li><a href="" title="No Activo" style="color: #9A9A9A;"><h3>RENDIR MATERIAS</h3></a></li>


<?php }?>
<?php }?>
        <li><a href="../index.php/seguridad/logout" title="Salir" style="color: #ffffff;"><h3>CERRAR SESION</h3></a></li>
    </ul>
    </div> 
  </div>
               
<?php }?>
<?php }?>
-->


<?php if ($rolusu<>4) {?>
  <div align="center">
  <h1>&iexcl;Bienvenidos al Sistema Gesti&oacute;n Educativa SIGEDU! - Versi&oacute;n 1.1.0 </h1>
  </div>
  <br/>
  <div align="center">
  El Proyecto SiGedu, es un proyecto de desarrollo de Software <br><b>&quot;Sistema Libre de Gesti&oacute;n Educativa&quot;</b>
  </div>
   

   <table align="center">
      <tr>
          <td>
              <?php echo image_tag("gnu-head-banner1.jpg");?>
          </td>
          <td>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </td>
          <td>
  
              <ul>
                 
              </ul>
          </td>
      </tr>
  </table>


  <table align="center">
      <tr>
          <td>
              <?php echo image_tag("bug.jpg");?>
          </td>
          <td>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </td>
          <td>
              Como est&aacute; en continuo desarrollo, puede encontrar errores que todav&iacute;a no han sido descubiertos. <br>
              Si encuentra alguno, por favor rep&oacute;rtelo al Administrador de Red del Instituto Ing. lIC. JOSE LUIS ANDRADA: <br>
              e-mail admin_sigedu@isfdcarolinatobargarcia.edu.ar -- joseluisandrada2002@gmail.com <br>
              <br/>
          </td>
      </tr>


      <tr>
          <td>

          </td>
          <td>
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </td>
          <td>
              
          </td>
      </tr>

  </table>


<?php }?>
