<?php



class LlamadoacurMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.LlamadoacurMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(LlamadoacurPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(LlamadoacurPeer::TABLE_NAME);
		$tMap->setPhpName('Llamadoacur');
		$tMap->setClassname('Llamadoacur');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addColumn('FECHA_INICIO', 'FechaInicio', 'TIMESTAMP', true, null);

		$tMap->addColumn('FECHA_FINAL', 'FechaFinal', 'TIMESTAMP', true, null);

		$tMap->addColumn('TURNO', 'Turno', 'INTEGER', false, 4);

		$tMap->addColumn('LLAMADO', 'Llamado', 'BOOLEAN', false, null);

		$tMap->addForeignKey('FK_LLAMADOSCUR_ID', 'FkLlamadoscurId', 'INTEGER', 'llamadoscur', 'ID', true, null);

	} 
} 