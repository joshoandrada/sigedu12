
<?php 
$h1= sfPropelFinder::from('Alumno')->
       where ('Id','like',$detallecursada->getFkAlumnoId())->
       find();
   foreach ($h1 as $a)  
         {
          $alucarre= $a->getFkCarreraId();
         } 
$orden=$detallecursada->getOrden();

if ($alucarre == 10) 
{
    if ($orden == 11 || $orden == 12 || $orden == 21 || $orden == 1 || $orden == 4 || $orden == 5 || $orden == 26 || $orden == 30 || $orden == 32 || $orden == 17 || $orden == 28)
        {
            $c= sfPropelFinder::from('Estadomate')->
            find();
            $optCuenta=array();
            foreach($c as $cuenta) {
            $optCuenta[$cuenta->getId()] = $cuenta->getNombre();
                }
              echo select_tag('detallecursada[fk_dcursada_id]', options_for_select($optCuenta,$detallecursada->getFkDcursadaId()));
                } 
    if ($orden == 2 || $orden == 8 || $orden == 6 || $orden == 7 || $orden == 10 || $orden == 14 || $orden == 34 || $orden == 16 || $orden == 18 || $orden == 19 || $orden == 24 || $orden == 25 || $orden == 0)
        {
            $c= sfPropelFinder::from('Estadomate')->
            where ('Id','=',1)->
            _or ('Id','=',3)->
            _or ('Id','=',6)->
            _or ('Id','=',7)->
            _or ('Id','=',8)->
            find();
            $optCuenta=array();
            foreach($c as $cuenta) {
            $optCuenta[$cuenta->getId()] = $cuenta->getNombre();
                }
              echo select_tag('detallecursada[fk_dcursada_id]', options_for_select($optCuenta,$detallecursada->getFkDcursadaId()));
                }        
    if ($orden == 3 || $orden == 13 || $orden == 15 || $orden == 22 || $orden == 23 || $orden == 27 || $orden == 31 || $orden == 33 || $orden == 35)
        {
            $c= sfPropelFinder::from('Estadomate')->
            where ('Id','=',3)->
            _or ('Id','=',4)->
            _or ('Id','=',5)->
            _or ('Id','=',6)->
            _or ('Id','=',8)->
            find();
            $optCuenta=array();
            foreach($c as $cuenta) {
            $optCuenta[$cuenta->getId()] = $cuenta->getNombre();
                }
              echo select_tag('detallecursada[fk_dcursada_id]', options_for_select($optCuenta,$detallecursada->getFkDcursadaId()));
                }        
    if ($orden == 9 || $orden == 29 || $orden == 20 || $orden == 36)
        {
            $c= sfPropelFinder::from('Estadomate')->
            where ('Id','=',5)->
            _or ('Id','=',3)->
            _or ('Id','=',6)->
            _or ('Id','=',8)->
            find();
            $optCuenta=array();
            foreach($c as $cuenta) {
            $optCuenta[$cuenta->getId()] = $cuenta->getNombre();
                }
              echo select_tag('detallecursada[fk_dcursada_id]', options_for_select($optCuenta,$detallecursada->getFkDcursadaId()));
                }        
   } 
if ($alucarre == 7) 
{

 if ($orden == 1 || $orden == 4 || $orden == 5)
        {
            $c= sfPropelFinder::from('Estadomate')->
            find();
            $optCuenta=array();
            foreach($c as $cuenta) {
            $optCuenta[$cuenta->getId()] = $cuenta->getNombre();
                }
              echo select_tag('detallecursada[fk_dcursada_id]', options_for_select($optCuenta,$detallecursada->getFkDcursadaId()));
        } 
    

    if ($orden == 2 || $orden == 6 || $orden == 7 || $orden == 0 )
        {
            $c= sfPropelFinder::from('Estadomate')->
            where ('Id','=',1)->
            _or ('Id','=',3)->
            _or ('Id','=',6)->
            _or ('Id','=',7)->
            _or ('Id','=',8)->
            find();
            $optCuenta=array();
            foreach($c as $cuenta) {
            $optCuenta[$cuenta->getId()] = $cuenta->getNombre();
                }
              echo select_tag('detallecursada[fk_dcursada_id]', options_for_select($optCuenta,$detallecursada->getFkDcursadaId()));
        }        
if ($orden == 3)
        {
            $c= sfPropelFinder::from('Estadomate')->
            where ('Id','=',3)->
            _or ('Id','=',4)->
            _or ('Id','=',5)->
            _or ('Id','=',6)->
            _or ('Id','=',8)->
            find();
            $optCuenta=array();
            foreach($c as $cuenta) {
            $optCuenta[$cuenta->getId()] = $cuenta->getNombre();
                }
              echo select_tag('detallecursada[fk_dcursada_id]', options_for_select($optCuenta,$detallecursada->getFkDcursadaId()));
        }        
}

if ($alucarre == 13) 
{
    if ($orden == 11 || $orden == 12 || $orden == 21 || $orden == 1 || $orden == 4 || $orden == 5 || $orden == 31 || $orden == 34 || $orden == 36)
        {
            $c= sfPropelFinder::from('Estadomate')->
            find();
            $optCuenta=array();
            foreach($c as $cuenta) {
            $optCuenta[$cuenta->getId()] = $cuenta->getNombre();
                }
              echo select_tag('detallecursada[fk_dcursada_id]', options_for_select($optCuenta,$detallecursada->getFkDcursadaId()));
                } 
    if ($orden == 2 || $orden == 8 || $orden == 6 || $orden == 7 || $orden == 10 || $orden == 14 || $orden == 19 || $orden == 23 || $orden == 24 || $orden == 25 || $orden == 26 || $orden == 0)
        {
            $c= sfPropelFinder::from('Estadomate')->
            where ('Id','=',1)->
            _or ('Id','=',3)->
            _or ('Id','=',6)->
            _or ('Id','=',7)->
            _or ('Id','=',8)->
            find();
            $optCuenta=array();
            foreach($c as $cuenta) {
            $optCuenta[$cuenta->getId()] = $cuenta->getNombre();
                }
              echo select_tag('detallecursada[fk_dcursada_id]', options_for_select($optCuenta,$detallecursada->getFkDcursadaId()));
                }        
    if ($orden == 3 || $orden == 13 || $orden == 15 || $orden == 16 || $orden == 17 || $orden == 18 || $orden == 22 || $orden == 27 || $orden == 28 || $orden == 29 || $orden == 33 || $orden == 35 || $orden == 32)
        {
            $c= sfPropelFinder::from('Estadomate')->
            where ('Id','=',3)->
            _or ('Id','=',4)->
            _or ('Id','=',5)->
            _or ('Id','=',6)->
            _or ('Id','=',8)->
            find();
            $optCuenta=array();
            foreach($c as $cuenta) {
            $optCuenta[$cuenta->getId()] = $cuenta->getNombre();
                }
              echo select_tag('detallecursada[fk_dcursada_id]', options_for_select($optCuenta,$detallecursada->getFkDcursadaId()));
                }        
    if ($orden == 9 || $orden == 30 || $orden == 20 || $orden == 37)
        {
            $c= sfPropelFinder::from('Estadomate')->
            where ('Id','=',5)->
            _or ('Id','=',3)->
            _or ('Id','=',6)->
            _or ('Id','=',8)->
            find();
            $optCuenta=array();
            foreach($c as $cuenta) {
            $optCuenta[$cuenta->getId()] = $cuenta->getNombre();
                }
              echo select_tag('detallecursada[fk_dcursada_id]', options_for_select($optCuenta,$detallecursada->getFkDcursadaId()));
                }        
   } 
if ($alucarre == 12) 
{
    if ($orden == 11 || $orden == 12 || $orden == 20 || $orden == 1 || $orden == 4 || $orden == 5 || $orden == 27 || $orden == 29 || $orden == 31)
        {
            $c= sfPropelFinder::from('Estadomate')->
            find();
            $optCuenta=array();
            foreach($c as $cuenta) {
            $optCuenta[$cuenta->getId()] = $cuenta->getNombre();
                }
              echo select_tag('detallecursada[fk_dcursada_id]', options_for_select($optCuenta,$detallecursada->getFkDcursadaId()));
                } 
    if ($orden == 2 || $orden == 6 || $orden == 7 || $orden == 10 || $orden == 14 || $orden == 15 || $orden == 16 || $orden == 22 || $orden == 23 || $orden == 24 || $orden == 26 || $orden == 0)
        {
            $c= sfPropelFinder::from('Estadomate')->
            where ('Id','=',1)->
            _or ('Id','=',3)->
            _or ('Id','=',6)->
            _or ('Id','=',7)->
            _or ('Id','=',8)->
            find();
            $optCuenta=array();
            foreach($c as $cuenta) {
            $optCuenta[$cuenta->getId()] = $cuenta->getNombre();
                }
              echo select_tag('detallecursada[fk_dcursada_id]', options_for_select($optCuenta,$detallecursada->getFkDcursadaId()));
                }        
    if ($orden == 3 || $orden == 8 || $orden == 17 || $orden == 18 || $orden == 21 || $orden == 34 || $orden == 25 || $orden == 30 || $orden == 32 || $orden == 33 || $orden == 13)
        {
            $c= sfPropelFinder::from('Estadomate')->
             where ('Id','=',3)->
            _or ('Id','=',4)->
            _or ('Id','=',5)->
            _or ('Id','=',6)->
            _or ('Id','=',8)->
            find();
            $optCuenta=array();
            foreach($c as $cuenta) {
            $optCuenta[$cuenta->getId()] = $cuenta->getNombre();
                }
              echo select_tag('detallecursada[fk_dcursada_id]', options_for_select($optCuenta,$detallecursada->getFkDcursadaId()));
                }        
    if ($orden == 9 || $orden == 19 || $orden == 28 || $orden == 35)
        {
            $c= sfPropelFinder::from('Estadomate')->
            where ('Id','=',5)->
            _or ('Id','=',3)->
            _or ('Id','=',6)->
            _or ('Id','=',8)->
            find();
            $optCuenta=array();
            foreach($c as $cuenta) {
            $optCuenta[$cuenta->getId()] = $cuenta->getNombre();
                }
              echo select_tag('detallecursada[fk_dcursada_id]', options_for_select($optCuenta,$detallecursada->getFkDcursadaId()));
                }        
   } 
if ($alucarre == 11) 
{
    if ($orden == 11 || $orden == 12 || $orden == 20 || $orden == 1 || $orden == 4 || $orden == 5 || $orden == 26 || $orden == 31 || $orden == 33)
        {
            $c= sfPropelFinder::from('Estadomate')->
            find();
            $optCuenta=array();
            foreach($c as $cuenta) {
            $optCuenta[$cuenta->getId()] = $cuenta->getNombre();
                }
              echo select_tag('detallecursada[fk_dcursada_id]', options_for_select($optCuenta,$detallecursada->getFkDcursadaId()));
                } 
    if ($orden == 2 || $orden == 8 || $orden == 6 || $orden == 7 || $orden == 10 || $orden == 14 || $orden == 18 || $orden == 17 || $orden == 22 || $orden == 24 || $orden == 25 || $orden == 0)
        {
            $c= sfPropelFinder::from('Estadomate')->
            where ('Id','=',1)->
            _or ('Id','=',3)->
            _or ('Id','=',6)->
            _or ('Id','=',7)->
            _or ('Id','=',8)->
            find();
            $optCuenta=array();
            foreach($c as $cuenta) {
            $optCuenta[$cuenta->getId()] = $cuenta->getNombre();
                }
              echo select_tag('detallecursada[fk_dcursada_id]', options_for_select($optCuenta,$detallecursada->getFkDcursadaId()));
                }        
    if ($orden == 3 || $orden == 15 || $orden == 16 || $orden == 23 || $orden == 21 || $orden == 27 || $orden == 28 || $orden == 29 || $orden == 34 || $orden == 35 || $orden == 13 || $orden == 32 )
        {
            $c= sfPropelFinder::from('Estadomate')->
            where ('Id','=',3)->
            _or ('Id','=',4)->
            _or ('Id','=',5)->
            _or ('Id','=',6)->
            _or ('Id','=',8)->
            find();
            $optCuenta=array();
            foreach($c as $cuenta) {
            $optCuenta[$cuenta->getId()] = $cuenta->getNombre();
                }
              echo select_tag('detallecursada[fk_dcursada_id]', options_for_select($optCuenta,$detallecursada->getFkDcursadaId()));
                }        
    if ($orden == 9 || $orden == 19 || $orden == 30 || $orden == 36)
        {
            $c= sfPropelFinder::from('Estadomate')->
            where ('Id','=',5)->
            _or ('Id','=',3)->
            _or ('Id','=',6)->
            _or ('Id','=',8)->
            find();
            $optCuenta=array();
            foreach($c as $cuenta) {
            $optCuenta[$cuenta->getId()] = $cuenta->getNombre();
                }
              echo select_tag('detallecursada[fk_dcursada_id]', options_for_select($optCuenta,$detallecursada->getFkDcursadaId()));
                }        
   } 





?>