<?php


abstract class BaseDetallerendir extends BaseObject  implements Persistent {


  const PEER = 'DetallerendirPeer';

	
	protected static $peer;

	
	protected $id;

	
	protected $fk_cursada_id;

	
	protected $fk_actividad_id;

	
	protected $fk_alumno_id;

	
	protected $fk_dcursada_id;

	
	protected $orden;

	
	protected $result;

	
	protected $estado;

	
	protected $libro;

	
	protected $folio;

	
	protected $fecha;

	
	protected $fk_llamada_id;

	
	protected $aCursada;

	
	protected $aActividad;

	
	protected $aAlumno;

	
	protected $aEstadomateren;

	
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

	
	public function getFkCursadaId()
	{
		return $this->fk_cursada_id;
	}

	
	public function getFkActividadId()
	{
		return $this->fk_actividad_id;
	}

	
	public function getFkAlumnoId()
	{
		return $this->fk_alumno_id;
	}

	
	public function getFkDcursadaId()
	{
		return $this->fk_dcursada_id;
	}

	
	public function getOrden()
	{
		return $this->orden;
	}

	
	public function getResult()
	{
		return $this->result;
	}

	
	public function getEstado()
	{
		return $this->estado;
	}

	
	public function getLibro()
	{
		return $this->libro;
	}

	
	public function getFolio()
	{
		return $this->folio;
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

	
	public function getFkLlamadaId()
	{
		return $this->fk_llamada_id;
	}

	
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = DetallerendirPeer::ID;
		}

		return $this;
	} 
	
	public function setFkCursadaId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->fk_cursada_id !== $v) {
			$this->fk_cursada_id = $v;
			$this->modifiedColumns[] = DetallerendirPeer::FK_CURSADA_ID;
		}

		if ($this->aCursada !== null && $this->aCursada->getId() !== $v) {
			$this->aCursada = null;
		}

		return $this;
	} 
	
	public function setFkActividadId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->fk_actividad_id !== $v) {
			$this->fk_actividad_id = $v;
			$this->modifiedColumns[] = DetallerendirPeer::FK_ACTIVIDAD_ID;
		}

		if ($this->aActividad !== null && $this->aActividad->getId() !== $v) {
			$this->aActividad = null;
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
			$this->modifiedColumns[] = DetallerendirPeer::FK_ALUMNO_ID;
		}

		if ($this->aAlumno !== null && $this->aAlumno->getId() !== $v) {
			$this->aAlumno = null;
		}

		return $this;
	} 
	
	public function setFkDcursadaId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->fk_dcursada_id !== $v) {
			$this->fk_dcursada_id = $v;
			$this->modifiedColumns[] = DetallerendirPeer::FK_DCURSADA_ID;
		}

		if ($this->aEstadomateren !== null && $this->aEstadomateren->getId() !== $v) {
			$this->aEstadomateren = null;
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
			$this->modifiedColumns[] = DetallerendirPeer::ORDEN;
		}

		return $this;
	} 
	
	public function setResult($v)
	{
		if ($v !== null) {
			$v = (double) $v;
		}

		if ($this->result !== $v) {
			$this->result = $v;
			$this->modifiedColumns[] = DetallerendirPeer::RESULT;
		}

		return $this;
	} 
	
	public function setEstado($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->estado !== $v) {
			$this->estado = $v;
			$this->modifiedColumns[] = DetallerendirPeer::ESTADO;
		}

		return $this;
	} 
	
	public function setLibro($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->libro !== $v) {
			$this->libro = $v;
			$this->modifiedColumns[] = DetallerendirPeer::LIBRO;
		}

		return $this;
	} 
	
	public function setFolio($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->folio !== $v) {
			$this->folio = $v;
			$this->modifiedColumns[] = DetallerendirPeer::FOLIO;
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
				$this->modifiedColumns[] = DetallerendirPeer::FECHA;
			}
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
			$this->modifiedColumns[] = DetallerendirPeer::FK_LLAMADA_ID;
		}

		if ($this->aLlamados !== null && $this->aLlamados->getId() !== $v) {
			$this->aLlamados = null;
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
			$this->fk_cursada_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
			$this->fk_actividad_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->fk_alumno_id = ($row[$startcol + 3] !== null) ? (int) $row[$startcol + 3] : null;
			$this->fk_dcursada_id = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
			$this->orden = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
			$this->result = ($row[$startcol + 6] !== null) ? (double) $row[$startcol + 6] : null;
			$this->estado = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->libro = ($row[$startcol + 8] !== null) ? (int) $row[$startcol + 8] : null;
			$this->folio = ($row[$startcol + 9] !== null) ? (int) $row[$startcol + 9] : null;
			$this->fecha = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
			$this->fk_llamada_id = ($row[$startcol + 11] !== null) ? (int) $row[$startcol + 11] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

						return $startcol + 12; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Detallerendir object", $e);
		}
	}

	
	public function ensureConsistency()
	{

		if ($this->aCursada !== null && $this->fk_cursada_id !== $this->aCursada->getId()) {
			$this->aCursada = null;
		}
		if ($this->aActividad !== null && $this->fk_actividad_id !== $this->aActividad->getId()) {
			$this->aActividad = null;
		}
		if ($this->aAlumno !== null && $this->fk_alumno_id !== $this->aAlumno->getId()) {
			$this->aAlumno = null;
		}
		if ($this->aEstadomateren !== null && $this->fk_dcursada_id !== $this->aEstadomateren->getId()) {
			$this->aEstadomateren = null;
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
			$con = Propel::getConnection(DetallerendirPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				
		$stmt = DetallerendirPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); 
		if ($deep) {  
			$this->aCursada = null;
			$this->aActividad = null;
			$this->aAlumno = null;
			$this->aEstadomateren = null;
			$this->aLlamados = null;
		} 	}

	
	public function delete(PropelPDO $con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(DetallerendirPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			DetallerendirPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(DetallerendirPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
			DetallerendirPeer::addInstanceToPool($this);
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

												
			if ($this->aCursada !== null) {
				if ($this->aCursada->isModified() || $this->aCursada->isNew()) {
					$affectedRows += $this->aCursada->save($con);
				}
				$this->setCursada($this->aCursada);
			}

			if ($this->aActividad !== null) {
				if ($this->aActividad->isModified() || $this->aActividad->isNew()) {
					$affectedRows += $this->aActividad->save($con);
				}
				$this->setActividad($this->aActividad);
			}

			if ($this->aAlumno !== null) {
				if ($this->aAlumno->isModified() || $this->aAlumno->isNew()) {
					$affectedRows += $this->aAlumno->save($con);
				}
				$this->setAlumno($this->aAlumno);
			}

			if ($this->aEstadomateren !== null) {
				if ($this->aEstadomateren->isModified() || $this->aEstadomateren->isNew()) {
					$affectedRows += $this->aEstadomateren->save($con);
				}
				$this->setEstadomateren($this->aEstadomateren);
			}

			if ($this->aLlamados !== null) {
				if ($this->aLlamados->isModified() || $this->aLlamados->isNew()) {
					$affectedRows += $this->aLlamados->save($con);
				}
				$this->setLlamados($this->aLlamados);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = DetallerendirPeer::ID;
			}

						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = DetallerendirPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += DetallerendirPeer::doUpdate($this, $con);
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


												
			if ($this->aCursada !== null) {
				if (!$this->aCursada->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCursada->getValidationFailures());
				}
			}

			if ($this->aActividad !== null) {
				if (!$this->aActividad->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aActividad->getValidationFailures());
				}
			}

			if ($this->aAlumno !== null) {
				if (!$this->aAlumno->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aAlumno->getValidationFailures());
				}
			}

			if ($this->aEstadomateren !== null) {
				if (!$this->aEstadomateren->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aEstadomateren->getValidationFailures());
				}
			}

			if ($this->aLlamados !== null) {
				if (!$this->aLlamados->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLlamados->getValidationFailures());
				}
			}


			if (($retval = DetallerendirPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = DetallerendirPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getFkCursadaId();
				break;
			case 2:
				return $this->getFkActividadId();
				break;
			case 3:
				return $this->getFkAlumnoId();
				break;
			case 4:
				return $this->getFkDcursadaId();
				break;
			case 5:
				return $this->getOrden();
				break;
			case 6:
				return $this->getResult();
				break;
			case 7:
				return $this->getEstado();
				break;
			case 8:
				return $this->getLibro();
				break;
			case 9:
				return $this->getFolio();
				break;
			case 10:
				return $this->getFecha();
				break;
			case 11:
				return $this->getFkLlamadaId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = DetallerendirPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getFkCursadaId(),
			$keys[2] => $this->getFkActividadId(),
			$keys[3] => $this->getFkAlumnoId(),
			$keys[4] => $this->getFkDcursadaId(),
			$keys[5] => $this->getOrden(),
			$keys[6] => $this->getResult(),
			$keys[7] => $this->getEstado(),
			$keys[8] => $this->getLibro(),
			$keys[9] => $this->getFolio(),
			$keys[10] => $this->getFecha(),
			$keys[11] => $this->getFkLlamadaId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = DetallerendirPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setFkCursadaId($value);
				break;
			case 2:
				$this->setFkActividadId($value);
				break;
			case 3:
				$this->setFkAlumnoId($value);
				break;
			case 4:
				$this->setFkDcursadaId($value);
				break;
			case 5:
				$this->setOrden($value);
				break;
			case 6:
				$this->setResult($value);
				break;
			case 7:
				$this->setEstado($value);
				break;
			case 8:
				$this->setLibro($value);
				break;
			case 9:
				$this->setFolio($value);
				break;
			case 10:
				$this->setFecha($value);
				break;
			case 11:
				$this->setFkLlamadaId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = DetallerendirPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setFkCursadaId($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFkActividadId($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFkAlumnoId($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFkDcursadaId($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setOrden($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setResult($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setEstado($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setLibro($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setFolio($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setFecha($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setFkLlamadaId($arr[$keys[11]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(DetallerendirPeer::DATABASE_NAME);

		if ($this->isColumnModified(DetallerendirPeer::ID)) $criteria->add(DetallerendirPeer::ID, $this->id);
		if ($this->isColumnModified(DetallerendirPeer::FK_CURSADA_ID)) $criteria->add(DetallerendirPeer::FK_CURSADA_ID, $this->fk_cursada_id);
		if ($this->isColumnModified(DetallerendirPeer::FK_ACTIVIDAD_ID)) $criteria->add(DetallerendirPeer::FK_ACTIVIDAD_ID, $this->fk_actividad_id);
		if ($this->isColumnModified(DetallerendirPeer::FK_ALUMNO_ID)) $criteria->add(DetallerendirPeer::FK_ALUMNO_ID, $this->fk_alumno_id);
		if ($this->isColumnModified(DetallerendirPeer::FK_DCURSADA_ID)) $criteria->add(DetallerendirPeer::FK_DCURSADA_ID, $this->fk_dcursada_id);
		if ($this->isColumnModified(DetallerendirPeer::ORDEN)) $criteria->add(DetallerendirPeer::ORDEN, $this->orden);
		if ($this->isColumnModified(DetallerendirPeer::RESULT)) $criteria->add(DetallerendirPeer::RESULT, $this->result);
		if ($this->isColumnModified(DetallerendirPeer::ESTADO)) $criteria->add(DetallerendirPeer::ESTADO, $this->estado);
		if ($this->isColumnModified(DetallerendirPeer::LIBRO)) $criteria->add(DetallerendirPeer::LIBRO, $this->libro);
		if ($this->isColumnModified(DetallerendirPeer::FOLIO)) $criteria->add(DetallerendirPeer::FOLIO, $this->folio);
		if ($this->isColumnModified(DetallerendirPeer::FECHA)) $criteria->add(DetallerendirPeer::FECHA, $this->fecha);
		if ($this->isColumnModified(DetallerendirPeer::FK_LLAMADA_ID)) $criteria->add(DetallerendirPeer::FK_LLAMADA_ID, $this->fk_llamada_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(DetallerendirPeer::DATABASE_NAME);

		$criteria->add(DetallerendirPeer::ID, $this->id);

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

		$copyObj->setFkCursadaId($this->fk_cursada_id);

		$copyObj->setFkActividadId($this->fk_actividad_id);

		$copyObj->setFkAlumnoId($this->fk_alumno_id);

		$copyObj->setFkDcursadaId($this->fk_dcursada_id);

		$copyObj->setOrden($this->orden);

		$copyObj->setResult($this->result);

		$copyObj->setEstado($this->estado);

		$copyObj->setLibro($this->libro);

		$copyObj->setFolio($this->folio);

		$copyObj->setFecha($this->fecha);

		$copyObj->setFkLlamadaId($this->fk_llamada_id);


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
			self::$peer = new DetallerendirPeer();
		}
		return self::$peer;
	}

	
	public function setCursada(Cursada $v = null)
	{
		if ($v === null) {
			$this->setFkCursadaId(NULL);
		} else {
			$this->setFkCursadaId($v->getId());
		}

		$this->aCursada = $v;

						if ($v !== null) {
			$v->addDetallerendir($this);
		}

		return $this;
	}


	
	public function getCursada(PropelPDO $con = null)
	{
		if ($this->aCursada === null && ($this->fk_cursada_id !== null)) {
			$c = new Criteria(CursadaPeer::DATABASE_NAME);
			$c->add(CursadaPeer::ID, $this->fk_cursada_id);
			$this->aCursada = CursadaPeer::doSelectOne($c, $con);
			
		}
		return $this->aCursada;
	}

	
	public function setActividad(Actividad $v = null)
	{
		if ($v === null) {
			$this->setFkActividadId(NULL);
		} else {
			$this->setFkActividadId($v->getId());
		}

		$this->aActividad = $v;

						if ($v !== null) {
			$v->addDetallerendir($this);
		}

		return $this;
	}


	
	public function getActividad(PropelPDO $con = null)
	{
		if ($this->aActividad === null && ($this->fk_actividad_id !== null)) {
			$c = new Criteria(ActividadPeer::DATABASE_NAME);
			$c->add(ActividadPeer::ID, $this->fk_actividad_id);
			$this->aActividad = ActividadPeer::doSelectOne($c, $con);
			
		}
		return $this->aActividad;
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
			$v->addDetallerendir($this);
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

	
	public function setEstadomateren(Estadomateren $v = null)
	{
		if ($v === null) {
			$this->setFkDcursadaId(NULL);
		} else {
			$this->setFkDcursadaId($v->getId());
		}

		$this->aEstadomateren = $v;

						if ($v !== null) {
			$v->addDetallerendir($this);
		}

		return $this;
	}


	
	public function getEstadomateren(PropelPDO $con = null)
	{
		if ($this->aEstadomateren === null && ($this->fk_dcursada_id !== null)) {
			$c = new Criteria(EstadomaterenPeer::DATABASE_NAME);
			$c->add(EstadomaterenPeer::ID, $this->fk_dcursada_id);
			$this->aEstadomateren = EstadomaterenPeer::doSelectOne($c, $con);
			
		}
		return $this->aEstadomateren;
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
			$v->addDetallerendir($this);
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
			$this->aCursada = null;
			$this->aActividad = null;
			$this->aAlumno = null;
			$this->aEstadomateren = null;
			$this->aLlamados = null;
	}

} 