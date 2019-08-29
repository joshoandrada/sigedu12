<?php


abstract class BaseRendida extends BaseObject  implements Persistent {


  const PEER = 'RendidaPeer';

	
	protected static $peer;

	
	protected $id;

	
	protected $matricula;

	
	protected $fk_alumno_id;

	
	protected $fk_llamada_id;

	
	protected $auxi;

	
	protected $nomape;

	
	protected $fecha;

	
	protected $aAlumno;

	
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
	}

	
	public function getId()
	{
		return $this->id;
	}

	
	public function getMatricula()
	{
		return $this->matricula;
	}

	
	public function getFkAlumnoId()
	{
		return $this->fk_alumno_id;
	}

	
	public function getFkLlamadaId()
	{
		return $this->fk_llamada_id;
	}

	
	public function getAuxi()
	{
		return $this->auxi;
	}

	
	public function getNomape()
	{
		return $this->nomape;
	}

	
	public function getFecha($format = 'Y-m-d')
	{
		if ($this->fecha === null) {
			return null;
		}


		if ($this->fecha === '0000-00-00') {
									return null;
		} else {
			try {
				$dt = new DateTime($this->fecha);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->fecha, true), $x);
			}
		}

		if ($format === null) {
						return $dt;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $dt->format('U'));
		} else {
			return $dt->format($format);
		}
	}

	
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = RendidaPeer::ID;
		}

		return $this;
	} 
	
	public function setMatricula($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->matricula !== $v) {
			$this->matricula = $v;
			$this->modifiedColumns[] = RendidaPeer::MATRICULA;
		}

		return $this;
	} 
	
	public function setFkAlumnoId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->fk_alumno_id !== $v) {
			$this->fk_alumno_id = $v;
			$this->modifiedColumns[] = RendidaPeer::FK_ALUMNO_ID;
		}

		if ($this->aAlumno !== null && $this->aAlumno->getId() !== $v) {
			$this->aAlumno = null;
		}

		return $this;
	} 
	
	public function setFkLlamadaId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->fk_llamada_id !== $v) {
			$this->fk_llamada_id = $v;
			$this->modifiedColumns[] = RendidaPeer::FK_LLAMADA_ID;
		}

		if ($this->aLlamados !== null && $this->aLlamados->getId() !== $v) {
			$this->aLlamados = null;
		}

		return $this;
	} 
	
	public function setAuxi($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->auxi !== $v) {
			$this->auxi = $v;
			$this->modifiedColumns[] = RendidaPeer::AUXI;
		}

		return $this;
	} 
	
	public function setNomape($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->nomape !== $v) {
			$this->nomape = $v;
			$this->modifiedColumns[] = RendidaPeer::NOMAPE;
		}

		return $this;
	} 
	
	public function setFecha($v)
	{
						if ($v === null || $v === '') {
			$dt = null;
		} elseif ($v instanceof DateTime) {
			$dt = $v;
		} else {
									try {
				if (is_numeric($v)) { 					$dt = new DateTime('@'.$v, new DateTimeZone('UTC'));
															$dt->setTimeZone(new DateTimeZone(date_default_timezone_get()));
				} else {
					$dt = new DateTime($v);
				}
			} catch (Exception $x) {
				throw new PropelException('Error parsing date/time value: ' . var_export($v, true), $x);
			}
		}

		if ( $this->fecha !== null || $dt !== null ) {
			
			$currNorm = ($this->fecha !== null && $tmpDt = new DateTime($this->fecha)) ? $tmpDt->format('Y-m-d') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d') : null;

			if ( ($currNorm !== $newNorm) 					)
			{
				$this->fecha = ($dt ? $dt->format('Y-m-d') : null);
				$this->modifiedColumns[] = RendidaPeer::FECHA;
			}
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
			$this->matricula = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->fk_alumno_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->fk_llamada_id = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->auxi = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
			$this->nomape = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->fecha = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Rendida object", $e);
		}
	}

	
	public function ensureConsistency()
	{

		if ($this->aAlumno !== null && $this->fk_alumno_id !== $this->aAlumno->getId()) {
			$this->aAlumno = null;
		}
		if ($this->aLlamados !== null && $this->fk_llamada_id !== $this->aLlamados->getId()) {
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
			$con = Propel::getConnection(RendidaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				
		$stmt = RendidaPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); 
		if ($deep) {  
			$this->aAlumno = null;
			$this->aLlamados = null;
		} 	}

	
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(RendidaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			RendidaPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(RendidaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
			RendidaPeer::addInstanceToPool($this);
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

												
			if ($this->aAlumno !== null) {
				if ($this->aAlumno->isModified() || $this->aAlumno->isNew()) {
					$affectedRows += $this->aAlumno->save($con);
				}
				$this->setAlumno($this->aAlumno);
			}

			if ($this->aLlamados !== null) {
				if ($this->aLlamados->isModified() || $this->aLlamados->isNew()) {
					$affectedRows += $this->aLlamados->save($con);
				}
				$this->setLlamados($this->aLlamados);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = RendidaPeer::ID;
			}

						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = RendidaPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += RendidaPeer::doUpdate($this, $con);
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


												
			if ($this->aAlumno !== null) {
				if (!$this->aAlumno->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAlumno->getValidationFailures());
				}
			}

			if ($this->aLlamados !== null) {
				if (!$this->aLlamados->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLlamados->getValidationFailures());
				}
			}


			if (($retval = RendidaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RendidaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getMatricula();
				break;
			case 2:
				return $this->getFkAlumnoId();
				break;
			case 3:
				return $this->getFkLlamadaId();
				break;
			case 4:
				return $this->getAuxi();
				break;
			case 5:
				return $this->getNomape();
				break;
			case 6:
				return $this->getFecha();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = RendidaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getMatricula(),
			$keys[2] => $this->getFkAlumnoId(),
			$keys[3] => $this->getFkLlamadaId(),
			$keys[4] => $this->getAuxi(),
			$keys[5] => $this->getNomape(),
			$keys[6] => $this->getFecha(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = RendidaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setMatricula($value);
				break;
			case 2:
				$this->setFkAlumnoId($value);
				break;
			case 3:
				$this->setFkLlamadaId($value);
				break;
			case 4:
				$this->setAuxi($value);
				break;
			case 5:
				$this->setNomape($value);
				break;
			case 6:
				$this->setFecha($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = RendidaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setMatricula($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFkAlumnoId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFkLlamadaId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setAuxi($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setNomape($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFecha($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(RendidaPeer::DATABASE_NAME);

		if ($this->isColumnModified(RendidaPeer::ID)) $criteria->add(RendidaPeer::ID, $this->id);
		if ($this->isColumnModified(RendidaPeer::MATRICULA)) $criteria->add(RendidaPeer::MATRICULA, $this->matricula);
		if ($this->isColumnModified(RendidaPeer::FK_ALUMNO_ID)) $criteria->add(RendidaPeer::FK_ALUMNO_ID, $this->fk_alumno_id);
		if ($this->isColumnModified(RendidaPeer::FK_LLAMADA_ID)) $criteria->add(RendidaPeer::FK_LLAMADA_ID, $this->fk_llamada_id);
		if ($this->isColumnModified(RendidaPeer::AUXI)) $criteria->add(RendidaPeer::AUXI, $this->auxi);
		if ($this->isColumnModified(RendidaPeer::NOMAPE)) $criteria->add(RendidaPeer::NOMAPE, $this->nomape);
		if ($this->isColumnModified(RendidaPeer::FECHA)) $criteria->add(RendidaPeer::FECHA, $this->fecha);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(RendidaPeer::DATABASE_NAME);

		$criteria->add(RendidaPeer::ID, $this->id);

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

		$copyObj->setMatricula($this->matricula);

		$copyObj->setFkAlumnoId($this->fk_alumno_id);

		$copyObj->setFkLlamadaId($this->fk_llamada_id);

		$copyObj->setAuxi($this->auxi);

		$copyObj->setNomape($this->nomape);

		$copyObj->setFecha($this->fecha);


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
			self::$peer = new RendidaPeer();
		}
		return self::$peer;
	}

	
	public function setAlumno(Alumno $v = null)
	{
		if ($v === null) {
			$this->setFkAlumnoId(NULL);
		} else {
			$this->setFkAlumnoId($v->getId());
		}

		$this->aAlumno = $v;

						if ($v !== null) {
			$v->addRendida($this);
		}

		return $this;
	}


	
	public function getAlumno(PropelPDO $con = null)
	{
		if ($this->aAlumno === null && ($this->fk_alumno_id !== null)) {
			$c = new Criteria(AlumnoPeer::DATABASE_NAME);
			$c->add(AlumnoPeer::ID, $this->fk_alumno_id);
			$this->aAlumno = AlumnoPeer::doSelectOne($c, $con);
			
		}
		return $this->aAlumno;
	}

	
	public function setLlamados(Llamados $v = null)
	{
		if ($v === null) {
			$this->setFkLlamadaId(NULL);
		} else {
			$this->setFkLlamadaId($v->getId());
		}

		$this->aLlamados = $v;

						if ($v !== null) {
			$v->addRendida($this);
		}

		return $this;
	}


	
	public function getLlamados(PropelPDO $con = null)
	{
		if ($this->aLlamados === null && ($this->fk_llamada_id !== null)) {
			$c = new Criteria(LlamadosPeer::DATABASE_NAME);
			$c->add(LlamadosPeer::ID, $this->fk_llamada_id);
			$this->aLlamados = LlamadosPeer::doSelectOne($c, $con);
			
		}
		return $this->aLlamados;
	}

	
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
		} 
			$this->aAlumno = null;
			$this->aLlamados = null;
	}

} 