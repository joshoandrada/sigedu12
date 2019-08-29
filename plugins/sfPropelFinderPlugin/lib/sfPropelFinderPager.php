<?php
class sfPropelFinderPager extends sfPropelPager
{
  protected 
    $finder, 
    $connection;

  /**
   * __construct
   *
   * @return void
   */
  public function __construct($class, $defaultMaxPerPage = 10)
  {
    parent::__construct($class, $defaultMaxPerPage);

    $this->setFinder(sfPropelFinder::from($class));
  }

  /**
   * Get the finder for the pager
   *
   * @return sfPropelFinder $finder
   */
  public function getFinder()
  {
    return $this->finder;
  }

  /**
   * Set finder object for the pager
   *
   * @param sfPropelFinder $finder
   * @return void
   */
  public function setConnection($connection)
  {
    $this->connection = $connection;
  }

  /**
   * Get the connection for the pager
   *
   * @return Connection $connection
   */
  public function getConnection()
  {
    return $this->connection;
  }

  /**
   * Set finder object for the pager
   *
   * @param sfPropelFinder $finder
   * @return void
   */
  public function setFinder($finder)
  {
    $this->finder = $finder;
  }

  /**
   * init pager
   *
   * @return void
   */
  public function init($con = null)
  {
    $hasMaxRecordLimit = ($this->getMaxRecordLimit() !== false);
    $maxRecordLimit = $this->getMaxRecordLimit();

    $finderForCount = clone $this->getFinder();
    $count = $finderForCount->
      setOffset(0)->
      setLimit(0)->
      clearGroupByColumns()->
      count($con ? $con : $this->getConnection());

    $this->setNbResults($hasMaxRecordLimit ? min($count, $maxRecordLimit) : $count);
    
    $this->finder->
      setOffset(0)->
      setLimit(0);
      
    if (($this->getPage() == 0 || $this->getMaxPerPage() == 0))
    {
      $this->setLastPage(0);
    }
    else
    {
      $this->setLastPage(ceil($this->getNbResults() / $this->getMaxPerPage()));

      $offset = ($this->getPage() - 1) * $this->getMaxPerPage();
      $this->finder->setOffset($offset);

      if ($hasMaxRecordLimit)
      {
        $maxRecordLimit = $maxRecordLimit - $offset;
        if ($maxRecordLimit > $this->getMaxPerPage())
        {
          $this->finder->setLimit($this->getMaxPerPage());
        }
        else
        {
          $this->finder->setLimit($maxRecordLimit);
        }
      }
      else
      {
        $this->finder->setLimit($this->getMaxPerPage());
      }
    }
    
  }

  /**
   * Retrieve the object for a certain offset
   *
   * @param integer $offset 
   * @return BaseObject $record
   */
  protected function retrieveObject($offset)
  {
    $finderForRetrieve = clone $this->getFinder();

    return $finderForRetrieve->
      setOffset($offset - 1)->
      findOne();
  }
  
  /**
   * Retrieve the object for a certain offset
   *
   * @return Array $array of BaseObject instances
   */
  public function getResults($con = null)
  {
    return $this->getFinder()->find($con ? $con : $this->getConnection());
  }
  
}