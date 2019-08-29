<?php


abstract class BaseDetallecursadaPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'detallecursada';

	
	const CLASS_DEFAULT = 'lib.model.Detallecursada';

	
	const NUM_COLUMNS = 11;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;

	
	const ID = 'detallecursada.ID';

	
	const FK_CURSADA_ID = 'detallecursada.FK_CURSADA_ID';

	
	const FK_ACTIVIDAD_ID = 'detallecursada.FK_ACTIVIDAD_ID';

	
	const FK_ALUMNO_ID = 'detallecursada.FK_ALUMNO_ID';

	
	const FK_DCURSADA_ID = 'detallecursada.FK_DCURSADA_ID';

	
	const FECHA = 'detallecursada.FECHA';

	
	const ORDEN = 'detallecursada.ORDEN';

	
	const RESULT = 'detallecursada.RESULT';

	
	const LIBRO = 'detallecursada.LIBRO';

	
	const FOLIO = 'detallecursada.FOLIO';

	
	const ESTADO = 'detallecursada.ESTADO';

	
	public static $instances = array();

	
	private static $mapBuilder = null;

	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'FkCursadaId', 'FkActividadId', 'FkAlumnoId', 'FkDcursadaId', 'Fecha', 'Orden', 'Result', 'Libro', 'Folio', 'Estado', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'fkCursadaId', 'fkActividadId', 'fkAlumnoId', 'fkDcursadaId', 'fecha', 'orden', 'result', 'libro', 'folio', 'estado', ),
		BasePeer::TYPE_COLNAME => array (self::ID, self::FK_CURSADA_ID, self::FK_ACTIVIDAD_ID, self::FK_ALUMNO_ID, self::FK_DCURSADA_ID, self::FECHA, self::ORDEN, self::RESULT, self::LIBRO, self::FOLIO, self::ESTADO, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'fk_cursada_id', 'fk_actividad_id', 'fk_alumno_id', 'fk_dcursada_id', 'fecha', 'orden', 'result', 'libro', 'folio', 'estado', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'FkCursadaId' => 1, 'FkActividadId' => 2, 'FkAlumnoId' => 3, 'FkDcursadaId' => 4, 'Fecha' => 5, 'Orden' => 6, 'Result' => 7, 'Libro' => 8, 'Folio' => 9, 'Estado' => 10, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'fkCursadaId' => 1, 'fkActividadId' => 2, 'fkAlumnoId' => 3, 'fkDcursadaId' => 4, 'fecha' => 5, 'orden' => 6, 'result' => 7, 'libro' => 8, 'folio' => 9, 'estado' => 10, ),
		BasePeer::TYPE_COLNAME => array (self::ID => 0, self::FK_CURSADA_ID => 1, self::FK_ACTIVIDAD_ID => 2, self::FK_ALUMNO_ID => 3, self::FK_DCURSADA_ID => 4, self::FECHA => 5, self::ORDEN => 6, self::RESULT => 7, self::LIBRO => 8, self::FOLIO => 9, self::ESTADO => 10, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'fk_cursada_id' => 1, 'fk_actividad_id' => 2, 'fk_alumno_id' => 3, 'fk_dcursada_id' => 4, 'fecha' => 5, 'orden' => 6, 'result' => 7, 'libro' => 8, 'folio' => 9, 'estado' => 10, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	public static function getMapBuilder()
	{
		if (self::$mapBuilder === null) {
			self::$mapBuilder = new DetallecursadaMapBuilder();
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
		return str_replace(DetallecursadaPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(DetallecursadaPeer::ID);

		$criteria->addSelectColumn(DetallecursadaPeer::FK_CURSADA_ID);

		$criteria->addSelectColumn(DetallecursadaPeer::FK_ACTIVIDAD_ID);

		$criteria->addSelectColumn(DetallecursadaPeer::FK_ALUMNO_ID);

		$criteria->addSelectColumn(DetallecursadaPeer::FK_DCURSADA_ID);

		$criteria->addSelectColumn(DetallecursadaPeer::FECHA);

		$criteria->addSelectColumn(DetallecursadaPeer::ORDEN);

		$criteria->addSelectColumn(DetallecursadaPeer::RESULT);

		$criteria->addSelectColumn(DetallecursadaPeer::LIBRO);

		$criteria->addSelectColumn(DetallecursadaPeer::FOLIO);

		$criteria->addSelectColumn(DetallecursadaPeer::ESTADO);

	}

	
	public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(DetallecursadaPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			DetallecursadaPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 		$criteria->setDbName(self::DATABASE_NAME); 
		if ($con === null) {
			$con = Propel::getConnection(DetallecursadaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
		$objects = DetallecursadaPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, PropelPDO $con = null)
	{
		return DetallecursadaPeer::populateObjects(DetallecursadaPeer::doSelectStmt($criteria, $con));
	}
	
	public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(DetallecursadaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			DetallecursadaPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

				return BasePeer::doSelect($criteria, $con);
	}
	
	public static function addInstanceToPool(Detallecursada $obj, $key = null)
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
			if (is_object($value) && $value instanceof Detallecursada) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
								$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Detallecursada object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
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
	
				$cls = DetallecursadaPeer::getOMClass();
		$cls = substr('.'.$cls, strrpos('.'.$cls, '.') + 1);
				while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = DetallecursadaPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = DetallecursadaPeer::getInstanceFromPool($key))) {
																$results[] = $obj;
			} else {
		
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				DetallecursadaPeer::addInstanceToPool($obj, $key);
			} 		}
		$stmt->closeCursor();
		return $results;
	}

	
	public static function doCountJoinCursada(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(DetallecursadaPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			DetallecursadaPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(DetallecursadaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(DetallecursadaPeer::FK_CURSADA_ID,), array(CursadaPeer::ID,), $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinActividad(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(DetallecursadaPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			DetallecursadaPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(DetallecursadaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(DetallecursadaPeer::FK_ACTIVIDAD_ID,), array(ActividadPeer::ID,), $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinAlumno(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(DetallecursadaPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			DetallecursadaPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(DetallecursadaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(DetallecursadaPeer::FK_ALUMNO_ID,), array(AlumnoPeer::ID,), $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinEstadomate(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(DetallecursadaPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			DetallecursadaPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(DetallecursadaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(DetallecursadaPeer::FK_DCURSADA_ID,), array(EstadomatePeer::ID,), $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doSelectJoinCursada(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		DetallecursadaPeer::addSelectColumns($c);
		$startcol = (DetallecursadaPeer::NUM_COLUMNS - DetallecursadaPeer::NUM_LAZY_LOAD_COLUMNS);
		CursadaPeer::addSelectColumns($c);

		$c->addJoin(array(DetallecursadaPeer::FK_CURSADA_ID,), array(CursadaPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = DetallecursadaPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = DetallecursadaPeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = DetallecursadaPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				DetallecursadaPeer::addInstanceToPool($obj1, $key1);
			} 
			$key2 = CursadaPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = CursadaPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = CursadaPeer::getOMClass();

					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					CursadaPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addDetallecursada($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinActividad(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		DetallecursadaPeer::addSelectColumns($c);
		$startcol = (DetallecursadaPeer::NUM_COLUMNS - DetallecursadaPeer::NUM_LAZY_LOAD_COLUMNS);
		ActividadPeer::addSelectColumns($c);

		$c->addJoin(array(DetallecursadaPeer::FK_ACTIVIDAD_ID,), array(ActividadPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = DetallecursadaPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = DetallecursadaPeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = DetallecursadaPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				DetallecursadaPeer::addInstanceToPool($obj1, $key1);
			} 
			$key2 = ActividadPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = ActividadPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = ActividadPeer::getOMClass();

					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					ActividadPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addDetallecursada($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinAlumno(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		DetallecursadaPeer::addSelectColumns($c);
		$startcol = (DetallecursadaPeer::NUM_COLUMNS - DetallecursadaPeer::NUM_LAZY_LOAD_COLUMNS);
		AlumnoPeer::addSelectColumns($c);

		$c->addJoin(array(DetallecursadaPeer::FK_ALUMNO_ID,), array(AlumnoPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = DetallecursadaPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = DetallecursadaPeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = DetallecursadaPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				DetallecursadaPeer::addInstanceToPool($obj1, $key1);
			} 
			$key2 = AlumnoPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = AlumnoPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = AlumnoPeer::getOMClass();

					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					AlumnoPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addDetallecursada($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinEstadomate(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		DetallecursadaPeer::addSelectColumns($c);
		$startcol = (DetallecursadaPeer::NUM_COLUMNS - DetallecursadaPeer::NUM_LAZY_LOAD_COLUMNS);
		EstadomatePeer::addSelectColumns($c);

		$c->addJoin(array(DetallecursadaPeer::FK_DCURSADA_ID,), array(EstadomatePeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = DetallecursadaPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = DetallecursadaPeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = DetallecursadaPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				DetallecursadaPeer::addInstanceToPool($obj1, $key1);
			} 
			$key2 = EstadomatePeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = EstadomatePeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = EstadomatePeer::getOMClass();

					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					EstadomatePeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addDetallecursada($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(DetallecursadaPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			DetallecursadaPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(DetallecursadaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(DetallecursadaPeer::FK_CURSADA_ID,), array(CursadaPeer::ID,), $join_behavior);
		$criteria->addJoin(array(DetallecursadaPeer::FK_ACTIVIDAD_ID,), array(ActividadPeer::ID,), $join_behavior);
		$criteria->addJoin(array(DetallecursadaPeer::FK_ALUMNO_ID,), array(AlumnoPeer::ID,), $join_behavior);
		$criteria->addJoin(array(DetallecursadaPeer::FK_DCURSADA_ID,), array(EstadomatePeer::ID,), $join_behavior);
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

		DetallecursadaPeer::addSelectColumns($c);
		$startcol2 = (DetallecursadaPeer::NUM_COLUMNS - DetallecursadaPeer::NUM_LAZY_LOAD_COLUMNS);

		CursadaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (CursadaPeer::NUM_COLUMNS - CursadaPeer::NUM_LAZY_LOAD_COLUMNS);

		ActividadPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (ActividadPeer::NUM_COLUMNS - ActividadPeer::NUM_LAZY_LOAD_COLUMNS);

		AlumnoPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + (AlumnoPeer::NUM_COLUMNS - AlumnoPeer::NUM_LAZY_LOAD_COLUMNS);

		EstadomatePeer::addSelectColumns($c);
		$startcol6 = $startcol5 + (EstadomatePeer::NUM_COLUMNS - EstadomatePeer::NUM_LAZY_LOAD_COLUMNS);

		$c->addJoin(array(DetallecursadaPeer::FK_CURSADA_ID,), array(CursadaPeer::ID,), $join_behavior);
		$c->addJoin(array(DetallecursadaPeer::FK_ACTIVIDAD_ID,), array(ActividadPeer::ID,), $join_behavior);
		$c->addJoin(array(DetallecursadaPeer::FK_ALUMNO_ID,), array(AlumnoPeer::ID,), $join_behavior);
		$c->addJoin(array(DetallecursadaPeer::FK_DCURSADA_ID,), array(EstadomatePeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = DetallecursadaPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = DetallecursadaPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = DetallecursadaPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				DetallecursadaPeer::addInstanceToPool($obj1, $key1);
			} 
			
			$key2 = CursadaPeer::getPrimaryKeyHashFromRow($row, $startcol2);
			if ($key2 !== null) {
				$obj2 = CursadaPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = CursadaPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					CursadaPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addDetallecursada($obj1);
			} 
			
			$key3 = ActividadPeer::getPrimaryKeyHashFromRow($row, $startcol3);
			if ($key3 !== null) {
				$obj3 = ActividadPeer::getInstanceFromPool($key3);
				if (!$obj3) {

					$omClass = ActividadPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					ActividadPeer::addInstanceToPool($obj3, $key3);
				} 
								$obj3->addDetallecursada($obj1);
			} 
			
			$key4 = AlumnoPeer::getPrimaryKeyHashFromRow($row, $startcol4);
			if ($key4 !== null) {
				$obj4 = AlumnoPeer::getInstanceFromPool($key4);
				if (!$obj4) {

					$omClass = AlumnoPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					AlumnoPeer::addInstanceToPool($obj4, $key4);
				} 
								$obj4->addDetallecursada($obj1);
			} 
			
			$key5 = EstadomatePeer::getPrimaryKeyHashFromRow($row, $startcol5);
			if ($key5 !== null) {
				$obj5 = EstadomatePeer::getInstanceFromPool($key5);
				if (!$obj5) {

					$omClass = EstadomatePeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					EstadomatePeer::addInstanceToPool($obj5, $key5);
				} 
								$obj5->addDetallecursada($obj1);
			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doCountJoinAllExceptCursada(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			DetallecursadaPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(DetallecursadaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(DetallecursadaPeer::FK_ACTIVIDAD_ID,), array(ActividadPeer::ID,), $join_behavior);
				$criteria->addJoin(array(DetallecursadaPeer::FK_ALUMNO_ID,), array(AlumnoPeer::ID,), $join_behavior);
				$criteria->addJoin(array(DetallecursadaPeer::FK_DCURSADA_ID,), array(EstadomatePeer::ID,), $join_behavior);
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinAllExceptActividad(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			DetallecursadaPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(DetallecursadaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(DetallecursadaPeer::FK_CURSADA_ID,), array(CursadaPeer::ID,), $join_behavior);
				$criteria->addJoin(array(DetallecursadaPeer::FK_ALUMNO_ID,), array(AlumnoPeer::ID,), $join_behavior);
				$criteria->addJoin(array(DetallecursadaPeer::FK_DCURSADA_ID,), array(EstadomatePeer::ID,), $join_behavior);
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinAllExceptAlumno(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			DetallecursadaPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(DetallecursadaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(DetallecursadaPeer::FK_CURSADA_ID,), array(CursadaPeer::ID,), $join_behavior);
				$criteria->addJoin(array(DetallecursadaPeer::FK_ACTIVIDAD_ID,), array(ActividadPeer::ID,), $join_behavior);
				$criteria->addJoin(array(DetallecursadaPeer::FK_DCURSADA_ID,), array(EstadomatePeer::ID,), $join_behavior);
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinAllExceptEstadomate(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			DetallecursadaPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(DetallecursadaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(DetallecursadaPeer::FK_CURSADA_ID,), array(CursadaPeer::ID,), $join_behavior);
				$criteria->addJoin(array(DetallecursadaPeer::FK_ACTIVIDAD_ID,), array(ActividadPeer::ID,), $join_behavior);
				$criteria->addJoin(array(DetallecursadaPeer::FK_ALUMNO_ID,), array(AlumnoPeer::ID,), $join_behavior);
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doSelectJoinAllExceptCursada(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		DetallecursadaPeer::addSelectColumns($c);
		$startcol2 = (DetallecursadaPeer::NUM_COLUMNS - DetallecursadaPeer::NUM_LAZY_LOAD_COLUMNS);

		ActividadPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (ActividadPeer::NUM_COLUMNS - ActividadPeer::NUM_LAZY_LOAD_COLUMNS);

		AlumnoPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (AlumnoPeer::NUM_COLUMNS - AlumnoPeer::NUM_LAZY_LOAD_COLUMNS);

		EstadomatePeer::addSelectColumns($c);
		$startcol5 = $startcol4 + (EstadomatePeer::NUM_COLUMNS - EstadomatePeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(DetallecursadaPeer::FK_ACTIVIDAD_ID,), array(ActividadPeer::ID,), $join_behavior);
				$c->addJoin(array(DetallecursadaPeer::FK_ALUMNO_ID,), array(AlumnoPeer::ID,), $join_behavior);
				$c->addJoin(array(DetallecursadaPeer::FK_DCURSADA_ID,), array(EstadomatePeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = DetallecursadaPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = DetallecursadaPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = DetallecursadaPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				DetallecursadaPeer::addInstanceToPool($obj1, $key1);
			} 
				
				$key2 = ActividadPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = ActividadPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$omClass = ActividadPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					ActividadPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addDetallecursada($obj1);

			} 
				
				$key3 = AlumnoPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = AlumnoPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$omClass = AlumnoPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					AlumnoPeer::addInstanceToPool($obj3, $key3);
				} 
								$obj3->addDetallecursada($obj1);

			} 
				
				$key4 = EstadomatePeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = EstadomatePeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$omClass = EstadomatePeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					EstadomatePeer::addInstanceToPool($obj4, $key4);
				} 
								$obj4->addDetallecursada($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinAllExceptActividad(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		DetallecursadaPeer::addSelectColumns($c);
		$startcol2 = (DetallecursadaPeer::NUM_COLUMNS - DetallecursadaPeer::NUM_LAZY_LOAD_COLUMNS);

		CursadaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (CursadaPeer::NUM_COLUMNS - CursadaPeer::NUM_LAZY_LOAD_COLUMNS);

		AlumnoPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (AlumnoPeer::NUM_COLUMNS - AlumnoPeer::NUM_LAZY_LOAD_COLUMNS);

		EstadomatePeer::addSelectColumns($c);
		$startcol5 = $startcol4 + (EstadomatePeer::NUM_COLUMNS - EstadomatePeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(DetallecursadaPeer::FK_CURSADA_ID,), array(CursadaPeer::ID,), $join_behavior);
				$c->addJoin(array(DetallecursadaPeer::FK_ALUMNO_ID,), array(AlumnoPeer::ID,), $join_behavior);
				$c->addJoin(array(DetallecursadaPeer::FK_DCURSADA_ID,), array(EstadomatePeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = DetallecursadaPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = DetallecursadaPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = DetallecursadaPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				DetallecursadaPeer::addInstanceToPool($obj1, $key1);
			} 
				
				$key2 = CursadaPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = CursadaPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$omClass = CursadaPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					CursadaPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addDetallecursada($obj1);

			} 
				
				$key3 = AlumnoPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = AlumnoPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$omClass = AlumnoPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					AlumnoPeer::addInstanceToPool($obj3, $key3);
				} 
								$obj3->addDetallecursada($obj1);

			} 
				
				$key4 = EstadomatePeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = EstadomatePeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$omClass = EstadomatePeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					EstadomatePeer::addInstanceToPool($obj4, $key4);
				} 
								$obj4->addDetallecursada($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinAllExceptAlumno(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		DetallecursadaPeer::addSelectColumns($c);
		$startcol2 = (DetallecursadaPeer::NUM_COLUMNS - DetallecursadaPeer::NUM_LAZY_LOAD_COLUMNS);

		CursadaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (CursadaPeer::NUM_COLUMNS - CursadaPeer::NUM_LAZY_LOAD_COLUMNS);

		ActividadPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (ActividadPeer::NUM_COLUMNS - ActividadPeer::NUM_LAZY_LOAD_COLUMNS);

		EstadomatePeer::addSelectColumns($c);
		$startcol5 = $startcol4 + (EstadomatePeer::NUM_COLUMNS - EstadomatePeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(DetallecursadaPeer::FK_CURSADA_ID,), array(CursadaPeer::ID,), $join_behavior);
				$c->addJoin(array(DetallecursadaPeer::FK_ACTIVIDAD_ID,), array(ActividadPeer::ID,), $join_behavior);
				$c->addJoin(array(DetallecursadaPeer::FK_DCURSADA_ID,), array(EstadomatePeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = DetallecursadaPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = DetallecursadaPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = DetallecursadaPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				DetallecursadaPeer::addInstanceToPool($obj1, $key1);
			} 
				
				$key2 = CursadaPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = CursadaPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$omClass = CursadaPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					CursadaPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addDetallecursada($obj1);

			} 
				
				$key3 = ActividadPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = ActividadPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$omClass = ActividadPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					ActividadPeer::addInstanceToPool($obj3, $key3);
				} 
								$obj3->addDetallecursada($obj1);

			} 
				
				$key4 = EstadomatePeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = EstadomatePeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$omClass = EstadomatePeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					EstadomatePeer::addInstanceToPool($obj4, $key4);
				} 
								$obj4->addDetallecursada($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinAllExceptEstadomate(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		DetallecursadaPeer::addSelectColumns($c);
		$startcol2 = (DetallecursadaPeer::NUM_COLUMNS - DetallecursadaPeer::NUM_LAZY_LOAD_COLUMNS);

		CursadaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (CursadaPeer::NUM_COLUMNS - CursadaPeer::NUM_LAZY_LOAD_COLUMNS);

		ActividadPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (ActividadPeer::NUM_COLUMNS - ActividadPeer::NUM_LAZY_LOAD_COLUMNS);

		AlumnoPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + (AlumnoPeer::NUM_COLUMNS - AlumnoPeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(DetallecursadaPeer::FK_CURSADA_ID,), array(CursadaPeer::ID,), $join_behavior);
				$c->addJoin(array(DetallecursadaPeer::FK_ACTIVIDAD_ID,), array(ActividadPeer::ID,), $join_behavior);
				$c->addJoin(array(DetallecursadaPeer::FK_ALUMNO_ID,), array(AlumnoPeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = DetallecursadaPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = DetallecursadaPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = DetallecursadaPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				DetallecursadaPeer::addInstanceToPool($obj1, $key1);
			} 
				
				$key2 = CursadaPeer::getPrimaryKeyHashFromRow($row, $startcol2);
				if ($key2 !== null) {
					$obj2 = CursadaPeer::getInstanceFromPool($key2);
					if (!$obj2) {
	
						$omClass = CursadaPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol2);
					CursadaPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addDetallecursada($obj1);

			} 
				
				$key3 = ActividadPeer::getPrimaryKeyHashFromRow($row, $startcol3);
				if ($key3 !== null) {
					$obj3 = ActividadPeer::getInstanceFromPool($key3);
					if (!$obj3) {
	
						$omClass = ActividadPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj3 = new $cls();
					$obj3->hydrate($row, $startcol3);
					ActividadPeer::addInstanceToPool($obj3, $key3);
				} 
								$obj3->addDetallecursada($obj1);

			} 
				
				$key4 = AlumnoPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = AlumnoPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$omClass = AlumnoPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					AlumnoPeer::addInstanceToPool($obj4, $key4);
				} 
								$obj4->addDetallecursada($obj1);

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
		return DetallecursadaPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(DetallecursadaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		if ($criteria->containsKey(DetallecursadaPeer::ID) && $criteria->keyContainsValue(DetallecursadaPeer::ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.DetallecursadaPeer::ID.')');
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
			$con = Propel::getConnection(DetallecursadaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
			$comparison = $criteria->getComparison(DetallecursadaPeer::ID);
			$selectCriteria->add(DetallecursadaPeer::ID, $criteria->remove(DetallecursadaPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(DetallecursadaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; 		try {
									$con->beginTransaction();
			$affectedRows += BasePeer::doDeleteAll(DetallecursadaPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(DetallecursadaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
												DetallecursadaPeer::clearInstancePool();

						$criteria = clone $values;
		} elseif ($values instanceof Detallecursada) {
						DetallecursadaPeer::removeInstanceFromPool($values);
						$criteria = $values->buildPkeyCriteria();
		} else {
			


			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(DetallecursadaPeer::ID, (array) $values, Criteria::IN);

			foreach ((array) $values as $singleval) {
								DetallecursadaPeer::removeInstanceFromPool($singleval);
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

	
	public static function doValidate(Detallecursada $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(DetallecursadaPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(DetallecursadaPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(DetallecursadaPeer::DATABASE_NAME, DetallecursadaPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = DetallecursadaPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
        }
    }

    return $res;
	}

	
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = DetallecursadaPeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(DetallecursadaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(DetallecursadaPeer::DATABASE_NAME);
		$criteria->add(DetallecursadaPeer::ID, $pk);

		$v = DetallecursadaPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	
	public static function retrieveByPKs($pks, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(DetallecursadaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(DetallecursadaPeer::DATABASE_NAME);
			$criteria->add(DetallecursadaPeer::ID, $pks, Criteria::IN);
			$objs = DetallecursadaPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 

Propel::getDatabaseMap(BaseDetallecursadaPeer::DATABASE_NAME)->addTableBuilder(BaseDetallecursadaPeer::TABLE_NAME, BaseDetallecursadaPeer::getMapBuilder());

