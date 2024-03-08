<?php
$ma_varaible_string = 'je test #lamort test.com';
$trouver = '#';
$position = strrchr($ma_varaible_string, $trouver);
$resultat = explode(' ',  substr($position, 1));
echo $resultat[0];