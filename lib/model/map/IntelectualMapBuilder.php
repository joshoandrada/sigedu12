<?php



class IntelectualMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.IntelectualMapBuilder';

	
	private $dbMap;

	
	public function isBuilt()
	{
		return ($this->dbMap !== null);
	}

	
	public function getDatabaseMap()
	{
		return $this->dbMap;
	}

	
	public function doBuild()
	{
		$this->dbMap = Propel::getDatabaseMap(IntelectualPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(IntelectualPeer::TABLE_NAME);
		$tMap->setPhpName('Intelectual');
		$tMap->setClassname('Intelectual');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addForeignKey('FK_ESTABLECIMIENTO_ID', 'FkEstablecimientoId', 'INTEGER', 'establecimiento', 'ID', true, null);

		$tMap->addForeignKey('FK_CARRERA_ID', 'FkCarreraId', 'INTEGER', 'carrera', 'ID', true, null);

		$tMap->addColumn('NOMBRE', 'Nombre', 'VARCHAR', true, 128);

		$tMap->addColumn('DESCRIPCION', 'Descripcion', 'VARCHAR', false, 255);

		$tMap->addColumn('ORDEN', 'Orden', 'INTEGER', false, 8);

		$tMap->addColumn('ANIO', 'Anio', 'INTEGER', false, 4);

	} 
} 