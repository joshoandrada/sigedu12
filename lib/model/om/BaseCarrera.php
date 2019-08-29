<?php


abstract class BaseCarrera extends BaseObject  implements Persistent {


  const PEER = 'CarreraPeer';

	
	protected static $peer;

	
	protected $id;

	
	protected $fk_establecimiento_id;

	
	protected $descripcion;

	
	protected $abrev;

	
	protected $anio;

	
	protected $orden;

	
	protected $aEstablecimiento;

	
	protected $collAlumnos;

	
	private $lastAlumnoCriteria = null;

	
	protected $collActividads;

	
	private $lastActividadCriteria = null;

	
	protected $collAnios;

	
	private $lastAnioCriteria = null;

	
	protected $collNeuros;

	
	private $lastNeuroCriteria = null;

	
	protected $collComuns;

	
	private $lastComunCriteria = null;

	
	protected $collVisuals;

	
	private $lastVisualCriteria = null;

	
	protected $collAuditivas;

	
	private $lastAuditivaCriteria = null;

	
	protected $collIntelectuals;

	
	private $lastIntelectualCriteria = null;

	
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
		$this->orden = 0;
	}

	
	public function getId()
	{
		return $this->id;
	}

	
	public function getFkEstablecimientoId()
	{
		return $this->fk_establecimiento_id;
	}

	
	public function getDescripcion()
	{
		return $this->descripcion;
	}

	
	public function getAbrev()
	{
		return $this->abrev;
	}

	
	public function getAnio()
	{
		return $this->anio;
	}

	
	public function getOrden()
	{
		return $this->orden;
	}

	
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = CarreraPeer::ID;
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
			$this->modifiedColumns[] = CarreraPeer::FK_ESTABLECIMIENTO_ID;
		}

		if ($this->aEstablecimiento !== null && $this->aEstablecimiento->getId() !== $v) {
			$this->aEstablecimiento = null;
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
			$this->modifiedColumns[] = CarreraPeer::DESCRIPCION;
		}

		return $this;
	} 
	
	public function setAbrev($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->abrev !== $v) {
			$this->abrev = $v;
			$this->modifiedColumns[] = CarreraPeer::ABREV;
		}

		return $this;
	} 
	
	public function setAnio($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->anio !== $v) {
			$this->anio = $v;
			$this->modifiedColumns[] = CarreraPeer::ANIO;
		}

		return $this;
	} 
	
	public function setOrden($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->orden !== $v || $v === 0) {
			$this->orden = $v;
			$this->modifiedColumns[] = CarreraPeer::ORDEN;
		}

		return $this;
	} 
	
	public function hasOnlyDefaultValues()
	{
						if (array_diff($this->modifiedColumns, array(CarreraPeer::FK_ESTABLECIMIENTO_ID,CarreraPeer::ORDEN))) {
				return false;
			}

			if ($this->fk_establecimiento_id !== 0) {
				return false;
			}

			if ($this->orden !== 0) {
				return false;
			}

				return true;
	} 
	
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->fk_establecimiento_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->descripcion = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
			$this->abrev = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->anio = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->orden = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

						return $startcol + 6; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Carrera object", $e);
		}
	}

	
	public function ensureConsistency()
	{

		if ($this->aEstablecimiento !== null && $this->fk_establecimiento_id !== $this->aEstablecimiento->getId()) {
			$this->aEstablecimiento = null;
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
			$con = Propel::getConnection(CarreraPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				
		$stmt = CarreraPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); 
		if ($deep) {  
			$this->aEstablecimiento = null;
			$this->collAlumnos = null;
			$this->lastAlumnoCriteria = null;

			$this->collActividads = null;
			$this->lastActividadCriteria = null;

			$this->collAnios = null;
			$this->lastAnioCriteria = null;

			$this->collNeuros = null;
			$this->lastNeuroCriteria = null;

			$this->collComuns = null;
			$this->lastComunCriteria = null;

			$this->collVisuals = null;
			$this->lastVisualCriteria = null;

			$this->collAuditivas = null;
			$this->lastAuditivaCriteria = null;

			$this->collIntelectuals = null;
			$this->lastIntelectualCriteria = null;

		} 	}

	
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(CarreraPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			CarreraPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(CarreraPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
			CarreraPeer::addInstanceToPool($this);
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

			if ($this->isNew() ) {
				$this->modifiedColumns[] = CarreraPeer::ID;
			}

						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = CarreraPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += CarreraPeer::doUpdate($this, $con);
				}

				$this->resetModified(); 			}

			if ($this->collAlumnos !== null) {
				foreach ($this->collAlumnos as $referrerFK) {
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

			if ($this->collAnios !== null) {
				foreach ($this->collAnios as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collNeuros !== null) {
				foreach ($this->collNeuros as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collComuns !== null) {
				foreach ($this->collComuns as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collVisuals !== null) {
				foreach ($this->collVisuals as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collAuditivas !== null) {
				foreach ($this->collAuditivas as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collIntelectuals !== null) {
				foreach ($this->collIntelectuals as $referrerFK) {
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


												
			if ($this->aEstablecimiento !== null) {
				if (!$this->aEstablecimiento->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aEstablecimiento->getValidationFailures());
				}
			}


			if (($retval = CarreraPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collAlumnos !== null) {
					foreach ($this->collAlumnos as $referrerFK) {
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

				if ($this->collAnios !== null) {
					foreach ($this->collAnios as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collNeuros !== null) {
					foreach ($this->collNeuros as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collComuns !== null) {
					foreach ($this->collComuns as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collVisuals !== null) {
					foreach ($this->collVisuals as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collAuditivas !== null) {
					foreach ($this->collAuditivas as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collIntelectuals !== null) {
					foreach ($this->collIntelectuals as $referrerFK) {
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
		$pos = CarreraPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getDescripcion();
				break;
			case 3:
				return $this->getAbrev();
				break;
			case 4:
				return $this->getAnio();
				break;
			case 5:
				return $this->getOrden();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = CarreraPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getFkEstablecimientoId(),
			$keys[2] => $this->getDescripcion(),
			$keys[3] => $this->getAbrev(),
			$keys[4] => $this->getAnio(),
			$keys[5] => $this->getOrden(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = CarreraPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setDescripcion($value);
				break;
			case 3:
				$this->setAbrev($value);
				break;
			case 4:
				$this->setAnio($value);
				break;
			case 5:
				$this->setOrden($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = CarreraPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFkEstablecimientoId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDescripcion($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setAbrev($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setAnio($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setOrden($arr[$keys[5]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(CarreraPeer::DATABASE_NAME);

		if ($this->isColumnModified(CarreraPeer::ID)) $criteria->add(CarreraPeer::ID, $this->id);
		if ($this->isColumnModified(CarreraPeer::FK_ESTABLECIMIENTO_ID)) $criteria->add(CarreraPeer::FK_ESTABLECIMIENTO_ID, $this->fk_establecimiento_id);
		if ($this->isColumnModified(CarreraPeer::DESCRIPCION)) $criteria->add(CarreraPeer::DESCRIPCION, $this->descripcion);
		if ($this->isColumnModified(CarreraPeer::ABREV)) $criteria->add(CarreraPeer::ABREV, $this->abrev);
		if ($this->isColumnModified(CarreraPeer::ANIO)) $criteria->add(CarreraPeer::ANIO, $this->anio);
		if ($this->isColumnModified(CarreraPeer::ORDEN)) $criteria->add(CarreraPeer::ORDEN, $this->orden);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(CarreraPeer::DATABASE_NAME);

		$criteria->add(CarreraPeer::ID, $this->id);

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

		$copyObj->setDescripcion($this->descripcion);

		$copyObj->setAbrev($this->abrev);

		$copyObj->setAnio($this->anio);

		$copyObj->setOrden($this->orden);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach ($this->getAlumnos() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addAlumno($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getActividads() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addActividad($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getAnios() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addAnio($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getNeuros() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addNeuro($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getComuns() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addComun($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getVisuals() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addVisual($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getAuditivas() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addAuditiva($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getIntelectuals() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addIntelectual($relObj->copy($deepCopy));
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
			self::$peer = new CarreraPeer();
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
			$v->addCarrera($this);
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

	
	public function clearAlumnos()
	{
		$this->collAlumnos = null; 	}

	
	public function initAlumnos()
	{
		$this->collAlumnos = array();
	}

	
	public function getAlumnos($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CarreraPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAlumnos === null) {
			if ($this->isNew()) {
			   $this->collAlumnos = array();
			} else {

				$criteria->add(AlumnoPeer::FK_CARRERA_ID, $this->id);

				AlumnoPeer::addSelectColumns($criteria);
				$this->collAlumnos = AlumnoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AlumnoPeer::FK_CARRERA_ID, $this->id);

				AlumnoPeer::addSelectColumns($criteria);
				if (!isset($this->lastAlumnoCriteria) || !$this->lastAlumnoCriteria->equals($criteria)) {
					$this->collAlumnos = AlumnoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastAlumnoCriteria = $criteria;
		return $this->collAlumnos;
	}

	
	public function countAlumnos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CarreraPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collAlumnos === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(AlumnoPeer::FK_CARRERA_ID, $this->id);

				$count = AlumnoPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AlumnoPeer::FK_CARRERA_ID, $this->id);

				if (!isset($this->lastAlumnoCriteria) || !$this->lastAlumnoCriteria->equals($criteria)) {
					$count = AlumnoPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collAlumnos);
				}
			} else {
				$count = count($this->collAlumnos);
			}
		}
		return $count;
	}

	
	public function addAlumno(Alumno $l)
	{
		if ($this->collAlumnos === null) {
			$this->initAlumnos();
		}
		if (!in_array($l, $this->collAlumnos, true)) { 			array_push($this->collAlumnos, $l);
			$l->setCarrera($this);
		}
	}


	
	public function getAlumnosJoinProvincia($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CarreraPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAlumnos === null) {
			if ($this->isNew()) {
				$this->collAlumnos = array();
			} else {

				$criteria->add(AlumnoPeer::FK_CARRERA_ID, $this->id);

				$this->collAlumnos = AlumnoPeer::doSelectJoinProvincia($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(AlumnoPeer::FK_CARRERA_ID, $this->id);

			if (!isset($this->lastAlumnoCriteria) || !$this->lastAlumnoCriteria->equals($criteria)) {
				$this->collAlumnos = AlumnoPeer::doSelectJoinProvincia($criteria, $con, $join_behavior);
			}
		}
		$this->lastAlumnoCriteria = $criteria;

		return $this->collAlumnos;
	}


	
	public function getAlumnosJoinTipodocumento($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CarreraPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAlumnos === null) {
			if ($this->isNew()) {
				$this->collAlumnos = array();
			} else {

				$criteria->add(AlumnoPeer::FK_CARRERA_ID, $this->id);

				$this->collAlumnos = AlumnoPeer::doSelectJoinTipodocumento($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(AlumnoPeer::FK_CARRERA_ID, $this->id);

			if (!isset($this->lastAlumnoCriteria) || !$this->lastAlumnoCriteria->equals($criteria)) {
				$this->collAlumnos = AlumnoPeer::doSelectJoinTipodocumento($criteria, $con, $join_behavior);
			}
		}
		$this->lastAlumnoCriteria = $criteria;

		return $this->collAlumnos;
	}


	
	public function getAlumnosJoinEstablecimiento($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CarreraPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAlumnos === null) {
			if ($this->isNew()) {
				$this->collAlumnos = array();
			} else {

				$criteria->add(AlumnoPeer::FK_CARRERA_ID, $this->id);

				$this->collAlumnos = AlumnoPeer::doSelectJoinEstablecimiento($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(AlumnoPeer::FK_CARRERA_ID, $this->id);

			if (!isset($this->lastAlumnoCriteria) || !$this->lastAlumnoCriteria->equals($criteria)) {
				$this->collAlumnos = AlumnoPeer::doSelectJoinEstablecimiento($criteria, $con, $join_behavior);
			}
		}
		$this->lastAlumnoCriteria = $criteria;

		return $this->collAlumnos;
	}


	
	public function getAlumnosJoinPais($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CarreraPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAlumnos === null) {
			if ($this->isNew()) {
				$this->collAlumnos = array();
			} else {

				$criteria->add(AlumnoPeer::FK_CARRERA_ID, $this->id);

				$this->collAlumnos = AlumnoPeer::doSelectJoinPais($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(AlumnoPeer::FK_CARRERA_ID, $this->id);

			if (!isset($this->lastAlumnoCriteria) || !$this->lastAlumnoCriteria->equals($criteria)) {
				$this->collAlumnos = AlumnoPeer::doSelectJoinPais($criteria, $con, $join_behavior);
			}
		}
		$this->lastAlumnoCriteria = $criteria;

		return $this->collAlumnos;
	}


	
	public function getAlumnosJoinEstadosalumnos($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CarreraPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAlumnos === null) {
			if ($this->isNew()) {
				$this->collAlumnos = array();
			} else {

				$criteria->add(AlumnoPeer::FK_CARRERA_ID, $this->id);

				$this->collAlumnos = AlumnoPeer::doSelectJoinEstadosalumnos($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(AlumnoPeer::FK_CARRERA_ID, $this->id);

			if (!isset($this->lastAlumnoCriteria) || !$this->lastAlumnoCriteria->equals($criteria)) {
				$this->collAlumnos = AlumnoPeer::doSelectJoinEstadosalumnos($criteria, $con, $join_behavior);
			}
		}
		$this->lastAlumnoCriteria = $criteria;

		return $this->collAlumnos;
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
			$criteria = new Criteria(CarreraPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collActividads === null) {
			if ($this->isNew()) {
			   $this->collActividads = array();
			} else {

				$criteria->add(ActividadPeer::FK_CARRERA_ID, $this->id);

				ActividadPeer::addSelectColumns($criteria);
				$this->collActividads = ActividadPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ActividadPeer::FK_CARRERA_ID, $this->id);

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
			$criteria = new Criteria(CarreraPeer::DATABASE_NAME);
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

				$criteria->add(ActividadPeer::FK_CARRERA_ID, $this->id);

				$count = ActividadPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ActividadPeer::FK_CARRERA_ID, $this->id);

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
			$l->setCarrera($this);
		}
	}


	
	public function getActividadsJoinEstablecimiento($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CarreraPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collActividads === null) {
			if ($this->isNew()) {
				$this->collActividads = array();
			} else {

				$criteria->add(ActividadPeer::FK_CARRERA_ID, $this->id);

				$this->collActividads = ActividadPeer::doSelectJoinEstablecimiento($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(ActividadPeer::FK_CARRERA_ID, $this->id);

			if (!isset($this->lastActividadCriteria) || !$this->lastActividadCriteria->equals($criteria)) {
				$this->collActividads = ActividadPeer::doSelectJoinEstablecimiento($criteria, $con, $join_behavior);
			}
		}
		$this->lastActividadCriteria = $criteria;

		return $this->collActividads;
	}


	
	public function getActividadsJoinDocenteRelatedByPresidente($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CarreraPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collActividads === null) {
			if ($this->isNew()) {
				$this->collActividads = array();
			} else {

				$criteria->add(ActividadPeer::FK_CARRERA_ID, $this->id);

				$this->collActividads = ActividadPeer::doSelectJoinDocenteRelatedByPresidente($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(ActividadPeer::FK_CARRERA_ID, $this->id);

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
			$criteria = new Criteria(CarreraPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collActividads === null) {
			if ($this->isNew()) {
				$this->collActividads = array();
			} else {

				$criteria->add(ActividadPeer::FK_CARRERA_ID, $this->id);

				$this->collActividads = ActividadPeer::doSelectJoinDocenteRelatedByVocal1($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(ActividadPeer::FK_CARRERA_ID, $this->id);

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
			$criteria = new Criteria(CarreraPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collActividads === null) {
			if ($this->isNew()) {
				$this->collActividads = array();
			} else {

				$criteria->add(ActividadPeer::FK_CARRERA_ID, $this->id);

				$this->collActividads = ActividadPeer::doSelectJoinDocenteRelatedByVocal2($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(ActividadPeer::FK_CARRERA_ID, $this->id);

			if (!isset($this->lastActividadCriteria) || !$this->lastActividadCriteria->equals($criteria)) {
				$this->collActividads = ActividadPeer::doSelectJoinDocenteRelatedByVocal2($criteria, $con, $join_behavior);
			}
		}
		$this->lastActividadCriteria = $criteria;

		return $this->collActividads;
	}


	
	public function getActividadsJoinLlamados($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CarreraPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collActividads === null) {
			if ($this->isNew()) {
				$this->collActividads = array();
			} else {

				$criteria->add(ActividadPeer::FK_CARRERA_ID, $this->id);

				$this->collActividads = ActividadPeer::doSelectJoinLlamados($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(ActividadPeer::FK_CARRERA_ID, $this->id);

			if (!isset($this->lastActividadCriteria) || !$this->lastActividadCriteria->equals($criteria)) {
				$this->collActividads = ActividadPeer::doSelectJoinLlamados($criteria, $con, $join_behavior);
			}
		}
		$this->lastActividadCriteria = $criteria;

		return $this->collActividads;
	}

	
	public function clearAnios()
	{
		$this->collAnios = null; 	}

	
	public function initAnios()
	{
		$this->collAnios = array();
	}

	
	public function getAnios($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CarreraPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAnios === null) {
			if ($this->isNew()) {
			   $this->collAnios = array();
			} else {

				$criteria->add(AnioPeer::FK_CARRERA_ID, $this->id);

				AnioPeer::addSelectColumns($criteria);
				$this->collAnios = AnioPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AnioPeer::FK_CARRERA_ID, $this->id);

				AnioPeer::addSelectColumns($criteria);
				if (!isset($this->lastAnioCriteria) || !$this->lastAnioCriteria->equals($criteria)) {
					$this->collAnios = AnioPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastAnioCriteria = $criteria;
		return $this->collAnios;
	}

	
	public function countAnios(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CarreraPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collAnios === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(AnioPeer::FK_CARRERA_ID, $this->id);

				$count = AnioPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AnioPeer::FK_CARRERA_ID, $this->id);

				if (!isset($this->lastAnioCriteria) || !$this->lastAnioCriteria->equals($criteria)) {
					$count = AnioPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collAnios);
				}
			} else {
				$count = count($this->collAnios);
			}
		}
		return $count;
	}

	
	public function addAnio(Anio $l)
	{
		if ($this->collAnios === null) {
			$this->initAnios();
		}
		if (!in_array($l, $this->collAnios, true)) { 			array_push($this->collAnios, $l);
			$l->setCarrera($this);
		}
	}


	
	public function getAniosJoinEstablecimiento($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CarreraPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAnios === null) {
			if ($this->isNew()) {
				$this->collAnios = array();
			} else {

				$criteria->add(AnioPeer::FK_CARRERA_ID, $this->id);

				$this->collAnios = AnioPeer::doSelectJoinEstablecimiento($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(AnioPeer::FK_CARRERA_ID, $this->id);

			if (!isset($this->lastAnioCriteria) || !$this->lastAnioCriteria->equals($criteria)) {
				$this->collAnios = AnioPeer::doSelectJoinEstablecimiento($criteria, $con, $join_behavior);
			}
		}
		$this->lastAnioCriteria = $criteria;

		return $this->collAnios;
	}

	
	public function clearNeuros()
	{
		$this->collNeuros = null; 	}

	
	public function initNeuros()
	{
		$this->collNeuros = array();
	}

	
	public function getNeuros($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CarreraPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collNeuros === null) {
			if ($this->isNew()) {
			   $this->collNeuros = array();
			} else {

				$criteria->add(NeuroPeer::FK_CARRERA_ID, $this->id);

				NeuroPeer::addSelectColumns($criteria);
				$this->collNeuros = NeuroPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(NeuroPeer::FK_CARRERA_ID, $this->id);

				NeuroPeer::addSelectColumns($criteria);
				if (!isset($this->lastNeuroCriteria) || !$this->lastNeuroCriteria->equals($criteria)) {
					$this->collNeuros = NeuroPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastNeuroCriteria = $criteria;
		return $this->collNeuros;
	}

	
	public function countNeuros(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CarreraPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collNeuros === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(NeuroPeer::FK_CARRERA_ID, $this->id);

				$count = NeuroPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(NeuroPeer::FK_CARRERA_ID, $this->id);

				if (!isset($this->lastNeuroCriteria) || !$this->lastNeuroCriteria->equals($criteria)) {
					$count = NeuroPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collNeuros);
				}
			} else {
				$count = count($this->collNeuros);
			}
		}
		return $count;
	}

	
	public function addNeuro(Neuro $l)
	{
		if ($this->collNeuros === null) {
			$this->initNeuros();
		}
		if (!in_array($l, $this->collNeuros, true)) { 			array_push($this->collNeuros, $l);
			$l->setCarrera($this);
		}
	}


	
	public function getNeurosJoinEstablecimiento($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CarreraPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collNeuros === null) {
			if ($this->isNew()) {
				$this->collNeuros = array();
			} else {

				$criteria->add(NeuroPeer::FK_CARRERA_ID, $this->id);

				$this->collNeuros = NeuroPeer::doSelectJoinEstablecimiento($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(NeuroPeer::FK_CARRERA_ID, $this->id);

			if (!isset($this->lastNeuroCriteria) || !$this->lastNeuroCriteria->equals($criteria)) {
				$this->collNeuros = NeuroPeer::doSelectJoinEstablecimiento($criteria, $con, $join_behavior);
			}
		}
		$this->lastNeuroCriteria = $criteria;

		return $this->collNeuros;
	}

	
	public function clearComuns()
	{
		$this->collComuns = null; 	}

	
	public function initComuns()
	{
		$this->collComuns = array();
	}

	
	public function getComuns($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CarreraPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collComuns === null) {
			if ($this->isNew()) {
			   $this->collComuns = array();
			} else {

				$criteria->add(ComunPeer::FK_CARRERA_ID, $this->id);

				ComunPeer::addSelectColumns($criteria);
				$this->collComuns = ComunPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ComunPeer::FK_CARRERA_ID, $this->id);

				ComunPeer::addSelectColumns($criteria);
				if (!isset($this->lastComunCriteria) || !$this->lastComunCriteria->equals($criteria)) {
					$this->collComuns = ComunPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastComunCriteria = $criteria;
		return $this->collComuns;
	}

	
	public function countComuns(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CarreraPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collComuns === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(ComunPeer::FK_CARRERA_ID, $this->id);

				$count = ComunPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(ComunPeer::FK_CARRERA_ID, $this->id);

				if (!isset($this->lastComunCriteria) || !$this->lastComunCriteria->equals($criteria)) {
					$count = ComunPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collComuns);
				}
			} else {
				$count = count($this->collComuns);
			}
		}
		return $count;
	}

	
	public function addComun(Comun $l)
	{
		if ($this->collComuns === null) {
			$this->initComuns();
		}
		if (!in_array($l, $this->collComuns, true)) { 			array_push($this->collComuns, $l);
			$l->setCarrera($this);
		}
	}


	
	public function getComunsJoinEstablecimiento($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CarreraPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collComuns === null) {
			if ($this->isNew()) {
				$this->collComuns = array();
			} else {

				$criteria->add(ComunPeer::FK_CARRERA_ID, $this->id);

				$this->collComuns = ComunPeer::doSelectJoinEstablecimiento($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(ComunPeer::FK_CARRERA_ID, $this->id);

			if (!isset($this->lastComunCriteria) || !$this->lastComunCriteria->equals($criteria)) {
				$this->collComuns = ComunPeer::doSelectJoinEstablecimiento($criteria, $con, $join_behavior);
			}
		}
		$this->lastComunCriteria = $criteria;

		return $this->collComuns;
	}

	
	public function clearVisuals()
	{
		$this->collVisuals = null; 	}

	
	public function initVisuals()
	{
		$this->collVisuals = array();
	}

	
	public function getVisuals($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CarreraPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collVisuals === null) {
			if ($this->isNew()) {
			   $this->collVisuals = array();
			} else {

				$criteria->add(VisualPeer::FK_CARRERA_ID, $this->id);

				VisualPeer::addSelectColumns($criteria);
				$this->collVisuals = VisualPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(VisualPeer::FK_CARRERA_ID, $this->id);

				VisualPeer::addSelectColumns($criteria);
				if (!isset($this->lastVisualCriteria) || !$this->lastVisualCriteria->equals($criteria)) {
					$this->collVisuals = VisualPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastVisualCriteria = $criteria;
		return $this->collVisuals;
	}

	
	public function countVisuals(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CarreraPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collVisuals === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(VisualPeer::FK_CARRERA_ID, $this->id);

				$count = VisualPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(VisualPeer::FK_CARRERA_ID, $this->id);

				if (!isset($this->lastVisualCriteria) || !$this->lastVisualCriteria->equals($criteria)) {
					$count = VisualPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collVisuals);
				}
			} else {
				$count = count($this->collVisuals);
			}
		}
		return $count;
	}

	
	public function addVisual(Visual $l)
	{
		if ($this->collVisuals === null) {
			$this->initVisuals();
		}
		if (!in_array($l, $this->collVisuals, true)) { 			array_push($this->collVisuals, $l);
			$l->setCarrera($this);
		}
	}


	
	public function getVisualsJoinEstablecimiento($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CarreraPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collVisuals === null) {
			if ($this->isNew()) {
				$this->collVisuals = array();
			} else {

				$criteria->add(VisualPeer::FK_CARRERA_ID, $this->id);

				$this->collVisuals = VisualPeer::doSelectJoinEstablecimiento($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(VisualPeer::FK_CARRERA_ID, $this->id);

			if (!isset($this->lastVisualCriteria) || !$this->lastVisualCriteria->equals($criteria)) {
				$this->collVisuals = VisualPeer::doSelectJoinEstablecimiento($criteria, $con, $join_behavior);
			}
		}
		$this->lastVisualCriteria = $criteria;

		return $this->collVisuals;
	}

	
	public function clearAuditivas()
	{
		$this->collAuditivas = null; 	}

	
	public function initAuditivas()
	{
		$this->collAuditivas = array();
	}

	
	public function getAuditivas($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CarreraPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAuditivas === null) {
			if ($this->isNew()) {
			   $this->collAuditivas = array();
			} else {

				$criteria->add(AuditivaPeer::FK_CARRERA_ID, $this->id);

				AuditivaPeer::addSelectColumns($criteria);
				$this->collAuditivas = AuditivaPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AuditivaPeer::FK_CARRERA_ID, $this->id);

				AuditivaPeer::addSelectColumns($criteria);
				if (!isset($this->lastAuditivaCriteria) || !$this->lastAuditivaCriteria->equals($criteria)) {
					$this->collAuditivas = AuditivaPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastAuditivaCriteria = $criteria;
		return $this->collAuditivas;
	}

	
	public function countAuditivas(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CarreraPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collAuditivas === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(AuditivaPeer::FK_CARRERA_ID, $this->id);

				$count = AuditivaPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AuditivaPeer::FK_CARRERA_ID, $this->id);

				if (!isset($this->lastAuditivaCriteria) || !$this->lastAuditivaCriteria->equals($criteria)) {
					$count = AuditivaPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collAuditivas);
				}
			} else {
				$count = count($this->collAuditivas);
			}
		}
		return $count;
	}

	
	public function addAuditiva(Auditiva $l)
	{
		if ($this->collAuditivas === null) {
			$this->initAuditivas();
		}
		if (!in_array($l, $this->collAuditivas, true)) { 			array_push($this->collAuditivas, $l);
			$l->setCarrera($this);
		}
	}


	
	public function getAuditivasJoinEstablecimiento($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CarreraPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAuditivas === null) {
			if ($this->isNew()) {
				$this->collAuditivas = array();
			} else {

				$criteria->add(AuditivaPeer::FK_CARRERA_ID, $this->id);

				$this->collAuditivas = AuditivaPeer::doSelectJoinEstablecimiento($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(AuditivaPeer::FK_CARRERA_ID, $this->id);

			if (!isset($this->lastAuditivaCriteria) || !$this->lastAuditivaCriteria->equals($criteria)) {
				$this->collAuditivas = AuditivaPeer::doSelectJoinEstablecimiento($criteria, $con, $join_behavior);
			}
		}
		$this->lastAuditivaCriteria = $criteria;

		return $this->collAuditivas;
	}

	
	public function clearIntelectuals()
	{
		$this->collIntelectuals = null; 	}

	
	public function initIntelectuals()
	{
		$this->collIntelectuals = array();
	}

	
	public function getIntelectuals($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CarreraPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collIntelectuals === null) {
			if ($this->isNew()) {
			   $this->collIntelectuals = array();
			} else {

				$criteria->add(IntelectualPeer::FK_CARRERA_ID, $this->id);

				IntelectualPeer::addSelectColumns($criteria);
				$this->collIntelectuals = IntelectualPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(IntelectualPeer::FK_CARRERA_ID, $this->id);

				IntelectualPeer::addSelectColumns($criteria);
				if (!isset($this->lastIntelectualCriteria) || !$this->lastIntelectualCriteria->equals($criteria)) {
					$this->collIntelectuals = IntelectualPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastIntelectualCriteria = $criteria;
		return $this->collIntelectuals;
	}

	
	public function countIntelectuals(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CarreraPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collIntelectuals === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(IntelectualPeer::FK_CARRERA_ID, $this->id);

				$count = IntelectualPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(IntelectualPeer::FK_CARRERA_ID, $this->id);

				if (!isset($this->lastIntelectualCriteria) || !$this->lastIntelectualCriteria->equals($criteria)) {
					$count = IntelectualPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collIntelectuals);
				}
			} else {
				$count = count($this->collIntelectuals);
			}
		}
		return $count;
	}

	
	public function addIntelectual(Intelectual $l)
	{
		if ($this->collIntelectuals === null) {
			$this->initIntelectuals();
		}
		if (!in_array($l, $this->collIntelectuals, true)) { 			array_push($this->collIntelectuals, $l);
			$l->setCarrera($this);
		}
	}


	
	public function getIntelectualsJoinEstablecimiento($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(CarreraPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collIntelectuals === null) {
			if ($this->isNew()) {
				$this->collIntelectuals = array();
			} else {

				$criteria->add(IntelectualPeer::FK_CARRERA_ID, $this->id);

				$this->collIntelectuals = IntelectualPeer::doSelectJoinEstablecimiento($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(IntelectualPeer::FK_CARRERA_ID, $this->id);

			if (!isset($this->lastIntelectualCriteria) || !$this->lastIntelectualCriteria->equals($criteria)) {
				$this->collIntelectuals = IntelectualPeer::doSelectJoinEstablecimiento($criteria, $con, $join_behavior);
			}
		}
		$this->lastIntelectualCriteria = $criteria;

		return $this->collIntelectuals;
	}

	
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
			if ($this->collAlumnos) {
				foreach ((array) $this->collAlumnos as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collActividads) {
				foreach ((array) $this->collActividads as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collAnios) {
				foreach ((array) $this->collAnios as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collNeuros) {
				foreach ((array) $this->collNeuros as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collComuns) {
				foreach ((array) $this->collComuns as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collVisuals) {
				foreach ((array) $this->collVisuals as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collAuditivas) {
				foreach ((array) $this->collAuditivas as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collIntelectuals) {
				foreach ((array) $this->collIntelectuals as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} 
		$this->collAlumnos = null;
		$this->collActividads = null;
		$this->collAnios = null;
		$this->collNeuros = null;
		$this->collComuns = null;
		$this->collVisuals = null;
		$this->collAuditivas = null;
		$this->collIntelectuals = null;
			$this->aEstablecimiento = null;
	}

} 