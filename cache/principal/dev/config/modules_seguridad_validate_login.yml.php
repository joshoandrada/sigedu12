<?php
// auto-generated by sfValidatorConfigHandler
// date: 2019/08/07 00:20:14

if ($_SERVER['REQUEST_METHOD'] == 'GET')
{
  $validators = array();
  $this->context->getRequest()->setAttribute('symfony.fillin', array (
));
}
else if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
  $validators = array();
  $validators['nicknameValidator'] = new sfStringValidator($this->context, array (
  'min' => 4,
  'min_error' => 'El nombre de usuario debe contener al menos 5 caracteres',
));

  $validatorManager->registerName('login', 1, 'Debe ingresar su nombre de usuario', null, null, false);
  $validatorManager->registerValidator('login', $validators['nicknameValidator'], null);
  $validatorManager->registerName('password', 1, 'Debe ingresar su clave', null, null, false);
  $this->context->getRequest()->setAttribute('symfony.fillin', array (
));
}
