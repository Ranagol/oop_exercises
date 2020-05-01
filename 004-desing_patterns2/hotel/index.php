<?php

spl_autoload_register('myAutoloader');
function myAutoloader($className){
  include 'classes/' . $className . '.php';
}

$hotel = Hotel::getInstance();
$hotel->napraviSobu(1, 1, true, true);
$hotel->napraviSobu(2, 2,  true, true);
$hotel->napraviSobu(3, 3, true, true);
$hotel->napraviSobu(4, 1, true, true);
$hotel->napraviSobu(5, 2,  true, true);
$hotel->napraviSobu(6, 3, true, true);
$hotel->pokaziSlobodneSobe();
$hotel->pokaziSveSobe();
var_dump($hotel);