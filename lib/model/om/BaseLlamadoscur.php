<?php


abstract class BaseLlamadoscur extends BaseObject  implements Persistent {


  const PEER = 'LlamadoscurPeer';

	
	protected static $peer;

	
	protected $id;

	
	protected $fecha_inicio;

	
	protected $fecha_final;

	
	protected $turno;

	
	protected $llamado;

	
	protected $fechai;

	
	protected $fechaf;

	
	protected $collLlamadoacurs;

	
	private $lastLlamadoacurCriteria = null;

	
	protected $collCursadas;

	
	private $lastCursadaCriteria = null;

	
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

	
	public function getFechaInicio($format = 'Y-m-d')
	{
		if ($this->fecha_inicio === null) {
			return null;
		}


		if ($this->fecha_inicio === '0000-00-00') {
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

	
	public function getFechaFinal($format = 'Y-m-d')
	{
		if ($this->fecha_final === null) {
			return null;
		}


		if ($this->fecha_final === '0000-00-00') {
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

	
	public function getFechai()
	{
		return $this->fechai;
	}

	
	public function getFechaf()
	{
		return $this->fechaf;
	}

	
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = LlamadoscurPeer::ID;
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
			
			$currNorm = ($this->fecha_inicio !== null && $tmpDt = new DateTime($this->fecha_inicio)) ? $tmpDt->format('Y-m-d') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d') : null;

			if ( ($currNorm !== $newNorm) 					)
			{
				$this->fecha_inicio = ($dt ? $dt->format('Y-m-d') : null);
				$this->modifiedColumns[] = LlamadoscurPeer::FECHA_INICIO;
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
			
			$currNorm = ($this->fecha_final !== null && $tmpDt = new DateTime($this->fecha_final)) ? $tmpDt->format('Y-m-d') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d') : null;

			if ( ($currNorm !== $newNorm) 					)
			{
				$this->fecha_final = ($dt ? $dt->format('Y-m-d') : null);
				$this->modifiedColumns[] = LlamadoscurPeer::FECHA_FINAL;
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
			$this->modifiedColumns[] = LlamadoscurPeer::TURNO;
		}

		return $this;
	} 
	
	public function setLlamado($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->llamado !== $v) {
			$this->llamado = $v;
			$this->modifiedColumns[] = LlamadoscurPeer::LLAMADO;
		}

		return $this;
	} 
	
	public function setFechai($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->fechai !== $v) {
			$this->fechai = $v;
			$this->modifiedColumns[] = LlamadoscurPeer::FECHAI;
		}

		return $this;
	} 
	
	public function setFechaf($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->fechaf !== $v) {
			$this->fechaf = $v;
			$this->modifiedColumns[] = LlamadoscurPeer::FECHAF;
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
			$this->fecha_inicio = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->fecha_final = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->turno = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->llamado = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
			$this->fechai = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->fechaf = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Llamadoscur object", $e);
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
			$con = Propel::getConnection(LlamadoscurPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				
		$stmt = LlamadoscurPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); 
		if ($deep) {  
			$this->collLlamadoacurs = null;
			$this->lastLlamadoacurCriteria = null;

			$this->collCursadas = null;
			$this->lastCursadaCriteria = null;

		} 	}

	
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(LlamadoscurPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			LlamadoscurPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LlamadoscurPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
			LlamadoscurPeer::addInstanceToPool($this);
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
				$this->modifiedColumns[] = LlamadoscurPeer::ID;
			}

						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = LlamadoscurPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LlamadoscurPeer::doUpdate($this, $con);
				}

				$this->resetModified(); 			}

			if ($this->collLlamadoacurs !== null) {
				foreach ($this->collLlamadoacurs as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collCursadas !== null) {
				foreach ($this->collCursadas as $referrerFK) {
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


			if (($retval = LlamadoscurPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collLlamadoacurs !== null) {
					foreach ($this->collLlamadoacurs as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collCursadas !== null) {
					foreach ($this->collCursadas as $referrerFK) {
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
		$pos = LlamadoscurPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getFechai();
				break;
			case 6:
				return $this->getFechaf();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = LlamadoscurPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getFechaInicio(),
			$keys[2] => $this->getFechaFinal(),
			$keys[3] => $this->getTurno(),
			$keys[4] => $this->getLlamado(),
			$keys[5] => $this->getFechai(),
			$keys[6] => $this->getFechaf(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LlamadoscurPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setFechai($value);
				break;
			case 6:
				$this->setFechaf($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = LlamadoscurPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFechaInicio($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFechaFinal($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTurno($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setLlamado($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFechai($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFechaf($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LlamadoscurPeer::DATABASE_NAME);

		if ($this->isColumnModified(LlamadoscurPeer::ID)) $criteria->add(LlamadoscurPeer::ID, $this->id);
		if ($this->isColumnModified(LlamadoscurPeer::FECHA_INICIO)) $criteria->add(LlamadoscurPeer::FECHA_INICIO, $this->fecha_inicio);
		if ($this->isColumnModified(LlamadoscurPeer::FECHA_FINAL)) $criteria->add(LlamadoscurPeer::FECHA_FINAL, $this->fecha_final);
		if ($this->isColumnModified(LlamadoscurPeer::TURNO)) $criteria->add(LlamadoscurPeer::TURNO, $this->turno);
		if ($this->isColumnModified(LlamadoscurPeer::LLAMADO)) $criteria->add(LlamadoscurPeer::LLAMADO, $this->llamado);
		if ($this->isColumnModified(LlamadoscurPeer::FECHAI)) $criteria->add(LlamadoscurPeer::FECHAI, $this->fechai);
		if ($this->isColumnModified(LlamadoscurPeer::FECHAF)) $criteria->add(LlamadoscurPeer::FECHAF, $this->fechaf);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LlamadoscurPeer::DATABASE_NAME);

		$criteria->add(LlamadoscurPeer::ID, $this->id);

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

		$copyObj->setFechai($this->fechai);

		$copyObj->setFechaf($this->fechaf);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach ($this->getLlamadoacurs() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addLlamadoacur($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getCursadas() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addCursada($relObj->copy($deepCopy));
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
			self::$peer = new LlamadoscurPeer();
		}
		return self::$peer;
	}

	
	public function clearLlamadoacurs()
	{
		$this->collLlamadoacurs = null; 	}

	
	public function initLlamadoacurs()
	{
		$this->collLlamadoacurs = array();
	}

	
	public function getLlamadoacurs($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(LlamadoscurPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLlamadoacurs === null) {
			if ($this->isNew()) {
			   $this->collLlamadoacurs = array();
			} else {

				$criteria->add(LlamadoacurPeer::FK_LLAMADOSCUR_ID, $this->id);

				LlamadoacurPeer::addSelectColumns($criteria);
				$this->collLlamadoacurs = LlamadoacurPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LlamadoacurPeer::FK_LLAMADOSCUR_ID, $this->id);

				LlamadoacurPeer::addSelectColumns($criteria);
				if (!isset($this->lastLlamadoacurCriteria) || !$this->lastLlamadoacurCriteria->equals($criteria)) {
					$this->collLlamadoacurs = LlamadoacurPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLlamadoacurCriteria = $criteria;
		return $this->collLlamadoacurs;
	}

	
	public function countLlamadoacurs(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(LlamadoscurPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collLlamadoacurs === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(LlamadoacurPeer::FK_LLAMADOSCUR_ID, $this->id);

				$count = LlamadoacurPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LlamadoacurPeer::FK_LLAMADOSCUR_ID, $this->id);

				if (!isset($this->lastLlamadoacurCriteria) || !$this->lastLlamadoacurCriteria->equals($criteria)) {
					$count = LlamadoacurPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collLlamadoacurs);
				}
			} else {
				$count = count($this->collLlamadoacurs);
			}
		}
		return $count;
	}

	
	public function addLlamadoacur(Llamadoacur $l)
	{
		if ($this->collLlamadoacurs === null) {
			$this->initLlamadoacurs();
		}
		if (!in_array($l, $this->collLlamadoacurs, true)) { 			array_push($this->collLlamadoacurs, $l);
			$l->setLlamadoscur($this);
		}
	}

	
	public function clearCursadas()
	{
		$this->collCursadas = null; 	}

	
	public function initCursadas()
	{
		$this->collCursadas = array();
	}

	
	public function getCursadas($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(LlamadoscurPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCursadas === null) {
			if ($this->isNew()) {
			   $this->collCursadas = array();
			} else {

				$criteria->add(CursadaPeer::FK_LLAMADA_ID, $this->id);

				CursadaPeer::addSelectColumns($criteria);
				$this->collCursadas = CursadaPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CursadaPeer::FK_LLAMADA_ID, $this->id);

				CursadaPeer::addSelectColumns($criteria);
				if (!isset($this->lastCursadaCriteria) || !$this->lastCursadaCriteria->equals($criteria)) {
					$this->collCursadas = CursadaPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastCursadaCriteria = $criteria;
		return $this->collCursadas;
	}

	
	public function countCursadas(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(LlamadoscurPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collCursadas === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(CursadaPeer::FK_LLAMADA_ID, $this->id);

				$count = CursadaPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CursadaPeer::FK_LLAMADA_ID, $this->id);

				if (!isset($this->lastCursadaCriteria) || !$this->lastCursadaCriteria->equals($criteria)) {
					$count = CursadaPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collCursadas);
				}
			} else {
				$count = count($this->collCursadas);
			}
		}
		return $count;
	}

	
	public function addCursada(Cursada $l)
	{
		if ($this->collCursadas === null) {
			$this->initCursadas();
		}
		if (!in_array($l, $this->collCursadas, true)) { 			array_push($this->collCursadas, $l);
			$l->setLlamadoscur($this);
		}
	}


	
	public function getCursadasJoinAlumno($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(LlamadoscurPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCursadas === null) {
			if ($this->isNew()) {
				$this->collCursadas = array();
			} else {

				$criteria->add(CursadaPeer::FK_LLAMADA_ID, $this->id);

				$this->collCursadas = CursadaPeer::doSelectJoinAlumno($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(CursadaPeer::FK_LLAMADA_ID, $this->id);

			if (!isset($this->lastCursadaCriteria) || !$this->lastCursadaCriteria->equals($criteria)) {
				$this->collCursadas = CursadaPeer::doSelectJoinAlumno($criteria, $con, $join_behavior);
			}
		}
		$this->lastCursadaCriteria = $criteria;

		return $this->collCursadas;
	}

	
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
			if ($this->collLlamadoacurs) {
				foreach ((array) $this->collLlamadoacurs as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collCursadas) {
				foreach ((array) $this->collCursadas as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} 
		$this->collLlamadoacurs = null;
		$this->collCursadas = null;
	}

} 