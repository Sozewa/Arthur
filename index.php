<?php

include_once'core/EquationInterface.php';
include_once'core/LogInterface.php';
include_once'core/LogAbstract.php';
include_once 'Kupris/Linear.php';
include_once 'Kupris/Square.php';
include_once 'Kupris/TyreckixExeption.php';
include_once 'Kupris/Log.php';

$arr=array();

Kupris\Log::log('Version '.file_get_contents('./version'));

$arr[] = readline("a= ");
$arr[] = readline("b= ");
$arr[] = readline("c= ");

try {
    $solver = new Kupris\Square();
	$roots = $solver->solve($arr[0], $arr[1], $arr[2]);

    Kupris\Log::log("roots: " . implode(" , ", $roots));
   
}catch(Kupris\KuprisExeption $e) {

    Kupris\Log::log($e->getMessage());
}
Kupris\Log::write();