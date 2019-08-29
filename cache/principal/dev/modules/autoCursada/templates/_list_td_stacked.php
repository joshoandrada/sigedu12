<td colspan="4">
    <?php echo link_to($cursada->getId() ? $cursada->getId() : __('-'), 'cursada/edit?id='.$cursada->getId()) ?>
     - 
    <?php echo $cursada->getAlumno() ?>
     - 
    <?php echo ($cursada->getFecha() !== null && $cursada->getFecha() !== '') ? format_date($cursada->getFecha(), "D") : '' ?>
     - 
    <?php echo $cursada->getMatricula() ?>
     - 
</td>