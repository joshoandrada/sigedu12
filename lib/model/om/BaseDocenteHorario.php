<?php


abstract class BaseDocenteHorario extends BaseObject  implements Persistent {


  const PEER = 'DocenteHorarioPeer';

	
	protected static $peer;

	
	protected $fk_docente_id;

	
	protected $aDocente;

	
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

	
	public function getFkDocenteId()
	{
		return $this->fk_docente_id;
	}

	
	public function setFkDocenteId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->fk_docente_id !== $v) {
			$this->fk_docente_id = $v;
			$this->modifiedColumns[] = DocenteHorarioPeer::FK_DOCENTE_ID;
		}

		if ($this->aDocente !== null && $this->aDocente->getId() !== $v) {
			$this->aDocente = null;
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

			$this->fk_docente_id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

						return $startcol + 1; 
		} catch (Exception $e) {
			throw new PropelException("Error populating DocenteHorario object", $e);
		}
	}

	
	public function ensureConsistency()
	{

		if ($this->aDocente !== null && $this->fk_docente_id !== $this->aDocente->getId()) {
			$this->aDocente = null;
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
			$con = Propel::getConnection(DocenteHorarioPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				
		$stmt = DocenteHorarioPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); 
		if ($deep) {  
			$this->aDocente = null;
		} 	}

	
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(DocenteHorarioPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			DocenteHorarioPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(DocenteHorarioPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
			DocenteHorarioPeer::addInstanceToPool($this);
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

												
			if ($this->aDocente !== null) {
				if ($this->aDocente->isModified() || $this->aDocente->isNew()) {
					$affectedRows += $this->aDocente->save($con);
				}
				$this->setDocente($this->aDocente);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = DocenteHorarioPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += DocenteHorarioPeer::doUpdate($this, $con);
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


												
			if ($this->aDocente !== null) {
				if (!$this->aDocente->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aDocente->getValidationFailures());
				}
			}


			if (($retval = DocenteHorarioPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = DocenteHorarioPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		$field = $this->getByPosition($pos);
		return $field;
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getFkDocenteId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = DocenteHorarioPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getFkDocenteId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = DocenteHorarioPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setFkDocenteId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = DocenteHorarioPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setFkDocenteId($arr[$keys[0]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(DocenteHorarioPeer::DATABASE_NAME);

		if ($this->isColumnModified(DocenteHorarioPeer::FK_DOCENTE_ID)) $criteria->add(DocenteHorarioPeer::FK_DOCENTE_ID, $this->fk_docente_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(DocenteHorarioPeer::DATABASE_NAME);

		$criteria->add(DocenteHorarioPeer::FK_DOCENTE_ID, $this->fk_docente_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getFkDocenteId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setFkDocenteId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setFkDocenteId($this->fk_docente_id);


		$copyObj->setNew(true);

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
			self::$peer = new DocenteHorarioPeer();
		}
		return self::$peer;
	}

	
	public function setDocente(Docente $v = null)
	{
		if ($v === null) {
			$this->setFkDocenteId(NULL);
		} else {
			$this->setFkDocenteId($v->getId());
		}

		$this->aDocente = $v;

				if ($v !== null) {
			$v->setDocenteHorario($this);
		}

		return $this;
	}


	
	public function getDocente(PropelPDO $con = null)
	{
		if ($this->aDocente === null && ($this->fk_docente_id !== null)) {
			$c = new Criteria(DocentePeer::DATABASE_NAME);
			$c->add(DocentePeer::ID, $this->fk_docente_id);
			$this->aDocente = DocentePeer::doSelectOne($c, $con);
						$this->aDocente->setDocenteHorario($this);
		}
		return $this->aDocente;
	}

	
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
		} 
			$this->aDocente = null;
	}

} 