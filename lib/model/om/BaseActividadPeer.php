<?php


abstract class BaseActividadPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'actividad';

	
	const CLASS_DEFAULT = 'lib.model.Actividad';

	
	const NUM_COLUMNS = 13;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;

	
	const ID = 'actividad.ID';

	
	const FK_ESTABLECIMIENTO_ID = 'actividad.FK_ESTABLECIMIENTO_ID';

	
	const FK_CARRERA_ID = 'actividad.FK_CARRERA_ID';

	
	const NOMBRE = 'actividad.NOMBRE';

	
	const DESCRIPCION = 'actividad.DESCRIPCION';

	
	const NRO = 'actividad.NRO';

	
	const ANIO = 'actividad.ANIO';

	
	const FECHA = 'actividad.FECHA';

	
	const FECHAF = 'actividad.FECHAF';

	
	const PRESIDENTE = 'actividad.PRESIDENTE';

	
	const VOCAL1 = 'actividad.VOCAL1';

	
	const VOCAL2 = 'actividad.VOCAL2';

	
	const FK_LLAMADO_ID = 'actividad.FK_LLAMADO_ID';

	
	public static $instances = array();

	
	private static $mapBuilder = null;

	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'FkEstablecimientoId', 'FkCarreraId', 'Nombre', 'Descripcion', 'Nro', 'Anio', 'Fecha', 'Fechaf', 'Presidente', 'Vocal1', 'Vocal2', 'FkLlamadoId', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'fkEstablecimientoId', 'fkCarreraId', 'nombre', 'descripcion', 'nro', 'anio', 'fecha', 'fechaf', 'presidente', 'vocal1', 'vocal2', 'fkLlamadoId', ),
		BasePeer::TYPE_COLNAME => array (self::ID, self::FK_ESTABLECIMIENTO_ID, self::FK_CARRERA_ID, self::NOMBRE, self::DESCRIPCION, self::NRO, self::ANIO, self::FECHA, self::FECHAF, self::PRESIDENTE, self::VOCAL1, self::VOCAL2, self::FK_LLAMADO_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'fk_establecimiento_id', 'fk_carrera_id', 'nombre', 'descripcion', 'nro', 'anio', 'fecha', 'fechaf', 'presidente', 'vocal1', 'vocal2', 'fk_llamado_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'FkEstablecimientoId' => 1, 'FkCarreraId' => 2, 'Nombre' => 3, 'Descripcion' => 4, 'Nro' => 5, 'Anio' => 6, 'Fecha' => 7, 'Fechaf' => 8, 'Presidente' => 9, 'Vocal1' => 10, 'Vocal2' => 11, 'FkLlamadoId' => 12, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'fkEstablecimientoId' => 1, 'fkCarreraId' => 2, 'nombre' => 3, 'descripcion' => 4, 'nro' => 5, 'anio' => 6, 'fecha' => 7, 'fechaf' => 8, 'presidente' => 9, 'vocal1' => 10, 'vocal2' => 11, 'fkLlamadoId' => 12, ),
		BasePeer::TYPE_COLNAME => array (self::ID => 0, self::FK_ESTABLECIMIENTO_ID => 1, self::FK_CARRERA_ID => 2, self::NOMBRE => 3, self::DESCRIPCION => 4, self::NRO => 5, self::ANIO => 6, self::FECHA => 7, self::FECHAF => 8, self::PRESIDENTE => 9, self::VOCAL1 => 10, self::VOCAL2 => 11, self::FK_LLAMADO_ID => 12, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'fk_establecimiento_id' => 1, 'fk_carrera_id' => 2, 'nombre' => 3, 'descripcion' => 4, 'nro' => 5, 'anio' => 6, 'fecha' => 7, 'fechaf' => 8, 'presidente' => 9, 'vocal1' => 10, 'vocal2' => 11, 'fk_llamado_id' => 12, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, )
	);

	
	public static function getMapBuilder()
	{
		if (self::$mapBuilder === null) {
			self::$mapBuilder = new ActividadMapBuilder();
		}
		return self::$mapBuilder;
	}
	
	static public function translateFieldName($name, $fromType, $toType)
	{
		$toNames = self::getFieldNames($toType);
		$key = isset(self::$fieldKeys[$fromType][$name]) ? self::$fieldKeys[$fromType][$name] : null;
		if ($key === null) {
			throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(self::$fieldKeys[$fromType], true));
		}
		return $toNames[$key];
	}

	

	static public function getFieldNames($type = BasePeer::TYPE_PHPNAME)
	{
		if (!array_key_exists($type, self::$fieldNames)) {
			throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
		}
		return self::$fieldNames[$type];
	}

	
	public static function alias($alias, $column)
	{
		return str_replace(ActividadPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(ActividadPeer::ID);

		$criteria->addSelectColumn(ActividadPeer::FK_ESTABLECIMIENTO_ID);

		$criteria->addSelectColumn(ActividadPeer::FK_CARRERA_ID);

		$criteria->addSelectColumn(ActividadPeer::NOMBRE);

		$criteria->addSelectColumn(ActividadPeer::DESCRIPCION);

		$criteria->addSelectColumn(ActividadPeer::NRO);

		$criteria->addSelectColumn(ActividadPeer::ANIO);

		$criteria->addSelectColumn(ActividadPeer::FECHA);

		$criteria->addSelectColumn(ActividadPeer::FECHAF);

		$criteria->addSelectColumn(ActividadPeer::PRESIDENTE);

		$criteria->addSelectColumn(ActividadPeer::VOCAL1);

		$criteria->addSelectColumn(ActividadPeer::VOCAL2);

		$criteria->addSelectColumn(ActividadPeer::FK_LLAMADO_ID);

	}

	
	public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(ActividadPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ActividadPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 		$criteria->setDbName(self::DATABASE_NAME); 
		if ($con === null) {
			$con = Propel::getConnection(ActividadPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

				$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}
	
	public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = ActividadPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, PropelPDO $con = null)
	{
		return ActividadPeer::populateObjects(ActividadPeer::doSelectStmt($criteria, $con));
	}
	
	public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(ActividadPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			ActividadPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

				return BasePeer::doSelect($criteria, $con);
	}
	
	public static function addInstanceToPool(Actividad $obj, $key = null)
	{
		if (Propel::isInstancePoolingEnabled()) {
			if ($key === null) {
				$key = (string) $obj->getId();
			} 			self::$instances[$key] = $obj;
		}
	}

	
	public static function removeInstanceFromPool($value)
	{
		if (Propel::isInstancePoolingEnabled() && $value !== null) {
			if (is_object($value) && $value instanceof Actividad) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
								$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Actividad object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
				throw $e;
			}

			unset(self::$instances[$key]);
		}
	} 
	
	public static function getInstanceFromPool($key)
	{
		if (Propel::isInstancePoolingEnabled()) {
			if (isset(self::$instances[$key])) {
				return self::$instances[$key];
			}
		}
		return null; 	}
	
	
	public static function clearInstancePool()
	{
		self::$instances = array();
	}
	
	
	public static function getPrimaryKeyHashFromRow($row, $startcol = 0)
	{
				if ($row[$startcol + 0] === null) {
			return null;
		}
		return (string) $row[$startcol + 0];
	}

	
	public static function populateObjects(PDOStatement $stmt)
	{
		$results = array();
	
				$cls = ActividadPeer::getOMClass();
		$cls = substr('.'.$cls, strrpos('.'.$cls, '.') + 1);
				while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = ActividadPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = ActividadPeer::getInstanceFromPool($key))) {
																$results[] = $obj;
			} else {
		
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				ActividadPeer::addInstanceToPool($obj, $key);
			} 		}
		$stmt->closeCursor();
		return $results;
	}

	
	public static function doCountJoinEstablecimiento(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(ActividadPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ActividadPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ActividadPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(ActividadPeer::FK_ESTABLECIMIENTO_ID,), array(EstablecimientoPeer::ID,), $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinCarrera(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(ActividadPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ActividadPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ActividadPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(ActividadPeer::FK_CARRERA_ID,), array(CarreraPeer::ID,), $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinDocenteRelatedByPresidente(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(ActividadPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ActividadPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ActividadPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(ActividadPeer::PRESIDENTE,), array(DocentePeer::ID,), $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinDocenteRelatedByVocal1(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(ActividadPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ActividadPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ActividadPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(ActividadPeer::VOCAL1,), array(DocentePeer::ID,), $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinDocenteRelatedByVocal2(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(ActividadPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ActividadPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ActividadPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(ActividadPeer::VOCAL2,), array(DocentePeer::ID,), $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinLlamados(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(ActividadPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ActividadPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ActividadPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(ActividadPeer::FK_LLAMADO_ID,), array(LlamadosPeer::ID,), $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doSelectJoinEstablecimiento(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ActividadPeer::addSelectColumns($c);
		$startcol = (ActividadPeer::NUM_COLUMNS - ActividadPeer::NUM_LAZY_LOAD_COLUMNS);
		EstablecimientoPeer::addSelectColumns($c);

		$c->addJoin(array(ActividadPeer::FK_ESTABLECIMIENTO_ID,), array(EstablecimientoPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ActividadPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ActividadPeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = ActividadPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				ActividadPeer::addInstanceToPool($obj1, $key1);
			} 
			$key2 = EstablecimientoPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = EstablecimientoPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = EstablecimientoPeer::getOMClass();

					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					EstablecimientoPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addActividad($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinCarrera(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ActividadPeer::addSelectColumns($c);
		$startcol = (ActividadPeer::NUM_COLUMNS - ActividadPeer::NUM_LAZY_LOAD_COLUMNS);
		CarreraPeer::addSelectColumns($c);

		$c->addJoin(array(ActividadPeer::FK_CARRERA_ID,), array(CarreraPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ActividadPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ActividadPeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = ActividadPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				ActividadPeer::addInstanceToPool($obj1, $key1);
			} 
			$key2 = CarreraPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = CarreraPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = CarreraPeer::getOMClass();

					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					CarreraPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addActividad($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinDocenteRelatedByPresidente(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ActividadPeer::addSelectColumns($c);
		$startcol = (ActividadPeer::NUM_COLUMNS - ActividadPeer::NUM_LAZY_LOAD_COLUMNS);
		DocentePeer::addSelectColumns($c);

		$c->addJoin(array(ActividadPeer::PRESIDENTE,), array(DocentePeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ActividadPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ActividadPeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = ActividadPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				ActividadPeer::addInstanceToPool($obj1, $key1);
			} 
			$key2 = DocentePeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = DocentePeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = DocentePeer::getOMClass();

					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					DocentePeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addActividadRelatedByPresidente($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinDocenteRelatedByVocal1(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ActividadPeer::addSelectColumns($c);
		$startcol = (ActividadPeer::NUM_COLUMNS - ActividadPeer::NUM_LAZY_LOAD_COLUMNS);
		DocentePeer::addSelectColumns($c);

		$c->addJoin(array(ActividadPeer::VOCAL1,), array(DocentePeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ActividadPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ActividadPeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = ActividadPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				ActividadPeer::addInstanceToPool($obj1, $key1);
			} 
			$key2 = DocentePeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = DocentePeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = DocentePeer::getOMClass();

					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					DocentePeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addActividadRelatedByVocal1($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinDocenteRelatedByVocal2(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ActividadPeer::addSelectColumns($c);
		$startcol = (ActividadPeer::NUM_COLUMNS - ActividadPeer::NUM_LAZY_LOAD_COLUMNS);
		DocentePeer::addSelectColumns($c);

		$c->addJoin(array(ActividadPeer::VOCAL2,), array(DocentePeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ActividadPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ActividadPeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = ActividadPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				ActividadPeer::addInstanceToPool($obj1, $key1);
			} 
			$key2 = DocentePeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = DocentePeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = DocentePeer::getOMClass();

					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					DocentePeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addActividadRelatedByVocal2($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinLlamados(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ActividadPeer::addSelectColumns($c);
		$startcol = (ActividadPeer::NUM_COLUMNS - ActividadPeer::NUM_LAZY_LOAD_COLUMNS);
		LlamadosPeer::addSelectColumns($c);

		$c->addJoin(array(ActividadPeer::FK_LLAMADO_ID,), array(LlamadosPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ActividadPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ActividadPeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = ActividadPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				ActividadPeer::addInstanceToPool($obj1, $key1);
			} 
			$key2 = LlamadosPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = LlamadosPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = LlamadosPeer::getOMClass();

					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					LlamadosPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addActividad($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(ActividadPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ActividadPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ActividadPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(ActividadPeer::FK_ESTABLECIMIENTO_ID,), array(EstablecimientoPeer::ID,), $join_behavior);
		$criteria->addJoin(array(ActividadPeer::FK_CARRERA_ID,), array(CarreraPeer::ID,), $join_behavior);
		$criteria->addJoin(array(ActividadPeer::PRESIDENTE,), array(DocentePeer::ID,), $join_behavior);
		$criteria->addJoin(array(ActividadPeer::VOCAL1,), array(DocentePeer::ID,), $join_behavior);
		$criteria->addJoin(array(ActividadPeer::VOCAL2,), array(DocentePeer::ID,), $join_behavior);
		$criteria->addJoin(array(ActividadPeer::FK_LLAMADO_ID,), array(LlamadosPeer::ID,), $join_behavior);
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}

	
	public static function doSelectJoinAll(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ActividadPeer::addSelectColumns($c);
		$startcol2 = (ActividadPeer::NUM_COLUMNS - ActividadPeer::NUM_LAZY_LOAD_COLUMNS);

		EstablecimientoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (EstablecimientoPeer::NUM_COLUMNS - EstablecimientoPeer::NUM_LAZY_LOAD_COLUMNS);

		CarreraPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (CarreraPeer::NUM_COLUMNS - CarreraPeer::NUM_LAZY_LOAD_COLUMNS);

		DocentePeer::addSelectColumns($c);
		$startcol5 = $startcol4 + (DocentePeer::NUM_COLUMNS - DocentePeer::NUM_LAZY_LOAD_COLUMNS);

		DocentePeer::addSelectColumns($c);
		$startcol6 = $startcol5 + (DocentePeer::NUM_COLUMNS - DocentePeer::NUM_LAZY_LOAD_COLUMNS);

		DocentePeer::addSelectColumns($c);
		$startcol7 = $startcol6 + (DocentePeer::NUM_COLUMNS - DocentePeer::NUM_LAZY_LOAD_COLUMNS);

		LlamadosPeer::addSelectColumns($c);
		$startcol8 = $startcol7 + (LlamadosPeer::NUM_COLUMNS - LlamadosPeer::NUM_LAZY_LOAD_COLUMNS);

		$c->addJoin(array(ActividadPeer::FK_ESTABLECIMIENTO_ID,), array(EstablecimientoPeer::ID,), $join_behavior);
		$c->addJoin(array(ActividadPeer::FK_CARRERA_ID,), array(CarreraPeer::ID,), $join_behavior);
		$c->addJoin(array(ActividadPeer::PRESIDENTE,), array(DocentePeer::ID,), $join_behavior);
		$c->addJoin(array(ActividadPeer::VOCAL1,), array(DocentePeer::ID,), $join_behavior);
		$c->addJoin(array(ActividadPeer::VOCAL2,), array(DocentePeer::ID,), $join_behavior);
		$c->addJoin(array(ActividadPeer::FK_LLAMADO_ID,), array(LlamadosPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ActividadPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ActividadPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = ActividadPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				ActividadPeer::addInstanceToPool($obj1, $key1);
			} 
			
			$key2 = EstablecimientoPeer::getPrimaryKeyHashFromRow($row, $startcol2);
			if ($key2 !== null) {
				$obj2 = EstablecimientoPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = EstablecimientoPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					EstablecimientoPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addActividad($obj1);
			} 
			
			$key3 = CarreraPeer::getPrimaryKeyHashFromRow($row, $startcol3);
			if ($key3 !== null) {
				$obj3 = CarreraPeer::getInstanceFromPool($key3);
				if (!$obj3) {

					$omClass = CarreraPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					CarreraPeer::addInstanceToPool($obj3, $key3);
				} 
								$obj3->addActividad($obj1);
			} 
			
			$key4 = DocentePeer::getPrimaryKeyHashFromRow($row, $startcol4);
			if ($key4 !== null) {
				$obj4 = DocentePeer::getInstanceFromPool($key4);
				if (!$obj4) {

					$omClass = DocentePeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					DocentePeer::addInstanceToPool($obj4, $key4);
				} 
								$obj4->addActividadRelatedByPresidente($obj1);
			} 
			
			$key5 = DocentePeer::getPrimaryKeyHashFromRow($row, $startcol5);
			if ($key5 !== null) {
				$obj5 = DocentePeer::getInstanceFromPool($key5);
				if (!$obj5) {

					$omClass = DocentePeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					DocentePeer::addInstanceToPool($obj5, $key5);
				} 
								$obj5->addActividadRelatedByVocal1($obj1);
			} 
			
			$key6 = DocentePeer::getPrimaryKeyHashFromRow($row, $startcol6);
			if ($key6 !== null) {
				$obj6 = DocentePeer::getInstanceFromPool($key6);
				if (!$obj6) {

					$omClass = DocentePeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj6 = new $cls();
					$obj6->hydrate($row, $startcol6);
					DocentePeer::addInstanceToPool($obj6, $key6);
				} 
								$obj6->addActividadRelatedByVocal2($obj1);
			} 
			
			$key7 = LlamadosPeer::getPrimaryKeyHashFromRow($row, $startcol7);
			if ($key7 !== null) {
				$obj7 = LlamadosPeer::getInstanceFromPool($key7);
				if (!$obj7) {

					$omClass = LlamadosPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj7 = new $cls();
					$obj7->hydrate($row, $startcol7);
					LlamadosPeer::addInstanceToPool($obj7, $key7);
				} 
								$obj7->addActividad($obj1);
			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doCountJoinAllExceptEstablecimiento(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ActividadPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ActividadPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(ActividadPeer::FK_CARRERA_ID,), array(CarreraPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ActividadPeer::PRESIDENTE,), array(DocentePeer::ID,), $join_behavior);
				$criteria->addJoin(array(ActividadPeer::VOCAL1,), array(DocentePeer::ID,), $join_behavior);
				$criteria->addJoin(array(ActividadPeer::VOCAL2,), array(DocentePeer::ID,), $join_behavior);
				$criteria->addJoin(array(ActividadPeer::FK_LLAMADO_ID,), array(LlamadosPeer::ID,), $join_behavior);
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinAllExceptCarrera(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ActividadPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ActividadPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(ActividadPeer::FK_ESTABLECIMIENTO_ID,), array(EstablecimientoPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ActividadPeer::PRESIDENTE,), array(DocentePeer::ID,), $join_behavior);
				$criteria->addJoin(array(ActividadPeer::VOCAL1,), array(DocentePeer::ID,), $join_behavior);
				$criteria->addJoin(array(ActividadPeer::VOCAL2,), array(DocentePeer::ID,), $join_behavior);
				$criteria->addJoin(array(ActividadPeer::FK_LLAMADO_ID,), array(LlamadosPeer::ID,), $join_behavior);
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinAllExceptDocenteRelatedByPresidente(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ActividadPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ActividadPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(ActividadPeer::FK_ESTABLECIMIENTO_ID,), array(EstablecimientoPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ActividadPeer::FK_CARRERA_ID,), array(CarreraPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ActividadPeer::FK_LLAMADO_ID,), array(LlamadosPeer::ID,), $join_behavior);
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinAllExceptDocenteRelatedByVocal1(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ActividadPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ActividadPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(ActividadPeer::FK_ESTABLECIMIENTO_ID,), array(EstablecimientoPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ActividadPeer::FK_CARRERA_ID,), array(CarreraPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ActividadPeer::FK_LLAMADO_ID,), array(LlamadosPeer::ID,), $join_behavior);
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinAllExceptDocenteRelatedByVocal2(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ActividadPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ActividadPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(ActividadPeer::FK_ESTABLECIMIENTO_ID,), array(EstablecimientoPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ActividadPeer::FK_CARRERA_ID,), array(CarreraPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ActividadPeer::FK_LLAMADO_ID,), array(LlamadosPeer::ID,), $join_behavior);
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinAllExceptLlamados(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			ActividadPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(ActividadPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(ActividadPeer::FK_ESTABLECIMIENTO_ID,), array(EstablecimientoPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ActividadPeer::FK_CARRERA_ID,), array(CarreraPeer::ID,), $join_behavior);
				$criteria->addJoin(array(ActividadPeer::PRESIDENTE,), array(DocentePeer::ID,), $join_behavior);
				$criteria->addJoin(array(ActividadPeer::VOCAL1,), array(DocentePeer::ID,), $join_behavior);
				$criteria->addJoin(array(ActividadPeer::VOCAL2,), array(DocentePeer::ID,), $join_behavior);
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doSelectJoinAllExceptEstablecimiento(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ActividadPeer::addSelectColumns($c);
		$startcol2 = (ActividadPeer::NUM_COLUMNS - ActividadPeer::NUM_LAZY_LOAD_COLUMNS);

		CarreraPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (CarreraPeer::NUM_COLUMNS - CarreraPeer::NUM_LAZY_LOAD_COLUMNS);

		DocentePeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (DocentePeer::NUM_COLUMNS - DocentePeer::NUM_LAZY_LOAD_COLUMNS);

		DocentePeer::addSelectColumns($c);
		$startcol5 = $startcol4 + (DocentePeer::NUM_COLUMNS - DocentePeer::NUM_LAZY_LOAD_COLUMNS);

		DocentePeer::addSelectColumns($c);
		$startcol6 = $startcol5 + (DocentePeer::NUM_COLUMNS - DocentePeer::NUM_LAZY_LOAD_COLUMNS);

		LlamadosPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + (LlamadosPeer::NUM_COLUMNS - LlamadosPeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(ActividadPeer::FK_CARRERA_ID,), array(CarreraPeer::ID,), $join_behavior);
				$c->addJoin(array(ActividadPeer::PRESIDENTE,), array(DocentePeer::ID,), $join_behavior);
				$c->addJoin(array(ActividadPeer::VOCAL1,), array(DocentePeer::ID,), $join_behavior);
				$c->addJoin(array(ActividadPeer::VOCAL2,), array(DocentePeer::ID,), $join_behavior);
				$c->addJoin(array(ActividadPeer::FK_LLAMADO_ID,), array(LlamadosPeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ActividadPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ActividadPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = ActividadPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				ActividadPeer::addInstanceToPool($obj1, $key1);
			} 
				
				$key2 = CarreraPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = CarreraPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$omClass = CarreraPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					CarreraPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addActividad($obj1);

			} 
				
				$key3 = DocentePeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = DocentePeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$omClass = DocentePeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					DocentePeer::addInstanceToPool($obj3, $key3);
				} 
								$obj3->addActividadRelatedByPresidente($obj1);

			} 
				
				$key4 = DocentePeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = DocentePeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$omClass = DocentePeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					DocentePeer::addInstanceToPool($obj4, $key4);
				} 
								$obj4->addActividadRelatedByVocal1($obj1);

			} 
				
				$key5 = DocentePeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = DocentePeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$omClass = DocentePeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					DocentePeer::addInstanceToPool($obj5, $key5);
				} 
								$obj5->addActividadRelatedByVocal2($obj1);

			} 
				
				$key6 = LlamadosPeer::getPrimaryKeyHashFromRow($row, $startcol6);
				if ($key6 !== null) {
					$obj6 = LlamadosPeer::getInstanceFromPool($key6);
					if (!$obj6) {
	
						$omClass = LlamadosPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj6 = new $cls();
					$obj6->hydrate($row, $startcol6);
					LlamadosPeer::addInstanceToPool($obj6, $key6);
				} 
								$obj6->addActividad($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinAllExceptCarrera(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ActividadPeer::addSelectColumns($c);
		$startcol2 = (ActividadPeer::NUM_COLUMNS - ActividadPeer::NUM_LAZY_LOAD_COLUMNS);

		EstablecimientoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (EstablecimientoPeer::NUM_COLUMNS - EstablecimientoPeer::NUM_LAZY_LOAD_COLUMNS);

		DocentePeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (DocentePeer::NUM_COLUMNS - DocentePeer::NUM_LAZY_LOAD_COLUMNS);

		DocentePeer::addSelectColumns($c);
		$startcol5 = $startcol4 + (DocentePeer::NUM_COLUMNS - DocentePeer::NUM_LAZY_LOAD_COLUMNS);

		DocentePeer::addSelectColumns($c);
		$startcol6 = $startcol5 + (DocentePeer::NUM_COLUMNS - DocentePeer::NUM_LAZY_LOAD_COLUMNS);

		LlamadosPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + (LlamadosPeer::NUM_COLUMNS - LlamadosPeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(ActividadPeer::FK_ESTABLECIMIENTO_ID,), array(EstablecimientoPeer::ID,), $join_behavior);
				$c->addJoin(array(ActividadPeer::PRESIDENTE,), array(DocentePeer::ID,), $join_behavior);
				$c->addJoin(array(ActividadPeer::VOCAL1,), array(DocentePeer::ID,), $join_behavior);
				$c->addJoin(array(ActividadPeer::VOCAL2,), array(DocentePeer::ID,), $join_behavior);
				$c->addJoin(array(ActividadPeer::FK_LLAMADO_ID,), array(LlamadosPeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ActividadPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ActividadPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = ActividadPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				ActividadPeer::addInstanceToPool($obj1, $key1);
			} 
				
				$key2 = EstablecimientoPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = EstablecimientoPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$omClass = EstablecimientoPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					EstablecimientoPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addActividad($obj1);

			} 
				
				$key3 = DocentePeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = DocentePeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$omClass = DocentePeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					DocentePeer::addInstanceToPool($obj3, $key3);
				} 
								$obj3->addActividadRelatedByPresidente($obj1);

			} 
				
				$key4 = DocentePeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = DocentePeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$omClass = DocentePeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					DocentePeer::addInstanceToPool($obj4, $key4);
				} 
								$obj4->addActividadRelatedByVocal1($obj1);

			} 
				
				$key5 = DocentePeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = DocentePeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$omClass = DocentePeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					DocentePeer::addInstanceToPool($obj5, $key5);
				} 
								$obj5->addActividadRelatedByVocal2($obj1);

			} 
				
				$key6 = LlamadosPeer::getPrimaryKeyHashFromRow($row, $startcol6);
				if ($key6 !== null) {
					$obj6 = LlamadosPeer::getInstanceFromPool($key6);
					if (!$obj6) {
	
						$omClass = LlamadosPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj6 = new $cls();
					$obj6->hydrate($row, $startcol6);
					LlamadosPeer::addInstanceToPool($obj6, $key6);
				} 
								$obj6->addActividad($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinAllExceptDocenteRelatedByPresidente(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ActividadPeer::addSelectColumns($c);
		$startcol2 = (ActividadPeer::NUM_COLUMNS - ActividadPeer::NUM_LAZY_LOAD_COLUMNS);

		EstablecimientoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (EstablecimientoPeer::NUM_COLUMNS - EstablecimientoPeer::NUM_LAZY_LOAD_COLUMNS);

		CarreraPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (CarreraPeer::NUM_COLUMNS - CarreraPeer::NUM_LAZY_LOAD_COLUMNS);

		LlamadosPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + (LlamadosPeer::NUM_COLUMNS - LlamadosPeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(ActividadPeer::FK_ESTABLECIMIENTO_ID,), array(EstablecimientoPeer::ID,), $join_behavior);
				$c->addJoin(array(ActividadPeer::FK_CARRERA_ID,), array(CarreraPeer::ID,), $join_behavior);
				$c->addJoin(array(ActividadPeer::FK_LLAMADO_ID,), array(LlamadosPeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ActividadPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ActividadPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = ActividadPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				ActividadPeer::addInstanceToPool($obj1, $key1);
			} 
				
				$key2 = EstablecimientoPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = EstablecimientoPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$omClass = EstablecimientoPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					EstablecimientoPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addActividad($obj1);

			} 
				
				$key3 = CarreraPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = CarreraPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$omClass = CarreraPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					CarreraPeer::addInstanceToPool($obj3, $key3);
				} 
								$obj3->addActividad($obj1);

			} 
				
				$key4 = LlamadosPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = LlamadosPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$omClass = LlamadosPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					LlamadosPeer::addInstanceToPool($obj4, $key4);
				} 
								$obj4->addActividad($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinAllExceptDocenteRelatedByVocal1(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ActividadPeer::addSelectColumns($c);
		$startcol2 = (ActividadPeer::NUM_COLUMNS - ActividadPeer::NUM_LAZY_LOAD_COLUMNS);

		EstablecimientoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (EstablecimientoPeer::NUM_COLUMNS - EstablecimientoPeer::NUM_LAZY_LOAD_COLUMNS);

		CarreraPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (CarreraPeer::NUM_COLUMNS - CarreraPeer::NUM_LAZY_LOAD_COLUMNS);

		LlamadosPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + (LlamadosPeer::NUM_COLUMNS - LlamadosPeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(ActividadPeer::FK_ESTABLECIMIENTO_ID,), array(EstablecimientoPeer::ID,), $join_behavior);
				$c->addJoin(array(ActividadPeer::FK_CARRERA_ID,), array(CarreraPeer::ID,), $join_behavior);
				$c->addJoin(array(ActividadPeer::FK_LLAMADO_ID,), array(LlamadosPeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ActividadPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ActividadPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = ActividadPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				ActividadPeer::addInstanceToPool($obj1, $key1);
			} 
				
				$key2 = EstablecimientoPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = EstablecimientoPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$omClass = EstablecimientoPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					EstablecimientoPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addActividad($obj1);

			} 
				
				$key3 = CarreraPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = CarreraPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$omClass = CarreraPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					CarreraPeer::addInstanceToPool($obj3, $key3);
				} 
								$obj3->addActividad($obj1);

			} 
				
				$key4 = LlamadosPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = LlamadosPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$omClass = LlamadosPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					LlamadosPeer::addInstanceToPool($obj4, $key4);
				} 
								$obj4->addActividad($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinAllExceptDocenteRelatedByVocal2(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ActividadPeer::addSelectColumns($c);
		$startcol2 = (ActividadPeer::NUM_COLUMNS - ActividadPeer::NUM_LAZY_LOAD_COLUMNS);

		EstablecimientoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (EstablecimientoPeer::NUM_COLUMNS - EstablecimientoPeer::NUM_LAZY_LOAD_COLUMNS);

		CarreraPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (CarreraPeer::NUM_COLUMNS - CarreraPeer::NUM_LAZY_LOAD_COLUMNS);

		LlamadosPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + (LlamadosPeer::NUM_COLUMNS - LlamadosPeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(ActividadPeer::FK_ESTABLECIMIENTO_ID,), array(EstablecimientoPeer::ID,), $join_behavior);
				$c->addJoin(array(ActividadPeer::FK_CARRERA_ID,), array(CarreraPeer::ID,), $join_behavior);
				$c->addJoin(array(ActividadPeer::FK_LLAMADO_ID,), array(LlamadosPeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ActividadPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ActividadPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = ActividadPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				ActividadPeer::addInstanceToPool($obj1, $key1);
			} 
				
				$key2 = EstablecimientoPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = EstablecimientoPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$omClass = EstablecimientoPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					EstablecimientoPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addActividad($obj1);

			} 
				
				$key3 = CarreraPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = CarreraPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$omClass = CarreraPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					CarreraPeer::addInstanceToPool($obj3, $key3);
				} 
								$obj3->addActividad($obj1);

			} 
				
				$key4 = LlamadosPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = LlamadosPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$omClass = LlamadosPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					LlamadosPeer::addInstanceToPool($obj4, $key4);
				} 
								$obj4->addActividad($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinAllExceptLlamados(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		ActividadPeer::addSelectColumns($c);
		$startcol2 = (ActividadPeer::NUM_COLUMNS - ActividadPeer::NUM_LAZY_LOAD_COLUMNS);

		EstablecimientoPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (EstablecimientoPeer::NUM_COLUMNS - EstablecimientoPeer::NUM_LAZY_LOAD_COLUMNS);

		CarreraPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (CarreraPeer::NUM_COLUMNS - CarreraPeer::NUM_LAZY_LOAD_COLUMNS);

		DocentePeer::addSelectColumns($c);
		$startcol5 = $startcol4 + (DocentePeer::NUM_COLUMNS - DocentePeer::NUM_LAZY_LOAD_COLUMNS);

		DocentePeer::addSelectColumns($c);
		$startcol6 = $startcol5 + (DocentePeer::NUM_COLUMNS - DocentePeer::NUM_LAZY_LOAD_COLUMNS);

		DocentePeer::addSelectColumns($c);
		$startcol7 = $startcol6 + (DocentePeer::NUM_COLUMNS - DocentePeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(ActividadPeer::FK_ESTABLECIMIENTO_ID,), array(EstablecimientoPeer::ID,), $join_behavior);
				$c->addJoin(array(ActividadPeer::FK_CARRERA_ID,), array(CarreraPeer::ID,), $join_behavior);
				$c->addJoin(array(ActividadPeer::PRESIDENTE,), array(DocentePeer::ID,), $join_behavior);
				$c->addJoin(array(ActividadPeer::VOCAL1,), array(DocentePeer::ID,), $join_behavior);
				$c->addJoin(array(ActividadPeer::VOCAL2,), array(DocentePeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = ActividadPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = ActividadPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = ActividadPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				ActividadPeer::addInstanceToPool($obj1, $key1);
			} 
				
				$key2 = EstablecimientoPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = EstablecimientoPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$omClass = EstablecimientoPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					EstablecimientoPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addActividad($obj1);

			} 
				
				$key3 = CarreraPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = CarreraPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$omClass = CarreraPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					CarreraPeer::addInstanceToPool($obj3, $key3);
				} 
								$obj3->addActividad($obj1);

			} 
				
				$key4 = DocentePeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = DocentePeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$omClass = DocentePeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					DocentePeer::addInstanceToPool($obj4, $key4);
				} 
								$obj4->addActividadRelatedByPresidente($obj1);

			} 
				
				$key5 = DocentePeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = DocentePeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$omClass = DocentePeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					DocentePeer::addInstanceToPool($obj5, $key5);
				} 
								$obj5->addActividadRelatedByVocal1($obj1);

			} 
				
				$key6 = DocentePeer::getPrimaryKeyHashFromRow($row, $startcol6);
				if ($key6 !== null) {
					$obj6 = DocentePeer::getInstanceFromPool($key6);
					if (!$obj6) {
	
						$omClass = DocentePeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj6 = new $cls();
					$obj6->hydrate($row, $startcol6);
					DocentePeer::addInstanceToPool($obj6, $key6);
				} 
								$obj6->addActividadRelatedByVocal2($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


  static public function getUniqueColumnNames()
  {
    return array();
  }
	
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	
	public static function getOMClass()
	{
		return ActividadPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(ActividadPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		if ($criteria->containsKey(ActividadPeer::ID) && $criteria->keyContainsValue(ActividadPeer::ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.ActividadPeer::ID.')');
		}


				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->beginTransaction();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollBack();
			throw $e;
		}

		return $pk;
	}

	
	public static function doUpdate($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(ActividadPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
			$comparison = $criteria->getComparison(ActividadPeer::ID);
			$selectCriteria->add(ActividadPeer::ID, $criteria->remove(ActividadPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(ActividadPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; 		try {
									$con->beginTransaction();
			$affectedRows += BasePeer::doDeleteAll(ActividadPeer::TABLE_NAME, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	
	 public static function doDelete($values, PropelPDO $con = null)
	 {
		if ($con === null) {
			$con = Propel::getConnection(ActividadPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
												ActividadPeer::clearInstancePool();

						$criteria = clone $values;
		} elseif ($values instanceof Actividad) {
						ActividadPeer::removeInstanceFromPool($values);
						$criteria = $values->buildPkeyCriteria();
		} else {
			


			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(ActividadPeer::ID, (array) $values, Criteria::IN);

			foreach ((array) $values as $singleval) {
								ActividadPeer::removeInstanceFromPool($singleval);
			}
		}

				$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; 
		try {
									$con->beginTransaction();
			
			$affectedRows += BasePeer::doDelete($criteria, $con);

			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollBack();
			throw $e;
		}
	}

	
	public static function doValidate(Actividad $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(ActividadPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(ActividadPeer::TABLE_NAME);

			if (! is_array($cols)) {
				$cols = array($cols);
			}

			foreach ($cols as $colName) {
				if ($tableMap->containsColumn($colName)) {
					$get = 'get' . $tableMap->getColumn($colName)->getPhpName();
					$columns[$colName] = $obj->$get();
				}
			}
		} else {

		}

		$res =  BasePeer::doValidate(ActividadPeer::DATABASE_NAME, ActividadPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = ActividadPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
        }
    }

    return $res;
	}

	
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = ActividadPeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(ActividadPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(ActividadPeer::DATABASE_NAME);
		$criteria->add(ActividadPeer::ID, $pk);

		$v = ActividadPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	
	public static function retrieveByPKs($pks, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(ActividadPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(ActividadPeer::DATABASE_NAME);
			$criteria->add(ActividadPeer::ID, $pks, Criteria::IN);
			$objs = ActividadPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 

Propel::getDatabaseMap(BaseActividadPeer::DATABASE_NAME)->addTableBuilder(BaseActividadPeer::TABLE_NAME, BaseActividadPeer::getMapBuilder());

