<?php
// auto-generated by sfViewConfigHandler
// date: 2019/08/26 23:04:00
$response = $this->context->getResponse();


  $templateName = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_template', $this->actionName);
  $this->setTemplate($templateName.$this->viewName.$this->getExtension());



  if (!is_null($layout = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_layout')))
  {
    $this->setDecoratorTemplate(false === $layout ? false : $layout.$this->getExtension());
  }
  else if (is_null($this->getDecoratorTemplate()) && !$this->context->getRequest()->isXmlHttpRequest())
  {
    $this->setDecoratorTemplate('' == 'layout' ? false : 'layout'.$this->getExtension());
  }
  $response->addHttpMeta('content-type', 'text/html; charset=utf-8', false);
  $response->addMeta('title', 'Proyecto AUTOGESTION Tobar', false, false);
  $response->addMeta('robots', 'index, follow', false, false);
  $response->addMeta('description', 'Proyecto de Gestión Educativa', false, false);
  $response->addMeta('keywords', 'alba, proyecto, software libre, educacion', false, false);
  $response->addMeta('language', 'es', false, false);

  $response->addStylesheet('/sf/sf_admin/css/main', '', array ());
  $response->addStylesheet('main.css', '', array ());
  $response->addStylesheet('impresion', '', array (  'media' => 'print',));
  $response->addStylesheet('login', '', array ());
  $response->addStylesheet('admin', '', array ());
  $response->addJavascript('jsmenu/JSCookMenu', '', array ());
  $response->addJavascript('/sfProtoculousPlugin/js/prototype.js', '', array ());


