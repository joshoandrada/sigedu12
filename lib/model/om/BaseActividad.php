<?php


abstract class BaseActividad extends BaseObject  implements Persistent {


  const PEER = 'ActividadPeer';

	
	protected static $peer;

	
	protected $id;

	
	protected $fk_establecimiento_id;

	
	protected $fk_carrera_id;

	
	protected $nombre;

	
	protected $descripcion;

	
	protected $nro;

	
	protected $anio;

	
	protected $fecha;

	
	protected $fechaf;

	
	protected $presidente;

	
	protected $vocal1;

	
	protected $vocal2;

	
	protected $fk_llamado_id;

	
	protected $aEstablecimiento;

	
	protected $aCarrera;

	
	protected $aDocenteRelatedByPresidente;

	
	protected $aDocenteRelatedByVocal1;

	
	protected $aDocenteRelatedByVocal2;

	
	protected $aLlamados;

	
	protected $collRelAnioActividads;

	
	private $lastRelAnioActividadCriteria = null;

	
	protected $collRelDivisionActividadDocentes;

	
	private $lastRelDivisionActividadDocenteCriteria = null;

	
	protected $collDetallerendirs;

	
	private $lastDetallerendirCriteria = null;

	
	protected $collDetallecursadas;

	
	private $lastDetallecursadaCriteria = null;

	
	protected $collRelactividaddivisions;

	
	private $lastRelactividaddivisionCriteria = null;

	
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
		$this->presidente = 0;
		$this->vocal1 = 0;
		$this->vocal2 = 0;
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

	
	public function getNro()
	{
		return $this->nro;
	}

	
	public function getAnio()
	{
		return $this->anio;
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

	
	public function getFechaf()
	{
		return $this->fechaf;
	}

	
	public function getPresidente()
	{
		return $this->presidente;
	}

	
	public function getVocal1()
	{
		return $this->vocal1;
	}

	
	public function getVocal2()
	{
		return $this->vocal2;
	}

	
	public function getFkLlamadoId()
	{
		return $this->fk_llamado_id;
	}

	
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = ActividadPeer::ID;
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
			$this->modifiedColumns[] = ActividadPeer::FK_ESTABLECIMIENTO_ID;
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
			$this->modifiedColumns[] = ActividadPeer::FK_CARRERA_ID;
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
			$this->modifiedColumns[] = ActividadPeer::NOMBRE;
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
			$this->modifiedColumns[] = ActividadPeer::DESCRIPCION;
		}

		return $this;
	} 
	
	public function setNro($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->nro !== $v) {
			$this->nro = $v;
			$this->modifiedColumns[] = ActividadPeer::NRO;
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
			$this->modifiedColumns[] = ActividadPeer::ANIO;
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
				$this->modifiedColumns[] = ActividadPeer::FECHA;
			}
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
			$this->modifiedColumns[] = ActividadPeer::FECHAF;
		}

		return $this;
	} 
	
	public function setPresidente($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->presidente !== $v || $v === 0) {
			$this->presidente = $v;
			$this->modifiedColumns[] = ActividadPeer::PRESIDENTE;
		}

		if ($this->aDocenteRelatedByPresidente !== null && $this->aDocenteRelatedByPresidente->getId() !== $v) {
			$this->aDocenteRelatedByPresidente = null;
		}

		return $this;
	} 
	
	public function setVocal1($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->vocal1 !== $v || $v === 0) {
			$this->vocal1 = $v;
			$this->modifiedColumns[] = ActividadPeer::VOCAL1;
		}

		if ($this->aDocenteRelatedByVocal1 !== null && $this->aDocenteRelatedByVocal1->getId() !== $v) {
			$this->aDocenteRelatedByVocal1 = null;
		}

		return $this;
	} 
	
	public function setVocal2($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->vocal2 !== $v || $v === 0) {
			$this->vocal2 = $v;
			$this->modifiedColumns[] = ActividadPeer::VOCAL2;
		}

		if ($this->aDocenteRelatedByVocal2 !== null && $this->aDocenteRelatedByVocal2->getId() !== $v) {
			$this->aDocenteRelatedByVocal2 = null;
		}

		return $this;
	} 
	
	public function setFkLlamadoId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->fk_llamado_id !== $v) {
			$this->fk_llamado_id = $v;
			$this->modifiedColumns[] = ActividadPeer::FK_LLAMADO_ID;
		}

		if ($this->aLlamados !== null && $this->aLlamados->getId() !== $v) {
			$this->aLlamados = null;
		}

		return $this;
	} 
	
	public function hasOnlyDefaultValues()
	{
						if (array_diff($this->modifiedColumns, array(ActividadPeer::FK_ESTABLECIMIENTO_ID,ActividadPeer::FK_CARRERA_ID,ActividadPeer::PRESIDENTE,ActividadPeer::VOCAL1,ActividadPeer::VOCAL2))) {
				return false;
			}

			if ($this->fk_establecimiento_id !== 0) {
				return false;
			}

			if ($this->fk_carrera_id !== 0) {
				return false;
			}

			if ($this->presidente !== 0) {
				return false;
			}

			if ($this->vocal1 !== 0) {
				return false;
			}

			if ($this->vocal2 !== 0) {
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
			$this->nro = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
			$this->anio = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
			$this->fecha = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->fechaf = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
			$this->presidente = ($row[$startcol + 9] !== null) ? (int) $row[$startcol + 9] : null;
			$this->vocal1 = ($row[$startcol + 10] !== null) ? (int) $row[$startcol + 10] : null;
			$this->vocal2 = ($row[$startcol + 11] !== null) ? (int) $row[$startcol + 11] : null;
			$this->fk_llamado_id = ($row[$startcol + 12] !== null) ? (int) $row[$startcol + 12] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

						return $startcol + 13; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Actividad object", $e);
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
		if ($this->aDocenteRelatedByPresidente !== null && $this->presidente !== $this->aDocenteRelatedByPresidente->getId()) {
			$this->aDocenteRelatedByPresidente = null;
		}
		if ($this->aDocenteRelatedByVocal1 !== null && $this->vocal1 !== $this->aDocenteRelatedByVocal1->getId()) {
			$this->aDocenteRelatedByVocal1 = null;
		}
		if ($this->aDocenteRelatedByVocal2 !== null && $this->vocal2 !== $this->aDocenteRelatedByVocal2->getId()) {
			$this->aDocenteRelatedByVocal2 = null;
		}
		if ($this->aLlamados !== null && $this->fk_llamado_id !== $this->aLlamados->getId()) {
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
			$con = Propel::getConnection(ActividadPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				
		$stmt = ActividadPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); 
		if ($deep) {  
			$this->aEstablecimiento = null;
			$this->aCarrera = null;
			$this->aDocenteRelatedByPresidente = null;
			$this->aDocenteRelatedByVocal1 = null;
			$this->aDocenteRelatedByVocal2 = null;
			$this->aLlamados = null;
			$this->collRelAnioActividads = null;
			$this->lastRelAnioActividadCriteria = null;

			$this->collRelDivisionActividadDocentes = null;
			$this->lastRelDivisionActividadDocenteCriteria = null;

			$this->collDetallerendirs = null;
			$this->lastDetallerendirCriteria = null;

			$this->collDetallecursadas = null;
			$this->lastDetallecursadaCriteria = null;

			$this->collRelactividaddivisions = null;
			$this->lastRelactividaddivisionCriteria = null;

		} 	}

	
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(ActividadPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			ActividadPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(ActividadPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
			ActividadPeer::addInstanceToPool($this);
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

			if ($this->aDocenteRelatedByPresidente !== null) {
				if ($this->aDocenteRelatedByPresidente->isModified() || $this->aDocenteRelatedByPresidente->isNew()) {
					$affectedRows += $this->aDocenteRelatedByPresidente->save($con);
				}
				$this->setDocenteRelatedByPresidente($this->aDocenteRelatedByPresidente);
			}

			if ($this->aDocenteRelatedByVocal1 !== null) {
				if ($this->aDocenteRelatedByVocal1->isModified() || $this->aDocenteRelatedByVocal1->isNew()) {
					$affectedRows += $this->aDocenteRelatedByVocal1->save($con);
				}
				$this->setDocenteRelatedByVocal1($this->aDocenteRelatedByVocal1);
			}

			if ($this->aDocenteRelatedByVocal2 !== null) {
				if ($this->aDocenteRelatedByVocal2->isModified() || $this->aDocenteRelatedByVocal2->isNew()) {
					$affectedRows += $this->aDocenteRelatedByVocal2->save($con);
				}
				$this->setDocenteRelatedByVocal2($this->aDocenteRelatedByVocal2);
			}

			if ($this->aLlamados !== null) {
				if ($this->aLlamados->isModified() || $this->aLlamados->isNew()) {
					$affectedRows += $this->aLlamados->save($con);
				}
				$this->setLlamados($this->aLlamados);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = ActividadPeer::ID;
			}

						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = ActividadPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += ActividadPeer::doUpdate($this, $con);
				}

				$this->resetModified(); 			}

			if ($this->collRelAnioActividads !== null) {
				foreach ($this->collRelAnioActividads as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collRelDivisionActividadDocentes !== null) {
				foreach ($this->collRelDivisionActividadDocentes as $referrerFK) {
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

			if ($this->collDetallecursadas !== null) {
				foreach ($this->collDetallecursadas as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collRelactividaddivisions !== null) {
				foreach ($this->collRelactividaddivisions as $referrerFK) {
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

			if ($this->aCarrera !== null) {
				if (!$this->aCarrera->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCarrera->getValidationFailures());
				}
			}

			if ($this->aDocenteRelatedByPresidente !== null) {
				if (!$this->aDocenteRelatedByPresidente->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aDocenteRelatedByPresidente->getValidationFailures());
				}
			}

			if ($this->aDocenteRelatedByVocal1 !== null) {
				if (!$this->aDocenteRelatedByVocal1->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aDocenteRelatedByVocal1->getValidationFailures());
				}
			}

			if ($this->aDocenteRelatedByVocal2 !== null) {
				if (!$this->aDocenteRelatedByVocal2->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aDocenteRelatedByVocal2->getValidationFailures());
				}
			}

			if ($this->aLlamados !== null) {
				if (!$this->aLlamados->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLlamados->getValidationFailures());
				}
			}


			if (($retval = ActividadPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collRelAnioActividads !== null) {
					foreach ($this->collRelAnioActividads as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collRelDivisionActividadDocentes !== null) {
					foreach ($this->collRelDivisionActividadDocentes as $referrerFK) {
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

				if ($this->collDetallecursadas !== null) {
					foreach ($this->collDetallecursadas as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collRelactividaddivisions !== null) {
					foreach ($this->collRelactividaddivisions as $referrerFK) {
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
		$pos = ActividadPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getNro();
				break;
			case 6:
				return $this->getAnio();
				break;
			case 7:
				return $this->getFecha();
				break;
			case 8:
				return $this->getFechaf();
				break;
			case 9:
				return $this->getPresidente();
				break;
			case 10:
				return $this->getVocal1();
				break;
			case 11:
				return $this->getVocal2();
				break;
			case 12:
				return $this->getFkLlamadoId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = ActividadPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getFkEstablecimientoId(),
			$keys[2] => $this->getFkCarreraId(),
			$keys[3] => $this->getNombre(),
			$keys[4] => $this->getDescripcion(),
			$keys[5] => $this->getNro(),
			$keys[6] => $this->getAnio(),
			$keys[7] => $this->getFecha(),
			$keys[8] => $this->getFechaf(),
			$keys[9] => $this->getPresidente(),
			$keys[10] => $this->getVocal1(),
			$keys[11] => $this->getVocal2(),
			$keys[12] => $this->getFkLlamadoId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = ActividadPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setNro($value);
				break;
			case 6:
				$this->setAnio($value);
				break;
			case 7:
				$this->setFecha($value);
				break;
			case 8:
				$this->setFechaf($value);
				break;
			case 9:
				$this->setPresidente($value);
				break;
			case 10:
				$this->setVocal1($value);
				break;
			case 11:
				$this->setVocal2($value);
				break;
			case 12:
				$this->setFkLlamadoId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = ActividadPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFkEstablecimientoId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFkCarreraId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNombre($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDescripcion($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setNro($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setAnio($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setFecha($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setFechaf($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setPresidente($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setVocal1($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setVocal2($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setFkLlamadoId($arr[$keys[12]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(ActividadPeer::DATABASE_NAME);

		if ($this->isColumnModified(ActividadPeer::ID)) $criteria->add(ActividadPeer::ID, $this->id);
		if ($this->isColumnModified(ActividadPeer::FK_ESTABLECIMIENTO_ID)) $criteria->add(ActividadPeer::FK_ESTABLECIMIENTO_ID, $this->fk_establecimiento_id);
		if ($this->isColumnModified(ActividadPeer::FK_CARRERA_ID)) $criteria->add(ActividadPeer::FK_CARRERA_ID, $this->fk_carrera_id);
		if ($this->isColumnModified(ActividadPeer::NOMBRE)) $criteria->add(ActividadPeer::NOMBRE, $this->nombre);
		if ($this->isColumnModified(ActividadPeer::DESCRIPCION)) $criteria->add(ActividadPeer::DESCRIPCION, $this->descripcion);
		if ($this->isColumnModified(ActividadPeer::NRO)) $criteria->add(ActividadPeer::NRO, $this->nro);
		if ($this->isColumnModified(ActividadPeer::ANIO)) $criteria->add(ActividadPeer::ANIO, $this->anio);
		if ($this->isColumnModified(ActividadPeer::FECHA)) $criteria->add(ActividadPeer::FECHA, $this->fecha);
		if ($this->isColumnModified(ActividadPeer::FECHAF)) $criteria->add(ActividadPeer::FECHAF, $this->fechaf);
		if ($this->isColumnModified(ActividadPeer::PRESIDENTE)) $criteria->add(ActividadPeer::PRESIDENTE, $this->presidente);
		if ($this->isColumnModified(ActividadPeer::VOCAL1)) $criteria->add(ActividadPeer::VOCAL1, $this->vocal1);
		if ($this->isColumnModified(ActividadPeer::VOCAL2)) $criteria->add(ActividadPeer::VOCAL2, $this->vocal2);
		if ($this->isColumnModified(ActividadPeer::FK_LLAMADO_ID)) $criteria->add(ActividadPeer::FK_LLAMADO_ID, $this->fk_llamado_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(ActividadPeer::DATABASE_NAME);

		$criteria->add(ActividadPeer::ID, $this->id);

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

		$copyObj->setNro($this->nro);

		$copyObj->setAnio($this->anio);

		$copyObj->setFecha($this->fecha);

		$copyObj->setFechaf($this->fechaf);

		$copyObj->setPresidente($this->presidente);

		$copyObj->setVocal1($this->vocal1);

		$copyObj->setVocal2($this->vocal2);

		$copyObj->setFkLlamadoId($this->fk_llamado_id);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach ($this->getRelAnioActividads() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addRelAnioActividad($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getRelDivisionActividadDocentes() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addRelDivisionActividadDocente($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getDetallerendirs() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addDetallerendir($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getDetallecursadas() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addDetallecursada($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getRelactividaddivisions() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addRelactividaddivision($relObj->copy($deepCopy));
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
			self::$peer = new ActividadPeer();
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
			$v->addActividad($this);
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
			$v->addActividad($this);
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

	
	public function setDocenteRelatedByPresidente(Docente $v = null)
	{
		if ($v === null) {
			$this->setPresidente(0);
		} else {
			$this->setPresidente($v->getId());
		}

		$this->aDocenteRelatedByPresidente = $v;

						if ($v !== null) {
			$v->addActividadRelatedByPresidente($this);
		}

		return $this;
	}


	
	public function getDocenteRelatedByPresidente(PropelPDO $con = null)
	{
		if ($this->aDocenteRelatedByPresidente === null && ($this->presidente !== null)) {
			$c = new Criteria(DocentePeer::DATABASE_NAME);
			$c->add(DocentePeer::ID, $this->presidente);
			$this->aDocenteRelatedByPresidente = DocentePeer::doSelectOne($c, $con);
			
		}
		return $this->aDocenteRelatedByPresidente;
	}

	
	public function setDocenteRelatedByVocal1(Docente $v = null)
	{
		if ($v === null) {
			$this->setVocal1(0);
		} else {
			$this->setVocal1($v->getId());
		}

		$this->aDocenteRelatedByVocal1 = $v;

						if ($v !== null) {
			$v->addActividadRelatedByVocal1($this);
		}

		return $this;
	}


	
	public function getDocenteRelatedByVocal1(PropelPDO $con = null)
	{
		if ($this->aDocenteRelatedByVocal1 === null && ($this->vocal1 !== null)) {
			$c = new Criteria(DocentePeer::DATABASE_NAME);
			$c->add(DocentePeer::ID, $this->vocal1);
			$this->aDocenteRelatedByVocal1 = DocentePeer::doSelectOne($c, $con);
			
		}
		return $this->aDocenteRelatedByVocal1;
	}

	
	public function setDocenteRelatedByVocal2(Docente $v = null)
	{
		if ($v === null) {
			$this->setVocal2(0);
		} else {
			$this->setVocal2($v->getId());
		}

		$this->aDocenteRelatedByVocal2 = $v;

						if ($v !== null) {
			$v->addActividadRelatedByVocal2($this);
		}

		return $this;
	}


	
	public function getDocenteRelatedByVocal2(PropelPDO $con = null)
	{
		if ($this->aDocenteRelatedByVocal2 === null && ($this->vocal2 !== null)) {
			$c = new Criteria(DocentePeer::DATABASE_NAME);
			$c->add(DocentePeer::ID, $this->vocal2);
			$this->aDocenteRelatedByVocal2 = DocentePeer::doSelectOne($c, $con);
			
		}
		return $this->aDocenteRelatedByVocal2;
	}

	
	public function setLlamados(Llamados $v = null)
	{
		if ($v === null) {
			$this->setFkLlamadoId(NULL);
		} else {
			$this->setFkLlamadoId($v->getId());
		}

		$this->aLlamados = $v;

						if ($v !== null) {
			$v->addActividad($this);
		}

		return $this;
	}


	
	public function getLlamados(PropelPDO $con = null)
	{
		if ($this->aLlamados === null && ($this->fk_llamado_id !== null)) {
			$c = new Criteria(LlamadosPeer::DATABASE_NAME);
			$c->add(LlamadosPeer::ID, $this->fk_llamado_id);
			$this->aLlamados = LlamadosPeer::doSelectOne($c, $con);
			
		}
		return $this->aLlamados;
	}

	
	public function clearRelAnioActividads()
	{
		$this->collRelAnioActividads = null; 	}

	
	public function initRelAnioActividads()
	{
		$this->collRelAnioActividads = array();
	}

	
	public function getRelAnioActividads($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ActividadPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelAnioActividads === null) {
			if ($this->isNew()) {
			   $this->collRelAnioActividads = array();
			} else {

				$criteria->add(RelAnioActividadPeer::FK_ACTIVIDAD_ID, $this->id);

				RelAnioActividadPeer::addSelectColumns($criteria);
				$this->collRelAnioActividads = RelAnioActividadPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RelAnioActividadPeer::FK_ACTIVIDAD_ID, $this->id);

				RelAnioActividadPeer::addSelectColumns($criteria);
				if (!isset($this->lastRelAnioActividadCriteria) || !$this->lastRelAnioActividadCriteria->equals($criteria)) {
					$this->collRelAnioActividads = RelAnioActividadPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastRelAnioActividadCriteria = $criteria;
		return $this->collRelAnioActividads;
	}

	
	public function countRelAnioActividads(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ActividadPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collRelAnioActividads === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(RelAnioActividadPeer::FK_ACTIVIDAD_ID, $this->id);

				$count = RelAnioActividadPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RelAnioActividadPeer::FK_ACTIVIDAD_ID, $this->id);

				if (!isset($this->lastRelAnioActividadCriteria) || !$this->lastRelAnioActividadCriteria->equals($criteria)) {
					$count = RelAnioActividadPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collRelAnioActividads);
				}
			} else {
				$count = count($this->collRelAnioActividads);
			}
		}
		return $count;
	}

	
	public function addRelAnioActividad(RelAnioActividad $l)
	{
		if ($this->collRelAnioActividads === null) {
			$this->initRelAnioActividads();
		}
		if (!in_array($l, $this->collRelAnioActividads, true)) { 			array_push($this->collRelAnioActividads, $l);
			$l->setActividad($this);
		}
	}


	
	public function getRelAnioActividadsJoinAnio($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ActividadPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelAnioActividads === null) {
			if ($this->isNew()) {
				$this->collRelAnioActividads = array();
			} else {

				$criteria->add(RelAnioActividadPeer::FK_ACTIVIDAD_ID, $this->id);

				$this->collRelAnioActividads = RelAnioActividadPeer::doSelectJoinAnio($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(RelAnioActividadPeer::FK_ACTIVIDAD_ID, $this->id);

			if (!isset($this->lastRelAnioActividadCriteria) || !$this->lastRelAnioActividadCriteria->equals($criteria)) {
				$this->collRelAnioActividads = RelAnioActividadPeer::doSelectJoinAnio($criteria, $con, $join_behavior);
			}
		}
		$this->lastRelAnioActividadCriteria = $criteria;

		return $this->collRelAnioActividads;
	}


	
	public function getRelAnioActividadsJoinOrientacion($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ActividadPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelAnioActividads === null) {
			if ($this->isNew()) {
				$this->collRelAnioActividads = array();
			} else {

				$criteria->add(RelAnioActividadPeer::FK_ACTIVIDAD_ID, $this->id);

				$this->collRelAnioActividads = RelAnioActividadPeer::doSelectJoinOrientacion($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(RelAnioActividadPeer::FK_ACTIVIDAD_ID, $this->id);

			if (!isset($this->lastRelAnioActividadCriteria) || !$this->lastRelAnioActividadCriteria->equals($criteria)) {
				$this->collRelAnioActividads = RelAnioActividadPeer::doSelectJoinOrientacion($criteria, $con, $join_behavior);
			}
		}
		$this->lastRelAnioActividadCriteria = $criteria;

		return $this->collRelAnioActividads;
	}

	
	public function clearRelDivisionActividadDocentes()
	{
		$this->collRelDivisionActividadDocentes = null; 	}

	
	public function initRelDivisionActividadDocentes()
	{
		$this->collRelDivisionActividadDocentes = array();
	}

	
	public function getRelDivisionActividadDocentes($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ActividadPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelDivisionActividadDocentes === null) {
			if ($this->isNew()) {
			   $this->collRelDivisionActividadDocentes = array();
			} else {

				$criteria->add(RelDivisionActividadDocentePeer::FK_ACTIVIDAD_ID, $this->id);

				RelDivisionActividadDocentePeer::addSelectColumns($criteria);
				$this->collRelDivisionActividadDocentes = RelDivisionActividadDocentePeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RelDivisionActividadDocentePeer::FK_ACTIVIDAD_ID, $this->id);

				RelDivisionActividadDocentePeer::addSelectColumns($criteria);
				if (!isset($this->lastRelDivisionActividadDocenteCriteria) || !$this->lastRelDivisionActividadDocenteCriteria->equals($criteria)) {
					$this->collRelDivisionActividadDocentes = RelDivisionActividadDocentePeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastRelDivisionActividadDocenteCriteria = $criteria;
		return $this->collRelDivisionActividadDocentes;
	}

	
	public function countRelDivisionActividadDocentes(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ActividadPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collRelDivisionActividadDocentes === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(RelDivisionActividadDocentePeer::FK_ACTIVIDAD_ID, $this->id);

				$count = RelDivisionActividadDocentePeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RelDivisionActividadDocentePeer::FK_ACTIVIDAD_ID, $this->id);

				if (!isset($this->lastRelDivisionActividadDocenteCriteria) || !$this->lastRelDivisionActividadDocenteCriteria->equals($criteria)) {
					$count = RelDivisionActividadDocentePeer::doCount($criteria, $con);
				} else {
					$count = count($this->collRelDivisionActividadDocentes);
				}
			} else {
				$count = count($this->collRelDivisionActividadDocentes);
			}
		}
		return $count;
	}

	
	public function addRelDivisionActividadDocente(RelDivisionActividadDocente $l)
	{
		if ($this->collRelDivisionActividadDocentes === null) {
			$this->initRelDivisionActividadDocentes();
		}
		if (!in_array($l, $this->collRelDivisionActividadDocentes, true)) { 			array_push($this->collRelDivisionActividadDocentes, $l);
			$l->setActividad($this);
		}
	}


	
	public function getRelDivisionActividadDocentesJoinDivision($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ActividadPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelDivisionActividadDocentes === null) {
			if ($this->isNew()) {
				$this->collRelDivisionActividadDocentes = array();
			} else {

				$criteria->add(RelDivisionActividadDocentePeer::FK_ACTIVIDAD_ID, $this->id);

				$this->collRelDivisionActividadDocentes = RelDivisionActividadDocentePeer::doSelectJoinDivision($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(RelDivisionActividadDocentePeer::FK_ACTIVIDAD_ID, $this->id);

			if (!isset($this->lastRelDivisionActividadDocenteCriteria) || !$this->lastRelDivisionActividadDocenteCriteria->equals($criteria)) {
				$this->collRelDivisionActividadDocentes = RelDivisionActividadDocentePeer::doSelectJoinDivision($criteria, $con, $join_behavior);
			}
		}
		$this->lastRelDivisionActividadDocenteCriteria = $criteria;

		return $this->collRelDivisionActividadDocentes;
	}


	
	public function getRelDivisionActividadDocentesJoinDocente($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ActividadPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelDivisionActividadDocentes === null) {
			if ($this->isNew()) {
				$this->collRelDivisionActividadDocentes = array();
			} else {

				$criteria->add(RelDivisionActividadDocentePeer::FK_ACTIVIDAD_ID, $this->id);

				$this->collRelDivisionActividadDocentes = RelDivisionActividadDocentePeer::doSelectJoinDocente($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(RelDivisionActividadDocentePeer::FK_ACTIVIDAD_ID, $this->id);

			if (!isset($this->lastRelDivisionActividadDocenteCriteria) || !$this->lastRelDivisionActividadDocenteCriteria->equals($criteria)) {
				$this->collRelDivisionActividadDocentes = RelDivisionActividadDocentePeer::doSelectJoinDocente($criteria, $con, $join_behavior);
			}
		}
		$this->lastRelDivisionActividadDocenteCriteria = $criteria;

		return $this->collRelDivisionActividadDocentes;
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
			$criteria = new Criteria(ActividadPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDetallerendirs === null) {
			if ($this->isNew()) {
			   $this->collDetallerendirs = array();
			} else {

				$criteria->add(DetallerendirPeer::FK_ACTIVIDAD_ID, $this->id);

				DetallerendirPeer::addSelectColumns($criteria);
				$this->collDetallerendirs = DetallerendirPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(DetallerendirPeer::FK_ACTIVIDAD_ID, $this->id);

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
			$criteria = new Criteria(ActividadPeer::DATABASE_NAME);
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

				$criteria->add(DetallerendirPeer::FK_ACTIVIDAD_ID, $this->id);

				$count = DetallerendirPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(DetallerendirPeer::FK_ACTIVIDAD_ID, $this->id);

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
			$l->setActividad($this);
		}
	}


	
	public function getDetallerendirsJoinCursada($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ActividadPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDetallerendirs === null) {
			if ($this->isNew()) {
				$this->collDetallerendirs = array();
			} else {

				$criteria->add(DetallerendirPeer::FK_ACTIVIDAD_ID, $this->id);

				$this->collDetallerendirs = DetallerendirPeer::doSelectJoinCursada($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(DetallerendirPeer::FK_ACTIVIDAD_ID, $this->id);

			if (!isset($this->lastDetallerendirCriteria) || !$this->lastDetallerendirCriteria->equals($criteria)) {
				$this->collDetallerendirs = DetallerendirPeer::doSelectJoinCursada($criteria, $con, $join_behavior);
			}
		}
		$this->lastDetallerendirCriteria = $criteria;

		return $this->collDetallerendirs;
	}


	
	public function getDetallerendirsJoinAlumno($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ActividadPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDetallerendirs === null) {
			if ($this->isNew()) {
				$this->collDetallerendirs = array();
			} else {

				$criteria->add(DetallerendirPeer::FK_ACTIVIDAD_ID, $this->id);

				$this->collDetallerendirs = DetallerendirPeer::doSelectJoinAlumno($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(DetallerendirPeer::FK_ACTIVIDAD_ID, $this->id);

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
			$criteria = new Criteria(ActividadPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDetallerendirs === null) {
			if ($this->isNew()) {
				$this->collDetallerendirs = array();
			} else {

				$criteria->add(DetallerendirPeer::FK_ACTIVIDAD_ID, $this->id);

				$this->collDetallerendirs = DetallerendirPeer::doSelectJoinEstadomateren($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(DetallerendirPeer::FK_ACTIVIDAD_ID, $this->id);

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
			$criteria = new Criteria(ActividadPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDetallerendirs === null) {
			if ($this->isNew()) {
				$this->collDetallerendirs = array();
			} else {

				$criteria->add(DetallerendirPeer::FK_ACTIVIDAD_ID, $this->id);

				$this->collDetallerendirs = DetallerendirPeer::doSelectJoinLlamados($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(DetallerendirPeer::FK_ACTIVIDAD_ID, $this->id);

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
			$criteria = new Criteria(ActividadPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDetallecursadas === null) {
			if ($this->isNew()) {
			   $this->collDetallecursadas = array();
			} else {

				$criteria->add(DetallecursadaPeer::FK_ACTIVIDAD_ID, $this->id);

				DetallecursadaPeer::addSelectColumns($criteria);
				$this->collDetallecursadas = DetallecursadaPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(DetallecursadaPeer::FK_ACTIVIDAD_ID, $this->id);

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
			$criteria = new Criteria(ActividadPeer::DATABASE_NAME);
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

				$criteria->add(DetallecursadaPeer::FK_ACTIVIDAD_ID, $this->id);

				$count = DetallecursadaPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(DetallecursadaPeer::FK_ACTIVIDAD_ID, $this->id);

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
			$l->setActividad($this);
		}
	}


	
	public function getDetallecursadasJoinCursada($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ActividadPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDetallecursadas === null) {
			if ($this->isNew()) {
				$this->collDetallecursadas = array();
			} else {

				$criteria->add(DetallecursadaPeer::FK_ACTIVIDAD_ID, $this->id);

				$this->collDetallecursadas = DetallecursadaPeer::doSelectJoinCursada($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(DetallecursadaPeer::FK_ACTIVIDAD_ID, $this->id);

			if (!isset($this->lastDetallecursadaCriteria) || !$this->lastDetallecursadaCriteria->equals($criteria)) {
				$this->collDetallecursadas = DetallecursadaPeer::doSelectJoinCursada($criteria, $con, $join_behavior);
			}
		}
		$this->lastDetallecursadaCriteria = $criteria;

		return $this->collDetallecursadas;
	}


	
	public function getDetallecursadasJoinAlumno($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ActividadPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDetallecursadas === null) {
			if ($this->isNew()) {
				$this->collDetallecursadas = array();
			} else {

				$criteria->add(DetallecursadaPeer::FK_ACTIVIDAD_ID, $this->id);

				$this->collDetallecursadas = DetallecursadaPeer::doSelectJoinAlumno($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(DetallecursadaPeer::FK_ACTIVIDAD_ID, $this->id);

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
			$criteria = new Criteria(ActividadPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDetallecursadas === null) {
			if ($this->isNew()) {
				$this->collDetallecursadas = array();
			} else {

				$criteria->add(DetallecursadaPeer::FK_ACTIVIDAD_ID, $this->id);

				$this->collDetallecursadas = DetallecursadaPeer::doSelectJoinEstadomate($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(DetallecursadaPeer::FK_ACTIVIDAD_ID, $this->id);

			if (!isset($this->lastDetallecursadaCriteria) || !$this->lastDetallecursadaCriteria->equals($criteria)) {
				$this->collDetallecursadas = DetallecursadaPeer::doSelectJoinEstadomate($criteria, $con, $join_behavior);
			}
		}
		$this->lastDetallecursadaCriteria = $criteria;

		return $this->collDetallecursadas;
	}

	
	public function clearRelactividaddivisions()
	{
		$this->collRelactividaddivisions = null; 	}

	
	public function initRelactividaddivisions()
	{
		$this->collRelactividaddivisions = array();
	}

	
	public function getRelactividaddivisions($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ActividadPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelactividaddivisions === null) {
			if ($this->isNew()) {
			   $this->collRelactividaddivisions = array();
			} else {

				$criteria->add(RelactividaddivisionPeer::FK_ACTIVIDAD_ID, $this->id);

				RelactividaddivisionPeer::addSelectColumns($criteria);
				$this->collRelactividaddivisions = RelactividaddivisionPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RelactividaddivisionPeer::FK_ACTIVIDAD_ID, $this->id);

				RelactividaddivisionPeer::addSelectColumns($criteria);
				if (!isset($this->lastRelactividaddivisionCriteria) || !$this->lastRelactividaddivisionCriteria->equals($criteria)) {
					$this->collRelactividaddivisions = RelactividaddivisionPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastRelactividaddivisionCriteria = $criteria;
		return $this->collRelactividaddivisions;
	}

	
	public function countRelactividaddivisions(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ActividadPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collRelactividaddivisions === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(RelactividaddivisionPeer::FK_ACTIVIDAD_ID, $this->id);

				$count = RelactividaddivisionPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RelactividaddivisionPeer::FK_ACTIVIDAD_ID, $this->id);

				if (!isset($this->lastRelactividaddivisionCriteria) || !$this->lastRelactividaddivisionCriteria->equals($criteria)) {
					$count = RelactividaddivisionPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collRelactividaddivisions);
				}
			} else {
				$count = count($this->collRelactividaddivisions);
			}
		}
		return $count;
	}

	
	public function addRelactividaddivision(Relactividaddivision $l)
	{
		if ($this->collRelactividaddivisions === null) {
			$this->initRelactividaddivisions();
		}
		if (!in_array($l, $this->collRelactividaddivisions, true)) { 			array_push($this->collRelactividaddivisions, $l);
			$l->setActividad($this);
		}
	}


	
	public function getRelactividaddivisionsJoinDivision($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(ActividadPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelactividaddivisions === null) {
			if ($this->isNew()) {
				$this->collRelactividaddivisions = array();
			} else {

				$criteria->add(RelactividaddivisionPeer::FK_ACTIVIDAD_ID, $this->id);

				$this->collRelactividaddivisions = RelactividaddivisionPeer::doSelectJoinDivision($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(RelactividaddivisionPeer::FK_ACTIVIDAD_ID, $this->id);

			if (!isset($this->lastRelactividaddivisionCriteria) || !$this->lastRelactividaddivisionCriteria->equals($criteria)) {
				$this->collRelactividaddivisions = RelactividaddivisionPeer::doSelectJoinDivision($criteria, $con, $join_behavior);
			}
		}
		$this->lastRelactividaddivisionCriteria = $criteria;

		return $this->collRelactividaddivisions;
	}

	
	public function clearAllReferences($deep = false)
	{
		if ($deep) {
			if ($this->collRelAnioActividads) {
				foreach ((array) $this->collRelAnioActividads as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collRelDivisionActividadDocentes) {
				foreach ((array) $this->collRelDivisionActividadDocentes as $o) {
					$o->clearAllReferences($deep);
				}
			}
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
			if ($this->collRelactividaddivisions) {
				foreach ((array) $this->collRelactividaddivisions as $o) {
					$o->clearAllReferences($deep);
				}
			}
		} 
		$this->collRelAnioActividads = null;
		$this->collRelDivisionActividadDocentes = null;
		$this->collDetallerendirs = null;
		$this->collDetallecursadas = null;
		$this->collRelactividaddivisions = null;
			$this->aEstablecimiento = null;
			$this->aCarrera = null;
			$this->aDocenteRelatedByPresidente = null;
			$this->aDocenteRelatedByVocal1 = null;
			$this->aDocenteRelatedByVocal2 = null;
			$this->aLlamados = null;
	}

} 