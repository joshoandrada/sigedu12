<?php


abstract class BasePeriodo extends BaseObject  implements Persistent {


  const PEER = 'PeriodoPeer';

	
	protected static $peer;

	
	protected $id;

	
	protected $fk_ciclolectivo_id;

	
	protected $fecha_inicio;

	
	protected $fecha_fin;

	
	protected $descripcion;

	
	protected $calcular;

	
	protected $formula;

	
	protected $aCiclolectivo;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function __construct()
	{
		parent::__construct();
		$this->applyDefaultValues();
	}

	
	public function applyDefaultValues()
	{
		$this->calcular = false;
	}

	
	public function getId()
	{
		return $this->id;
	}

	
	public function getFkCiclolectivoId()
	{
		return $this->fk_ciclolectivo_id;
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

	
	public function getFechaFin($format = 'Y-m-d H:i:s')
	{
		if ($this->fecha_fin === null) {
			return null;
		}


		if ($this->fecha_fin === '0000-00-00 00:00:00') {
									return null;
		} else {
			try {
				$dt = new DateTime($this->fecha_fin);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->fecha_fin, true), $x);
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

	
	public function getDescripcion()
	{
		return $this->descripcion;
	}

	
	public function getCalcular()
	{
		return $this->calcular;
	}

	
	public function getFormula()
	{
		return $this->formula;
	}

	
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = PeriodoPeer::ID;
		}

		return $this;
	} 
	
	public function setFkCiclolectivoId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->fk_ciclolectivo_id !== $v) {
			$this->fk_ciclolectivo_id = $v;
			$this->modifiedColumns[] = PeriodoPeer::FK_CICLOLECTIVO_ID;
		}

		if ($this->aCiclolectivo !== null && $this->aCiclolectivo->getId() !== $v) {
			$this->aCiclolectivo = null;
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
				$this->modifiedColumns[] = PeriodoPeer::FECHA_INICIO;
			}
		} 
		return $this;
	} 
	
	public function setFechaFin($v)
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

		if ( $this->fecha_fin !== null || $dt !== null ) {
			
			$currNorm = ($this->fecha_fin !== null && $tmpDt = new DateTime($this->fecha_fin)) ? $tmpDt->format('Y-m-d H:i:s') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d H:i:s') : null;

			if ( ($currNorm !== $newNorm) 					)
			{
				$this->fecha_fin = ($dt ? $dt->format('Y-m-d H:i:s') : null);
				$this->modifiedColumns[] = PeriodoPeer::FECHA_FIN;
			}
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
			$this->modifiedColumns[] = PeriodoPeer::DESCRIPCION;
		}

		return $this;
	} 
	
	public function setCalcular($v)
	{
		if ($v !== null) {
			$v = (boolean) $v;
		}

		if ($this->calcular !== $v || $v === false) {
			$this->calcular = $v;
			$this->modifiedColumns[] = PeriodoPeer::CALCULAR;
		}

		return $this;
	} 
	
	public function setFormula($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->formula !== $v) {
			$this->formula = $v;
			$this->modifiedColumns[] = PeriodoPeer::FORMULA;
		}

		return $this;
	} 
	
	public function hasOnlyDefaultValues()
	{
						if (array_diff($this->modifiedColumns, array(PeriodoPeer::CALCULAR))) {
				return false;
			}

			if ($this->calcular !== false) {
				return false;
			}

				return true;
	} 
	
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->fk_ciclolectivo_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->fecha_inicio = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->fecha_fin = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->descripcion = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->calcular = ($row[$startcol + 5] !== null) ? (boolean) $row[$startcol + 5] : null;
			$this->formula = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Periodo object", $e);
		}
	}

	
	public function ensureConsistency()
	{

		if ($this->aCiclolectivo !== null && $this->fk_ciclolectivo_id !== $this->aCiclolectivo->getId()) {
			$this->aCiclolectivo = null;
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
			$con = Propel::getConnection(PeriodoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				
		$stmt = PeriodoPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); 
		if ($deep) {  
			$this->aCiclolectivo = null;
		} 	}

	
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(PeriodoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			PeriodoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(PeriodoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
			PeriodoPeer::addInstanceToPool($this);
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

												
			if ($this->aCiclolectivo !== null) {
				if ($this->aCiclolectivo->isModified() || $this->aCiclolectivo->isNew()) {
					$affectedRows += $this->aCiclolectivo->save($con);
				}
				$this->setCiclolectivo($this->aCiclolectivo);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = PeriodoPeer::ID;
			}

						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = PeriodoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += PeriodoPeer::doUpdate($this, $con);
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


												
			if ($this->aCiclolectivo !== null) {
				if (!$this->aCiclolectivo->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCiclolectivo->getValidationFailures());
				}
			}


			if (($retval = PeriodoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PeriodoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getFkCiclolectivoId();
				break;
			case 2:
				return $this->getFechaInicio();
				break;
			case 3:
				return $this->getFechaFin();
				break;
			case 4:
				return $this->getDescripcion();
				break;
			case 5:
				return $this->getCalcular();
				break;
			case 6:
				return $this->getFormula();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = PeriodoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getFkCiclolectivoId(),
			$keys[2] => $this->getFechaInicio(),
			$keys[3] => $this->getFechaFin(),
			$keys[4] => $this->getDescripcion(),
			$keys[5] => $this->getCalcular(),
			$keys[6] => $this->getFormula(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PeriodoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setFkCiclolectivoId($value);
				break;
			case 2:
				$this->setFechaInicio($value);
				break;
			case 3:
				$this->setFechaFin($value);
				break;
			case 4:
				$this->setDescripcion($value);
				break;
			case 5:
				$this->setCalcular($value);
				break;
			case 6:
				$this->setFormula($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = PeriodoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFkCiclolectivoId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFechaInicio($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFechaFin($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDescripcion($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCalcular($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFormula($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(PeriodoPeer::DATABASE_NAME);

		if ($this->isColumnModified(PeriodoPeer::ID)) $criteria->add(PeriodoPeer::ID, $this->id);
		if ($this->isColumnModified(PeriodoPeer::FK_CICLOLECTIVO_ID)) $criteria->add(PeriodoPeer::FK_CICLOLECTIVO_ID, $this->fk_ciclolectivo_id);
		if ($this->isColumnModified(PeriodoPeer::FECHA_INICIO)) $criteria->add(PeriodoPeer::FECHA_INICIO, $this->fecha_inicio);
		if ($this->isColumnModified(PeriodoPeer::FECHA_FIN)) $criteria->add(PeriodoPeer::FECHA_FIN, $this->fecha_fin);
		if ($this->isColumnModified(PeriodoPeer::DESCRIPCION)) $criteria->add(PeriodoPeer::DESCRIPCION, $this->descripcion);
		if ($this->isColumnModified(PeriodoPeer::CALCULAR)) $criteria->add(PeriodoPeer::CALCULAR, $this->calcular);
		if ($this->isColumnModified(PeriodoPeer::FORMULA)) $criteria->add(PeriodoPeer::FORMULA, $this->formula);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(PeriodoPeer::DATABASE_NAME);

		$criteria->add(PeriodoPeer::ID, $this->id);

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

		$copyObj->setFkCiclolectivoId($this->fk_ciclolectivo_id);

		$copyObj->setFechaInicio($this->fecha_inicio);

		$copyObj->setFechaFin($this->fecha_fin);

		$copyObj->setDescripcion($this->descripcion);

		$copyObj->setCalcular($this->calcular);

		$copyObj->setFormula($this->formula);


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
			self::$peer = new PeriodoPeer();
		}
		return self::$peer;
	}

	
	public function setCiclolectivo(Ciclolectivo $v = null)
	{
		if ($v === null) {
			$this->setFkCiclolectivoId(NULL);
		} else {
			$this->setFkCiclolectivoId($v->getId());
		}

		$this->aCiclolectivo = $v;

						if ($v !== null) {
			$v->addPeriodo($this);
		}

		return $this;
	}


	
	public function getCiclolectivo(PropelPDO $con = null)
	{
		if ($this->aCiclolectivo === null && ($this->fk_ciclolectivo_id !== null)) {
			$c = new Criteria(CiclolectivoPeer::DATABASE_NAME);
			$c->add(CiclolectivoPeer::ID, $this->fk_ciclolectivo_id);
			$this->aCiclolectivo = CiclolectivoPeer::doSelectOne($c, $con);
			
		}
		return $this->aCiclolectivo;
	}

	
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
		} 
			$this->aCiclolectivo = null;
	}

} 