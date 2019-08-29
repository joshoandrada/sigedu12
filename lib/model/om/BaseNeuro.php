<?php


abstract class BaseNeuro extends BaseObject  implements Persistent {


  const PEER = 'NeuroPeer';

	
	protected static $peer;

	
	protected $id;

	
	protected $fk_establecimiento_id;

	
	protected $fk_carrera_id;

	
	protected $nombre;

	
	protected $descripcion;

	
	protected $orden;

	
	protected $anio;

	
	protected $aEstablecimiento;

	
	protected $aCarrera;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
	}

	
	public function applyDefaultValues()
	{
		$this->fk_establecimiento_id = 0;
		$this->fk_carrera_id = 0;
	}

	
	public function getId()
	{
		return $this->id;
	}

	
	public function getFkEstablecimientoId()
	{
		return $this->fk_establecimiento_id;
	}

	
	public function getFkCarreraId()
	{
		return $this->fk_carrera_id;
	}

	
	public function getNombre()
	{
		return $this->nombre;
	}

	
	public function getDescripcion()
	{
		return $this->descripcion;
	}

	
	public function getOrden()
	{
		return $this->orden;
	}

	
	public function getAnio()
	{
		return $this->anio;
	}

	
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = NeuroPeer::ID;
		}

		return $this;
	} 
	
	public function setFkEstablecimientoId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->fk_establecimiento_id !== $v || $v === 0) {
			$this->fk_establecimiento_id = $v;
			$this->modifiedColumns[] = NeuroPeer::FK_ESTABLECIMIENTO_ID;
		}

		if ($this->aEstablecimiento !== null && $this->aEstablecimiento->getId() !== $v) {
			$this->aEstablecimiento = null;
		}

		return $this;
	} 
	
	public function setFkCarreraId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->fk_carrera_id !== $v || $v === 0) {
			$this->fk_carrera_id = $v;
			$this->modifiedColumns[] = NeuroPeer::FK_CARRERA_ID;
		}

		if ($this->aCarrera !== null && $this->aCarrera->getId() !== $v) {
			$this->aCarrera = null;
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
			$this->modifiedColumns[] = NeuroPeer::NOMBRE;
		}

		return $this;
	} 
	
	public function setDescripcion($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->descripcion !== $v) {
			$this->descripcion = $v;
			$this->modifiedColumns[] = NeuroPeer::DESCRIPCION;
		}

		return $this;
	} 
	
	public function setOrden($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->orden !== $v) {
			$this->orden = $v;
			$this->modifiedColumns[] = NeuroPeer::ORDEN;
		}

		return $this;
	} 
	
	public function setAnio($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->anio !== $v) {
			$this->anio = $v;
			$this->modifiedColumns[] = NeuroPeer::ANIO;
		}

		return $this;
	} 
	
	public function hasOnlyDefaultValues()
	{
						if (array_diff($this->modifiedColumns, array(NeuroPeer::FK_ESTABLECIMIENTO_ID,NeuroPeer::FK_CARRERA_ID))) {
				return false;
			}

			if ($this->fk_establecimiento_id !== 0) {
				return false;
			}

			if ($this->fk_carrera_id !== 0) {
				return false;
			}

				return true;
	} 
	
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->fk_establecimiento_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->fk_carrera_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->nombre = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->descripcion = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->orden = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
			$this->anio = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Neuro object", $e);
		}
	}

	
	public function ensureConsistency()
	{

		if ($this->aEstablecimiento !== null && $this->fk_establecimiento_id !== $this->aEstablecimiento->getId()) {
			$this->aEstablecimiento = null;
		}
		if ($this->aCarrera !== null && $this->fk_carrera_id !== $this->aCarrera->getId()) {
			$this->aCarrera = null;
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
			$con = Propel::getConnection(NeuroPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				
		$stmt = NeuroPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); 
		if ($deep) {  
			$this->aEstablecimiento = null;
			$this->aCarrera = null;
		} 	}

	
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(NeuroPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			NeuroPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(NeuroPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
			NeuroPeer::addInstanceToPool($this);
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

												
			if ($this->aEstablecimiento !== null) {
				if ($this->aEstablecimiento->isModified() || $this->aEstablecimiento->isNew()) {
					$affectedRows += $this->aEstablecimiento->save($con);
				}
				$this->setEstablecimiento($this->aEstablecimiento);
			}

			if ($this->aCarrera !== null) {
				if ($this->aCarrera->isModified() || $this->aCarrera->isNew()) {
					$affectedRows += $this->aCarrera->save($con);
				}
				$this->setCarrera($this->aCarrera);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = NeuroPeer::ID;
			}

						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = NeuroPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += NeuroPeer::doUpdate($this, $con);
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


												
			if ($this->aEstablecimiento !== null) {
				if (!$this->aEstablecimiento->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aEstablecimiento->getValidationFailures());
				}
			}

			if ($this->aCarrera !== null) {
				if (!$this->aCarrera->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCarrera->getValidationFailures());
				}
			}


			if (($retval = NeuroPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NeuroPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getFkEstablecimientoId();
				break;
			case 2:
				return $this->getFkCarreraId();
				break;
			case 3:
				return $this->getNombre();
				break;
			case 4:
				return $this->getDescripcion();
				break;
			case 5:
				return $this->getOrden();
				break;
			case 6:
				return $this->getAnio();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = NeuroPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getFkEstablecimientoId(),
			$keys[2] => $this->getFkCarreraId(),
			$keys[3] => $this->getNombre(),
			$keys[4] => $this->getDescripcion(),
			$keys[5] => $this->getOrden(),
			$keys[6] => $this->getAnio(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = NeuroPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setFkEstablecimientoId($value);
				break;
			case 2:
				$this->setFkCarreraId($value);
				break;
			case 3:
				$this->setNombre($value);
				break;
			case 4:
				$this->setDescripcion($value);
				break;
			case 5:
				$this->setOrden($value);
				break;
			case 6:
				$this->setAnio($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = NeuroPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFkEstablecimientoId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFkCarreraId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNombre($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDescripcion($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setOrden($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setAnio($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(NeuroPeer::DATABASE_NAME);

		if ($this->isColumnModified(NeuroPeer::ID)) $criteria->add(NeuroPeer::ID, $this->id);
		if ($this->isColumnModified(NeuroPeer::FK_ESTABLECIMIENTO_ID)) $criteria->add(NeuroPeer::FK_ESTABLECIMIENTO_ID, $this->fk_establecimiento_id);
		if ($this->isColumnModified(NeuroPeer::FK_CARRERA_ID)) $criteria->add(NeuroPeer::FK_CARRERA_ID, $this->fk_carrera_id);
		if ($this->isColumnModified(NeuroPeer::NOMBRE)) $criteria->add(NeuroPeer::NOMBRE, $this->nombre);
		if ($this->isColumnModified(NeuroPeer::DESCRIPCION)) $criteria->add(NeuroPeer::DESCRIPCION, $this->descripcion);
		if ($this->isColumnModified(NeuroPeer::ORDEN)) $criteria->add(NeuroPeer::ORDEN, $this->orden);
		if ($this->isColumnModified(NeuroPeer::ANIO)) $criteria->add(NeuroPeer::ANIO, $this->anio);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(NeuroPeer::DATABASE_NAME);

		$criteria->add(NeuroPeer::ID, $this->id);

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

		$copyObj->setFkEstablecimientoId($this->fk_establecimiento_id);

		$copyObj->setFkCarreraId($this->fk_carrera_id);

		$copyObj->setNombre($this->nombre);

		$copyObj->setDescripcion($this->descripcion);

		$copyObj->setOrden($this->orden);

		$copyObj->setAnio($this->anio);


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
			self::$peer = new NeuroPeer();
		}
		return self::$peer;
	}

	
	public function setEstablecimiento(Establecimiento $v = null)
	{
		if ($v === null) {
			$this->setFkEstablecimientoId(0);
		} else {
			$this->setFkEstablecimientoId($v->getId());
		}

		$this->aEstablecimiento = $v;

						if ($v !== null) {
			$v->addNeuro($this);
		}

		return $this;
	}


	
	public function getEstablecimiento(PropelPDO $con = null)
	{
		if ($this->aEstablecimiento === null && ($this->fk_establecimiento_id !== null)) {
			$c = new Criteria(EstablecimientoPeer::DATABASE_NAME);
			$c->add(EstablecimientoPeer::ID, $this->fk_establecimiento_id);
			$this->aEstablecimiento = EstablecimientoPeer::doSelectOne($c, $con);
			
		}
		return $this->aEstablecimiento;
	}

	
	public function setCarrera(Carrera $v = null)
	{
		if ($v === null) {
			$this->setFkCarreraId(0);
		} else {
			$this->setFkCarreraId($v->getId());
		}

		$this->aCarrera = $v;

						if ($v !== null) {
			$v->addNeuro($this);
		}

		return $this;
	}


	
	public function getCarrera(PropelPDO $con = null)
	{
		if ($this->aCarrera === null && ($this->fk_carrera_id !== null)) {
			$c = new Criteria(CarreraPeer::DATABASE_NAME);
			$c->add(CarreraPeer::ID, $this->fk_carrera_id);
			$this->aCarrera = CarreraPeer::doSelectOne($c, $con);
			
		}
		return $this->aCarrera;
	}

	
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
		} 
			$this->aEstablecimiento = null;
			$this->aCarrera = null;
	}

} 