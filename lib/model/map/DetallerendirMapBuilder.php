<?php



class DetallerendirMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.DetallerendirMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(DetallerendirPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(DetallerendirPeer::TABLE_NAME);
		$tMap->setPhpName('Detallerendir');
		$tMap->setClassname('Detallerendir');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addForeignKey('FK_CURSADA_ID', 'FkCursadaId', 'INTEGER', 'cursada', 'ID', true, null);

		$tMap->addForeignKey('FK_ACTIVIDAD_ID', 'FkActividadId', 'INTEGER', 'actividad', 'ID', true, null);

		$tMap->addForeignKey('FK_ALUMNO_ID', 'FkAlumnoId', 'INTEGER', 'alumno', 'ID', true, null);

		$tMap->addForeignKey('FK_DCURSADA_ID', 'FkDcursadaId', 'INTEGER', 'estadomateren', 'ID', true, null);

		$tMap->addColumn('ORDEN', 'Orden', 'INTEGER', false, 8);

		$tMap->addColumn('RESULT', 'Result', 'FLOAT', false, null);

		$tMap->addColumn('ESTADO', 'Estado', 'VARCHAR', false, 25);

		$tMap->addColumn('LIBRO', 'Libro', 'INTEGER', false, 10);

		$tMap->addColumn('FOLIO', 'Folio', 'INTEGER', false, 10);

		$tMap->addColumn('FECHA', 'Fecha', 'DATE', false, null);

		$tMap->addForeignKey('FK_LLAMADA_ID', 'FkLlamadaId', 'INTEGER', 'llamados', 'ID', true, null);

	} 
} 