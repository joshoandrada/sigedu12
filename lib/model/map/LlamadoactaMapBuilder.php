<?php



class LlamadoactaMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.LlamadoactaMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(LlamadoactaPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(LlamadoactaPeer::TABLE_NAME);
		$tMap->setPhpName('Llamadoacta');
		$tMap->setClassname('Llamadoacta');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addForeignKey('FK_LLAMADOS_ID', 'FkLlamadosId', 'INTEGER', 'llamados', 'ID', true, null);

	} 
} 