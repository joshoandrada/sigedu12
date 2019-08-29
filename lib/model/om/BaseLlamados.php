<?php


abstract class BaseLlamados extends BaseObject  implements Persistent {


  const PEER = 'LlamadosPeer';

	
	protected static $peer;

	
	protected $id;

	
	protected $fecha_inicio;

	
	protected $fecha_final;

	
	protected $turno;

	
	protected $llamado;

	
	protected $fechai;

	
	protected $fechaf;

	
	protected $collLlamadoas;

	
	private $lastLlamadoaCriteria = null;

	
	protected $collLlamadoactas;

	
	private $lastLlamadoactaCriteria = null;

	
	protected $collActividads;

	
	private $lastActividadCriteria = null;

	
	protected $collRendidas;

	
	private $lastRendidaCriteria = null;

	
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
			$this->modifiedColumns[] = LlamadosPeer::ID;
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
				$this->modifiedColumns[] = LlamadosPeer::FECHA_INICIO;
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
				$this->modifiedColumns[] = LlamadosPeer::FECHA_FINAL;
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
			$this->modifiedColumns[] = LlamadosPeer::TURNO;
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
			$this->modifiedColumns[] = LlamadosPeer::LLAMADO;
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
			$this->modifiedColumns[] = LlamadosPeer::FECHAI;
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
			$this->modifiedColumns[] = LlamadosPeer::FECHAF;
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
			throw new PropelException("Error populating Llamados object", $e);
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
			$con = Propel::getConnection(LlamadosPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				
		$stmt = LlamadosPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); 
		if ($deep) {  
			$this->collLlamadoas = null;
			$this->lastLlamadoaCriteria = null;

			$this->collLlamadoactas = null;
			$this->lastLlamadoactaCriteria = null;

			$this->collActividads = null;
			$this->lastActividadCriteria = null;

			$this->collRendidas = null;
			$this->lastRendidaCriteria = null;

			$this->collDetallerendirs = null;
			$this->lastDetallerendirCriteria = null;

		} 	}

	
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(LlamadosPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			LlamadosPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(LlamadosPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
			LlamadosPeer::addInstanceToPool($this);
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
				$this->modifiedColumns[] = LlamadosPeer::ID;
			}

						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = LlamadosPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LlamadosPeer::doUpdate($this, $con);
				}

				$this->resetModified(); 			}

			if ($this->collLlamadoas !== null) {
				foreach ($this->collLlamadoas as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLlamadoactas !== null) {
				foreach ($this->collLlamadoactas as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collActividads !== null) {
				foreach ($this->collActividads as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collRendidas !== null) {
				foreach ($this->collRendidas as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

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


			if (($retval = LlamadosPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collLlamadoas !== null) {
					foreach ($this->collLlamadoas as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLlamadoactas !== null) {
					foreach ($this->collLlamadoactas as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collActividads !== null) {
					foreach ($this->collActividads as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collRendidas !== null) {
					foreach ($this->collRendidas as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
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
		$pos = LlamadosPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
		$keys = LlamadosPeer::getFieldNames($keyType);
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
		$pos = LlamadosPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
		$keys = LlamadosPeer::getFieldNames($keyType);

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
		$criteria = new Criteria(LlamadosPeer::DATABASE_NAME);

		if ($this->isColumnModified(LlamadosPeer::ID)) $criteria->add(LlamadosPeer::ID, $this->id);
		if ($this->isColumnModified(LlamadosPeer::FECHA_INICIO)) $criteria->add(LlamadosPeer::FECHA_INICIO, $this->fecha_inicio);
		if ($this->isColumnModified(LlamadosPeer::FECHA_FINAL)) $criteria->add(LlamadosPeer::FECHA_FINAL, $this->fecha_final);
		if ($this->isColumnModified(LlamadosPeer::TURNO)) $criteria->add(LlamadosPeer::TURNO, $this->turno);
		if ($this->isColumnModified(LlamadosPeer::LLAMADO)) $criteria->add(LlamadosPeer::LLAMADO, $this->llamado);
		if ($this->isColumnModified(LlamadosPeer::FECHAI)) $criteria->add(LlamadosPeer::FECHAI, $this->fechai);
		if ($this->isColumnModified(LlamadosPeer::FECHAF)) $criteria->add(LlamadosPeer::FECHAF, $this->fechaf);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LlamadosPeer::DATABASE_NAME);

		$criteria->add(LlamadosPeer::ID, $this->id);

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

			foreach ($this->getLlamadoas() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addLlamadoa($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getLlamadoactas() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addLlamadoacta($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getActividads() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addActividad($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getRendidas() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addRendida($relObj->copy($deepCopy));
				}
			}

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
			self::$peer = new LlamadosPeer();
		}
		return self::$peer;
	}

	
	public function clearLlamadoas()
	{
		$this->collLlamadoas = null; 	}

	
	public function initLlamadoas()
	{
		$this->collLlamadoas = array();
	}

	
	public function getLlamadoas($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(LlamadosPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLlamadoas === null) {
			if ($this->isNew()) {
			   $this->collLlamadoas = array();
			} else {

				$criteria->add(LlamadoaPeer::FK_LLAMADOS_ID, $this->id);

				LlamadoaPeer::addSelectColumns($criteria);
				$this->collLlamadoas = LlamadoaPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LlamadoaPeer::FK_LLAMADOS_ID, $this->id);

				LlamadoaPeer::addSelectColumns($criteria);
				if (!isset($this->lastLlamadoaCriteria) || !$this->lastLlamadoaCriteria->equals($criteria)) {
					$this->collLlamadoas = LlamadoaPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLlamadoaCriteria = $criteria;
		return $this->collLlamadoas;
	}

	
	public function countLlamadoas(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(LlamadosPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collLlamadoas === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(LlamadoaPeer::FK_LLAMADOS_ID, $this->id);

				$count = LlamadoaPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LlamadoaPeer::FK_LLAMADOS_ID, $this->id);

				if (!isset($this->lastLlamadoaCriteria) || !$this->lastLlamadoaCriteria->equals($criteria)) {
					$count = LlamadoaPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collLlamadoas);
				}
			} else {
				$count = count($this->collLlamadoas);
			}
		}
		return $count;
	}

	
	public function addLlamadoa(Llamadoa $l)
	{
		if ($this->collLlamadoas === null) {
			$this->initLlamadoas();
		}
		if (!in_array($l, $this->collLlamadoas, true)) { 			array_push($this->collLlamadoas, $l);
			$l->setLlamados($this);
		}
	}

	
	public function clearLlamadoactas()
	{
		$this->collLlamadoactas = null; 	}

	
	public function initLlamadoactas()
	{
		$this->collLlamadoactas = array();
	}

	
	public function getLlamadoactas($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(LlamadosPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLlamadoactas === null) {
			if ($this->isNew()) {
			   $this->collLlamadoactas = array();
			} else {

				$criteria->add(LlamadoactaPeer::FK_LLAMADOS_ID, $this->id);

				LlamadoactaPeer::addSelectColumns($criteria);
				$this->collLlamadoactas = LlamadoactaPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LlamadoactaPeer::FK_LLAMADOS_ID, $this->id);

				LlamadoactaPeer::addSelectColumns($criteria);
				if (!isset($this->lastLlamadoactaCriteria) || !$this->lastLlamadoactaCriteria->equals($criteria)) {
					$this->collLlamadoactas = LlamadoactaPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLlamadoactaCriteria = $criteria;
		return $this->collLlamadoactas;
	}

	
	public function countLlamadoactas(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(LlamadosPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collLlamadoactas === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(LlamadoactaPeer::FK_LLAMADOS_ID, $this->id);

				$count = LlamadoactaPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LlamadoactaPeer::FK_LLAMADOS_ID, $this->id);

				if (!isset($this->lastLlamadoactaCriteria) || !$this->lastLlamadoactaCriteria->equals($criteria)) {
					$count = LlamadoactaPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collLlamadoactas);
				}
			} else {
				$count = count($this->collLlamadoactas);
			}
		}
		return $count;
	}

	
	public function addLlamadoacta(Llamadoacta $l)
	{
		if ($this->collLlamadoactas === null) {
			$this->initLlamadoactas();
		}
		if (!in_array($l, $this->collLlamadoactas, true)) { 			array_push($this->collLlamadoactas, $l);
			$l->setLlamados($this);
		}
	}

	
	public function clearActividads()
	{
		$this->collActividads = null; 	}

	
	public function initActividads()
	{
		$this->collActividads = array();
	}

	
	public function getActividads($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(LlamadosPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collActividads === null) {
			if ($this->isNew()) {
			   $this->collActividads = array();
			} else {

				$criteria->add(ActividadPeer::FK_LLAMADO_ID, $this->id);

				ActividadPeer::addSelectColumns($criteria);
				$this->collActividads = ActividadPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ActividadPeer::FK_LLAMADO_ID, $this->id);

				ActividadPeer::addSelectColumns($criteria);
				if (!isset($this->lastActividadCriteria) || !$this->lastActividadCriteria->equals($criteria)) {
					$this->collActividads = ActividadPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastActividadCriteria = $criteria;
		return $this->collActividads;
	}

	
	public function countActividads(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(LlamadosPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collActividads === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(ActividadPeer::FK_LLAMADO_ID, $this->id);

				$count = ActividadPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ActividadPeer::FK_LLAMADO_ID, $this->id);

				if (!isset($this->lastActividadCriteria) || !$this->lastActividadCriteria->equals($criteria)) {
					$count = ActividadPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collActividads);
				}
			} else {
				$count = count($this->collActividads);
			}
		}
		return $count;
	}

	
	public function addActividad(Actividad $l)
	{
		if ($this->collActividads === null) {
			$this->initActividads();
		}
		if (!in_array($l, $this->collActividads, true)) { 			array_push($this->collActividads, $l);
			$l->setLlamados($this);
		}
	}


	
	public function getActividadsJoinEstablecimiento($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(LlamadosPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collActividads === null) {
			if ($this->isNew()) {
				$this->collActividads = array();
			} else {

				$criteria->add(ActividadPeer::FK_LLAMADO_ID, $this->id);

				$this->collActividads = ActividadPeer::doSelectJoinEstablecimiento($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(ActividadPeer::FK_LLAMADO_ID, $this->id);

			if (!isset($this->lastActividadCriteria) || !$this->lastActividadCriteria->equals($criteria)) {
				$this->collActividads = ActividadPeer::doSelectJoinEstablecimiento($criteria, $con, $join_behavior);
			}
		}
		$this->lastActividadCriteria = $criteria;

		return $this->collActividads;
	}


	
	public function getActividadsJoinCarrera($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(LlamadosPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collActividads === null) {
			if ($this->isNew()) {
				$this->collActividads = array();
			} else {

				$criteria->add(ActividadPeer::FK_LLAMADO_ID, $this->id);

				$this->collActividads = ActividadPeer::doSelectJoinCarrera($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(ActividadPeer::FK_LLAMADO_ID, $this->id);

			if (!isset($this->lastActividadCriteria) || !$this->lastActividadCriteria->equals($criteria)) {
				$this->collActividads = ActividadPeer::doSelectJoinCarrera($criteria, $con, $join_behavior);
			}
		}
		$this->lastActividadCriteria = $criteria;

		return $this->collActividads;
	}


	
	public function getActividadsJoinDocenteRelatedByPresidente($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(LlamadosPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collActividads === null) {
			if ($this->isNew()) {
				$this->collActividads = array();
			} else {

				$criteria->add(ActividadPeer::FK_LLAMADO_ID, $this->id);

				$this->collActividads = ActividadPeer::doSelectJoinDocenteRelatedByPresidente($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(ActividadPeer::FK_LLAMADO_ID, $this->id);

			if (!isset($this->lastActividadCriteria) || !$this->lastActividadCriteria->equals($criteria)) {
				$this->collActividads = ActividadPeer::doSelectJoinDocenteRelatedByPresidente($criteria, $con, $join_behavior);
			}
		}
		$this->lastActividadCriteria = $criteria;

		return $this->collActividads;
	}


	
	public function getActividadsJoinDocenteRelatedByVocal1($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(LlamadosPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collActividads === null) {
			if ($this->isNew()) {
				$this->collActividads = array();
			} else {

				$criteria->add(ActividadPeer::FK_LLAMADO_ID, $this->id);

				$this->collActividads = ActividadPeer::doSelectJoinDocenteRelatedByVocal1($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(ActividadPeer::FK_LLAMADO_ID, $this->id);

			if (!isset($this->lastActividadCriteria) || !$this->lastActividadCriteria->equals($criteria)) {
				$this->collActividads = ActividadPeer::doSelectJoinDocenteRelatedByVocal1($criteria, $con, $join_behavior);
			}
		}
		$this->lastActividadCriteria = $criteria;

		return $this->collActividads;
	}


	
	public function getActividadsJoinDocenteRelatedByVocal2($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(LlamadosPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collActividads === null) {
			if ($this->isNew()) {
				$this->collActividads = array();
			} else {

				$criteria->add(ActividadPeer::FK_LLAMADO_ID, $this->id);

				$this->collActividads = ActividadPeer::doSelectJoinDocenteRelatedByVocal2($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(ActividadPeer::FK_LLAMADO_ID, $this->id);

			if (!isset($this->lastActividadCriteria) || !$this->lastActividadCriteria->equals($criteria)) {
				$this->collActividads = ActividadPeer::doSelectJoinDocenteRelatedByVocal2($criteria, $con, $join_behavior);
			}
		}
		$this->lastActividadCriteria = $criteria;

		return $this->collActividads;
	}

	
	public function clearRendidas()
	{
		$this->collRendidas = null; 	}

	
	public function initRendidas()
	{
		$this->collRendidas = array();
	}

	
	public function getRendidas($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(LlamadosPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRendidas === null) {
			if ($this->isNew()) {
			   $this->collRendidas = array();
			} else {

				$criteria->add(RendidaPeer::FK_LLAMADA_ID, $this->id);

				RendidaPeer::addSelectColumns($criteria);
				$this->collRendidas = RendidaPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RendidaPeer::FK_LLAMADA_ID, $this->id);

				RendidaPeer::addSelectColumns($criteria);
				if (!isset($this->lastRendidaCriteria) || !$this->lastRendidaCriteria->equals($criteria)) {
					$this->collRendidas = RendidaPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastRendidaCriteria = $criteria;
		return $this->collRendidas;
	}

	
	public function countRendidas(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(LlamadosPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collRendidas === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(RendidaPeer::FK_LLAMADA_ID, $this->id);

				$count = RendidaPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RendidaPeer::FK_LLAMADA_ID, $this->id);

				if (!isset($this->lastRendidaCriteria) || !$this->lastRendidaCriteria->equals($criteria)) {
					$count = RendidaPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collRendidas);
				}
			} else {
				$count = count($this->collRendidas);
			}
		}
		return $count;
	}

	
	public function addRendida(Rendida $l)
	{
		if ($this->collRendidas === null) {
			$this->initRendidas();
		}
		if (!in_array($l, $this->collRendidas, true)) { 			array_push($this->collRendidas, $l);
			$l->setLlamados($this);
		}
	}


	
	public function getRendidasJoinAlumno($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(LlamadosPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRendidas === null) {
			if ($this->isNew()) {
				$this->collRendidas = array();
			} else {

				$criteria->add(RendidaPeer::FK_LLAMADA_ID, $this->id);

				$this->collRendidas = RendidaPeer::doSelectJoinAlumno($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(RendidaPeer::FK_LLAMADA_ID, $this->id);

			if (!isset($this->lastRendidaCriteria) || !$this->lastRendidaCriteria->equals($criteria)) {
				$this->collRendidas = RendidaPeer::doSelectJoinAlumno($criteria, $con, $join_behavior);
			}
		}
		$this->lastRendidaCriteria = $criteria;

		return $this->collRendidas;
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
			$criteria = new Criteria(LlamadosPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDetallerendirs === null) {
			if ($this->isNew()) {
			   $this->collDetallerendirs = array();
			} else {

				$criteria->add(DetallerendirPeer::FK_LLAMADA_ID, $this->id);

				DetallerendirPeer::addSelectColumns($criteria);
				$this->collDetallerendirs = DetallerendirPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(DetallerendirPeer::FK_LLAMADA_ID, $this->id);

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
			$criteria = new Criteria(LlamadosPeer::DATABASE_NAME);
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

				$criteria->add(DetallerendirPeer::FK_LLAMADA_ID, $this->id);

				$count = DetallerendirPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(DetallerendirPeer::FK_LLAMADA_ID, $this->id);

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
			$l->setLlamados($this);
		}
	}


	
	public function getDetallerendirsJoinCursada($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(LlamadosPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDetallerendirs === null) {
			if ($this->isNew()) {
				$this->collDetallerendirs = array();
			} else {

				$criteria->add(DetallerendirPeer::FK_LLAMADA_ID, $this->id);

				$this->collDetallerendirs = DetallerendirPeer::doSelectJoinCursada($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(DetallerendirPeer::FK_LLAMADA_ID, $this->id);

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
			$criteria = new Criteria(LlamadosPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDetallerendirs === null) {
			if ($this->isNew()) {
				$this->collDetallerendirs = array();
			} else {

				$criteria->add(DetallerendirPeer::FK_LLAMADA_ID, $this->id);

				$this->collDetallerendirs = DetallerendirPeer::doSelectJoinActividad($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(DetallerendirPeer::FK_LLAMADA_ID, $this->id);

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
			$criteria = new Criteria(LlamadosPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDetallerendirs === null) {
			if ($this->isNew()) {
				$this->collDetallerendirs = array();
			} else {

				$criteria->add(DetallerendirPeer::FK_LLAMADA_ID, $this->id);

				$this->collDetallerendirs = DetallerendirPeer::doSelectJoinAlumno($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(DetallerendirPeer::FK_LLAMADA_ID, $this->id);

			if (!isset($this->lastDetallerendirCriteria) || !$this->lastDetallerendirCriteria->equals($criteria)) {
				$this->collDetallerendirs = DetallerendirPeer::doSelectJoinAlumno($criteria, $con, $join_behavior);
			}
		}
		$this->lastDetallerendirCriteria = $criteria;

		return $this->collDetallerendirs;
	}


	
	public function getDetallerendirsJoinEstadomateren($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(LlamadosPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDetallerendirs === null) {
			if ($this->isNew()) {
				$this->collDetallerendirs = array();
			} else {

				$criteria->add(DetallerendirPeer::FK_LLAMADA_ID, $this->id);

				$this->collDetallerendirs = DetallerendirPeer::doSelectJoinEstadomateren($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(DetallerendirPeer::FK_LLAMADA_ID, $this->id);

			if (!isset($this->lastDetallerendirCriteria) || !$this->lastDetallerendirCriteria->equals($criteria)) {
				$this->collDetallerendirs = DetallerendirPeer::doSelectJoinEstadomateren($criteria, $con, $join_behavior);
			}
		}
		$this->lastDetallerendirCriteria = $criteria;

		return $this->collDetallerendirs;
	}

	
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
			if ($this->collLlamadoas) {
				foreach ((array) $this->collLlamadoas as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collLlamadoactas) {
				foreach ((array) $this->collLlamadoactas as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collActividads) {
				foreach ((array) $this->collActividads as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collRendidas) {
				foreach ((array) $this->collRendidas as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collDetallerendirs) {
				foreach ((array) $this->collDetallerendirs as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} 
		$this->collLlamadoas = null;
		$this->collLlamadoactas = null;
		$this->collActividads = null;
		$this->collRendidas = null;
		$this->collDetallerendirs = null;
	}

} 