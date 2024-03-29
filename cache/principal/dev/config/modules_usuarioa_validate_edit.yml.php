<?php
// auto-generated by sfValidatorConfigHandler
// date: 2019/08/26 21:49:44

if ($_SERVER['REQUEST_METHOD'] == 'GET')
{
  $validators = array();
  $this->context->getRequest()->setAttribute('symfony.fillin', array (
  'enabled' => true,
));
}
else if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
  $validators = array();
  $validators['nicknameValidator'] = new sfStringValidator($this->context, array (
  'min' => 5,
  'min_error' => 'El nombre de usuario debe contener al menos 5 caracteres',
));

  $validators['caracteresMaximos32'] = new sfStringValidator($this->context, array (
  'max' => 32,
  'max_error' => 'La maxima cantidad de caracteres permitida es de 32',
));

  $validators['usuarioValidator'] = new albaUsuarioValidator($this->context, array (
  'campo' => 'usuario',
  'campo_id' => 'id',
  'usuario_error' => 'El usuario ya exite',
));

  $validators['claveValidator'] = new sfStringValidator($this->context, array (
  'min' => 5,
  'min_error' => 'La clave debe contener al menos 5 caracteres',
));

  $validators['caracteresMaximos48'] = new sfStringValidator($this->context, array (
  'max' => 48,
  'max_error' => 'La maxima cantidad de caracteres permitida es de 48',
));

  $validators['emailValidator'] = new sfEmailValidator($this->context, array (
  'email_error' => 'No ingresaste un email correctamente ( ej: nombre@dominio.com)',
));

  $validators['caracteresMaximos128'] = new sfStringValidator($this->context, array (
  'max' => 128,
  'max_error' => 'La maxima cantidad de caracteres permitida es de 128',
));

  $validators['foreignKeyValidator'] = new sfNumberValidator($this->context, array (
  'min' => 1,
  'min_error' => 'No se puede cargar ese establecimiento. Trate nuevamente',
));

  $validatorManager->registerName('usuario', 1, 'El campo usuario es obligatorio', 'usuario', null, false);
  $validatorManager->registerValidator('usuario', $validators['nicknameValidator'], 'usuario');
  $validatorManager->registerValidator('usuario', $validators['caracteresMaximos32'], 'usuario');
  $validatorManager->registerValidator('usuario', $validators['usuarioValidator'], 'usuario');
  $validatorManager->registerName('clave', 1, 'El campo clave es obligatorio', 'usuario', null, false);
  $validatorManager->registerValidator('clave', $validators['claveValidator'], 'usuario');
  $validatorManager->registerValidator('clave', $validators['caracteresMaximos48'], 'usuario');
  $validatorManager->registerName('correo_publico', 0, 'Required', 'usuario', null, false);
  $validatorManager->registerName('email', 1, 'El campo email es obligatorio', 'usuario', null, false);
  $validatorManager->registerValidator('email', $validators['emailValidator'], 'usuario');
  $validatorManager->registerValidator('email', $validators['caracteresMaximos128'], 'usuario');
  $validatorManager->registerName('activo', 0, 'Required', 'usuario', null, false);
  $validatorManager->registerName('seguridad_pregunta', 0, 'Required', 'usuario', null, false);
  $validatorManager->registerValidator('seguridad_pregunta', $validators['caracteresMaximos128'], 'usuario');
  $validatorManager->registerName('seguridad_respuesta', 0, 'Required', 'usuario', null, false);
  $validatorManager->registerValidator('seguridad_respuesta', $validators['caracteresMaximos128'], 'usuario');
  $validatorManager->registerName('fk_establecimiento_id', 1, 'Debe ingresar el establecimiento al que pertenece', 'usuario', null, false);
  $validatorManager->registerValidator('fk_establecimiento_id', $validators['foreignKeyValidator'], 'usuario');
  $this->context->getRequest()->setAttribute('symfony.fillin', array (
  'enabled' => true,
));
}
