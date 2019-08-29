<?php



class LlamadoscurMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.LlamadoscurMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(LlamadoscurPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(LlamadoscurPeer::TABLE_NAME);
		$tMap->setPhpName('Llamadoscur');
		$tMap->setClassname('Llamadoscur');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addColumn('FECHA_INICIO', 'FechaInicio', 'DATE', true, null);

		$tMap->addColumn('FECHA_FINAL', 'FechaFinal', 'DATE', true, null);

		$tMap->addColumn('TURNO', 'Turno', 'INTEGER', false, 4);

		$tMap->addColumn('LLAMADO', 'Llamado', 'INTEGER', false, null);

		$tMap->addColumn('FECHAI', 'Fechai', 'VARCHAR', false, 20);

		$tMap->addColumn('FECHAF', 'Fechaf', 'VARCHAR', false, 20);

	} 
} 