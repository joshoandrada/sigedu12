<?php



class ActividadMapBuilder implements MapBuilder {

	
	const CLASS_NAME = 'lib.model.map.ActividadMapBuilder';

	
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
		$this->dbMap = Propel::getDatabaseMap(ActividadPeer::DATABASE_NAME);

		$tMap = $this->dbMap->addTable(ActividadPeer::TABLE_NAME);
		$tMap->setPhpName('Actividad');
		$tMap->setClassname('Actividad');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'INTEGER', true, null);

		$tMap->addForeignKey('FK_ESTABLECIMIENTO_ID', 'FkEstablecimientoId', 'INTEGER', 'establecimiento', 'ID', true, null);

		$tMap->addForeignKey('FK_CARRERA_ID', 'FkCarreraId', 'INTEGER', 'carrera', 'ID', true, null);

		$tMap->addColumn('NOMBRE', 'Nombre', 'VARCHAR', true, 128);

		$tMap->addColumn('DESCRIPCION', 'Descripcion', 'VARCHAR', false, 255);

		$tMap->addColumn('NRO', 'Nro', 'INTEGER', false, 8);

		$tMap->addColumn('ANIO', 'Anio', 'INTEGER', false, 4);

		$tMap->addColumn('FECHA', 'Fecha', 'DATE', true, null);

		$tMap->addColumn('FECHAF', 'Fechaf', 'VARCHAR', false, 20);

		$tMap->addForeignKey('PRESIDENTE', 'Presidente', 'INTEGER', 'docente', 'ID', false, null);

		$tMap->addForeignKey('VOCAL1', 'Vocal1', 'INTEGER', 'docente', 'ID', false, null);

		$tMap->addForeignKey('VOCAL2', 'Vocal2', 'INTEGER', 'docente', 'ID', false, null);

		$tMap->addForeignKey('FK_LLAMADO_ID', 'FkLlamadoId', 'INTEGER', 'llamados', 'ID', true, null);

	} 
} 