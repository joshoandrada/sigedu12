<?php


abstract class BaseCursada extends BaseObject  implements Persistent {


  const PEER = 'CursadaPeer';

	
	protected static $peer;

	
	protected $id;

	
	protected $matricula;

	
	protected $fk_alumno_id;

	
	protected $fk_llamada_id;

	
	protected $auxi;

	
	protected $nomape;

	
	protected $fecha;

	
	protected $aAlumno;

	
	protected $aLlamadoscur;

	
	protected $collDetallerendirs;

	
	private $lastDetallerendirCriteria = null;

	
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
			$this->modifiedColumns[] = CursadaPeer::ID;
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
			$this->modifiedColumns[] = CursadaPeer::MATRICULA;
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
			$this->modifiedColumns[] = CursadaPeer::FK_ALUMNO_ID;
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
			$this->modifiedColumns[] = CursadaPeer::FK_LLAMADA_ID;
		}

		if ($this->aLlamadoscur !== null && $this->aLlamadoscur->getId() !== $v) {
			$this->aLlamadoscur = null;
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
			$this->modifiedColumns[] = CursadaPeer::AUXI;
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
			$this->modifiedColumns[] = CursadaPeer::NOMAPE;
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
				$this->modifiedColumns[] = CursadaPeer::FECHA;
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
			throw new PropelException("Error populating Cursada object", $e);
		}
	}

	
	public function ensureConsistency()
	{

		if ($this->aAlumno !== null && $this->fk_alumno_id !== $this->aAlumno->getId()) {
			$this->aAlumno = null;
		}
		if ($this->aLlamadoscur !== null && $this->fk_llamada_id !== $this->aLlamadoscur->getId()) {
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
			$con = Propel::getConnection(CursadaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				
		$stmt = CursadaPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); 
		if ($deep) {  
			$this->aAlumno = null;
			$this->aLlamadoscur = null;
			$this->collDetallerendirs = null;
			$this->lastDetallerendirCriteria = null;

			$this->collDetallecursadas = null;
			$this->lastDetallecursadaCriteria = null;

		} 	}

	
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CursadaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			CursadaPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CursadaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
			CursadaPeer::addInstanceToPool($this);
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

			if ($this->aLlamadoscur !== null) {
				if ($this->aLlamadoscur->isModified() || $this->aLlamadoscur->isNew()) {
					$affectedRows += $this->aLlamadoscur->save($con);
				}
				$this->setLlamadoscur($this->aLlamadoscur);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = CursadaPeer::ID;
			}

						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CursadaPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CursadaPeer::doUpdate($this, $con);
				}

				$this->resetModified(); 			}

			if ($this->collDetallerendirs !== null) {
				foreach ($this->collDetallerendirs as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

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


												
			if ($this->aAlumno !== null) {
				if (!$this->aAlumno->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAlumno->getValidationFailures());
				}
			}

			if ($this->aLlamadoscur !== null) {
				if (!$this->aLlamadoscur->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLlamadoscur->getValidationFailures());
				}
			}


			if (($retval = CursadaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collDetallerendirs !== null) {
					foreach ($this->collDetallerendirs as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
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
		$pos = CursadaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
		$keys = CursadaPeer::getFieldNames($keyType);
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
		$pos = CursadaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
		$keys = CursadaPeer::getFieldNames($keyType);

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
		$criteria = new Criteria(CursadaPeer::DATABASE_NAME);

		if ($this->isColumnModified(CursadaPeer::ID)) $criteria->add(CursadaPeer::ID, $this->id);
		if ($this->isColumnModified(CursadaPeer::MATRICULA)) $criteria->add(CursadaPeer::MATRICULA, $this->matricula);
		if ($this->isColumnModified(CursadaPeer::FK_ALUMNO_ID)) $criteria->add(CursadaPeer::FK_ALUMNO_ID, $this->fk_alumno_id);
		if ($this->isColumnModified(CursadaPeer::FK_LLAMADA_ID)) $criteria->add(CursadaPeer::FK_LLAMADA_ID, $this->fk_llamada_id);
		if ($this->isColumnModified(CursadaPeer::AUXI)) $criteria->add(CursadaPeer::AUXI, $this->auxi);
		if ($this->isColumnModified(CursadaPeer::NOMAPE)) $criteria->add(CursadaPeer::NOMAPE, $this->nomape);
		if ($this->isColumnModified(CursadaPeer::FECHA)) $criteria->add(CursadaPeer::FECHA, $this->fecha);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CursadaPeer::DATABASE_NAME);

		$criteria->add(CursadaPeer::ID, $this->id);

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


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach ($this->getDetallerendirs() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addDetallerendir($relObj->copy($deepCopy));
				}
			}

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
			self::$peer = new CursadaPeer();
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
			$v->addCursada($this);
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

	
	public function setLlamadoscur(Llamadoscur $v = null)
	{
		if ($v === null) {
			$this->setFkLlamadaId(NULL);
		} else {
			$this->setFkLlamadaId($v->getId());
		}

		$this->aLlamadoscur = $v;

						if ($v !== null) {
			$v->addCursada($this);
		}

		return $this;
	}


	
	public function getLlamadoscur(PropelPDO $con = null)
	{
		if ($this->aLlamadoscur === null && ($this->fk_llamada_id !== null)) {
			$c = new Criteria(LlamadoscurPeer::DATABASE_NAME);
			$c->add(LlamadoscurPeer::ID, $this->fk_llamada_id);
			$this->aLlamadoscur = LlamadoscurPeer::doSelectOne($c, $con);
			
		}
		return $this->aLlamadoscur;
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
			$criteria = new Criteria(CursadaPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDetallerendirs === null) {
			if ($this->isNew()) {
			   $this->collDetallerendirs = array();
			} else {

				$criteria->add(DetallerendirPeer::FK_CURSADA_ID, $this->id);

				DetallerendirPeer::addSelectColumns($criteria);
				$this->collDetallerendirs = DetallerendirPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(DetallerendirPeer::FK_CURSADA_ID, $this->id);

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
			$criteria = new Criteria(CursadaPeer::DATABASE_NAME);
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

				$criteria->add(DetallerendirPeer::FK_CURSADA_ID, $this->id);

				$count = DetallerendirPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(DetallerendirPeer::FK_CURSADA_ID, $this->id);

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
			$l->setCursada($this);
		}
	}


	
	public function getDetallerendirsJoinActividad($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CursadaPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDetallerendirs === null) {
			if ($this->isNew()) {
				$this->collDetallerendirs = array();
			} else {

				$criteria->add(DetallerendirPeer::FK_CURSADA_ID, $this->id);

				$this->collDetallerendirs = DetallerendirPeer::doSelectJoinActividad($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(DetallerendirPeer::FK_CURSADA_ID, $this->id);

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
			$criteria = new Criteria(CursadaPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDetallerendirs === null) {
			if ($this->isNew()) {
				$this->collDetallerendirs = array();
			} else {

				$criteria->add(DetallerendirPeer::FK_CURSADA_ID, $this->id);

				$this->collDetallerendirs = DetallerendirPeer::doSelectJoinAlumno($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(DetallerendirPeer::FK_CURSADA_ID, $this->id);

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
			$criteria = new Criteria(CursadaPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDetallerendirs === null) {
			if ($this->isNew()) {
				$this->collDetallerendirs = array();
			} else {

				$criteria->add(DetallerendirPeer::FK_CURSADA_ID, $this->id);

				$this->collDetallerendirs = DetallerendirPeer::doSelectJoinEstadomateren($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(DetallerendirPeer::FK_CURSADA_ID, $this->id);

			if (!isset($this->lastDetallerendirCriteria) || !$this->lastDetallerendirCriteria->equals($criteria)) {
				$this->collDetallerendirs = DetallerendirPeer::doSelectJoinEstadomateren($criteria, $con, $join_behavior);
			}
		}
		$this->lastDetallerendirCriteria = $criteria;

		return $this->collDetallerendirs;
	}


	
	public function getDetallerendirsJoinLlamados($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CursadaPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDetallerendirs === null) {
			if ($this->isNew()) {
				$this->collDetallerendirs = array();
			} else {

				$criteria->add(DetallerendirPeer::FK_CURSADA_ID, $this->id);

				$this->collDetallerendirs = DetallerendirPeer::doSelectJoinLlamados($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(DetallerendirPeer::FK_CURSADA_ID, $this->id);

			if (!isset($this->lastDetallerendirCriteria) || !$this->lastDetallerendirCriteria->equals($criteria)) {
				$this->collDetallerendirs = DetallerendirPeer::doSelectJoinLlamados($criteria, $con, $join_behavior);
			}
		}
		$this->lastDetallerendirCriteria = $criteria;

		return $this->collDetallerendirs;
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
			$criteria = new Criteria(CursadaPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDetallecursadas === null) {
			if ($this->isNew()) {
			   $this->collDetallecursadas = array();
			} else {

				$criteria->add(DetallecursadaPeer::FK_CURSADA_ID, $this->id);

				DetallecursadaPeer::addSelectColumns($criteria);
				$this->collDetallecursadas = DetallecursadaPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(DetallecursadaPeer::FK_CURSADA_ID, $this->id);

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
			$criteria = new Criteria(CursadaPeer::DATABASE_NAME);
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

				$criteria->add(DetallecursadaPeer::FK_CURSADA_ID, $this->id);

				$count = DetallecursadaPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(DetallecursadaPeer::FK_CURSADA_ID, $this->id);

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
			$l->setCursada($this);
		}
	}


	
	public function getDetallecursadasJoinActividad($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CursadaPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDetallecursadas === null) {
			if ($this->isNew()) {
				$this->collDetallecursadas = array();
			} else {

				$criteria->add(DetallecursadaPeer::FK_CURSADA_ID, $this->id);

				$this->collDetallecursadas = DetallecursadaPeer::doSelectJoinActividad($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(DetallecursadaPeer::FK_CURSADA_ID, $this->id);

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
			$criteria = new Criteria(CursadaPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDetallecursadas === null) {
			if ($this->isNew()) {
				$this->collDetallecursadas = array();
			} else {

				$criteria->add(DetallecursadaPeer::FK_CURSADA_ID, $this->id);

				$this->collDetallecursadas = DetallecursadaPeer::doSelectJoinAlumno($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(DetallecursadaPeer::FK_CURSADA_ID, $this->id);

			if (!isset($this->lastDetallecursadaCriteria) || !$this->lastDetallecursadaCriteria->equals($criteria)) {
				$this->collDetallecursadas = DetallecursadaPeer::doSelectJoinAlumno($criteria, $con, $join_behavior);
			}
		}
		$this->lastDetallecursadaCriteria = $criteria;

		return $this->collDetallecursadas;
	}


	
	public function getDetallecursadasJoinEstadomate($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CursadaPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDetallecursadas === null) {
			if ($this->isNew()) {
				$this->collDetallecursadas = array();
			} else {

				$criteria->add(DetallecursadaPeer::FK_CURSADA_ID, $this->id);

				$this->collDetallecursadas = DetallecursadaPeer::doSelectJoinEstadomate($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(DetallecursadaPeer::FK_CURSADA_ID, $this->id);

			if (!isset($this->lastDetallecursadaCriteria) || !$this->lastDetallecursadaCriteria->equals($criteria)) {
				$this->collDetallecursadas = DetallecursadaPeer::doSelectJoinEstadomate($criteria, $con, $join_behavior);
			}
		}
		$this->lastDetallecursadaCriteria = $criteria;

		return $this->collDetallecursadas;
	}

	
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
			if ($this->collDetallerendirs) {
				foreach ((array) $this->collDetallerendirs as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collDetallecursadas) {
				foreach ((array) $this->collDetallecursadas as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} 
		$this->collDetallerendirs = null;
		$this->collDetallecursadas = null;
			$this->aAlumno = null;
			$this->aLlamadoscur = null;
	}

} 