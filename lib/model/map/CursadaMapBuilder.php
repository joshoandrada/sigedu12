<?php



class CursadaMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.CursadaMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(CursadaPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(CursadaPeer::TABLE_NAME);
		$tMap->setPhpName('Cursada');
		$tMap->setClassname('Cursada');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addColumn('MATRICULA', 'Matricula', 'VARCHAR', false, 15);

		$tMap->addForeignKey('FK_ALUMNO_ID', 'FkAlumnoId', 'INTEGER', 'alumno', 'ID', true, null);

		$tMap->addForeignKey('FK_LLAMADA_ID', 'FkLlamadaId', 'INTEGER', 'llamadoscur', 'ID', true, null);

		$tMap->addColumn('AUXI', 'Auxi', 'INTEGER', false, 1);

		$tMap->addColumn('NOMAPE', 'Nomape', 'VARCHAR', false, 50);

		$tMap->addColumn('FECHA', 'Fecha', 'DATE', true, null);

	} 
} 