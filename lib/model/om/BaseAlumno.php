<?php


abstract class BaseAlumno extends BaseObject  implements Persistent {


  const PEER = 'AlumnoPeer';

	
	protected static $peer;

	
	protected $id;

	
	protected $legajo_prefijo;

	
	protected $legajo_numero;

	
	protected $nombre;

	
	protected $apellido_materno;

	
	protected $apellido;

	
	protected $fecha_nacimiento;

	
	protected $direccion;

	
	protected $ciudad;

	
	protected $codigo_postal;

	
	protected $fk_provincia_id;

	
	protected $telefono;

	
	protected $fk_tipodocumento_id;

	
	protected $nro_documento;

	
	protected $sexo;

	
	protected $email;

	
	protected $fk_establecimiento_id;

	
	protected $activo;

	
	protected $fk_pais_id;

	
	protected $matricula;

	
	protected $fk_estadoalumno_id;

	
	protected $observacion;

	
	protected $fk_carrera_id;

	
	protected $telefono_fijo;

	
	protected $adeuda;

	
	protected $aProvincia;

	
	protected $aTipodocumento;

	
	protected $aEstablecimiento;

	
	protected $aPais;

	
	protected $aEstadosalumnos;

	
	protected $aCarrera;

	
	protected $collUsuarios;

	
	private $lastUsuarioCriteria = null;

	
	protected $collRelCalendariovacunacionAlumnos;

	
	private $lastRelCalendariovacunacionAlumnoCriteria = null;

	
	protected $collLegajopedagogicos;

	
	private $lastLegajopedagogicoCriteria = null;

	
	protected $collRelAlumnoDivisions;

	
	private $lastRelAlumnoDivisionCriteria = null;

	
	protected $collRendidas;

	
	private $lastRendidaCriteria = null;

	
	protected $collCursadas;

	
	private $lastCursadaCriteria = null;

	
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
		$this->fk_provincia_id = 0;
		$this->fk_tipodocumento_id = 0;
		$this->fk_establecimiento_id = 3;
		$this->activo = true;
		$this->fk_pais_id = 0;
		$this->fk_estadoalumno_id = 1;
		$this->adeuda = true;
	}

	
	public function getId()
	{
		return $this->id;
	}

	
	public function getLegajoPrefijo()
	{
		return $this->legajo_prefijo;
	}

	
	public function getLegajoNumero()
	{
		return $this->legajo_numero;
	}

	
	public function getNombre()
	{
		return $this->nombre;
	}

	
	public function getApellidoMaterno()
	{
		return $this->apellido_materno;
	}

	
	public function getApellido()
	{
		return $this->apellido;
	}

	
	public function getFechaNacimiento($format = 'Y-m-d')
	{
		if ($this->fecha_nacimiento === null) {
			return null;
		}


		if ($this->fecha_nacimiento === '0000-00-00') {
									return null;
		} else {
			try {
				$dt = new DateTime($this->fecha_nacimiento);
			} catch (Exception $x) {
				throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->fecha_nacimiento, true), $x);
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

	
	public function getDireccion()
	{
		return $this->direccion;
	}

	
	public function getCiudad()
	{
		return $this->ciudad;
	}

	
	public function getCodigoPostal()
	{
		return $this->codigo_postal;
	}

	
	public function getFkProvinciaId()
	{
		return $this->fk_provincia_id;
	}

	
	public function getTelefono()
	{
		return $this->telefono;
	}

	
	public function getFkTipodocumentoId()
	{
		return $this->fk_tipodocumento_id;
	}

	
	public function getNroDocumento()
	{
		return $this->nro_documento;
	}

	
	public function getSexo()
	{
		return $this->sexo;
	}

	
	public function getEmail()
	{
		return $this->email;
	}

	
	public function getFkEstablecimientoId()
	{
		return $this->fk_establecimiento_id;
	}

	
	public function getActivo()
	{
		return $this->activo;
	}

	
	public function getFkPaisId()
	{
		return $this->fk_pais_id;
	}

	
	public function getMatricula()
	{
		return $this->matricula;
	}

	
	public function getFkEstadoalumnoId()
	{
		return $this->fk_estadoalumno_id;
	}

	
	public function getObservacion()
	{
		return $this->observacion;
	}

	
	public function getFkCarreraId()
	{
		return $this->fk_carrera_id;
	}

	
	public function getTelefonoFijo()
	{
		return $this->telefono_fijo;
	}

	
	public function getAdeuda()
	{
		return $this->adeuda;
	}

	
	public function setId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = AlumnoPeer::ID;
		}

		return $this;
	} 
	
	public function setLegajoPrefijo($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->legajo_prefijo !== $v) {
			$this->legajo_prefijo = $v;
			$this->modifiedColumns[] = AlumnoPeer::LEGAJO_PREFIJO;
		}

		return $this;
	} 
	
	public function setLegajoNumero($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->legajo_numero !== $v) {
			$this->legajo_numero = $v;
			$this->modifiedColumns[] = AlumnoPeer::LEGAJO_NUMERO;
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
			$this->modifiedColumns[] = AlumnoPeer::NOMBRE;
		}

		return $this;
	} 
	
	public function setApellidoMaterno($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->apellido_materno !== $v) {
			$this->apellido_materno = $v;
			$this->modifiedColumns[] = AlumnoPeer::APELLIDO_MATERNO;
		}

		return $this;
	} 
	
	public function setApellido($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->apellido !== $v) {
			$this->apellido = $v;
			$this->modifiedColumns[] = AlumnoPeer::APELLIDO;
		}

		return $this;
	} 
	
	public function setFechaNacimiento($v)
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

		if ( $this->fecha_nacimiento !== null || $dt !== null ) {
			
			$currNorm = ($this->fecha_nacimiento !== null && $tmpDt = new DateTime($this->fecha_nacimiento)) ? $tmpDt->format('Y-m-d') : null;
			$newNorm = ($dt !== null) ? $dt->format('Y-m-d') : null;

			if ( ($currNorm !== $newNorm) 					)
			{
				$this->fecha_nacimiento = ($dt ? $dt->format('Y-m-d') : null);
				$this->modifiedColumns[] = AlumnoPeer::FECHA_NACIMIENTO;
			}
		} 
		return $this;
	} 
	
	public function setDireccion($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->direccion !== $v) {
			$this->direccion = $v;
			$this->modifiedColumns[] = AlumnoPeer::DIRECCION;
		}

		return $this;
	} 
	
	public function setCiudad($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->ciudad !== $v) {
			$this->ciudad = $v;
			$this->modifiedColumns[] = AlumnoPeer::CIUDAD;
		}

		return $this;
	} 
	
	public function setCodigoPostal($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->codigo_postal !== $v) {
			$this->codigo_postal = $v;
			$this->modifiedColumns[] = AlumnoPeer::CODIGO_POSTAL;
		}

		return $this;
	} 
	
	public function setFkProvinciaId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->fk_provincia_id !== $v || $v === 0) {
			$this->fk_provincia_id = $v;
			$this->modifiedColumns[] = AlumnoPeer::FK_PROVINCIA_ID;
		}

		if ($this->aProvincia !== null && $this->aProvincia->getId() !== $v) {
			$this->aProvincia = null;
		}

		return $this;
	} 
	
	public function setTelefono($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->telefono !== $v) {
			$this->telefono = $v;
			$this->modifiedColumns[] = AlumnoPeer::TELEFONO;
		}

		return $this;
	} 
	
	public function setFkTipodocumentoId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->fk_tipodocumento_id !== $v || $v === 0) {
			$this->fk_tipodocumento_id = $v;
			$this->modifiedColumns[] = AlumnoPeer::FK_TIPODOCUMENTO_ID;
		}

		if ($this->aTipodocumento !== null && $this->aTipodocumento->getId() !== $v) {
			$this->aTipodocumento = null;
		}

		return $this;
	} 
	
	public function setNroDocumento($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->nro_documento !== $v) {
			$this->nro_documento = $v;
			$this->modifiedColumns[] = AlumnoPeer::NRO_DOCUMENTO;
		}

		return $this;
	} 
	
	public function setSexo($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->sexo !== $v) {
			$this->sexo = $v;
			$this->modifiedColumns[] = AlumnoPeer::SEXO;
		}

		return $this;
	} 
	
	public function setEmail($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->email !== $v) {
			$this->email = $v;
			$this->modifiedColumns[] = AlumnoPeer::EMAIL;
		}

		return $this;
	} 
	
	public function setFkEstablecimientoId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->fk_establecimiento_id !== $v || $v === 3) {
			$this->fk_establecimiento_id = $v;
			$this->modifiedColumns[] = AlumnoPeer::FK_ESTABLECIMIENTO_ID;
		}

		if ($this->aEstablecimiento !== null && $this->aEstablecimiento->getId() !== $v) {
			$this->aEstablecimiento = null;
		}

		return $this;
	} 
	
	public function setActivo($v)
	{
		if ($v !== null) {
			$v = (boolean) $v;
		}

		if ($this->activo !== $v || $v === true) {
			$this->activo = $v;
			$this->modifiedColumns[] = AlumnoPeer::ACTIVO;
		}

		return $this;
	} 
	
	public function setFkPaisId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->fk_pais_id !== $v || $v === 0) {
			$this->fk_pais_id = $v;
			$this->modifiedColumns[] = AlumnoPeer::FK_PAIS_ID;
		}

		if ($this->aPais !== null && $this->aPais->getId() !== $v) {
			$this->aPais = null;
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
			$this->modifiedColumns[] = AlumnoPeer::MATRICULA;
		}

		return $this;
	} 
	
	public function setFkEstadoalumnoId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->fk_estadoalumno_id !== $v || $v === 1) {
			$this->fk_estadoalumno_id = $v;
			$this->modifiedColumns[] = AlumnoPeer::FK_ESTADOALUMNO_ID;
		}

		if ($this->aEstadosalumnos !== null && $this->aEstadosalumnos->getId() !== $v) {
			$this->aEstadosalumnos = null;
		}

		return $this;
	} 
	
	public function setObservacion($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->observacion !== $v) {
			$this->observacion = $v;
			$this->modifiedColumns[] = AlumnoPeer::OBSERVACION;
		}

		return $this;
	} 
	
	public function setFkCarreraId($v)
	{
		if ($v !== null) {
			$v = (int) $v;
		}

		if ($this->fk_carrera_id !== $v) {
			$this->fk_carrera_id = $v;
			$this->modifiedColumns[] = AlumnoPeer::FK_CARRERA_ID;
		}

		if ($this->aCarrera !== null && $this->aCarrera->getId() !== $v) {
			$this->aCarrera = null;
		}

		return $this;
	} 
	
	public function setTelefonoFijo($v)
	{
		if ($v !== null) {
			$v = (string) $v;
		}

		if ($this->telefono_fijo !== $v) {
			$this->telefono_fijo = $v;
			$this->modifiedColumns[] = AlumnoPeer::TELEFONO_FIJO;
		}

		return $this;
	} 
	
	public function setAdeuda($v)
	{
		if ($v !== null) {
			$v = (boolean) $v;
		}

		if ($this->adeuda !== $v || $v === true) {
			$this->adeuda = $v;
			$this->modifiedColumns[] = AlumnoPeer::ADEUDA;
		}

		return $this;
	} 
	
	public function hasOnlyDefaultValues()
	{
						if (array_diff($this->modifiedColumns, array(AlumnoPeer::FK_PROVINCIA_ID,AlumnoPeer::FK_TIPODOCUMENTO_ID,AlumnoPeer::FK_ESTABLECIMIENTO_ID,AlumnoPeer::ACTIVO,AlumnoPeer::FK_PAIS_ID,AlumnoPeer::FK_ESTADOALUMNO_ID,AlumnoPeer::ADEUDA))) {
				return false;
			}

			if ($this->fk_provincia_id !== 0) {
				return false;
			}

			if ($this->fk_tipodocumento_id !== 0) {
				return false;
			}

			if ($this->fk_establecimiento_id !== 3) {
				return false;
			}

			if ($this->activo !== true) {
				return false;
			}

			if ($this->fk_pais_id !== 0) {
				return false;
			}

			if ($this->fk_estadoalumno_id !== 1) {
				return false;
			}

			if ($this->adeuda !== true) {
				return false;
			}

				return true;
	} 
	
	public function hydrate($row, $startcol = 0, $rehydrate = false)
	{
		try {

			$this->id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
			$this->legajo_prefijo = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
			$this->legajo_numero = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
			$this->nombre = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
			$this->apellido_materno = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
			$this->apellido = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
			$this->fecha_nacimiento = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
			$this->direccion = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
			$this->ciudad = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
			$this->codigo_postal = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
			$this->fk_provincia_id = ($row[$startcol + 10] !== null) ? (int) $row[$startcol + 10] : null;
			$this->telefono = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
			$this->fk_tipodocumento_id = ($row[$startcol + 12] !== null) ? (int) $row[$startcol + 12] : null;
			$this->nro_documento = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
			$this->sexo = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
			$this->email = ($row[$startcol + 15] !== null) ? (string) $row[$startcol + 15] : null;
			$this->fk_establecimiento_id = ($row[$startcol + 16] !== null) ? (int) $row[$startcol + 16] : null;
			$this->activo = ($row[$startcol + 17] !== null) ? (boolean) $row[$startcol + 17] : null;
			$this->fk_pais_id = ($row[$startcol + 18] !== null) ? (int) $row[$startcol + 18] : null;
			$this->matricula = ($row[$startcol + 19] !== null) ? (string) $row[$startcol + 19] : null;
			$this->fk_estadoalumno_id = ($row[$startcol + 20] !== null) ? (int) $row[$startcol + 20] : null;
			$this->observacion = ($row[$startcol + 21] !== null) ? (string) $row[$startcol + 21] : null;
			$this->fk_carrera_id = ($row[$startcol + 22] !== null) ? (int) $row[$startcol + 22] : null;
			$this->telefono_fijo = ($row[$startcol + 23] !== null) ? (string) $row[$startcol + 23] : null;
			$this->adeuda = ($row[$startcol + 24] !== null) ? (boolean) $row[$startcol + 24] : null;
			$this->resetModified();

			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

						return $startcol + 25; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Alumno object", $e);
		}
	}

	
	public function ensureConsistency()
	{

		if ($this->aProvincia !== null && $this->fk_provincia_id !== $this->aProvincia->getId()) {
			$this->aProvincia = null;
		}
		if ($this->aTipodocumento !== null && $this->fk_tipodocumento_id !== $this->aTipodocumento->getId()) {
			$this->aTipodocumento = null;
		}
		if ($this->aEstablecimiento !== null && $this->fk_establecimiento_id !== $this->aEstablecimiento->getId()) {
			$this->aEstablecimiento = null;
		}
		if ($this->aPais !== null && $this->fk_pais_id !== $this->aPais->getId()) {
			$this->aPais = null;
		}
		if ($this->aEstadosalumnos !== null && $this->fk_estadoalumno_id !== $this->aEstadosalumnos->getId()) {
			$this->aEstadosalumnos = null;
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
			$con = Propel::getConnection(AlumnoPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				
		$stmt = AlumnoPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
		$row = $stmt->fetch(PDO::FETCH_NUM);
		$stmt->closeCursor();
		if (!$row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true); 
		if ($deep) {  
			$this->aProvincia = null;
			$this->aTipodocumento = null;
			$this->aEstablecimiento = null;
			$this->aPais = null;
			$this->aEstadosalumnos = null;
			$this->aCarrera = null;
			$this->collUsuarios = null;
			$this->lastUsuarioCriteria = null;

			$this->collRelCalendariovacunacionAlumnos = null;
			$this->lastRelCalendariovacunacionAlumnoCriteria = null;

			$this->collLegajopedagogicos = null;
			$this->lastLegajopedagogicoCriteria = null;

			$this->collRelAlumnoDivisions = null;
			$this->lastRelAlumnoDivisionCriteria = null;

			$this->collRendidas = null;
			$this->lastRendidaCriteria = null;

			$this->collCursadas = null;
			$this->lastCursadaCriteria = null;

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
			$con = Propel::getConnection(AlumnoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			AlumnoPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(AlumnoPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		
		$con->beginTransaction();
		try {
			$affectedRows = $this->doSave($con);
			$con->commit();
			AlumnoPeer::addInstanceToPool($this);
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

												
			if ($this->aProvincia !== null) {
				if ($this->aProvincia->isModified() || $this->aProvincia->isNew()) {
					$affectedRows += $this->aProvincia->save($con);
				}
				$this->setProvincia($this->aProvincia);
			}

			if ($this->aTipodocumento !== null) {
				if ($this->aTipodocumento->isModified() || $this->aTipodocumento->isNew()) {
					$affectedRows += $this->aTipodocumento->save($con);
				}
				$this->setTipodocumento($this->aTipodocumento);
			}

			if ($this->aEstablecimiento !== null) {
				if ($this->aEstablecimiento->isModified() || $this->aEstablecimiento->isNew()) {
					$affectedRows += $this->aEstablecimiento->save($con);
				}
				$this->setEstablecimiento($this->aEstablecimiento);
			}

			if ($this->aPais !== null) {
				if ($this->aPais->isModified() || $this->aPais->isNew()) {
					$affectedRows += $this->aPais->save($con);
				}
				$this->setPais($this->aPais);
			}

			if ($this->aEstadosalumnos !== null) {
				if ($this->aEstadosalumnos->isModified() || $this->aEstadosalumnos->isNew()) {
					$affectedRows += $this->aEstadosalumnos->save($con);
				}
				$this->setEstadosalumnos($this->aEstadosalumnos);
			}

			if ($this->aCarrera !== null) {
				if ($this->aCarrera->isModified() || $this->aCarrera->isNew()) {
					$affectedRows += $this->aCarrera->save($con);
				}
				$this->setCarrera($this->aCarrera);
			}

			if ($this->isNew() ) {
				$this->modifiedColumns[] = AlumnoPeer::ID;
			}

						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = AlumnoPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += AlumnoPeer::doUpdate($this, $con);
				}

				$this->resetModified(); 			}

			if ($this->collUsuarios !== null) {
				foreach ($this->collUsuarios as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collRelCalendariovacunacionAlumnos !== null) {
				foreach ($this->collRelCalendariovacunacionAlumnos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collLegajopedagogicos !== null) {
				foreach ($this->collLegajopedagogicos as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collRelAlumnoDivisions !== null) {
				foreach ($this->collRelAlumnoDivisions as $referrerFK) {
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

			if ($this->collCursadas !== null) {
				foreach ($this->collCursadas as $referrerFK) {
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


												
			if ($this->aProvincia !== null) {
				if (!$this->aProvincia->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aProvincia->getValidationFailures());
				}
			}

			if ($this->aTipodocumento !== null) {
				if (!$this->aTipodocumento->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aTipodocumento->getValidationFailures());
				}
			}

			if ($this->aEstablecimiento !== null) {
				if (!$this->aEstablecimiento->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aEstablecimiento->getValidationFailures());
				}
			}

			if ($this->aPais !== null) {
				if (!$this->aPais->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aPais->getValidationFailures());
				}
			}

			if ($this->aEstadosalumnos !== null) {
				if (!$this->aEstadosalumnos->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aEstadosalumnos->getValidationFailures());
				}
			}

			if ($this->aCarrera !== null) {
				if (!$this->aCarrera->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aCarrera->getValidationFailures());
				}
			}


			if (($retval = AlumnoPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collUsuarios !== null) {
					foreach ($this->collUsuarios as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collRelCalendariovacunacionAlumnos !== null) {
					foreach ($this->collRelCalendariovacunacionAlumnos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collLegajopedagogicos !== null) {
					foreach ($this->collLegajopedagogicos as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collRelAlumnoDivisions !== null) {
					foreach ($this->collRelAlumnoDivisions as $referrerFK) {
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

				if ($this->collCursadas !== null) {
					foreach ($this->collCursadas as $referrerFK) {
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


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AlumnoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getLegajoPrefijo();
				break;
			case 2:
				return $this->getLegajoNumero();
				break;
			case 3:
				return $this->getNombre();
				break;
			case 4:
				return $this->getApellidoMaterno();
				break;
			case 5:
				return $this->getApellido();
				break;
			case 6:
				return $this->getFechaNacimiento();
				break;
			case 7:
				return $this->getDireccion();
				break;
			case 8:
				return $this->getCiudad();
				break;
			case 9:
				return $this->getCodigoPostal();
				break;
			case 10:
				return $this->getFkProvinciaId();
				break;
			case 11:
				return $this->getTelefono();
				break;
			case 12:
				return $this->getFkTipodocumentoId();
				break;
			case 13:
				return $this->getNroDocumento();
				break;
			case 14:
				return $this->getSexo();
				break;
			case 15:
				return $this->getEmail();
				break;
			case 16:
				return $this->getFkEstablecimientoId();
				break;
			case 17:
				return $this->getActivo();
				break;
			case 18:
				return $this->getFkPaisId();
				break;
			case 19:
				return $this->getMatricula();
				break;
			case 20:
				return $this->getFkEstadoalumnoId();
				break;
			case 21:
				return $this->getObservacion();
				break;
			case 22:
				return $this->getFkCarreraId();
				break;
			case 23:
				return $this->getTelefonoFijo();
				break;
			case 24:
				return $this->getAdeuda();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME, $includeLazyLoadColumns = true)
	{
		$keys = AlumnoPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getLegajoPrefijo(),
			$keys[2] => $this->getLegajoNumero(),
			$keys[3] => $this->getNombre(),
			$keys[4] => $this->getApellidoMaterno(),
			$keys[5] => $this->getApellido(),
			$keys[6] => $this->getFechaNacimiento(),
			$keys[7] => $this->getDireccion(),
			$keys[8] => $this->getCiudad(),
			$keys[9] => $this->getCodigoPostal(),
			$keys[10] => $this->getFkProvinciaId(),
			$keys[11] => $this->getTelefono(),
			$keys[12] => $this->getFkTipodocumentoId(),
			$keys[13] => $this->getNroDocumento(),
			$keys[14] => $this->getSexo(),
			$keys[15] => $this->getEmail(),
			$keys[16] => $this->getFkEstablecimientoId(),
			$keys[17] => $this->getActivo(),
			$keys[18] => $this->getFkPaisId(),
			$keys[19] => $this->getMatricula(),
			$keys[20] => $this->getFkEstadoalumnoId(),
			$keys[21] => $this->getObservacion(),
			$keys[22] => $this->getFkCarreraId(),
			$keys[23] => $this->getTelefonoFijo(),
			$keys[24] => $this->getAdeuda(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AlumnoPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setLegajoPrefijo($value);
				break;
			case 2:
				$this->setLegajoNumero($value);
				break;
			case 3:
				$this->setNombre($value);
				break;
			case 4:
				$this->setApellidoMaterno($value);
				break;
			case 5:
				$this->setApellido($value);
				break;
			case 6:
				$this->setFechaNacimiento($value);
				break;
			case 7:
				$this->setDireccion($value);
				break;
			case 8:
				$this->setCiudad($value);
				break;
			case 9:
				$this->setCodigoPostal($value);
				break;
			case 10:
				$this->setFkProvinciaId($value);
				break;
			case 11:
				$this->setTelefono($value);
				break;
			case 12:
				$this->setFkTipodocumentoId($value);
				break;
			case 13:
				$this->setNroDocumento($value);
				break;
			case 14:
				$this->setSexo($value);
				break;
			case 15:
				$this->setEmail($value);
				break;
			case 16:
				$this->setFkEstablecimientoId($value);
				break;
			case 17:
				$this->setActivo($value);
				break;
			case 18:
				$this->setFkPaisId($value);
				break;
			case 19:
				$this->setMatricula($value);
				break;
			case 20:
				$this->setFkEstadoalumnoId($value);
				break;
			case 21:
				$this->setObservacion($value);
				break;
			case 22:
				$this->setFkCarreraId($value);
				break;
			case 23:
				$this->setTelefonoFijo($value);
				break;
			case 24:
				$this->setAdeuda($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AlumnoPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setLegajoPrefijo($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setLegajoNumero($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNombre($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setApellidoMaterno($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setApellido($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFechaNacimiento($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setDireccion($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCiudad($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCodigoPostal($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setFkProvinciaId($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setTelefono($arr[$keys[11]]);
		if (array_key_exists($keys[12], $arr)) $this->setFkTipodocumentoId($arr[$keys[12]]);
		if (array_key_exists($keys[13], $arr)) $this->setNroDocumento($arr[$keys[13]]);
		if (array_key_exists($keys[14], $arr)) $this->setSexo($arr[$keys[14]]);
		if (array_key_exists($keys[15], $arr)) $this->setEmail($arr[$keys[15]]);
		if (array_key_exists($keys[16], $arr)) $this->setFkEstablecimientoId($arr[$keys[16]]);
		if (array_key_exists($keys[17], $arr)) $this->setActivo($arr[$keys[17]]);
		if (array_key_exists($keys[18], $arr)) $this->setFkPaisId($arr[$keys[18]]);
		if (array_key_exists($keys[19], $arr)) $this->setMatricula($arr[$keys[19]]);
		if (array_key_exists($keys[20], $arr)) $this->setFkEstadoalumnoId($arr[$keys[20]]);
		if (array_key_exists($keys[21], $arr)) $this->setObservacion($arr[$keys[21]]);
		if (array_key_exists($keys[22], $arr)) $this->setFkCarreraId($arr[$keys[22]]);
		if (array_key_exists($keys[23], $arr)) $this->setTelefonoFijo($arr[$keys[23]]);
		if (array_key_exists($keys[24], $arr)) $this->setAdeuda($arr[$keys[24]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(AlumnoPeer::DATABASE_NAME);

		if ($this->isColumnModified(AlumnoPeer::ID)) $criteria->add(AlumnoPeer::ID, $this->id);
		if ($this->isColumnModified(AlumnoPeer::LEGAJO_PREFIJO)) $criteria->add(AlumnoPeer::LEGAJO_PREFIJO, $this->legajo_prefijo);
		if ($this->isColumnModified(AlumnoPeer::LEGAJO_NUMERO)) $criteria->add(AlumnoPeer::LEGAJO_NUMERO, $this->legajo_numero);
		if ($this->isColumnModified(AlumnoPeer::NOMBRE)) $criteria->add(AlumnoPeer::NOMBRE, $this->nombre);
		if ($this->isColumnModified(AlumnoPeer::APELLIDO_MATERNO)) $criteria->add(AlumnoPeer::APELLIDO_MATERNO, $this->apellido_materno);
		if ($this->isColumnModified(AlumnoPeer::APELLIDO)) $criteria->add(AlumnoPeer::APELLIDO, $this->apellido);
		if ($this->isColumnModified(AlumnoPeer::FECHA_NACIMIENTO)) $criteria->add(AlumnoPeer::FECHA_NACIMIENTO, $this->fecha_nacimiento);
		if ($this->isColumnModified(AlumnoPeer::DIRECCION)) $criteria->add(AlumnoPeer::DIRECCION, $this->direccion);
		if ($this->isColumnModified(AlumnoPeer::CIUDAD)) $criteria->add(AlumnoPeer::CIUDAD, $this->ciudad);
		if ($this->isColumnModified(AlumnoPeer::CODIGO_POSTAL)) $criteria->add(AlumnoPeer::CODIGO_POSTAL, $this->codigo_postal);
		if ($this->isColumnModified(AlumnoPeer::FK_PROVINCIA_ID)) $criteria->add(AlumnoPeer::FK_PROVINCIA_ID, $this->fk_provincia_id);
		if ($this->isColumnModified(AlumnoPeer::TELEFONO)) $criteria->add(AlumnoPeer::TELEFONO, $this->telefono);
		if ($this->isColumnModified(AlumnoPeer::FK_TIPODOCUMENTO_ID)) $criteria->add(AlumnoPeer::FK_TIPODOCUMENTO_ID, $this->fk_tipodocumento_id);
		if ($this->isColumnModified(AlumnoPeer::NRO_DOCUMENTO)) $criteria->add(AlumnoPeer::NRO_DOCUMENTO, $this->nro_documento);
		if ($this->isColumnModified(AlumnoPeer::SEXO)) $criteria->add(AlumnoPeer::SEXO, $this->sexo);
		if ($this->isColumnModified(AlumnoPeer::EMAIL)) $criteria->add(AlumnoPeer::EMAIL, $this->email);
		if ($this->isColumnModified(AlumnoPeer::FK_ESTABLECIMIENTO_ID)) $criteria->add(AlumnoPeer::FK_ESTABLECIMIENTO_ID, $this->fk_establecimiento_id);
		if ($this->isColumnModified(AlumnoPeer::ACTIVO)) $criteria->add(AlumnoPeer::ACTIVO, $this->activo);
		if ($this->isColumnModified(AlumnoPeer::FK_PAIS_ID)) $criteria->add(AlumnoPeer::FK_PAIS_ID, $this->fk_pais_id);
		if ($this->isColumnModified(AlumnoPeer::MATRICULA)) $criteria->add(AlumnoPeer::MATRICULA, $this->matricula);
		if ($this->isColumnModified(AlumnoPeer::FK_ESTADOALUMNO_ID)) $criteria->add(AlumnoPeer::FK_ESTADOALUMNO_ID, $this->fk_estadoalumno_id);
		if ($this->isColumnModified(AlumnoPeer::OBSERVACION)) $criteria->add(AlumnoPeer::OBSERVACION, $this->observacion);
		if ($this->isColumnModified(AlumnoPeer::FK_CARRERA_ID)) $criteria->add(AlumnoPeer::FK_CARRERA_ID, $this->fk_carrera_id);
		if ($this->isColumnModified(AlumnoPeer::TELEFONO_FIJO)) $criteria->add(AlumnoPeer::TELEFONO_FIJO, $this->telefono_fijo);
		if ($this->isColumnModified(AlumnoPeer::ADEUDA)) $criteria->add(AlumnoPeer::ADEUDA, $this->adeuda);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(AlumnoPeer::DATABASE_NAME);

		$criteria->add(AlumnoPeer::ID, $this->id);

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

		$copyObj->setLegajoPrefijo($this->legajo_prefijo);

		$copyObj->setLegajoNumero($this->legajo_numero);

		$copyObj->setNombre($this->nombre);

		$copyObj->setApellidoMaterno($this->apellido_materno);

		$copyObj->setApellido($this->apellido);

		$copyObj->setFechaNacimiento($this->fecha_nacimiento);

		$copyObj->setDireccion($this->direccion);

		$copyObj->setCiudad($this->ciudad);

		$copyObj->setCodigoPostal($this->codigo_postal);

		$copyObj->setFkProvinciaId($this->fk_provincia_id);

		$copyObj->setTelefono($this->telefono);

		$copyObj->setFkTipodocumentoId($this->fk_tipodocumento_id);

		$copyObj->setNroDocumento($this->nro_documento);

		$copyObj->setSexo($this->sexo);

		$copyObj->setEmail($this->email);

		$copyObj->setFkEstablecimientoId($this->fk_establecimiento_id);

		$copyObj->setActivo($this->activo);

		$copyObj->setFkPaisId($this->fk_pais_id);

		$copyObj->setMatricula($this->matricula);

		$copyObj->setFkEstadoalumnoId($this->fk_estadoalumno_id);

		$copyObj->setObservacion($this->observacion);

		$copyObj->setFkCarreraId($this->fk_carrera_id);

		$copyObj->setTelefonoFijo($this->telefono_fijo);

		$copyObj->setAdeuda($this->adeuda);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach ($this->getUsuarios() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addUsuario($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getRelCalendariovacunacionAlumnos() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addRelCalendariovacunacionAlumno($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getLegajopedagogicos() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addLegajopedagogico($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getRelAlumnoDivisions() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addRelAlumnoDivision($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getRendidas() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addRendida($relObj->copy($deepCopy));
				}
			}

			foreach ($this->getCursadas() as $relObj) {
				if ($relObj !== $this) {  					$copyObj->addCursada($relObj->copy($deepCopy));
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
			self::$peer = new AlumnoPeer();
		}
		return self::$peer;
	}

	
	public function setProvincia(Provincia $v = null)
	{
		if ($v === null) {
			$this->setFkProvinciaId(0);
		} else {
			$this->setFkProvinciaId($v->getId());
		}

		$this->aProvincia = $v;

						if ($v !== null) {
			$v->addAlumno($this);
		}

		return $this;
	}


	
	public function getProvincia(PropelPDO $con = null)
	{
		if ($this->aProvincia === null && ($this->fk_provincia_id !== null)) {
			$c = new Criteria(ProvinciaPeer::DATABASE_NAME);
			$c->add(ProvinciaPeer::ID, $this->fk_provincia_id);
			$this->aProvincia = ProvinciaPeer::doSelectOne($c, $con);
			
		}
		return $this->aProvincia;
	}

	
	public function setTipodocumento(Tipodocumento $v = null)
	{
		if ($v === null) {
			$this->setFkTipodocumentoId(0);
		} else {
			$this->setFkTipodocumentoId($v->getId());
		}

		$this->aTipodocumento = $v;

						if ($v !== null) {
			$v->addAlumno($this);
		}

		return $this;
	}


	
	public function getTipodocumento(PropelPDO $con = null)
	{
		if ($this->aTipodocumento === null && ($this->fk_tipodocumento_id !== null)) {
			$c = new Criteria(TipodocumentoPeer::DATABASE_NAME);
			$c->add(TipodocumentoPeer::ID, $this->fk_tipodocumento_id);
			$this->aTipodocumento = TipodocumentoPeer::doSelectOne($c, $con);
			
		}
		return $this->aTipodocumento;
	}

	
	public function setEstablecimiento(Establecimiento $v = null)
	{
		if ($v === null) {
			$this->setFkEstablecimientoId(3);
		} else {
			$this->setFkEstablecimientoId($v->getId());
		}

		$this->aEstablecimiento = $v;

						if ($v !== null) {
			$v->addAlumno($this);
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

	
	public function setPais(Pais $v = null)
	{
		if ($v === null) {
			$this->setFkPaisId(0);
		} else {
			$this->setFkPaisId($v->getId());
		}

		$this->aPais = $v;

						if ($v !== null) {
			$v->addAlumno($this);
		}

		return $this;
	}


	
	public function getPais(PropelPDO $con = null)
	{
		if ($this->aPais === null && ($this->fk_pais_id !== null)) {
			$c = new Criteria(PaisPeer::DATABASE_NAME);
			$c->add(PaisPeer::ID, $this->fk_pais_id);
			$this->aPais = PaisPeer::doSelectOne($c, $con);
			
		}
		return $this->aPais;
	}

	
	public function setEstadosalumnos(Estadosalumnos $v = null)
	{
		if ($v === null) {
			$this->setFkEstadoalumnoId(1);
		} else {
			$this->setFkEstadoalumnoId($v->getId());
		}

		$this->aEstadosalumnos = $v;

						if ($v !== null) {
			$v->addAlumno($this);
		}

		return $this;
	}


	
	public function getEstadosalumnos(PropelPDO $con = null)
	{
		if ($this->aEstadosalumnos === null && ($this->fk_estadoalumno_id !== null)) {
			$c = new Criteria(EstadosalumnosPeer::DATABASE_NAME);
			$c->add(EstadosalumnosPeer::ID, $this->fk_estadoalumno_id);
			$this->aEstadosalumnos = EstadosalumnosPeer::doSelectOne($c, $con);
			
		}
		return $this->aEstadosalumnos;
	}

	
	public function setCarrera(Carrera $v = null)
	{
		if ($v === null) {
			$this->setFkCarreraId(NULL);
		} else {
			$this->setFkCarreraId($v->getId());
		}

		$this->aCarrera = $v;

						if ($v !== null) {
			$v->addAlumno($this);
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

	
	public function clearUsuarios()
	{
		$this->collUsuarios = null; 	}

	
	public function initUsuarios()
	{
		$this->collUsuarios = array();
	}

	
	public function getUsuarios($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AlumnoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collUsuarios === null) {
			if ($this->isNew()) {
			   $this->collUsuarios = array();
			} else {

				$criteria->add(UsuarioPeer::FK_ALUMNO, $this->id);

				UsuarioPeer::addSelectColumns($criteria);
				$this->collUsuarios = UsuarioPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(UsuarioPeer::FK_ALUMNO, $this->id);

				UsuarioPeer::addSelectColumns($criteria);
				if (!isset($this->lastUsuarioCriteria) || !$this->lastUsuarioCriteria->equals($criteria)) {
					$this->collUsuarios = UsuarioPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastUsuarioCriteria = $criteria;
		return $this->collUsuarios;
	}

	
	public function countUsuarios(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AlumnoPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collUsuarios === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(UsuarioPeer::FK_ALUMNO, $this->id);

				$count = UsuarioPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(UsuarioPeer::FK_ALUMNO, $this->id);

				if (!isset($this->lastUsuarioCriteria) || !$this->lastUsuarioCriteria->equals($criteria)) {
					$count = UsuarioPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collUsuarios);
				}
			} else {
				$count = count($this->collUsuarios);
			}
		}
		return $count;
	}

	
	public function addUsuario(Usuario $l)
	{
		if ($this->collUsuarios === null) {
			$this->initUsuarios();
		}
		if (!in_array($l, $this->collUsuarios, true)) { 			array_push($this->collUsuarios, $l);
			$l->setAlumno($this);
		}
	}


	
	public function getUsuariosJoinEstablecimiento($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AlumnoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collUsuarios === null) {
			if ($this->isNew()) {
				$this->collUsuarios = array();
			} else {

				$criteria->add(UsuarioPeer::FK_ALUMNO, $this->id);

				$this->collUsuarios = UsuarioPeer::doSelectJoinEstablecimiento($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(UsuarioPeer::FK_ALUMNO, $this->id);

			if (!isset($this->lastUsuarioCriteria) || !$this->lastUsuarioCriteria->equals($criteria)) {
				$this->collUsuarios = UsuarioPeer::doSelectJoinEstablecimiento($criteria, $con, $join_behavior);
			}
		}
		$this->lastUsuarioCriteria = $criteria;

		return $this->collUsuarios;
	}

	
	public function clearRelCalendariovacunacionAlumnos()
	{
		$this->collRelCalendariovacunacionAlumnos = null; 	}

	
	public function initRelCalendariovacunacionAlumnos()
	{
		$this->collRelCalendariovacunacionAlumnos = array();
	}

	
	public function getRelCalendariovacunacionAlumnos($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AlumnoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelCalendariovacunacionAlumnos === null) {
			if ($this->isNew()) {
			   $this->collRelCalendariovacunacionAlumnos = array();
			} else {

				$criteria->add(RelCalendariovacunacionAlumnoPeer::FK_ALUMNO_ID, $this->id);

				RelCalendariovacunacionAlumnoPeer::addSelectColumns($criteria);
				$this->collRelCalendariovacunacionAlumnos = RelCalendariovacunacionAlumnoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RelCalendariovacunacionAlumnoPeer::FK_ALUMNO_ID, $this->id);

				RelCalendariovacunacionAlumnoPeer::addSelectColumns($criteria);
				if (!isset($this->lastRelCalendariovacunacionAlumnoCriteria) || !$this->lastRelCalendariovacunacionAlumnoCriteria->equals($criteria)) {
					$this->collRelCalendariovacunacionAlumnos = RelCalendariovacunacionAlumnoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastRelCalendariovacunacionAlumnoCriteria = $criteria;
		return $this->collRelCalendariovacunacionAlumnos;
	}

	
	public function countRelCalendariovacunacionAlumnos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AlumnoPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collRelCalendariovacunacionAlumnos === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(RelCalendariovacunacionAlumnoPeer::FK_ALUMNO_ID, $this->id);

				$count = RelCalendariovacunacionAlumnoPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RelCalendariovacunacionAlumnoPeer::FK_ALUMNO_ID, $this->id);

				if (!isset($this->lastRelCalendariovacunacionAlumnoCriteria) || !$this->lastRelCalendariovacunacionAlumnoCriteria->equals($criteria)) {
					$count = RelCalendariovacunacionAlumnoPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collRelCalendariovacunacionAlumnos);
				}
			} else {
				$count = count($this->collRelCalendariovacunacionAlumnos);
			}
		}
		return $count;
	}

	
	public function addRelCalendariovacunacionAlumno(RelCalendariovacunacionAlumno $l)
	{
		if ($this->collRelCalendariovacunacionAlumnos === null) {
			$this->initRelCalendariovacunacionAlumnos();
		}
		if (!in_array($l, $this->collRelCalendariovacunacionAlumnos, true)) { 			array_push($this->collRelCalendariovacunacionAlumnos, $l);
			$l->setAlumno($this);
		}
	}


	
	public function getRelCalendariovacunacionAlumnosJoinCalendariovacunacion($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AlumnoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelCalendariovacunacionAlumnos === null) {
			if ($this->isNew()) {
				$this->collRelCalendariovacunacionAlumnos = array();
			} else {

				$criteria->add(RelCalendariovacunacionAlumnoPeer::FK_ALUMNO_ID, $this->id);

				$this->collRelCalendariovacunacionAlumnos = RelCalendariovacunacionAlumnoPeer::doSelectJoinCalendariovacunacion($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(RelCalendariovacunacionAlumnoPeer::FK_ALUMNO_ID, $this->id);

			if (!isset($this->lastRelCalendariovacunacionAlumnoCriteria) || !$this->lastRelCalendariovacunacionAlumnoCriteria->equals($criteria)) {
				$this->collRelCalendariovacunacionAlumnos = RelCalendariovacunacionAlumnoPeer::doSelectJoinCalendariovacunacion($criteria, $con, $join_behavior);
			}
		}
		$this->lastRelCalendariovacunacionAlumnoCriteria = $criteria;

		return $this->collRelCalendariovacunacionAlumnos;
	}

	
	public function clearLegajopedagogicos()
	{
		$this->collLegajopedagogicos = null; 	}

	
	public function initLegajopedagogicos()
	{
		$this->collLegajopedagogicos = array();
	}

	
	public function getLegajopedagogicos($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AlumnoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLegajopedagogicos === null) {
			if ($this->isNew()) {
			   $this->collLegajopedagogicos = array();
			} else {

				$criteria->add(LegajopedagogicoPeer::FK_ALUMNO_ID, $this->id);

				LegajopedagogicoPeer::addSelectColumns($criteria);
				$this->collLegajopedagogicos = LegajopedagogicoPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LegajopedagogicoPeer::FK_ALUMNO_ID, $this->id);

				LegajopedagogicoPeer::addSelectColumns($criteria);
				if (!isset($this->lastLegajopedagogicoCriteria) || !$this->lastLegajopedagogicoCriteria->equals($criteria)) {
					$this->collLegajopedagogicos = LegajopedagogicoPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastLegajopedagogicoCriteria = $criteria;
		return $this->collLegajopedagogicos;
	}

	
	public function countLegajopedagogicos(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AlumnoPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collLegajopedagogicos === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(LegajopedagogicoPeer::FK_ALUMNO_ID, $this->id);

				$count = LegajopedagogicoPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(LegajopedagogicoPeer::FK_ALUMNO_ID, $this->id);

				if (!isset($this->lastLegajopedagogicoCriteria) || !$this->lastLegajopedagogicoCriteria->equals($criteria)) {
					$count = LegajopedagogicoPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collLegajopedagogicos);
				}
			} else {
				$count = count($this->collLegajopedagogicos);
			}
		}
		return $count;
	}

	
	public function addLegajopedagogico(Legajopedagogico $l)
	{
		if ($this->collLegajopedagogicos === null) {
			$this->initLegajopedagogicos();
		}
		if (!in_array($l, $this->collLegajopedagogicos, true)) { 			array_push($this->collLegajopedagogicos, $l);
			$l->setAlumno($this);
		}
	}


	
	public function getLegajopedagogicosJoinUsuario($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AlumnoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLegajopedagogicos === null) {
			if ($this->isNew()) {
				$this->collLegajopedagogicos = array();
			} else {

				$criteria->add(LegajopedagogicoPeer::FK_ALUMNO_ID, $this->id);

				$this->collLegajopedagogicos = LegajopedagogicoPeer::doSelectJoinUsuario($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(LegajopedagogicoPeer::FK_ALUMNO_ID, $this->id);

			if (!isset($this->lastLegajopedagogicoCriteria) || !$this->lastLegajopedagogicoCriteria->equals($criteria)) {
				$this->collLegajopedagogicos = LegajopedagogicoPeer::doSelectJoinUsuario($criteria, $con, $join_behavior);
			}
		}
		$this->lastLegajopedagogicoCriteria = $criteria;

		return $this->collLegajopedagogicos;
	}


	
	public function getLegajopedagogicosJoinLegajocategoria($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AlumnoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collLegajopedagogicos === null) {
			if ($this->isNew()) {
				$this->collLegajopedagogicos = array();
			} else {

				$criteria->add(LegajopedagogicoPeer::FK_ALUMNO_ID, $this->id);

				$this->collLegajopedagogicos = LegajopedagogicoPeer::doSelectJoinLegajocategoria($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(LegajopedagogicoPeer::FK_ALUMNO_ID, $this->id);

			if (!isset($this->lastLegajopedagogicoCriteria) || !$this->lastLegajopedagogicoCriteria->equals($criteria)) {
				$this->collLegajopedagogicos = LegajopedagogicoPeer::doSelectJoinLegajocategoria($criteria, $con, $join_behavior);
			}
		}
		$this->lastLegajopedagogicoCriteria = $criteria;

		return $this->collLegajopedagogicos;
	}

	
	public function clearRelAlumnoDivisions()
	{
		$this->collRelAlumnoDivisions = null; 	}

	
	public function initRelAlumnoDivisions()
	{
		$this->collRelAlumnoDivisions = array();
	}

	
	public function getRelAlumnoDivisions($criteria = null, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AlumnoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelAlumnoDivisions === null) {
			if ($this->isNew()) {
			   $this->collRelAlumnoDivisions = array();
			} else {

				$criteria->add(RelAlumnoDivisionPeer::FK_ALUMNO_ID, $this->id);

				RelAlumnoDivisionPeer::addSelectColumns($criteria);
				$this->collRelAlumnoDivisions = RelAlumnoDivisionPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RelAlumnoDivisionPeer::FK_ALUMNO_ID, $this->id);

				RelAlumnoDivisionPeer::addSelectColumns($criteria);
				if (!isset($this->lastRelAlumnoDivisionCriteria) || !$this->lastRelAlumnoDivisionCriteria->equals($criteria)) {
					$this->collRelAlumnoDivisions = RelAlumnoDivisionPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastRelAlumnoDivisionCriteria = $criteria;
		return $this->collRelAlumnoDivisions;
	}

	
	public function countRelAlumnoDivisions(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AlumnoPeer::DATABASE_NAME);
		} else {
			$criteria = clone $criteria;
		}

		if ($distinct) {
			$criteria->setDistinct();
		}

		$count = null;

		if ($this->collRelAlumnoDivisions === null) {
			if ($this->isNew()) {
				$count = 0;
			} else {

				$criteria->add(RelAlumnoDivisionPeer::FK_ALUMNO_ID, $this->id);

				$count = RelAlumnoDivisionPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RelAlumnoDivisionPeer::FK_ALUMNO_ID, $this->id);

				if (!isset($this->lastRelAlumnoDivisionCriteria) || !$this->lastRelAlumnoDivisionCriteria->equals($criteria)) {
					$count = RelAlumnoDivisionPeer::doCount($criteria, $con);
				} else {
					$count = count($this->collRelAlumnoDivisions);
				}
			} else {
				$count = count($this->collRelAlumnoDivisions);
			}
		}
		return $count;
	}

	
	public function addRelAlumnoDivision(RelAlumnoDivision $l)
	{
		if ($this->collRelAlumnoDivisions === null) {
			$this->initRelAlumnoDivisions();
		}
		if (!in_array($l, $this->collRelAlumnoDivisions, true)) { 			array_push($this->collRelAlumnoDivisions, $l);
			$l->setAlumno($this);
		}
	}


	
	public function getRelAlumnoDivisionsJoinDivision($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AlumnoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRelAlumnoDivisions === null) {
			if ($this->isNew()) {
				$this->collRelAlumnoDivisions = array();
			} else {

				$criteria->add(RelAlumnoDivisionPeer::FK_ALUMNO_ID, $this->id);

				$this->collRelAlumnoDivisions = RelAlumnoDivisionPeer::doSelectJoinDivision($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(RelAlumnoDivisionPeer::FK_ALUMNO_ID, $this->id);

			if (!isset($this->lastRelAlumnoDivisionCriteria) || !$this->lastRelAlumnoDivisionCriteria->equals($criteria)) {
				$this->collRelAlumnoDivisions = RelAlumnoDivisionPeer::doSelectJoinDivision($criteria, $con, $join_behavior);
			}
		}
		$this->lastRelAlumnoDivisionCriteria = $criteria;

		return $this->collRelAlumnoDivisions;
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
			$criteria = new Criteria(AlumnoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRendidas === null) {
			if ($this->isNew()) {
			   $this->collRendidas = array();
			} else {

				$criteria->add(RendidaPeer::FK_ALUMNO_ID, $this->id);

				RendidaPeer::addSelectColumns($criteria);
				$this->collRendidas = RendidaPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RendidaPeer::FK_ALUMNO_ID, $this->id);

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
			$criteria = new Criteria(AlumnoPeer::DATABASE_NAME);
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

				$criteria->add(RendidaPeer::FK_ALUMNO_ID, $this->id);

				$count = RendidaPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(RendidaPeer::FK_ALUMNO_ID, $this->id);

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
			$l->setAlumno($this);
		}
	}


	
	public function getRendidasJoinLlamados($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AlumnoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collRendidas === null) {
			if ($this->isNew()) {
				$this->collRendidas = array();
			} else {

				$criteria->add(RendidaPeer::FK_ALUMNO_ID, $this->id);

				$this->collRendidas = RendidaPeer::doSelectJoinLlamados($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(RendidaPeer::FK_ALUMNO_ID, $this->id);

			if (!isset($this->lastRendidaCriteria) || !$this->lastRendidaCriteria->equals($criteria)) {
				$this->collRendidas = RendidaPeer::doSelectJoinLlamados($criteria, $con, $join_behavior);
			}
		}
		$this->lastRendidaCriteria = $criteria;

		return $this->collRendidas;
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
			$criteria = new Criteria(AlumnoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCursadas === null) {
			if ($this->isNew()) {
			   $this->collCursadas = array();
			} else {

				$criteria->add(CursadaPeer::FK_ALUMNO_ID, $this->id);

				CursadaPeer::addSelectColumns($criteria);
				$this->collCursadas = CursadaPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CursadaPeer::FK_ALUMNO_ID, $this->id);

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
			$criteria = new Criteria(AlumnoPeer::DATABASE_NAME);
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

				$criteria->add(CursadaPeer::FK_ALUMNO_ID, $this->id);

				$count = CursadaPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(CursadaPeer::FK_ALUMNO_ID, $this->id);

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
			$l->setAlumno($this);
		}
	}


	
	public function getCursadasJoinLlamadoscur($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AlumnoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collCursadas === null) {
			if ($this->isNew()) {
				$this->collCursadas = array();
			} else {

				$criteria->add(CursadaPeer::FK_ALUMNO_ID, $this->id);

				$this->collCursadas = CursadaPeer::doSelectJoinLlamadoscur($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(CursadaPeer::FK_ALUMNO_ID, $this->id);

			if (!isset($this->lastCursadaCriteria) || !$this->lastCursadaCriteria->equals($criteria)) {
				$this->collCursadas = CursadaPeer::doSelectJoinLlamadoscur($criteria, $con, $join_behavior);
			}
		}
		$this->lastCursadaCriteria = $criteria;

		return $this->collCursadas;
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
			$criteria = new Criteria(AlumnoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDetallerendirs === null) {
			if ($this->isNew()) {
			   $this->collDetallerendirs = array();
			} else {

				$criteria->add(DetallerendirPeer::FK_ALUMNO_ID, $this->id);

				DetallerendirPeer::addSelectColumns($criteria);
				$this->collDetallerendirs = DetallerendirPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(DetallerendirPeer::FK_ALUMNO_ID, $this->id);

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
			$criteria = new Criteria(AlumnoPeer::DATABASE_NAME);
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

				$criteria->add(DetallerendirPeer::FK_ALUMNO_ID, $this->id);

				$count = DetallerendirPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(DetallerendirPeer::FK_ALUMNO_ID, $this->id);

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
			$l->setAlumno($this);
		}
	}


	
	public function getDetallerendirsJoinCursada($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AlumnoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDetallerendirs === null) {
			if ($this->isNew()) {
				$this->collDetallerendirs = array();
			} else {

				$criteria->add(DetallerendirPeer::FK_ALUMNO_ID, $this->id);

				$this->collDetallerendirs = DetallerendirPeer::doSelectJoinCursada($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(DetallerendirPeer::FK_ALUMNO_ID, $this->id);

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
			$criteria = new Criteria(AlumnoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDetallerendirs === null) {
			if ($this->isNew()) {
				$this->collDetallerendirs = array();
			} else {

				$criteria->add(DetallerendirPeer::FK_ALUMNO_ID, $this->id);

				$this->collDetallerendirs = DetallerendirPeer::doSelectJoinActividad($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(DetallerendirPeer::FK_ALUMNO_ID, $this->id);

			if (!isset($this->lastDetallerendirCriteria) || !$this->lastDetallerendirCriteria->equals($criteria)) {
				$this->collDetallerendirs = DetallerendirPeer::doSelectJoinActividad($criteria, $con, $join_behavior);
			}
		}
		$this->lastDetallerendirCriteria = $criteria;

		return $this->collDetallerendirs;
	}


	
	public function getDetallerendirsJoinEstadomateren($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AlumnoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDetallerendirs === null) {
			if ($this->isNew()) {
				$this->collDetallerendirs = array();
			} else {

				$criteria->add(DetallerendirPeer::FK_ALUMNO_ID, $this->id);

				$this->collDetallerendirs = DetallerendirPeer::doSelectJoinEstadomateren($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(DetallerendirPeer::FK_ALUMNO_ID, $this->id);

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
			$criteria = new Criteria(AlumnoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDetallerendirs === null) {
			if ($this->isNew()) {
				$this->collDetallerendirs = array();
			} else {

				$criteria->add(DetallerendirPeer::FK_ALUMNO_ID, $this->id);

				$this->collDetallerendirs = DetallerendirPeer::doSelectJoinLlamados($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(DetallerendirPeer::FK_ALUMNO_ID, $this->id);

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
			$criteria = new Criteria(AlumnoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDetallecursadas === null) {
			if ($this->isNew()) {
			   $this->collDetallecursadas = array();
			} else {

				$criteria->add(DetallecursadaPeer::FK_ALUMNO_ID, $this->id);

				DetallecursadaPeer::addSelectColumns($criteria);
				$this->collDetallecursadas = DetallecursadaPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(DetallecursadaPeer::FK_ALUMNO_ID, $this->id);

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
			$criteria = new Criteria(AlumnoPeer::DATABASE_NAME);
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

				$criteria->add(DetallecursadaPeer::FK_ALUMNO_ID, $this->id);

				$count = DetallecursadaPeer::doCount($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(DetallecursadaPeer::FK_ALUMNO_ID, $this->id);

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
			$l->setAlumno($this);
		}
	}


	
	public function getDetallecursadasJoinCursada($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AlumnoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDetallecursadas === null) {
			if ($this->isNew()) {
				$this->collDetallecursadas = array();
			} else {

				$criteria->add(DetallecursadaPeer::FK_ALUMNO_ID, $this->id);

				$this->collDetallecursadas = DetallecursadaPeer::doSelectJoinCursada($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(DetallecursadaPeer::FK_ALUMNO_ID, $this->id);

			if (!isset($this->lastDetallecursadaCriteria) || !$this->lastDetallecursadaCriteria->equals($criteria)) {
				$this->collDetallecursadas = DetallecursadaPeer::doSelectJoinCursada($criteria, $con, $join_behavior);
			}
		}
		$this->lastDetallecursadaCriteria = $criteria;

		return $this->collDetallecursadas;
	}


	
	public function getDetallecursadasJoinActividad($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AlumnoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDetallecursadas === null) {
			if ($this->isNew()) {
				$this->collDetallecursadas = array();
			} else {

				$criteria->add(DetallecursadaPeer::FK_ALUMNO_ID, $this->id);

				$this->collDetallecursadas = DetallecursadaPeer::doSelectJoinActividad($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(DetallecursadaPeer::FK_ALUMNO_ID, $this->id);

			if (!isset($this->lastDetallecursadaCriteria) || !$this->lastDetallecursadaCriteria->equals($criteria)) {
				$this->collDetallecursadas = DetallecursadaPeer::doSelectJoinActividad($criteria, $con, $join_behavior);
			}
		}
		$this->lastDetallecursadaCriteria = $criteria;

		return $this->collDetallecursadas;
	}


	
	public function getDetallecursadasJoinEstadomate($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		if ($criteria === null) {
			$criteria = new Criteria(AlumnoPeer::DATABASE_NAME);
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDetallecursadas === null) {
			if ($this->isNew()) {
				$this->collDetallecursadas = array();
			} else {

				$criteria->add(DetallecursadaPeer::FK_ALUMNO_ID, $this->id);

				$this->collDetallecursadas = DetallecursadaPeer::doSelectJoinEstadomate($criteria, $con, $join_behavior);
			}
		} else {
									
			$criteria->add(DetallecursadaPeer::FK_ALUMNO_ID, $this->id);

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
			if ($this->collUsuarios) {
				foreach ((array) $this->collUsuarios as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collRelCalendariovacunacionAlumnos) {
				foreach ((array) $this->collRelCalendariovacunacionAlumnos as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collLegajopedagogicos) {
				foreach ((array) $this->collLegajopedagogicos as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collRelAlumnoDivisions) {
				foreach ((array) $this->collRelAlumnoDivisions as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collRendidas) {
				foreach ((array) $this->collRendidas as $o) {
					$o->clearAllReferences($deep);
				}
			}
			if ($this->collCursadas) {
				foreach ((array) $this->collCursadas as $o) {
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
		} 
		$this->collUsuarios = null;
		$this->collRelCalendariovacunacionAlumnos = null;
		$this->collLegajopedagogicos = null;
		$this->collRelAlumnoDivisions = null;
		$this->collRendidas = null;
		$this->collCursadas = null;
		$this->collDetallerendirs = null;
		$this->collDetallecursadas = null;
			$this->aProvincia = null;
			$this->aTipodocumento = null;
			$this->aEstablecimiento = null;
			$this->aPais = null;
			$this->aEstadosalumnos = null;
			$this->aCarrera = null;
	}

} 