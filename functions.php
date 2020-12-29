<?php

/**
* A better PHP Object to Array Convertions
* pt-br: Uma melhor forma de converter Objeto para Array
**/
function obj2array(&$Instance)
{
    $clone = (array) $Instance;
    $rtn = array();
    
    foreach ($clone as $key => $value) {
        if (is_object($value)) {
            $value = obj2array($value);
        }
        $aux = explode("\0", $key);
        $newkey = $aux[count($aux) - 1];
        $rtn[$newkey] = $value;
    }

    return $rtn;
}
