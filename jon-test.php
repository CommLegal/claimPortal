<?php
$vehicle = "MERCEDES-BENZ, R 350 L CDI, 2987cc, 2010-on D A E 5d";
$makemodel = explode(",", $vehicle);

$make = $makemodel[0];
$model = $makemodel[1];
$cc = $makemodel[2];
$extrainfo = explode(" ", $makemodel[3]);
$fuel = $extrainfo[2];
$trans = $extrainfo[3];

echo $make . " " . $model . " " . $cc . " " . $fuel . " " . $trans;

?>