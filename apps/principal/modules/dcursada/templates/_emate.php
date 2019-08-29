<?php
use_helper('Misc');
echo select_tag('estado', options_for_select(Opcur(true), $detallecursada->getFkDcursadaId()));
?>

