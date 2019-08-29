<?php



class EstadomaterenMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.EstadomaterenMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(EstadomaterenPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(EstadomaterenPeer::TABLE_NAME);
		$tMap->setPhpName('Estadomateren');
		$tMap->setClassname('Estadomateren');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addColumn('NOMBRE', 'Nombre', 'VARCHAR', false, 25);

	} 
} 