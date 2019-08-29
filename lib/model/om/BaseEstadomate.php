<?php


abstract class BaseEstadomate extends BaseObject  implements Persistent {


  const PEER = 'EstadomatePeer';

	
	protected static $peer;

	
	protected $id;

	
	protected $nombre;

	
	protected $collDetallecursadas;

	
	private $lastDetallecursadaCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
	}

	
	public function applyDefaultValues()
	{
	}

	
	public function getId()
	{
		return $this->id;
	}

	
	public function getNombre()
	{
		return $this->nombre;
	}

	
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = EstadomatePeer::ID;
		}

		return $this;
	} 
	
	public function setNombre($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->nombre !== $v) {
			$this->nombre = $v;
			$this->modifiedColumns[] = EstadomatePeer::NOMBRE;
		}

		return $this;
	} 
	
	public function hasOnlyDefaultValues()
	{
						if (array_diff($this->modifiedColumns, array())) {
				return false;
			}

				return true;
	} 
	
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->nombre = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

						return $startcol + 2; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Estadomate object", $e);
		}
	}

	
	public function ensureConsistency()
	{

	} 
	
	public function reload($deep = false, PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("Cannot reload a deleted object.");
		}

		if ($this->isNew()) {
			throw new PropelException("Cannot reload an unsaved object.");
		}

		if ($con === null) {
			$con = Propel::getConnection(EstadomatePeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				
		$stmt = EstadomatePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); 
		if ($deep) {  
			$this->collDetallecursadas = null;
			$this->lastDetallecursadaCriteria = null;

		} 	}

	
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(EstadomatePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			EstadomatePeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	
	public function save(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(EstadomatePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
			EstadomatePeer::addInstanceToPool($this);
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	
	protected function doSave(PropelPDO $con)
	{
		$affectedRows = 0; 		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;

			if ($this->isNew() ) {
				$this->modifiedColumns[] = EstadomatePeer::ID;
			}

						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = EstadomatePeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += EstadomatePeer::doUpdate($this, $con);
				}

				$this->resetModified(); 			}

			if ($this->collDetallecursadas !== null) {
				foreach ($this->collDetallecursadas as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			$this->alreadyInSave = false;

		}
		return $affectedRows;
	} 
	
	protected $validationFailures = array();

	
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


			if (($retval = EstadomatePeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collDetallecursadas !== null) {
					foreach ($this->collDetallecursadas as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = EstadomatePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		$field = $this->getByPosition($pos);
		return $field;
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getNombre();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = EstadomatePeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNombre(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = EstadomatePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setNombre($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = EstadomatePeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNombre($arr[$keys[1]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(EstadomatePeer::DATABASE_NAME);

		if ($this->isColumnModified(EstadomatePeer::ID)) $criteria->add(EstadomatePeer::ID, $this->id);
		if ($this->isColumnModified(EstadomatePeer::NOMBRE)) $criteria->add(EstadomatePeer::NOMBRE, $this->nombre);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(EstadomatePeer::DATABASE_NAME);

		$criteria->add(EstadomatePeer::ID, $this->id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setNombre($this->nombre);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach ($this->getDetallecursadas() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addDetallecursada($relObj->copy($deepCopy));
				}
			}

		} 

		$copyObj->setNew(true);

		$copyObj->setId(NULL); 
	}

	
	public function copy($deepCopy = false)
	{
				$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new EstadomatePeer();
		}
		return self::$peer;
	}

	
	public function clearDetallecursadas()
	{
		$this->collDetallecursadas = null; 	}

	
	public function initDetallecursadas()
	{
		$this->collDetallecursadas = array();
	}

	
	public function getDetallecursadas($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(EstadomatePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDetallecursadas === null) {
			if ($this->isNew()) {
			   $this->collDetallecursadas = array();
			} else {

				$criteria->add(DetallecursadaPeer::FK_DCURSADA_ID, $this->id);

				DetallecursadaPeer::addSelectColumns($criteria);
				$this->collDetallecursadas = DetallecursadaPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(DetallecursadaPeer::FK_DCURSADA_ID, $this->id);

				DetallecursadaPeer::addSelectColumns($criteria);
				if (!isset($this->lastDetallecursadaCriteria) || !$this->lastDetallecursadaCriteria->equals($criteria)) {
					$this->collDetallecursadas = DetallecursadaPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastDetallecursadaCriteria = $criteria;
		return $this->collDetallecursadas;
	}

	
	public function countDetallecursadas(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(EstadomatePeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collDetallecursadas === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(DetallecursadaPeer::FK_DCURSADA_ID, $this->id);

				$count = DetallecursadaPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(DetallecursadaPeer::FK_DCURSADA_ID, $this->id);

				if (!isset($this->lastDetallecursadaCriteria) || !$this->lastDetallecursadaCriteria->equals($criteria)) {
					$count = DetallecursadaPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collDetallecursadas);
				}
			} else {
				$count = count($this->collDetallecursadas);
			}
		}
		return $count;
	}

	
	public function addDetallecursada(Detallecursada $l)
	{
		if ($this->collDetallecursadas === null) {
			$this->initDetallecursadas();
		}
		if (!in_array($l, $this->collDetallecursadas, true)) { 			array_push($this->collDetallecursadas, $l);
			$l->setEstadomate($this);
		}
	}


	
	public function getDetallecursadasJoinCursada($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(EstadomatePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDetallecursadas === null) {
			if ($this->isNew()) {
				$this->collDetallecursadas = array();
			} else {

				$criteria->add(DetallecursadaPeer::FK_DCURSADA_ID, $this->id);

				$this->collDetallecursadas = DetallecursadaPeer::doSelectJoinCursada($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(DetallecursadaPeer::FK_DCURSADA_ID, $this->id);

			if (!isset($this->lastDetallecursadaCriteria) || !$this->lastDetallecursadaCriteria->equals($criteria)) {
				$this->collDetallecursadas = DetallecursadaPeer::doSelectJoinCursada($criteria, $con, $join_behavior);
			}
		}
		$this->lastDetallecursadaCriteria = $criteria;

		return $this->collDetallecursadas;
	}


	
	public function getDetallecursadasJoinActividad($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(EstadomatePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDetallecursadas === null) {
			if ($this->isNew()) {
				$this->collDetallecursadas = array();
			} else {

				$criteria->add(DetallecursadaPeer::FK_DCURSADA_ID, $this->id);

				$this->collDetallecursadas = DetallecursadaPeer::doSelectJoinActividad($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(DetallecursadaPeer::FK_DCURSADA_ID, $this->id);

			if (!isset($this->lastDetallecursadaCriteria) || !$this->lastDetallecursadaCriteria->equals($criteria)) {
				$this->collDetallecursadas = DetallecursadaPeer::doSelectJoinActividad($criteria, $con, $join_behavior);
			}
		}
		$this->lastDetallecursadaCriteria = $criteria;

		return $this->collDetallecursadas;
	}


	
	public function getDetallecursadasJoinAlumno($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(EstadomatePeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDetallecursadas === null) {
			if ($this->isNew()) {
				$this->collDetallecursadas = array();
			} else {

				$criteria->add(DetallecursadaPeer::FK_DCURSADA_ID, $this->id);

				$this->collDetallecursadas = DetallecursadaPeer::doSelectJoinAlumno($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(DetallecursadaPeer::FK_DCURSADA_ID, $this->id);

			if (!isset($this->lastDetallecursadaCriteria) || !$this->lastDetallecursadaCriteria->equals($criteria)) {
				$this->collDetallecursadas = DetallecursadaPeer::doSelectJoinAlumno($criteria, $con, $join_behavior);
			}
		}
		$this->lastDetallecursadaCriteria = $criteria;

		return $this->collDetallecursadas;
	}

	
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
			if ($this->collDetallecursadas) {
				foreach ((array) $this->collDetallecursadas as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} 
		$this->collDetallecursadas = null;
	}

} 