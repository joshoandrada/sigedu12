<?php



class RelactividaddivisionMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.RelactividaddivisionMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(RelactividaddivisionPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(RelactividaddivisionPeer::TABLE_NAME);
		$tMap->setPhpName('Relactividaddivision');
		$tMap->setClassname('Relactividaddivision');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addForeignKey('FK_DIVISION_ID', 'FkDivisionId', 'INTEGER', 'division', 'ID', true, null);

		$tMap->addForeignKey('FK_ACTIVIDAD_ID', 'FkActividadId', 'INTEGER', 'actividad', 'ID', true, null);

	} 
} 