<?php

spl_autoload_register('myAutoloader');
function myAutoloader($className){
  include 'classes/' . $className . '.php';
}

$johnDoe = new User('John Doe');
$janeDoe = new User('Jane Doe');

$hotel = Hotel::getInstance();
$hotel->napraviSobu(1, 1, true, true);
$hotel->napraviSobu(2, 2,  true, true);
$hotel->napraviSobu(3, 3, true, true);
$hotel->napraviSobu(4, 1, true, true);
$hotel->napraviSobu(5, 2,  true, true);
$hotel->napraviSobu(6, 3, true, true);
$hotel->pokaziSlobodneSobe();
$hotel->pokaziSveSobe();
$hotel->pronadjiSlobodnuSobu(3);
$hotel->iznajmiSobu(3);//sobe 3 i 6 su jedine trokrevetne sobe
$hotel->iznajmiSobu(6);//sobe 3 i 6 su jedine trokrevetne sobe
var_dump($hotel);