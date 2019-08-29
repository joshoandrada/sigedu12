<?php


abstract class BaseEstadomateren extends BaseObject  implements Persistent {


  const PEER = 'EstadomaterenPeer';

	
	protected static $peer;

	
	protected $id;

	
	protected $nombre;

	
	protected $collDetallerendirs;

	
	private $lastDetallerendirCriteria = null;

	
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
			$this->modifiedColumns[] = EstadomaterenPeer::ID;
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
			$this->modifiedColumns[] = EstadomaterenPeer::NOMBRE;
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
			throw new PropelException("Error populating Estadomateren object", $e);
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
			$con = Propel::getConnection(EstadomaterenPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				
		$stmt = EstadomaterenPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); 
		if ($deep) {  
			$this->collDetallerendirs = null;
			$this->lastDetallerendirCriteria = null;

		} 	}

	
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(EstadomaterenPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			EstadomaterenPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(EstadomaterenPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
			EstadomaterenPeer::addInstanceToPool($this);
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
				$this->modifiedColumns[] = EstadomaterenPeer::ID;
			}

						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = EstadomaterenPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += EstadomaterenPeer::doUpdate($this, $con);
				}

				$this->resetModified(); 			}

			if ($this->collDetallerendirs !== null) {
				foreach ($this->collDetallerendirs as $referrerFK) {
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


			if (($retval = EstadomaterenPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collDetallerendirs !== null) {
					foreach ($this->collDetallerendirs as $referrerFK) {
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
		$pos = EstadomaterenPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
		$keys = EstadomaterenPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNombre(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = EstadomaterenPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
		$keys = EstadomaterenPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNombre($arr[$keys[1]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(EstadomaterenPeer::DATABASE_NAME);

		if ($this->isColumnModified(EstadomaterenPeer::ID)) $criteria->add(EstadomaterenPeer::ID, $this->id);
		if ($this->isColumnModified(EstadomaterenPeer::NOMBRE)) $criteria->add(EstadomaterenPeer::NOMBRE, $this->nombre);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(EstadomaterenPeer::DATABASE_NAME);

		$criteria->add(EstadomaterenPeer::ID, $this->id);

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

			foreach ($this->getDetallerendirs() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addDetallerendir($relObj->copy($deepCopy));
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
			self::$peer = new EstadomaterenPeer();
		}
		return self::$peer;
	}

	
	public function clearDetallerendirs()
	{
		$this->collDetallerendirs = null; 	}

	
	public function initDetallerendirs()
	{
		$this->collDetallerendirs = array();
	}

	
	public function getDetallerendirs($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(EstadomaterenPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDetallerendirs === null) {
			if ($this->isNew()) {
			   $this->collDetallerendirs = array();
			} else {

				$criteria->add(DetallerendirPeer::FK_DCURSADA_ID, $this->id);

				DetallerendirPeer::addSelectColumns($criteria);
				$this->collDetallerendirs = DetallerendirPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(DetallerendirPeer::FK_DCURSADA_ID, $this->id);

				DetallerendirPeer::addSelectColumns($criteria);
				if (!isset($this->lastDetallerendirCriteria) || !$this->lastDetallerendirCriteria->equals($criteria)) {
					$this->collDetallerendirs = DetallerendirPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastDetallerendirCriteria = $criteria;
		return $this->collDetallerendirs;
	}

	
	public function countDetallerendirs(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(EstadomaterenPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collDetallerendirs === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(DetallerendirPeer::FK_DCURSADA_ID, $this->id);

				$count = DetallerendirPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(DetallerendirPeer::FK_DCURSADA_ID, $this->id);

				if (!isset($this->lastDetallerendirCriteria) || !$this->lastDetallerendirCriteria->equals($criteria)) {
					$count = DetallerendirPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collDetallerendirs);
				}
			} else {
				$count = count($this->collDetallerendirs);
			}
		}
		return $count;
	}

	
	public function addDetallerendir(Detallerendir $l)
	{
		if ($this->collDetallerendirs === null) {
			$this->initDetallerendirs();
		}
		if (!in_array($l, $this->collDetallerendirs, true)) { 			array_push($this->collDetallerendirs, $l);
			$l->setEstadomateren($this);
		}
	}


	
	public function getDetallerendirsJoinCursada($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(EstadomaterenPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDetallerendirs === null) {
			if ($this->isNew()) {
				$this->collDetallerendirs = array();
			} else {

				$criteria->add(DetallerendirPeer::FK_DCURSADA_ID, $this->id);

				$this->collDetallerendirs = DetallerendirPeer::doSelectJoinCursada($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(DetallerendirPeer::FK_DCURSADA_ID, $this->id);

			if (!isset($this->lastDetallerendirCriteria) || !$this->lastDetallerendirCriteria->equals($criteria)) {
				$this->collDetallerendirs = DetallerendirPeer::doSelectJoinCursada($criteria, $con, $join_behavior);
			}
		}
		$this->lastDetallerendirCriteria = $criteria;

		return $this->collDetallerendirs;
	}


	
	public function getDetallerendirsJoinActividad($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(EstadomaterenPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDetallerendirs === null) {
			if ($this->isNew()) {
				$this->collDetallerendirs = array();
			} else {

				$criteria->add(DetallerendirPeer::FK_DCURSADA_ID, $this->id);

				$this->collDetallerendirs = DetallerendirPeer::doSelectJoinActividad($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(DetallerendirPeer::FK_DCURSADA_ID, $this->id);

			if (!isset($this->lastDetallerendirCriteria) || !$this->lastDetallerendirCriteria->equals($criteria)) {
				$this->collDetallerendirs = DetallerendirPeer::doSelectJoinActividad($criteria, $con, $join_behavior);
			}
		}
		$this->lastDetallerendirCriteria = $criteria;

		return $this->collDetallerendirs;
	}


	
	public function getDetallerendirsJoinAlumno($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(EstadomaterenPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDetallerendirs === null) {
			if ($this->isNew()) {
				$this->collDetallerendirs = array();
			} else {

				$criteria->add(DetallerendirPeer::FK_DCURSADA_ID, $this->id);

				$this->collDetallerendirs = DetallerendirPeer::doSelectJoinAlumno($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(DetallerendirPeer::FK_DCURSADA_ID, $this->id);

			if (!isset($this->lastDetallerendirCriteria) || !$this->lastDetallerendirCriteria->equals($criteria)) {
				$this->collDetallerendirs = DetallerendirPeer::doSelectJoinAlumno($criteria, $con, $join_behavior);
			}
		}
		$this->lastDetallerendirCriteria = $criteria;

		return $this->collDetallerendirs;
	}


	
	public function getDetallerendirsJoinLlamados($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(EstadomaterenPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDetallerendirs === null) {
			if ($this->isNew()) {
				$this->collDetallerendirs = array();
			} else {

				$criteria->add(DetallerendirPeer::FK_DCURSADA_ID, $this->id);

				$this->collDetallerendirs = DetallerendirPeer::doSelectJoinLlamados($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(DetallerendirPeer::FK_DCURSADA_ID, $this->id);

			if (!isset($this->lastDetallerendirCriteria) || !$this->lastDetallerendirCriteria->equals($criteria)) {
				$this->collDetallerendirs = DetallerendirPeer::doSelectJoinLlamados($criteria, $con, $join_behavior);
			}
		}
		$this->lastDetallerendirCriteria = $criteria;

		return $this->collDetallerendirs;
	}

	
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
			if ($this->collDetallerendirs) {
				foreach ((array) $this->collDetallerendirs as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} 
		$this->collDetallerendirs = null;
	}

} 