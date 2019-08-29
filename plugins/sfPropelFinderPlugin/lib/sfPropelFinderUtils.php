<?php

/*
 * This file is part of the sfPropelFinder package.
 * 
 * (c) 2007 François Zaninotto <francois.zaninotto@symfony-project.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
 
class sfPropelFinderUtils
{
  public static function relateObjects($new, $existingObjects, $isNew)
  {
    // brute force (to be optimized later)
    foreach ($existingObjects as $existingObject)
    {
      $methodName = 'add'.get_class($existingObject);
      if(method_exists($new, $methodName))
      {
        if($isNew)
        {
          call_user_func(array($new, 'init'.get_class($existingObject).'s'));
        }
        call_user_func(array($new, $methodName), $existingObject);
        break;
      }
    }
  }
  
  public static function relateI18nObjects($new, $existingObjects, $culture)
  {
    // brute force (to be optimized later)
    foreach ($existingObjects as $existingObject)
    {
      $methodName = 'set'.get_class($new).'ForCulture';
      if(method_exists($existingObject, $methodName))
      {
        call_user_func(array($existingObject, $methodName), $new, $culture);
        call_user_func(array($new, 'set'.get_class($existingObject)), $existingObject);
        break;
      }
    }
  }
  
  public static function getValueAndComparisonFromArguments($arguments = array())
  {
    $comparison = Criteria::EQUAL;
    switch (count($arguments))
    {
      case 0:
        $value = true;
        break;
      case 1:
        $value = array_shift($arguments);
        break;
      case 2:
        $comparison = array_shift($arguments);
        $comparisonUp = trim(strtoupper($comparison));
        if(in_array($comparisonUp, array('LIKE', 'NOT LIKE', 'ILIKE', 'NOT ILIKE', 'IN', 'NOT IN', 'IS NULL', 'IS NOT NULL')))
        {
          $comparison = ' '.$comparisonUp.' ';
        }
        $value = array_shift($arguments);
        break;
      default:
        throw new Exception('sfPropelFinder::whereXXX() can only be called with one or two arguments');
    }

    return array($value, $comparison);
  }
  
  public static function getPeerClassFromClass($class)
  {
    $tmp = new $class();
    $class = get_class($tmp->getPeer());
    return $class;
  }

  public static function getClassFromPeerClass($peerClass)
  {
    $omClass = call_user_func(array($peerClass, 'getOMClass'));
    return substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
  }
  
  public static function getColumnsForPeerClass($peerClass)
  {
    if(class_exists($peerClass))
    {
      $tableMap = call_user_func(array($peerClass, 'getTableMap'));
      return $tableMap->getColumns();
    }
    return false;
  }
  
  
}