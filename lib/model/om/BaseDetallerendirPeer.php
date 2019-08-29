<?php


abstract class BaseDetallerendirPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'detallerendir';

	
	const CLASS_DEFAULT = 'lib.model.Detallerendir';

	
	const NUM_COLUMNS = 12;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;

	
	const ID = 'detallerendir.ID';

	
	const FK_CURSADA_ID = 'detallerendir.FK_CURSADA_ID';

	
	const FK_ACTIVIDAD_ID = 'detallerendir.FK_ACTIVIDAD_ID';

	
	const FK_ALUMNO_ID = 'detallerendir.FK_ALUMNO_ID';

	
	const FK_DCURSADA_ID = 'detallerendir.FK_DCURSADA_ID';

	
	const ORDEN = 'detallerendir.ORDEN';

	
	const RESULT = 'detallerendir.RESULT';

	
	const ESTADO = 'detallerendir.ESTADO';

	
	const LIBRO = 'detallerendir.LIBRO';

	
	const FOLIO = 'detallerendir.FOLIO';

	
	const FECHA = 'detallerendir.FECHA';

	
	const FK_LLAMADA_ID = 'detallerendir.FK_LLAMADA_ID';

	
	public static $instances = array();

	
	private static $mapBuilder = null;

	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'FkCursadaId', 'FkActividadId', 'FkAlumnoId', 'FkDcursadaId', 'Orden', 'Result', 'Estado', 'Libro', 'Folio', 'Fecha', 'FkLlamadaId', ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id', 'fkCursadaId', 'fkActividadId', 'fkAlumnoId', 'fkDcursadaId', 'orden', 'result', 'estado', 'libro', 'folio', 'fecha', 'fkLlamadaId', ),
		BasePeer::TYPE_COLNAME => array (self::ID, self::FK_CURSADA_ID, self::FK_ACTIVIDAD_ID, self::FK_ALUMNO_ID, self::FK_DCURSADA_ID, self::ORDEN, self::RESULT, self::ESTADO, self::LIBRO, self::FOLIO, self::FECHA, self::FK_LLAMADA_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'fk_cursada_id', 'fk_actividad_id', 'fk_alumno_id', 'fk_dcursada_id', 'orden', 'result', 'estado', 'libro', 'folio', 'fecha', 'fk_llamada_id', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'FkCursadaId' => 1, 'FkActividadId' => 2, 'FkAlumnoId' => 3, 'FkDcursadaId' => 4, 'Orden' => 5, 'Result' => 6, 'Estado' => 7, 'Libro' => 8, 'Folio' => 9, 'Fecha' => 10, 'FkLlamadaId' => 11, ),
		BasePeer::TYPE_STUDLYPHPNAME => array ('id' => 0, 'fkCursadaId' => 1, 'fkActividadId' => 2, 'fkAlumnoId' => 3, 'fkDcursadaId' => 4, 'orden' => 5, 'result' => 6, 'estado' => 7, 'libro' => 8, 'folio' => 9, 'fecha' => 10, 'fkLlamadaId' => 11, ),
		BasePeer::TYPE_COLNAME => array (self::ID => 0, self::FK_CURSADA_ID => 1, self::FK_ACTIVIDAD_ID => 2, self::FK_ALUMNO_ID => 3, self::FK_DCURSADA_ID => 4, self::ORDEN => 5, self::RESULT => 6, self::ESTADO => 7, self::LIBRO => 8, self::FOLIO => 9, self::FECHA => 10, self::FK_LLAMADA_ID => 11, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'fk_cursada_id' => 1, 'fk_actividad_id' => 2, 'fk_alumno_id' => 3, 'fk_dcursada_id' => 4, 'orden' => 5, 'result' => 6, 'estado' => 7, 'libro' => 8, 'folio' => 9, 'fecha' => 10, 'fk_llamada_id' => 11, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	public static function getMapBuilder()
	{
		if (self::$mapBuilder === null) {
			self::$mapBuilder = new DetallerendirMapBuilder();
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
		return str_replace(DetallerendirPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(DetallerendirPeer::ID);

		$criteria->addSelectColumn(DetallerendirPeer::FK_CURSADA_ID);

		$criteria->addSelectColumn(DetallerendirPeer::FK_ACTIVIDAD_ID);

		$criteria->addSelectColumn(DetallerendirPeer::FK_ALUMNO_ID);

		$criteria->addSelectColumn(DetallerendirPeer::FK_DCURSADA_ID);

		$criteria->addSelectColumn(DetallerendirPeer::ORDEN);

		$criteria->addSelectColumn(DetallerendirPeer::RESULT);

		$criteria->addSelectColumn(DetallerendirPeer::ESTADO);

		$criteria->addSelectColumn(DetallerendirPeer::LIBRO);

		$criteria->addSelectColumn(DetallerendirPeer::FOLIO);

		$criteria->addSelectColumn(DetallerendirPeer::FECHA);

		$criteria->addSelectColumn(DetallerendirPeer::FK_LLAMADA_ID);

	}

	
	public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(DetallerendirPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			DetallerendirPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 		$criteria->setDbName(self::DATABASE_NAME); 
		if ($con === null) {
			$con = Propel::getConnection(DetallerendirPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
		$objects = DetallerendirPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, PropelPDO $con = null)
	{
		return DetallerendirPeer::populateObjects(DetallerendirPeer::doSelectStmt($criteria, $con));
	}
	
	public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(DetallerendirPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		if (!$criteria->hasSelectClause()) {
			$criteria = clone $criteria;
			DetallerendirPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

				return BasePeer::doSelect($criteria, $con);
	}
	
	public static function addInstanceToPool(Detallerendir $obj, $key = null)
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
			if (is_object($value) && $value instanceof Detallerendir) {
				$key = (string) $value->getId();
			} elseif (is_scalar($value)) {
								$key = (string) $value;
			} else {
				$e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Detallerendir object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
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
	
				$cls = DetallerendirPeer::getOMClass();
		$cls = substr('.'.$cls, strrpos('.'.$cls, '.') + 1);
				while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key = DetallerendirPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj = DetallerendirPeer::getInstanceFromPool($key))) {
																$results[] = $obj;
			} else {
		
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				DetallerendirPeer::addInstanceToPool($obj, $key);
			} 		}
		$stmt->closeCursor();
		return $results;
	}

	
	public static function doCountJoinCursada(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(DetallerendirPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			DetallerendirPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(DetallerendirPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(DetallerendirPeer::FK_CURSADA_ID,), array(CursadaPeer::ID,), $join_behavior);

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

								$criteria->setPrimaryTableName(DetallerendirPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			DetallerendirPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(DetallerendirPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(DetallerendirPeer::FK_ACTIVIDAD_ID,), array(ActividadPeer::ID,), $join_behavior);

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

								$criteria->setPrimaryTableName(DetallerendirPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			DetallerendirPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(DetallerendirPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(DetallerendirPeer::FK_ALUMNO_ID,), array(AlumnoPeer::ID,), $join_behavior);

		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinEstadomateren(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(DetallerendirPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			DetallerendirPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(DetallerendirPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(DetallerendirPeer::FK_DCURSADA_ID,), array(EstadomaterenPeer::ID,), $join_behavior);

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

								$criteria->setPrimaryTableName(DetallerendirPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			DetallerendirPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(DetallerendirPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(DetallerendirPeer::FK_LLAMADA_ID,), array(LlamadosPeer::ID,), $join_behavior);

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

		DetallerendirPeer::addSelectColumns($c);
		$startcol = (DetallerendirPeer::NUM_COLUMNS - DetallerendirPeer::NUM_LAZY_LOAD_COLUMNS);
		CursadaPeer::addSelectColumns($c);

		$c->addJoin(array(DetallerendirPeer::FK_CURSADA_ID,), array(CursadaPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = DetallerendirPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = DetallerendirPeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = DetallerendirPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				DetallerendirPeer::addInstanceToPool($obj1, $key1);
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
								$obj2->addDetallerendir($obj1);

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

		DetallerendirPeer::addSelectColumns($c);
		$startcol = (DetallerendirPeer::NUM_COLUMNS - DetallerendirPeer::NUM_LAZY_LOAD_COLUMNS);
		ActividadPeer::addSelectColumns($c);

		$c->addJoin(array(DetallerendirPeer::FK_ACTIVIDAD_ID,), array(ActividadPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = DetallerendirPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = DetallerendirPeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = DetallerendirPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				DetallerendirPeer::addInstanceToPool($obj1, $key1);
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
								$obj2->addDetallerendir($obj1);

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

		DetallerendirPeer::addSelectColumns($c);
		$startcol = (DetallerendirPeer::NUM_COLUMNS - DetallerendirPeer::NUM_LAZY_LOAD_COLUMNS);
		AlumnoPeer::addSelectColumns($c);

		$c->addJoin(array(DetallerendirPeer::FK_ALUMNO_ID,), array(AlumnoPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = DetallerendirPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = DetallerendirPeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = DetallerendirPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				DetallerendirPeer::addInstanceToPool($obj1, $key1);
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
								$obj2->addDetallerendir($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinEstadomateren(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		DetallerendirPeer::addSelectColumns($c);
		$startcol = (DetallerendirPeer::NUM_COLUMNS - DetallerendirPeer::NUM_LAZY_LOAD_COLUMNS);
		EstadomaterenPeer::addSelectColumns($c);

		$c->addJoin(array(DetallerendirPeer::FK_DCURSADA_ID,), array(EstadomaterenPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = DetallerendirPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = DetallerendirPeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = DetallerendirPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				DetallerendirPeer::addInstanceToPool($obj1, $key1);
			} 
			$key2 = EstadomaterenPeer::getPrimaryKeyHashFromRow($row, $startcol);
			if ($key2 !== null) {
				$obj2 = EstadomaterenPeer::getInstanceFromPool($key2);
				if (!$obj2) {

					$omClass = EstadomaterenPeer::getOMClass();

					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj2 = new $cls();
					$obj2->hydrate($row, $startcol);
					EstadomaterenPeer::addInstanceToPool($obj2, $key2);
				} 
								$obj2->addDetallerendir($obj1);

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

		DetallerendirPeer::addSelectColumns($c);
		$startcol = (DetallerendirPeer::NUM_COLUMNS - DetallerendirPeer::NUM_LAZY_LOAD_COLUMNS);
		LlamadosPeer::addSelectColumns($c);

		$c->addJoin(array(DetallerendirPeer::FK_LLAMADA_ID,), array(LlamadosPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = DetallerendirPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = DetallerendirPeer::getInstanceFromPool($key1))) {
															} else {

				$omClass = DetallerendirPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				DetallerendirPeer::addInstanceToPool($obj1, $key1);
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
								$obj2->addDetallerendir($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

								$criteria->setPrimaryTableName(DetallerendirPeer::TABLE_NAME);

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			DetallerendirPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(DetallerendirPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria->addJoin(array(DetallerendirPeer::FK_CURSADA_ID,), array(CursadaPeer::ID,), $join_behavior);
		$criteria->addJoin(array(DetallerendirPeer::FK_ACTIVIDAD_ID,), array(ActividadPeer::ID,), $join_behavior);
		$criteria->addJoin(array(DetallerendirPeer::FK_ALUMNO_ID,), array(AlumnoPeer::ID,), $join_behavior);
		$criteria->addJoin(array(DetallerendirPeer::FK_DCURSADA_ID,), array(EstadomaterenPeer::ID,), $join_behavior);
		$criteria->addJoin(array(DetallerendirPeer::FK_LLAMADA_ID,), array(LlamadosPeer::ID,), $join_behavior);
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

		DetallerendirPeer::addSelectColumns($c);
		$startcol2 = (DetallerendirPeer::NUM_COLUMNS - DetallerendirPeer::NUM_LAZY_LOAD_COLUMNS);

		CursadaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (CursadaPeer::NUM_COLUMNS - CursadaPeer::NUM_LAZY_LOAD_COLUMNS);

		ActividadPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (ActividadPeer::NUM_COLUMNS - ActividadPeer::NUM_LAZY_LOAD_COLUMNS);

		AlumnoPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + (AlumnoPeer::NUM_COLUMNS - AlumnoPeer::NUM_LAZY_LOAD_COLUMNS);

		EstadomaterenPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + (EstadomaterenPeer::NUM_COLUMNS - EstadomaterenPeer::NUM_LAZY_LOAD_COLUMNS);

		LlamadosPeer::addSelectColumns($c);
		$startcol7 = $startcol6 + (LlamadosPeer::NUM_COLUMNS - LlamadosPeer::NUM_LAZY_LOAD_COLUMNS);

		$c->addJoin(array(DetallerendirPeer::FK_CURSADA_ID,), array(CursadaPeer::ID,), $join_behavior);
		$c->addJoin(array(DetallerendirPeer::FK_ACTIVIDAD_ID,), array(ActividadPeer::ID,), $join_behavior);
		$c->addJoin(array(DetallerendirPeer::FK_ALUMNO_ID,), array(AlumnoPeer::ID,), $join_behavior);
		$c->addJoin(array(DetallerendirPeer::FK_DCURSADA_ID,), array(EstadomaterenPeer::ID,), $join_behavior);
		$c->addJoin(array(DetallerendirPeer::FK_LLAMADA_ID,), array(LlamadosPeer::ID,), $join_behavior);
		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = DetallerendirPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = DetallerendirPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = DetallerendirPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				DetallerendirPeer::addInstanceToPool($obj1, $key1);
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
								$obj2->addDetallerendir($obj1);
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
								$obj3->addDetallerendir($obj1);
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
								$obj4->addDetallerendir($obj1);
			} 
			
			$key5 = EstadomaterenPeer::getPrimaryKeyHashFromRow($row, $startcol5);
			if ($key5 !== null) {
				$obj5 = EstadomaterenPeer::getInstanceFromPool($key5);
				if (!$obj5) {

					$omClass = EstadomaterenPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					EstadomaterenPeer::addInstanceToPool($obj5, $key5);
				} 
								$obj5->addDetallerendir($obj1);
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
								$obj6->addDetallerendir($obj1);
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
			DetallerendirPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(DetallerendirPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(DetallerendirPeer::FK_ACTIVIDAD_ID,), array(ActividadPeer::ID,), $join_behavior);
				$criteria->addJoin(array(DetallerendirPeer::FK_ALUMNO_ID,), array(AlumnoPeer::ID,), $join_behavior);
				$criteria->addJoin(array(DetallerendirPeer::FK_DCURSADA_ID,), array(EstadomaterenPeer::ID,), $join_behavior);
				$criteria->addJoin(array(DetallerendirPeer::FK_LLAMADA_ID,), array(LlamadosPeer::ID,), $join_behavior);
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
			DetallerendirPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(DetallerendirPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(DetallerendirPeer::FK_CURSADA_ID,), array(CursadaPeer::ID,), $join_behavior);
				$criteria->addJoin(array(DetallerendirPeer::FK_ALUMNO_ID,), array(AlumnoPeer::ID,), $join_behavior);
				$criteria->addJoin(array(DetallerendirPeer::FK_DCURSADA_ID,), array(EstadomaterenPeer::ID,), $join_behavior);
				$criteria->addJoin(array(DetallerendirPeer::FK_LLAMADA_ID,), array(LlamadosPeer::ID,), $join_behavior);
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
			DetallerendirPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(DetallerendirPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(DetallerendirPeer::FK_CURSADA_ID,), array(CursadaPeer::ID,), $join_behavior);
				$criteria->addJoin(array(DetallerendirPeer::FK_ACTIVIDAD_ID,), array(ActividadPeer::ID,), $join_behavior);
				$criteria->addJoin(array(DetallerendirPeer::FK_DCURSADA_ID,), array(EstadomaterenPeer::ID,), $join_behavior);
				$criteria->addJoin(array(DetallerendirPeer::FK_LLAMADA_ID,), array(LlamadosPeer::ID,), $join_behavior);
		$stmt = BasePeer::doCount($criteria, $con);

		if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$count = (int) $row[0];
		} else {
			$count = 0; 		}
		$stmt->closeCursor();
		return $count;
	}


	
	public static function doCountJoinAllExceptEstadomateren(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
				$criteria = clone $criteria;

		if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->setDistinct();
		}

		if (!$criteria->hasSelectClause()) {
			DetallerendirPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(DetallerendirPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(DetallerendirPeer::FK_CURSADA_ID,), array(CursadaPeer::ID,), $join_behavior);
				$criteria->addJoin(array(DetallerendirPeer::FK_ACTIVIDAD_ID,), array(ActividadPeer::ID,), $join_behavior);
				$criteria->addJoin(array(DetallerendirPeer::FK_ALUMNO_ID,), array(AlumnoPeer::ID,), $join_behavior);
				$criteria->addJoin(array(DetallerendirPeer::FK_LLAMADA_ID,), array(LlamadosPeer::ID,), $join_behavior);
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
			DetallerendirPeer::addSelectColumns($criteria);
		}

		$criteria->clearOrderByColumns(); 
				$criteria->setDbName(self::DATABASE_NAME);

		if ($con === null) {
			$con = Propel::getConnection(DetallerendirPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}
	
				$criteria->addJoin(array(DetallerendirPeer::FK_CURSADA_ID,), array(CursadaPeer::ID,), $join_behavior);
				$criteria->addJoin(array(DetallerendirPeer::FK_ACTIVIDAD_ID,), array(ActividadPeer::ID,), $join_behavior);
				$criteria->addJoin(array(DetallerendirPeer::FK_ALUMNO_ID,), array(AlumnoPeer::ID,), $join_behavior);
				$criteria->addJoin(array(DetallerendirPeer::FK_DCURSADA_ID,), array(EstadomaterenPeer::ID,), $join_behavior);
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

		DetallerendirPeer::addSelectColumns($c);
		$startcol2 = (DetallerendirPeer::NUM_COLUMNS - DetallerendirPeer::NUM_LAZY_LOAD_COLUMNS);

		ActividadPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (ActividadPeer::NUM_COLUMNS - ActividadPeer::NUM_LAZY_LOAD_COLUMNS);

		AlumnoPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (AlumnoPeer::NUM_COLUMNS - AlumnoPeer::NUM_LAZY_LOAD_COLUMNS);

		EstadomaterenPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + (EstadomaterenPeer::NUM_COLUMNS - EstadomaterenPeer::NUM_LAZY_LOAD_COLUMNS);

		LlamadosPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + (LlamadosPeer::NUM_COLUMNS - LlamadosPeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(DetallerendirPeer::FK_ACTIVIDAD_ID,), array(ActividadPeer::ID,), $join_behavior);
				$c->addJoin(array(DetallerendirPeer::FK_ALUMNO_ID,), array(AlumnoPeer::ID,), $join_behavior);
				$c->addJoin(array(DetallerendirPeer::FK_DCURSADA_ID,), array(EstadomaterenPeer::ID,), $join_behavior);
				$c->addJoin(array(DetallerendirPeer::FK_LLAMADA_ID,), array(LlamadosPeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = DetallerendirPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = DetallerendirPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = DetallerendirPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				DetallerendirPeer::addInstanceToPool($obj1, $key1);
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
								$obj2->addDetallerendir($obj1);

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
								$obj3->addDetallerendir($obj1);

			} 
				
				$key4 = EstadomaterenPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = EstadomaterenPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$omClass = EstadomaterenPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					EstadomaterenPeer::addInstanceToPool($obj4, $key4);
				} 
								$obj4->addDetallerendir($obj1);

			} 
				
				$key5 = LlamadosPeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = LlamadosPeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$omClass = LlamadosPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					LlamadosPeer::addInstanceToPool($obj5, $key5);
				} 
								$obj5->addDetallerendir($obj1);

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

		DetallerendirPeer::addSelectColumns($c);
		$startcol2 = (DetallerendirPeer::NUM_COLUMNS - DetallerendirPeer::NUM_LAZY_LOAD_COLUMNS);

		CursadaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (CursadaPeer::NUM_COLUMNS - CursadaPeer::NUM_LAZY_LOAD_COLUMNS);

		AlumnoPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (AlumnoPeer::NUM_COLUMNS - AlumnoPeer::NUM_LAZY_LOAD_COLUMNS);

		EstadomaterenPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + (EstadomaterenPeer::NUM_COLUMNS - EstadomaterenPeer::NUM_LAZY_LOAD_COLUMNS);

		LlamadosPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + (LlamadosPeer::NUM_COLUMNS - LlamadosPeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(DetallerendirPeer::FK_CURSADA_ID,), array(CursadaPeer::ID,), $join_behavior);
				$c->addJoin(array(DetallerendirPeer::FK_ALUMNO_ID,), array(AlumnoPeer::ID,), $join_behavior);
				$c->addJoin(array(DetallerendirPeer::FK_DCURSADA_ID,), array(EstadomaterenPeer::ID,), $join_behavior);
				$c->addJoin(array(DetallerendirPeer::FK_LLAMADA_ID,), array(LlamadosPeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = DetallerendirPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = DetallerendirPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = DetallerendirPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				DetallerendirPeer::addInstanceToPool($obj1, $key1);
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
								$obj2->addDetallerendir($obj1);

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
								$obj3->addDetallerendir($obj1);

			} 
				
				$key4 = EstadomaterenPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = EstadomaterenPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$omClass = EstadomaterenPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					EstadomaterenPeer::addInstanceToPool($obj4, $key4);
				} 
								$obj4->addDetallerendir($obj1);

			} 
				
				$key5 = LlamadosPeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = LlamadosPeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$omClass = LlamadosPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					LlamadosPeer::addInstanceToPool($obj5, $key5);
				} 
								$obj5->addDetallerendir($obj1);

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

		DetallerendirPeer::addSelectColumns($c);
		$startcol2 = (DetallerendirPeer::NUM_COLUMNS - DetallerendirPeer::NUM_LAZY_LOAD_COLUMNS);

		CursadaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (CursadaPeer::NUM_COLUMNS - CursadaPeer::NUM_LAZY_LOAD_COLUMNS);

		ActividadPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (ActividadPeer::NUM_COLUMNS - ActividadPeer::NUM_LAZY_LOAD_COLUMNS);

		EstadomaterenPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + (EstadomaterenPeer::NUM_COLUMNS - EstadomaterenPeer::NUM_LAZY_LOAD_COLUMNS);

		LlamadosPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + (LlamadosPeer::NUM_COLUMNS - LlamadosPeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(DetallerendirPeer::FK_CURSADA_ID,), array(CursadaPeer::ID,), $join_behavior);
				$c->addJoin(array(DetallerendirPeer::FK_ACTIVIDAD_ID,), array(ActividadPeer::ID,), $join_behavior);
				$c->addJoin(array(DetallerendirPeer::FK_DCURSADA_ID,), array(EstadomaterenPeer::ID,), $join_behavior);
				$c->addJoin(array(DetallerendirPeer::FK_LLAMADA_ID,), array(LlamadosPeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = DetallerendirPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = DetallerendirPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = DetallerendirPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				DetallerendirPeer::addInstanceToPool($obj1, $key1);
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
								$obj2->addDetallerendir($obj1);

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
								$obj3->addDetallerendir($obj1);

			} 
				
				$key4 = EstadomaterenPeer::getPrimaryKeyHashFromRow($row, $startcol4);
				if ($key4 !== null) {
					$obj4 = EstadomaterenPeer::getInstanceFromPool($key4);
					if (!$obj4) {
	
						$omClass = EstadomaterenPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj4 = new $cls();
					$obj4->hydrate($row, $startcol4);
					EstadomaterenPeer::addInstanceToPool($obj4, $key4);
				} 
								$obj4->addDetallerendir($obj1);

			} 
				
				$key5 = LlamadosPeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = LlamadosPeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$omClass = LlamadosPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					LlamadosPeer::addInstanceToPool($obj5, $key5);
				} 
								$obj5->addDetallerendir($obj1);

			} 
			$results[] = $obj1;
		}
		$stmt->closeCursor();
		return $results;
	}


	
	public static function doSelectJoinAllExceptEstadomateren(Criteria $c, $con = null, $join_behavior = Criteria::LEFT_JOIN)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		DetallerendirPeer::addSelectColumns($c);
		$startcol2 = (DetallerendirPeer::NUM_COLUMNS - DetallerendirPeer::NUM_LAZY_LOAD_COLUMNS);

		CursadaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (CursadaPeer::NUM_COLUMNS - CursadaPeer::NUM_LAZY_LOAD_COLUMNS);

		ActividadPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (ActividadPeer::NUM_COLUMNS - ActividadPeer::NUM_LAZY_LOAD_COLUMNS);

		AlumnoPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + (AlumnoPeer::NUM_COLUMNS - AlumnoPeer::NUM_LAZY_LOAD_COLUMNS);

		LlamadosPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + (LlamadosPeer::NUM_COLUMNS - LlamadosPeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(DetallerendirPeer::FK_CURSADA_ID,), array(CursadaPeer::ID,), $join_behavior);
				$c->addJoin(array(DetallerendirPeer::FK_ACTIVIDAD_ID,), array(ActividadPeer::ID,), $join_behavior);
				$c->addJoin(array(DetallerendirPeer::FK_ALUMNO_ID,), array(AlumnoPeer::ID,), $join_behavior);
				$c->addJoin(array(DetallerendirPeer::FK_LLAMADA_ID,), array(LlamadosPeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = DetallerendirPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = DetallerendirPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = DetallerendirPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				DetallerendirPeer::addInstanceToPool($obj1, $key1);
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
								$obj2->addDetallerendir($obj1);

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
								$obj3->addDetallerendir($obj1);

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
								$obj4->addDetallerendir($obj1);

			} 
				
				$key5 = LlamadosPeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = LlamadosPeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$omClass = LlamadosPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					LlamadosPeer::addInstanceToPool($obj5, $key5);
				} 
								$obj5->addDetallerendir($obj1);

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

		DetallerendirPeer::addSelectColumns($c);
		$startcol2 = (DetallerendirPeer::NUM_COLUMNS - DetallerendirPeer::NUM_LAZY_LOAD_COLUMNS);

		CursadaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + (CursadaPeer::NUM_COLUMNS - CursadaPeer::NUM_LAZY_LOAD_COLUMNS);

		ActividadPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + (ActividadPeer::NUM_COLUMNS - ActividadPeer::NUM_LAZY_LOAD_COLUMNS);

		AlumnoPeer::addSelectColumns($c);
		$startcol5 = $startcol4 + (AlumnoPeer::NUM_COLUMNS - AlumnoPeer::NUM_LAZY_LOAD_COLUMNS);

		EstadomaterenPeer::addSelectColumns($c);
		$startcol6 = $startcol5 + (EstadomaterenPeer::NUM_COLUMNS - EstadomaterenPeer::NUM_LAZY_LOAD_COLUMNS);

				$c->addJoin(array(DetallerendirPeer::FK_CURSADA_ID,), array(CursadaPeer::ID,), $join_behavior);
				$c->addJoin(array(DetallerendirPeer::FK_ACTIVIDAD_ID,), array(ActividadPeer::ID,), $join_behavior);
				$c->addJoin(array(DetallerendirPeer::FK_ALUMNO_ID,), array(AlumnoPeer::ID,), $join_behavior);
				$c->addJoin(array(DetallerendirPeer::FK_DCURSADA_ID,), array(EstadomaterenPeer::ID,), $join_behavior);

		$stmt = BasePeer::doSelect($c, $con);
		$results = array();

		while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
			$key1 = DetallerendirPeer::getPrimaryKeyHashFromRow($row, 0);
			if (null !== ($obj1 = DetallerendirPeer::getInstanceFromPool($key1))) {
															} else {
				$omClass = DetallerendirPeer::getOMClass();

				$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
				$obj1 = new $cls();
				$obj1->hydrate($row);
				DetallerendirPeer::addInstanceToPool($obj1, $key1);
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
								$obj2->addDetallerendir($obj1);

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
								$obj3->addDetallerendir($obj1);

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
								$obj4->addDetallerendir($obj1);

			} 
				
				$key5 = EstadomaterenPeer::getPrimaryKeyHashFromRow($row, $startcol5);
				if ($key5 !== null) {
					$obj5 = EstadomaterenPeer::getInstanceFromPool($key5);
					if (!$obj5) {
	
						$omClass = EstadomaterenPeer::getOMClass();


					$cls = substr('.'.$omClass, strrpos('.'.$omClass, '.') + 1);
					$obj5 = new $cls();
					$obj5->hydrate($row, $startcol5);
					EstadomaterenPeer::addInstanceToPool($obj5, $key5);
				} 
								$obj5->addDetallerendir($obj1);

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
		return DetallerendirPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(DetallerendirPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		if ($criteria->containsKey(DetallerendirPeer::ID) && $criteria->keyContainsValue(DetallerendirPeer::ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key ('.DetallerendirPeer::ID.')');
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
			$con = Propel::getConnection(DetallerendirPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
			$comparison = $criteria->getComparison(DetallerendirPeer::ID);
			$selectCriteria->add(DetallerendirPeer::ID, $criteria->remove(DetallerendirPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(DetallerendirPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}
		$affectedRows = 0; 		try {
									$con->beginTransaction();
			$affectedRows += BasePeer::doDeleteAll(DetallerendirPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(DetallerendirPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
		}

		if ($values instanceof Criteria) {
												DetallerendirPeer::clearInstancePool();

						$criteria = clone $values;
		} elseif ($values instanceof Detallerendir) {
						DetallerendirPeer::removeInstanceFromPool($values);
						$criteria = $values->buildPkeyCriteria();
		} else {
			


			$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(DetallerendirPeer::ID, (array) $values, Criteria::IN);

			foreach ((array) $values as $singleval) {
								DetallerendirPeer::removeInstanceFromPool($singleval);
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

	
	public static function doValidate(Detallerendir $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(DetallerendirPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(DetallerendirPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(DetallerendirPeer::DATABASE_NAME, DetallerendirPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = DetallerendirPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
        }
    }

    return $res;
	}

	
	public static function retrieveByPK($pk, PropelPDO $con = null)
	{

		if (null !== ($obj = DetallerendirPeer::getInstanceFromPool((string) $pk))) {
			return $obj;
		}

		if ($con === null) {
			$con = Propel::getConnection(DetallerendirPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$criteria = new Criteria(DetallerendirPeer::DATABASE_NAME);
		$criteria->add(DetallerendirPeer::ID, $pk);

		$v = DetallerendirPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	
	public static function retrieveByPKs($pks, PropelPDO $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(DetallerendirPeer::DATABASE_NAME, Propel::CONNECTION_READ);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria(DetallerendirPeer::DATABASE_NAME);
			$criteria->add(DetallerendirPeer::ID, $pks, Criteria::IN);
			$objs = DetallerendirPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 

Propel::getDatabaseMap(BaseDetallerendirPeer::DATABASE_NAME)->addTableBuilder(BaseDetallerendirPeer::TABLE_NAME, BaseDetallerendirPeer::getMapBuilder());

