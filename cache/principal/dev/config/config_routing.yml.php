<?php
// auto-generated by sfRoutingConfigHandler
// date: 2019/08/07 00:20:12
return array(
'sfTCPDF' => new sfRoute('/sfTCPDF/:action', array (
  'module' => 'sfTCPDF',
  'action' => 'test',
), array (
), array (
)),
'alumno_salud' => new sfPropelRouteCollection(array (
  'model' => 'AlumnoSalud',
  'module' => 'alumno_salud',
  'prefix_path' => 'alumno_salud',
  'column' => 'id',
  'with_wildcard_routes' => true,
  'name' => 'alumno_salud',
  'requirements' => 
  array (
  ),
)),
'homepage' => new sfRoute('/', array (
  'module' => 'default',
  'action' => 'index',
), array (
), array (
)),
'default_symfony' => new sfRoute('/symfony/:action/*', array (
  'module' => 'default',
), array (
), array (
)),
'default_index' => new sfRoute('/:module', array (
  'action' => 'index',
), array (
), array (
)),
'default' => new sfRoute('/:module/:action/*', array (
), array (
), array (
)),
);
