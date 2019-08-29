<td colspan="9">
    <?php echo link_to($detallecursada->getId() ? $detallecursada->getId() : __('-'), 'detallecur/edit?id='.$detallecursada->getId()) ?>
     - 
    <?php echo $detallecursada->getActividad() ?>
     - 
    <?php echo $detallecursada->getAlumno() ?>
     - 
    <?php echo $detallecursada->getEstado() ?>
     - 
    <?php echo link_to($detallecursada->getFkCursadaId() ? $detallecursada->getFkCursadaId() : __('-'), 'detallecur/edit?id='.$detallecursada->getId()) ?>
     - 
    <?php echo $detallecursada->getLibro() ?>
     - 
    <?php echo $detallecursada->getFolio() ?>
     - 
    <?php echo $detallecursada->getResult() ?>
     - 
    <?php echo ($detallecursada->getFecha() !== null && $detallecursada->getFecha() !== '') ? format_date($detallecursada->getFecha(), "D") : '' ?>
     - 
</td>