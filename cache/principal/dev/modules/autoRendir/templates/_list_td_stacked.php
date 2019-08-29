<td colspan="6">
    <?php echo link_to($rendida->getId() ? $rendida->getId() : __('-'), 'rendir/edit?id='.$rendida->getId()) ?>
     - 
    <?php echo $rendida->getAlumno() ?>
     - 
    <?php echo $rendida->getMatricula() ?>
     - 
    <?php echo $rendida->getMatricula() ?>
     - 
    <?php echo ($rendida->getFecha() !== null && $rendida->getFecha() !== '') ? format_date($rendida->getFecha(), "D") : '' ?>
     - 
    <?php echo $rendida->getFkLlamadaId() ?>
     - 
</td>