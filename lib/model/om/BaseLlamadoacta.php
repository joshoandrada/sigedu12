<?php


abstract class BaseLlamadoacta extends BaseObject  implements Persistent {


  const PEER = 'LlamadoactaPeer';

	
	protected static $peer;

	
	protected $id;

	
	protected $fk_llamados_id;

	
	protected $aLlamados;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
	}

	
	public function applyDefaultValues()
	{
		$this->fk_llamados_id = 1;
	}

	
	public function getId()
	{
		return $this->id;
	}

	
	public function getFkLlamadosId()
	{
		return $this->fk_llamados_id;
	}

	
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = LlamadoactaPeer::ID;
		}

		return $this;
	} 
	
	public function setFkLlamadosId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->fk_llamados_id !== $v || $v === 1) {
			$this->fk_llamados_id = $v;
			$this->modifiedColumns[] = LlamadoactaPeer::FK_LLAMADOS_ID;
		}

		if ($this->aLlamados !== null && $this->aLlamados->getId() !== $v) {
			$this->aLlamados = null;
		}

		return $this;
	} 
	
	public function hasOnlyDefaultValues()
	{
						if (array_diff($this->modifiedColumns, array(LlamadoactaPeer::FK_LLAMADOS_ID))) {
				return false;
			}

			if ($this->fk_llamados_id !== 1) {
				return false;
			}

				return true;
	} 
	
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->fk_llamados_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

						return $startcol + 2; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Llamadoacta object", $e);
		}
	}

	
	public function ensureConsistency()
	{

		if ($this->aLlamados !== null && $this->fk_llamados_id !== $this->aLlamados->getId()) {
			$this->aLlamados = null;
		}
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
			$con = Propel::getConnection(LlamadoactaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				
		$stmt = LlamadoactaPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); 
		if ($deep) {  
			$this->aLlamados = null;
		} 	}

	
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(LlamadoactaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			LlamadoactaPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LlamadoactaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
			LlamadoactaPeer::addInstanceToPool($this);
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

												
			if ($this->aLlamados !== null) {
				if ($this->aLlamados->isModified() || $this->aLlamados->isNew()) {
					$affectedRows += $this->aLlamados->save($con);
				}
				$this->setLlamados($this->aLlamados);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = LlamadoactaPeer::ID;
			}

						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = LlamadoactaPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LlamadoactaPeer::doUpdate($this, $con);
				}

				$this->resetModified(); 			}

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


												
			if ($this->aLlamados !== null) {
				if (!$this->aLlamados->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLlamados->getValidationFailures());
				}
			}


			if (($retval = LlamadoactaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LlamadoactaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getFkLlamadosId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = LlamadoactaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getFkLlamadosId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LlamadoactaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setFkLlamadosId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LlamadoactaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFkLlamadosId($arr[$keys[1]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LlamadoactaPeer::DATABASE_NAME);

		if ($this->isColumnModified(LlamadoactaPeer::ID)) $criteria->add(LlamadoactaPeer::ID, $this->id);
		if ($this->isColumnModified(LlamadoactaPeer::FK_LLAMADOS_ID)) $criteria->add(LlamadoactaPeer::FK_LLAMADOS_ID, $this->fk_llamados_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LlamadoactaPeer::DATABASE_NAME);

		$criteria->add(LlamadoactaPeer::ID, $this->id);

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

		$copyObj->setFkLlamadosId($this->fk_llamados_id);


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
			self::$peer = new LlamadoactaPeer();
		}
		return self::$peer;
	}

	
	public function setLlamados(Llamados $v = null)
	{
		if ($v === null) {
			$this->setFkLlamadosId(1);
		} else {
			$this->setFkLlamadosId($v->getId());
		}

		$this->aLlamados = $v;

						if ($v !== null) {
			$v->addLlamadoacta($this);
		}

		return $this;
	}


	
	public function getLlamados(PropelPDO $con = null)
	{
		if ($this->aLlamados === null && ($this->fk_llamados_id !== null)) {
			$c = new Criteria(LlamadosPeer::DATABASE_NAME);
			$c->add(LlamadosPeer::ID, $this->fk_llamados_id);
			$this->aLlamados = LlamadosPeer::doSelectOne($c, $con);
			
		}
		return $this->aLlamados;
	}

	
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
		} 
			$this->aLlamados = null;
	}

} 