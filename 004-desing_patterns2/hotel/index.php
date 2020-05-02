<?php

spl_autoload_register('myAutoloader');
function myAutoloader($className){
  include 'classes/' . $className . '.php';
}
$hotel = Hotel::getInstance();

$johnDoe = new User('John Doe');
$janeDoe = new User('Jane Doe');
$hotel->subscribe($johnDoe, 3);
$hotel->subscribe($janeDoe, 3);
$hotel->subscribe($johnDoe, 2);
$hotel->subscribe($janeDoe, 2);

$hotel->napraviSobu(1, 1, true, true);
$hotel->napraviSobu(2, 2,  true, true);
$hotel->napraviSobu(3, 3, true, true);
$hotel->napraviSobu(4, 1, true, true);
$hotel->napraviSobu(5, 2,  true, true);
$hotel->napraviSobu(6, 3, true, true);
$hotel->pokaziSlobodneSobe();
$hotel->pokaziSveSobe();
$hotel->pronadjiSlobodnuSobu(2);
$hotel->iznajmiSobu(3);//...sa tri kreveta
$hotel->iznajmiSobu(3);//...sa tri kreveta
$hotel->odjaviSobu(6);//ovde smo odjavili gosta iz sobe 6
$hotel->iznajmiSobu(2);
$hotel->iznajmiSobu(2);
$hotel->odjaviSobu(5);
/*
Ja, John Doe bih voleo da rezervisem jednu sobu sa 2 kreveta.
Ja, Jane Doe bih voleo da rezervisem jednu sobu sa 2 kreveta.
*/
var_dump($hotel);