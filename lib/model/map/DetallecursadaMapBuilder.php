<?php



class DetallecursadaMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.DetallecursadaMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(DetallecursadaPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(DetallecursadaPeer::TABLE_NAME);
		$tMap->setPhpName('Detallecursada');
		$tMap->setClassname('Detallecursada');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addForeignKey('FK_CURSADA_ID', 'FkCursadaId', 'INTEGER', 'cursada', 'ID', true, null);

		$tMap->addForeignKey('FK_ACTIVIDAD_ID', 'FkActividadId', 'INTEGER', 'actividad', 'ID', true, null);

		$tMap->addForeignKey('FK_ALUMNO_ID', 'FkAlumnoId', 'INTEGER', 'alumno', 'ID', true, null);

		$tMap->addForeignKey('FK_DCURSADA_ID', 'FkDcursadaId', 'INTEGER', 'estadomate', 'ID', true, null);

		$tMap->addColumn('FECHA', 'Fecha', 'DATE', false, null);

		$tMap->addColumn('ORDEN', 'Orden', 'INTEGER', false, 8);

		$tMap->addColumn('RESULT', 'Result', 'FLOAT', false, null);

		$tMap->addColumn('LIBRO', 'Libro', 'INTEGER', false, 10);

		$tMap->addColumn('FOLIO', 'Folio', 'INTEGER', false, 10);

		$tMap->addColumn('ESTADO', 'Estado', 'VARCHAR', false, 25);

	} 
} 