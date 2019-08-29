<?php



class EstadomateMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.EstadomateMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(EstadomatePeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(EstadomatePeer::TABLE_NAME);
		$tMap->setPhpName('Estadomate');
		$tMap->setClassname('Estadomate');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addColumn('NOMBRE', 'Nombre', 'VARCHAR', false, 25);

	} 
} 