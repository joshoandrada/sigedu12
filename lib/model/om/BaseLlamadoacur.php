<?php


abstract class BaseLlamadoacur extends BaseObject  implements Persistent {


  const PEER = 'LlamadoacurPeer';

	
	protected static $peer;

	
	protected $id;

	
	protected $fecha_inicio;

	
	protected $fecha_final;

	
	protected $turno;

	
	protected $llamado;

	
	protected $fk_llamadoscur_id;

	
	protected $aLlamadoscur;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
	}

	
	public function applyDefaultValues()
	{
		$this->llamado = true;
		$this->fk_llamadoscur_id = 1;
	}

	
	public function getId()
	{
		return $this->id;
	}

	
	public function getFechaInicio($format = 'Y-m-d H:i:s')
	{
		if ($this->fecha_inicio === null) {
			return null;
		}


		if ($this->fecha_inicio === '0000-00-00 00:00:00') {
									return null;
		} else {
			try {
				$dt = new DateTime($this->fecha_inicio);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->fecha_inicio, true), $x);
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

	
	public function getFechaFinal($format = 'Y-m-d H:i:s')
	{
		if ($this->fecha_final === null) {
			return null;
		}


		if ($this->fecha_final === '0000-00-00 00:00:00') {
									return null;
		} else {
			try {
				$dt = new DateTime($this->fecha_final);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->fecha_final, true), $x);
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

	
	public function getTurno()
	{
		return $this->turno;
	}

	
	public function getLlamado()
	{
		return $this->llamado;
	}

	
	public function getFkLlamadoscurId()
	{
		return $this->fk_llamadoscur_id;
	}

	
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = LlamadoacurPeer::ID;
		}

		return $this;
	} 
	
	public function setFechaInicio($v)
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

		if ( $this->fecha_inicio !== null || $dt !== null ) {
			
			$currNorm = ($this->fecha_inicio !== null && $tmpDt = new DateTime($this->fecha_inicio)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) 					)
			{
				$this->fecha_inicio = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = LlamadoacurPeer::FECHA_INICIO;
			}
		} 
		return $this;
	} 
	
	public function setFechaFinal($v)
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

		if ( $this->fecha_final !== null || $dt !== null ) {
			
			$currNorm = ($this->fecha_final !== null && $tmpDt = new DateTime($this->fecha_final)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) 					)
			{
				$this->fecha_final = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = LlamadoacurPeer::FECHA_FINAL;
			}
		} 
		return $this;
	} 
	
	public function setTurno($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->turno !== $v) {
			$this->turno = $v;
			$this->modifiedColumns[] = LlamadoacurPeer::TURNO;
		}

		return $this;
	} 
	
	public function setLlamado($v)
	{
		if ($v !== null) {
			$v = (boolean) $v;
		}

		if ($this->llamado !== $v || $v === true) {
			$this->llamado = $v;
			$this->modifiedColumns[] = LlamadoacurPeer::LLAMADO;
		}

		return $this;
	} 
	
	public function setFkLlamadoscurId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->fk_llamadoscur_id !== $v || $v === 1) {
			$this->fk_llamadoscur_id = $v;
			$this->modifiedColumns[] = LlamadoacurPeer::FK_LLAMADOSCUR_ID;
		}

		if ($this->aLlamadoscur !== null && $this->aLlamadoscur->getId() !== $v) {
			$this->aLlamadoscur = null;
		}

		return $this;
	} 
	
	public function hasOnlyDefaultValues()
	{
						if (array_diff($this->modifiedColumns, array(LlamadoacurPeer::LLAMADO,LlamadoacurPeer::FK_LLAMADOSCUR_ID))) {
				return false;
			}

			if ($this->llamado !== true) {
				return false;
			}

			if ($this->fk_llamadoscur_id !== 1) {
				return false;
			}

				return true;
	} 
	
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->fecha_inicio = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->fecha_final = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->turno = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->llamado = ($row[$startcol + 4] !== null) ? (boolean) $row[$startcol + 4] : null;
			$this->fk_llamadoscur_id = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

						return $startcol + 6; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Llamadoacur object", $e);
		}
	}

	
	public function ensureConsistency()
	{

		if ($this->aLlamadoscur !== null && $this->fk_llamadoscur_id !== $this->aLlamadoscur->getId()) {
			$this->aLlamadoscur = null;
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
			$con = Propel::getConnection(LlamadoacurPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				
		$stmt = LlamadoacurPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); 
		if ($deep) {  
			$this->aLlamadoscur = null;
		} 	}

	
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(LlamadoacurPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			LlamadoacurPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LlamadoacurPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
			LlamadoacurPeer::addInstanceToPool($this);
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

												
			if ($this->aLlamadoscur !== null) {
				if ($this->aLlamadoscur->isModified() || $this->aLlamadoscur->isNew()) {
					$affectedRows += $this->aLlamadoscur->save($con);
				}
				$this->setLlamadoscur($this->aLlamadoscur);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = LlamadoacurPeer::ID;
			}

						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = LlamadoacurPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LlamadoacurPeer::doUpdate($this, $con);
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


												
			if ($this->aLlamadoscur !== null) {
				if (!$this->aLlamadoscur->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLlamadoscur->getValidationFailures());
				}
			}


			if (($retval = LlamadoacurPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LlamadoacurPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getFechaInicio();
				break;
			case 2:
				return $this->getFechaFinal();
				break;
			case 3:
				return $this->getTurno();
				break;
			case 4:
				return $this->getLlamado();
				break;
			case 5:
				return $this->getFkLlamadoscurId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = LlamadoacurPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getFechaInicio(),
			$keys[2] => $this->getFechaFinal(),
			$keys[3] => $this->getTurno(),
			$keys[4] => $this->getLlamado(),
			$keys[5] => $this->getFkLlamadoscurId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LlamadoacurPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setFechaInicio($value);
				break;
			case 2:
				$this->setFechaFinal($value);
				break;
			case 3:
				$this->setTurno($value);
				break;
			case 4:
				$this->setLlamado($value);
				break;
			case 5:
				$this->setFkLlamadoscurId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LlamadoacurPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFechaInicio($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFechaFinal($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTurno($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setLlamado($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFkLlamadoscurId($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LlamadoacurPeer::DATABASE_NAME);

		if ($this->isColumnModified(LlamadoacurPeer::ID)) $criteria->add(LlamadoacurPeer::ID, $this->id);
		if ($this->isColumnModified(LlamadoacurPeer::FECHA_INICIO)) $criteria->add(LlamadoacurPeer::FECHA_INICIO, $this->fecha_inicio);
		if ($this->isColumnModified(LlamadoacurPeer::FECHA_FINAL)) $criteria->add(LlamadoacurPeer::FECHA_FINAL, $this->fecha_final);
		if ($this->isColumnModified(LlamadoacurPeer::TURNO)) $criteria->add(LlamadoacurPeer::TURNO, $this->turno);
		if ($this->isColumnModified(LlamadoacurPeer::LLAMADO)) $criteria->add(LlamadoacurPeer::LLAMADO, $this->llamado);
		if ($this->isColumnModified(LlamadoacurPeer::FK_LLAMADOSCUR_ID)) $criteria->add(LlamadoacurPeer::FK_LLAMADOSCUR_ID, $this->fk_llamadoscur_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LlamadoacurPeer::DATABASE_NAME);

		$criteria->add(LlamadoacurPeer::ID, $this->id);

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

		$copyObj->setFechaInicio($this->fecha_inicio);

		$copyObj->setFechaFinal($this->fecha_final);

		$copyObj->setTurno($this->turno);

		$copyObj->setLlamado($this->llamado);

		$copyObj->setFkLlamadoscurId($this->fk_llamadoscur_id);


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
			self::$peer = new LlamadoacurPeer();
		}
		return self::$peer;
	}

	
	public function setLlamadoscur(Llamadoscur $v = null)
	{
		if ($v === null) {
			$this->setFkLlamadoscurId(1);
		} else {
			$this->setFkLlamadoscurId($v->getId());
		}

		$this->aLlamadoscur = $v;

						if ($v !== null) {
			$v->addLlamadoacur($this);
		}

		return $this;
	}


	
	public function getLlamadoscur(PropelPDO $con = null)
	{
		if ($this->aLlamadoscur === null && ($this->fk_llamadoscur_id !== null)) {
			$c = new Criteria(LlamadoscurPeer::DATABASE_NAME);
			$c->add(LlamadoscurPeer::ID, $this->fk_llamadoscur_id);
			$this->aLlamadoscur = LlamadoscurPeer::doSelectOne($c, $con);
			
		}
		return $this->aLlamadoscur;
	}

	
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
		} 
			$this->aLlamadoscur = null;
	}

} 