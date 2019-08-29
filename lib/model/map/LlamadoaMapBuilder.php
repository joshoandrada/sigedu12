<?php



class LlamadoaMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.LlamadoaMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(LlamadoaPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(LlamadoaPeer::TABLE_NAME);
		$tMap->setPhpName('Llamadoa');
		$tMap->setClassname('Llamadoa');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addColumn('FECHA_INICIO', 'FechaInicio', 'TIMESTAMP', true, null);

		$tMap->addColumn('FECHA_FINAL', 'FechaFinal', 'TIMESTAMP', true, null);

		$tMap->addColumn('TURNO', 'Turno', 'INTEGER', false, 4);

		$tMap->addColumn('LLAMADO', 'Llamado', 'BOOLEAN', false, null);

		$tMap->addForeignKey('FK_LLAMADOS_ID', 'FkLlamadosId', 'INTEGER', 'llamados', 'ID', true, null);

	} 
} 