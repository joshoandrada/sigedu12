<?php

/*
 * This file is part of the sfPropelFinder package.
 * 
 * (c) 2007 François Zaninotto <francois.zaninotto@symfony-project.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
 
class sfPropelFinder
{
  protected $class = null;
  protected $peerClass = null;
  protected $databaseMap = null;
  protected $criteria = null;
  protected $relations = null;
  protected $latestQuery = '';
  protected $criterions = array();
  protected $withClasses = array();
  protected $withColumns = array();
  protected $culture = null;

  public function __construct($class = '')
  {
    $this->criteria = new Criteria();
    if($class)
    {
      $this->class = $class;
      $tmp = new $class;
      $this->setPeerClass(get_class($tmp->getPeer()));
    }
    if($this->peerClass)
    {
      $this->initialize();
    }
  }
  
  public function initialize()
  {
    $mapBuilder = call_user_func(array($this->peerClass, 'getMapBuilder'));
    $mapBuilder->doBuild();
    $this->databaseMap = $mapBuilder->getDatabaseMap();
  }
  
  public function getPeerClass()
  {
    return $this->peerClass;
  }

  public function setPeerClass($peerClass)
  {
    $this->relations[]= $peerClass;
    $this->peerClass = $peerClass;
    
    return $this;
  }
  
  public function getCriteria()
  {
    return $this->buildCriteria();
  }
  
  public function setCriteria($criteria)
  {
    $this->criteria = $criteria;
    $this->criterions = array();
    
    return $this;
  }

  public function reinitCriteria()
  { 
    return $this->setCriteria(new Criteria());
  }
  
  public function getLatestQuery($con = null)
  {
    if(is_null($con)) $con = Propel::getConnection();
    if(method_exists($con, 'getLastExecutedQuery'))
    {
      return $this->latestQuery;
    }
    else
    {
      throw new RuntimeException('sfPropelFinder::getLatestQuery() only works when debug mode is enabled');
    }
  }
  
  public function updateLatestQuery($con = null)
  {
    if(is_null($con)) $con = Propel::getConnection();
    if(method_exists($con, 'getLastExecutedQuery'))
    {
      $this->latestQuery = $con->getLastExecutedQuery();
    }
  }
  
  public function addWithClass($class)
  {
    $this->withClasses []= $class;
    
    return $this;
  }
  
  public function getWithClasses()
  {
    return $this->withClasses;
  }
  
  public function reinitWithClasses()
  {
    $this->withClasses = array();
    
    return $this;
  }

  public function getWithColumns()
  {
    return $this->withColumns;
  }
  
  public function reinitWithColumns()
  {
    $this->withColumns = array();
    
    return $this;
  }
  
  // Finder Initializers
  
  /**
   * Mixed initializer
   * Accepts either a string (Propel class) or an array of Propel objects
   *
   * @param mixed $from The data to initialize the finder with
   * @return sfPropelFinder a finder object
   * @throws Exception If the data is neither a classname nor an array
   */
  public static function from($from)
  {
    if (is_string($from))
    {
      return self::fromClass($from);
    }
    if (is_array($from))
    {
      return self::fromCollection($from);
    }
    throw new Exception('sfPropelFinder::from() only accepts a Propel object classname or an array of Propel objects');
  }

  /**
   * Class initializer
   *
   * @param string $from Propel classname on which the search will be done
   * @return sfPropelFinder a finder object
   */
  public static function fromClass($class)
  {
    $me = __CLASS__;
    $finder = new $me($class);
    
    return $finder;
  }
  
  /**
   * Collection initializer
   *
   * @param array $from Array of Propel objects of the same class
   * @param string $class Optional classname of the desired objects
   * @param string $class Optional column name of the primary key
   *
   * @return sfPropelFinder a finder object
   * @throws Exception If the array is empty, contains not Propel objects or composite objects
   */
  public static function fromCollection($collection, $class = '', $pkName = '')
  {
    $pks = array();
    foreach($collection as $object)
    {
      if($class != get_class($object))
      {
        if($class)
        {
          throw new Exception('A sfPropelFinder can only be initialized from an array of objects of a single class');
        }
        if($object instanceof BaseObject)
        {
          $class = get_class($object);
        }
        else
        {
          throw new Exception('A sfPropelFinder can only be initialized from an array of Propel objects');
        }
      }
      $pks []= $object->getPrimaryKey();
    }
    if(!$class)
    {
      throw new Exception('A sfPropelFinder cannot be initialized with an empty array');
    }
    
    $tempObject = new $class();
    foreach ($tempObject->getPeer()->getTableMap()->getColumns() as $column)
    {
      if($column->isPrimaryKey())
      {
        if($pkName)
        {
          throw new Exception('A sfPropelFinder cannot be initialized from an array of objects with several foreign keys');
        }
        else
        {
          $pkName = $column->getFullyQualifiedName();
        }
      }
    }
    
    return self::fromArray($pks, $class, $pkName);
  }
  
  /**
   * Array initializer
   *
   * @param array $array Array of Primary keys
   * @param string $class Propel classname on which the search will be done
   *
   * @return sfPropelFinder a finder object
   */
  public static function fromArray($array, $class, $pkName)
  {
    $finder = self::fromClass($class);
    $finder->add($pkName, $array, Criteria::IN);
    
    return $finder;
  }
  
  // Finder Executers
  
  public function count($con = null, $reinitCriteria = true)
  {
    $ret = call_user_func(array($this->getPeerClass(), 'doCount'), $this->getCriteria(), $con);
    $this->updateLatestQuery($con);
    if($reinitCriteria)
    {
      $this->reinitCriteria();
    }
    
    return $ret;
  }
  
  public function find($limit = null, $con = null, $reinitCriteria = false)
  {
    if($limit)
    {
      $this->criteria->setLimit($limit);
    }
    $ret = $this->doFind($con);
    $this->updateLatestQuery($con);
    if($reinitCriteria)
    {
      $this->reinitCriteria();
    }
    
    return $ret;
  }
  
  public function findOne($con = null, $reinitCriteria = true)
  {
    $this->criteria->setLimit(1);
    $ret = $this->doFind($con);
    $this->updateLatestQuery($con);
    if($reinitCriteria)
    {
      $this->reinitCriteria();
    }
    if ($ret)
    {
      return $ret[0];
    }
    return null;
  }
  
  public function findLast($column = null, $con = null, $reinitCriteria = true)
  {
    if($column)
    {
      $this->orderBy($column, 'desc');
    }
    else
    {
      $this->guessOrder('desc');
    }
    
    return $this->findOne($con, $reinitCriteria);
  }
  
  public function findFirst($column = null, $con = null, $reinitCriteria = true)
  {
    if($column)
    {
      $this->orderBy($column, 'asc');
    }
    else
    {
      $this->guessOrder('asc');
    }
    
    return $this->findOne($con, $reinitCriteria);
  }
  
  public function findBy($columnName, $value, $limit = null, $con = null, $reinitCriteria = false)
  {
    $column = $this->getColName($columnName);
    $this->addCondition('and', $column, $value, Criteria::EQUAL);
    
    return $this->find($limit, $con, $reinitCriteria);
  }

  public function findOneBy($columnName, $value, $con = null, $reinitCriteria = false)
  {
    $column = $this->getColName($columnName);
    $this->addCondition('and', $column, $value, Criteria::EQUAL);
    
    return $this->findOne($con, $reinitCriteria);
  }
  
  public function findPk($pk, $con = null)
  {
    $tableMap = call_user_func(array($this->peerClass, 'getTableMap'));
    $pkColumns = array();
    foreach ($tableMap->getColumns() as $column)
    {
      if($column->isPrimaryKey())
      {
        $pkColumns []= $column->getFullyQualifiedName();
      }
    }
    if(($count = count($pkColumns)) > 1)
    {
      // composite primary key
      if(!is_array($pk))
      {
        throw new Exception(sprintf('Class %s has a composite primary key and expects %s parameters to retrieve a record by pk', $this->class, join(', ', $pkColumns)));
      } 
      else if (is_array($count[0]))
      {
        // array of arrays
        // sorry the finder can't do that on objects with composte primary keys
        throw new Exception('Impossible to find a list of Pks on an objects with composite primary keys');
      }
      for ($i=0; $i < $count; $i++)
      { 
        $this->criteria->add($pkColumns[$i], $pk[$i]);
      }
      return $this->findOne();
    }
    else
    {
      // simple primary kay
      if(is_array($pk))
      {
        $this->criteria->add($pkColumns[0], $pk, Criteria::IN);
        return $this->find();
      }
      else
      {
        $this->criteria->add($pkColumns[0], $pk);
        return $this->findOne();
      }
    } 
  }
  
  public function delete($con = null, $reinitCriteria = true)
  {
    $deleteCriteria = $this->getCriteria();
    if($deleteCriteria->equals(new Criteria()))
    {
      // delete will delete nothing when passed an empty criteria
      // while it should, in fact, delete all
      $deleteCriteria = $this->addTrueCondition($deleteCriteria);
    }
    $ret = call_user_func(array($this->getPeerClass(), 'doDelete'), $deleteCriteria, $con);
    $this->updateLatestQuery($con);
    if($reinitCriteria)
    {
      $this->reinitCriteria();
    }
    
    return $ret;
  }
  
  public function paginate($page = 1, $maxPerPage = 10, $con = null)
  {
    $pager = new sfPropelFinderPager($this->class, $maxPerPage);
    $pager->setFinder($this);
    $pager->setConnection($con);
    $pager->setPage($page);
    $pager->init();
    
    return $pager;
  }
  
  public function set($values, $forceIndividualSaves = false, $con = null, $reinitCriteria = true )
  {
    if (!is_array($values))
    {
      throw new Exception('sfPropelFinder::set() expects an array as first argument');
    }
    if($forceIndividualSaves)
    {
      $objects = $this->find(null, $con, $reinitCriteria);
      foreach ($objects as $object)
      {
        foreach ($values as $key => $value)
        {
          $object->setByName($key, $value);
        }
        $object->save();
      }
      return count($objects);
    }
    else
    {
      $find = $this->getCriteria();
      if (count($find->getJoins()))
      {
        throw new Exception('sfPropelFinder::set() does not support multitable updates, please do not use join');
      }
      if($find->equals(new Criteria()))
      {
        // doUpdate will delete nothing when passed an empty criteria
        // while it should, in fact, update all
        $find = $this->addTrueCondition($find);
      }
      
      $set = new Criteria();
      foreach ($values as $columnName => $value)
      {
        $set->add($this->getColName($columnName), $value);
      }
      
      if(is_null($con)) $con = Propel::getConnection();
      $ret = BasePeer::doUpdate($find, $set, $con);
      $this->updateLatestQuery($con);
      if($reinitCriteria)
      {
        $this->reinitCriteria();
      }
      
      return $ret;
    }
  }
  
  public function doFind($con = null)
  {
    $this->addMissingJoins();
    if($this->getWithClasses() || $this->getWithColumns())
    {
      $c = $this->prepareCompositeCriteria();
      if(method_exists($this->getPeerClass(), 'doSelectRS'))
      {
        $resultSet = call_user_func(array($this->getPeerClass(), 'doSelectRS'), $c, $con);
        $propelVersion = '1.2';
        $nextFunction = 'next';
        $nextParam = null;
      }
      else
      {
        $resultSet = call_user_func(array($this->getPeerClass(), 'doSelectStmt'), $c, $con);
        $propelVersion = '1.3';
        $nextFunction = 'fetch';
        $nextParam = PDO::FETCH_NUM;
      }
      
      // Hydrate the objects based on the resultset
      $omClass = call_user_func(array($this->getPeerClass(), 'getOMClass'));
      $cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
      $objects = array();
      $withObjs = array();
      while ($row = $resultSet->$nextFunction($nextParam))
      {
        // First come the columns of the main class
        $obj = new $cls();
        if($propelVersion == '1.2')
        {
          $startCol = $obj->hydrate($resultSet, 1);
        }
        else
        {
          $startCol = $obj->hydrate($row, 0);
        }
        if($this->culture)
        {
          $obj->setCulture($this->culture);
        }
        // Then the related classes added by way of 'with'
        $objectsInJoin = array($obj);
        foreach ($this->getWithClasses() as $className)
        {
          $withObj = new $className();
          if($propelVersion == '1.2')
          {
            $startCol = $withObj->hydrate($resultSet, $startCol);
          }
          else
          {
            $startCol = $withObj->hydrate($row, $startCol);
          }
          
          // initialize our object directory
          if (!isset($withObjs[$className]))
          {
            $withObjs[$className] = array();
          }
          
          // check if object is not already referenced in allObjects directory
          $isNewObject = true;
          foreach ($withObjs[$className] as $otherObject)
          {
            if ($otherObject->getPrimaryKey() === $withObj->getPrimaryKey())
            {
              $isNewObject = false;
              $withObj = $otherObject;
              break;
            }
          }
          if(strpos(get_class($withObj), 'I18n') !== false)
          {
            sfPropelFinderUtils::relateI18nObjects($withObj, $objectsInJoin, $this->culture);
          }
          else
          {
            sfPropelFinderUtils::relateObjects($withObj, $objectsInJoin, $isNewObject);
          }
          $objectsInJoin []= $withObj;
          if ($isNewObject)
          {
            $withObjs[$className][] = $withObj;
          }
        }
        // Then the columns added one by one by way of 'withColumn'
        foreach($this->getWithColumns() as $alias => $column)
        {
          // Additional columns are stored in the object, in a special 'namespace'
          // see getColumn() for how to retrieve the value afterwards
          // Using the third parameter of withColumn() as a type. defaults to $rs->get() (= $rs->getString())
          $typedGetter = 'get'.ucfirst($column['type']);
          if($propelVersion == '1.2')
          {
            $this->setColumn($obj, $alias, $resultSet->$typedGetter($startCol));
          }
          else
          {
            $this->setColumn($obj, $alias, $row[$startCol]);
          }
          $startCol++;
        }
        
        $objects []= $obj;
      }
      
      // activate custom column getter if asColumns were added
      if($this->getWithColumns() && !sfMixer::getCallable('Base'.$cls.':getColumn'))
      {
        sfMixer::register('Base'.$cls, array($this, 'getColumn'));
      }
      
      return $objects;
    }
    else
    {
      // No 'with', so we use the native Propel doSelect()
      return call_user_func(array($this->getPeerClass(), 'doSelect'), $this->buildCriteria(), $con);
    }
  }
  
  /**
   * Adds missing Joins from with() and withColumn()
   */
  protected function addMissingJoins()
  {
    foreach ($this->getWithClasses() as $className)
    {
      if(!in_array(sfPropelFinderUtils::getPeerClassFromClass($className), $this->relations))
      {
        $this->join($className);
      }
    }
    foreach($this->getWithColumns() as $alias => $column)
    {
      $peerClass = $column['peerClass'];
      if($peerClass && !in_array($peerClass, $this->relations))
      {
        $this->join(sfPropelFinderUtils::getClassFromPeerClass($peerClass));
      }
    }
    
    return $this;
  }
  
  /**
   * Prepare the select columns and add the missing joins
   */
  protected function prepareCompositeCriteria()
  {
    $criteria = $this->buildCriteria();
    $c = clone $criteria;
    $c->clearSelectColumns();
    // First come the columns of the main class
    call_user_func(array($this->getPeerClass(), 'addSelectColumns'), $c);
    // Then the related classes added by way of 'with'
    foreach ($this->getWithClasses() as $className)
    {
      call_user_func(array(sfPropelFinderUtils::getPeerClassFromClass($className), 'addSelectColumns'), $c);
    }
    // Then the columns added one by one by way of 'withColumn'
    foreach($this->getWithColumns() as $alias => $column)
    {
      $c->addAsColumn('\''.$alias.'\'', $column['column']);
    }
    
    return $c;
  }
  
  // Hydrating
  
  public function with($classes)
  {
    if(!is_array($classes))
    {
      $classes = func_get_args();
    }
    foreach($classes as $class)
    {
      if(strtolower($class) == 'i18n')
      {
        $this->withI18n();
      }
      else
      {
        $this->addWithClass($class);
      }
    }
    
    return $this;
  }
  
  public function withI18n($culture = null)
  {
    $i18nClass = $this->class.'I18n';
    $this->addWithClass($i18nClass);
    $this->culture = is_null($culture) ? sfContext::getInstance()->getUser()->getCulture() : $culture;
    $this->criteria->add(constant(sfPropelFinderUtils::getPeerClassFromClass($i18nClass).'::CULTURE'), $this->culture);
    
    return $this;
  }

  public function withColumn($column, $alias = null, $type = null)
  {
    $isCalculationColumn = strpos($column, '(') !== false;
    if(!$alias)
    {
      if($isCalculationColumn)
      {
        throw new Exception('Calculated colums added with sfPropelFinder::withColumn() need an alias as second parameter');
      }
      else
      {
        $alias = $column;
      }
    }
    if($isCalculationColumn)
    {
      $peerClass = null;
    }
    else
    {
      list($peerClass, $columnName) = $this->getColName($column, null, true);
    }
    $this->withColumns [$alias]= array(
      'column'    => $isCalculationColumn ? $column : $columnName,
      'type'      => $type,
      'peerClass' => $peerClass
    );
    
    return $this;
  }
  
  // Finder Filters
  
  /**
   * Finder Fluid Interface for Criteria::setDistinct()
   */
  public function distinct()
  {
    $this->criteria->setDistinct();
    
    return $this;
  }
  
  /**
   * Finder Fluid Interface for Criteria::add()
   * Infers $column, $value, $comparison from $columnName and some optional arguments
   * Examples:
   *   $articleFinder->where('IsPublished')
   *    => $c->add(ArticlePeer::IS_PUBLISHED, true)
   *   $articleFinder->where('CommentId', 3)
   *    => $c->add(ArticlePeer::COMMENT_ID, 3)
   *   $articleFinder->where('Title', 'like', '%foo')
   *    => $c->add(ArticlePeer::TITLE, '%foo', Criteria::LIKE)
   *   $articleFinder->where('Title', 'like', '%foo', 'FooTitle')
   *    => $FooTitle = $c->getNewCriterion(ArticlePeer::TITLE, '%foo', Criteria::LIKE)
   *
   * @param      string  $columnName PHPName of the column bearing the condition
   * @param      string  $valueOrOperator  Value if 2 arguments, operator otherwise
   * @param      string  $value  Value if 3 arguments (optional)
   * @param      string  $namedCondition  If condition is to be stored for later combination (see combine())
   *
   * @return     sfPropelFinder the current finder object
   */
  public function where()
  {
    $arguments = func_get_args();
    $columnName = array_shift($arguments);
    $column = $this->getColName($columnName);
    if(isset($arguments[2]))
    {
      $namedCondition = $arguments[2];
      unset($arguments[2]);
    }
    else
    {
      $namedCondition = null;
    }
    list($value, $comparison) = sfPropelFinderUtils::getValueAndComparisonFromArguments($arguments);
    $this->addCondition('And', $column, $value, $comparison, $namedCondition);
    
    return $this;
  }

  /**
   * Finder Fluid Interface for Criteria::addAnd()
   * Infers $column, $value, $comparison from $columnName and some optional arguments
   *
   * @see     where()
   */
  public function _and()
  {
    $arguments = func_get_args();
    $columnName = array_shift($arguments);
    $column = $this->getColName($columnName);
    list($value, $comparison) = sfPropelFinderUtils::getValueAndComparisonFromArguments($arguments);
    $this->addCondition('And', $column, $value, $comparison);
    
    return $this;
  }

  /**
   * Finder Fluid Interface for Criteria::addOr()
   * Infers $column, $value, $comparison from $columnName and some optional arguments
   * Examples:
   *   $articleFinder->_or('CommentId', 3)
   *    => $c->addOr(ArticlePeer::COMMENT_ID, 3)
   *   $articleFinder->_or('Title', 'like', '%foo')
   *    => $c->addOr(ArticlePeer::TITLE, '%foo', Criteria::LIKE)
   *
   * @param      string  $columnName PHPName of the column bearing the condition
   * @param      string  $valueOrOperator  Value if 2 arguments, operator otherwise
   * @param      string  $value  Value if 3 arguments (optional)
   *
   * @return     sfPropelFinder the current finder object
   */
  public function _or()
  {
    $arguments = func_get_args();
    $columnName = array_shift($arguments);
    $column = $this->getColName($columnName);
    list($value, $comparison) = sfPropelFinderUtils::getValueAndComparisonFromArguments($arguments);
    $this->addCondition('Or', $column, $value, $comparison);
    
    return $this;
  }

  /**
   * Conditions have to be stored before being really used
   *
   * @see sfPropelFinder::buildCriteria()
   */
  protected function addCondition($cond, $column, $value, $comparison, $namedCondition = null)
  {
    $criterion = $this->criteria->getNewCriterion($column, $value, $comparison);
    if($namedCondition)
    {
      $this->namedCriterions[$namedCondition] = $criterion;
    }
    else
    {
      $criterion->func = "add".$cond;
      $this->criterions []= $criterion;
    }
  }

  /**
   * Combine named conditions into the main criteria or into a new named condition
   * Named conditions are to be defined in where()
   *
   * @param Array $conditions list of named conditions already set by way of where()
   * @param string $operator Combine operator ('and' or 'or')
   * @param string $namedCondition  If combined condition is to be stored for later combination (see combine())
   * 
   * @see where()
   */
  public function combine($conditions, $operator = 'and', $namedCondition = null)
  {
    $addMethod = 'add'.ucfirst(strtolower(trim($operator)));
    if(!is_Array($conditions))
    {
      $conditions = array($conditions);
    }
    foreach($conditions as $condition)
    {
      if(!isset($criterion))
      {
        $criterion = $this->namedCriterions[$condition];
      }
      else
      {
        $criterion->$addMethod($this->namedCriterions[$condition]);
      }
    }
    if($namedCondition)
    {
      $this->namedCriterions[$namedCondition] = $criterion;
    }
    else
    {
      $criterion->func = "addAnd";
      $this->criterions []= $criterion;
    }
    
    return $this;
  }
  
  /**
   * We want that the Finder fuild Interface works like:
   *   PHP : whereA()->_andB->_orC()->_orD()->_andE()
   *   SQL : where A=? AND (B=? OR (C=? OR (D=? AND E=?)))
   * So we have to add condition starting by the last one!
   */
  protected function buildCriteria()
  {
    $criteria = clone $this->criteria;
    $criterions = $this->criterions;

    while ($criterion = array_pop($criterions))
    {
      if ($c = count($criterions))
      {
        call_user_func(array($criterions[$c-1], $criterion->func), $criterion);
      }
      else
      {
        call_user_func(array($criteria, $criterion->func), $criterion);
      }
    }
    
    return $criteria;
  }
  
  /**
   * Finder fluid method to restrict results to a related object
   * Examples:
   *   $commentFinder->relatedTo($article)
   *    => $c->add(CommentPeer::ARTICLE_ID, $article->getId())
   */
  public function relatedTo($object)
  {
    $relatedObjectTableName = $object->getPeer()->getTableMap()->getName();
    foreach (sfPropelFinderUtils::getColumnsForPeerClass($this->getPeerClass()) as $c)
    {
      if($c->getRelatedTableName() == $relatedObjectTableName)
      {
        $this->addCondition('and', $c->getFullyQualifiedName(), $object->getByName($c->getRelatedName(), BasePeer::TYPE_COLNAME), Criteria::EQUAL);
      }
    }
    
    return $this;
  }
  
  /**
   * Finder Fluid Interface for Criteria::addAscendingOrderByColumn()
   * and Criteria::addDescendingOrderByColumn()
   * Infers $column and $order from $columnName and some optional arguments
   * Examples:
   *   $articleFinder->orderBy('CreatedAt')
   *    => $c->addAscendingOrderByColumn(ArticlePeer::CREATED_AT)
   *   $articlefinder->orderBy('CategoryId', 'desc')
   *    => $c->addDescendingOrderByColumn(ArticlePeer::CATEGORY_ID)
   */
  public function orderBy($columnName, $arguments = array())
  {
    $column = $this->getColName($columnName);
    if(!is_array($arguments))
    {
      $arguments = func_get_args();
      array_shift($arguments);
    } 
    $order = strtoupper(array_shift($arguments));
    if(!$order)
    {
      $order = Criteria::ASC;
    }
    
    switch ($order)
    {
      case Criteria::ASC:
        $this->criteria->addAscendingOrderByColumn($column);
        break;
      case Criteria::DESC:
        $this->criteria->addDescendingOrderByColumn($column);
        break;
      default:
        throw new Exception('sfPropelFinder::orderBy() only accepts "asc" or "desc" as argument');
    }
    
    return $this;
  }

  /**
   * Finder Fluid Interface for Criteria::addGroupByColumn()
   * Infers $column and $order from $columnName and some optional arguments
   * Examples:
   *   $articleFinder->groupBy('CreatedAt')
   *    => $c->addGroupByColumn(ArticlePeer::CREATED_AT)
   */
  public function groupBy($columnName)
  {
    $column = $this->getColName($columnName);
    $this->criteria->addGroupByColumn($column);
    
    return $this;
  }
  
  /**
   * Guess sort column based on their names
   * Will look primarily for columns named:
   * 'UpdatedAt', 'UpdatedOn', 'CreatedAt', 'CreatedOn', 'Id'
   * You can change this sequence by modifying the app_sfPropelFinder_sort_column_guesses value
   *
   * @param string $direction 'desc' (default) or 'asc'
   *
   * @return sfPropelFinder $this the current finder object
   */
  public function guessOrder($direction = 'desc')
  {
    $columnNames = array();
    foreach (sfPropelFinderUtils::getColumnsForPeerClass($this->getPeerClass()) as $c)
    {
      $columnNames []= $c->getPhpName();
    }
    foreach(sfConfig::get('app_sfPropelFinder_sort_column_guesses', array('UpdatedAt', 'UpdatedOn', 'CreatedAt', 'CreatedOn', 'Id')) as $testColumnName)
    {
      if(in_array($testColumnName, $columnNames))
      {
        $this->orderBy($testColumnName, $direction);
        return $this;
      }
    }
    
    throw new Exception('Unable to figure out the column to use to order rows in sfPropelFinder::guessOrder()');
  }
  
  /**
   * Finder Fluid Interface for Criteria::addJoin()
   * Infers $column1, $column2 and $operator from $relatedClass and some optional arguments
   * Uses the Propel column maps, based on the schema, to guess the related columns
   * Examples:
   *   $articleFinder->join('Comment')
   *    => $c->addJoin(ArticlePeer::ID, CommentPeer::ARTICLE_ID)
   *   $articleFinder->join('Category', 'RIGHT JOIN')
   *    => $c->addJoin(ArticlePeer::CATEGORY_ID, CategoryPeer::ID, Criteria::RIGHT_JOIN)
   *   $articleFinder->join('Article.CategoryId', 'Category.Id', 'RIGHT JOIN')
   *    => $c->addJoin(ArticlePeer::CATEGORY_ID, CategoryPeer::ID, Criteria::RIGHT_JOIN)
   */
  public function join()
  {
    $args = func_get_args();
    switch(count($args))
    {
      case 0:
        throw new Exception('sfPropelFinder::join() expects at least one argument');
        break;
      case 1:
      case 2:
        // $articleFinder->join('Comment')
        // $articleFinder->join('Category', 'RIGHT JOIN')
        $relatedClass = $args[0];
        list($column1, $column2) = $this->getRelation($relatedClass);
        $this->relations[]= sfPropelFinderUtils::getPeerClassFromClass($relatedClass);
        $operator = isset($args[1]) ? $args[1] : null;
        break;
      case 3:
        // $articleFinder->join('Article.CategoryId', 'Category.Id', 'RIGHT JOIN')
        list($column1, $column2, $operator) = $args;
        list($peerClass1, $column1) = $this->getColName($column1, $peerClass = null, $withPeerClass = true, $autoAddJoin = false);
        if($peerClass1 != $this->peerClass && !$this->hasRelation($peerClass1))
        {
          $this->relations []= $peerClass1;
        }
        list($peerClass2, $column2) = $this->getColName($column2, $peerClass = null, $withPeerClass = true, $autoAddJoin = false);
        if($peerClass2 != $this->peerClass && !$this->hasRelation($peerClass2))
        {
          $this->relations []= $peerClass2;
        }
        break;
    }
    $this->criteria->addJoin($column1, $column2, $operator);
    
    return $this;
  }
  
  protected function hasRelation($peerName)
  {
    return in_array($peerName, $this->relations);
  }
  
  public function getRelation($phpName)
  {
    foreach($this->relations as $peerClass)
    {
      // try to find many to one or one to one relationship
      if($relation = $this->findRelation($phpName, $peerClass))
      {
        return $relation;
      }
      // try to find one to many relationship
      if($relation = $this->findRelation(
        sfPropelFinderUtils::getClassFromPeerClass($peerClass),
        sfPropelFinderUtils::getPeerClassFromClass($phpName)))
      {
        return array_reverse($relation);
      }
    }
    throw new Exception(sprintf('sfPropelFinder: %s has no %s related table', $this->peerClass, $phpName));
  }
  
  protected function findRelation($phpName, $peerClass)
  {
    foreach (sfPropelFinderUtils::getColumnsForPeerClass($peerClass) as $c)
    {
      if ($c->isForeignKey())
      {
        if(!$this->databaseMap->containsTable($c->getRelatedTableName()))
        {
          $mapBuilder = call_user_func(array(sfPropelFinderUtils::getPeerClassFromClass($phpName), 'getMapBuilder')); 
          $mapBuilder->doBuild();
        }
        try
        {
          $tableMap = $this->databaseMap->getTable($c->getRelatedTableName());
        }
        catch (PropelException $e)
        {
          // so $c->getRelatedTable() is not in the database map
          // even though the $phpName table map has been initialized
          // we are obviously looking for the wrong table here
          continue;
        }
        if($tableMap->getPhpName() == $phpName)
        {
          return array(
            constant($peerClass.'::'.$c->getColumnName()),
            $c->getRelatedName()
          );
        }

      }
    }
    
    return false;
  }
  
  /**
   * Behavior-like supplementary getter for supplementary columns added by way of withColumn()
   * Requires symfony and sfMixer enabled
   */
  public function getColumn($object, $alias)
  {
    $alias = 'a'.md5($alias);
    return $object->$alias;
  }

  public function setColumn($object, $alias, $value)
  {
    $alias = 'a'.md5($alias);
    $object->$alias = $value;
  }
  
  protected function addTrueCondition(Criteria $c)
  {
    $fieldNames = call_user_func(array($this->getPeerClass(), 'getFieldNames'), BasePeer::TYPE_COLNAME);
    $firstFieldName = $fieldNames[0];
    $c->add($firstFieldName, true, Criteria::BINARY_OR);
    
    return $c;
  }
  
  protected function getColName($phpName, $peerClass = null, $withPeerClass = false, $autoAddJoin = true)
  {
    if(array_key_exists($phpName, $this->withColumns))
    {
      return $phpName;
    }
    if(strpos($phpName, '.') !== false)
    {
      // Table.Column
      list($class, $phpName) = explode('.', $phpName);
      $peerClass = sfPropelFinderUtils::getPeerClassFromClass($class);
    }
    else if(strpos($phpName, '_') !== false)
    {
      // Table_Column, or Table_Name_Column, so explode is not a solution here
      $limit = strrpos($phpName, '_');
      $class = substr($phpName, 0, $limit);
      $phpName = substr($phpName, $limit + 1);
      $peerClass = sfPropelFinderUtils::getPeerClassFromClass($class);
    }
    if(!$peerClass)
    {
      // Column
      $peerClass = $this->peerClass;
    }
    if($peerClass != $this->peerClass && !$this->hasRelation($peerClass) && $autoAddJoin)
    {
      $this->join($class);
    }
    try
    {
      $column = call_user_func(array($peerClass, 'translateFieldName'), $phpName, BasePeer::TYPE_PHPNAME, BasePeer::TYPE_COLNAME);
      return $withPeerClass ? array($peerClass, $column) : $column;
    }
    catch (PropelException $e)
    {
      throw new Exception(sprintf('sfPropelFinder: %s has no %s column', $peerClass, $phpName));
    }
  }
  
  public function __call($name, $arguments)
  {
    if(strpos($name, 'where') === 0)
    {
      array_unshift($arguments, substr($name, 5));
      return call_user_func_array(array($this, 'where'), $arguments);
    }
    if(strpos($name, 'orderBy') === 0)
    {
      return $this->orderBy(substr($name, 7), $arguments);
    }
    if(strpos($name, 'join') === 0)
    {
      return $this->join(substr($name, 4), $arguments);
    }
    if(($pos = strpos($name, 'Join')) > 0)
    {
      $joinType = strtoupper(substr($name, 0, $pos)) . ' JOIN';
      array_push($arguments, $joinType);
      return call_user_func_array(array($this, 'join'), $arguments);
    }
    if(strpos($name, '_and') === 0)
    {
      array_unshift($arguments, substr($name, 4));
      return call_user_func_array(array($this, '_and'), $arguments);
    }
    if(strpos($name, 'and') === 0)
    {
      array_unshift($arguments, substr($name, 3));
      return call_user_func_array(array($this, '_and'), $arguments);

    }
    if(strpos($name, '_or') === 0)
    {
      array_unshift($arguments, substr($name, 3));
      return call_user_func_array(array($this, '_or'), $arguments);

    }
    if(strpos($name, 'or') === 0)
    {
      array_unshift($arguments, substr($name, 2));
      return call_user_func_array(array($this, '_or'), $arguments);
    }
    if(strpos($name, 'findBy') === 0)
    {
      array_unshift($arguments, substr($name, 6));
      return call_user_func_array(array($this, 'findBy'), $arguments);
    }
    if(strpos($name, 'findOneBy') === 0)
    {
      array_unshift($arguments, substr($name, 9));
      return call_user_func_array(array($this, 'findOneBy'), $arguments);
    }
    if(method_exists($this->criteria, $name))
    {
      call_user_func_array(array($this->criteria, $name), $arguments);
      return $this;
    }
    throw new Exception(sprintf('Undefined method sfPropelFinder::%s()', $name));
  }
}