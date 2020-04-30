<?php

spl_autoload_register('myAutoloader');
function myAutoloader($className){
  include 'classes/' . $className . '.php';
}

$shop = new Shop;
$ram = new RAM('ram', 100, 5);
$cpu = new CPU('cpu', 200, 5);
$hdd = new HDD('hdd', 300, 5);
$gpu = new GPU('gpu', 400, 5);

$shop->dodajArtikal($ram);
$shop->dodajArtikal($cpu);
$shop->dodajArtikal($hdd);
$shop->dodajArtikal($gpu);

$shop->prodajArtikal($ram);
$shop->prodajArtikal($gpu);

$shop->iznajmiArtikal($ram);//Artikal ram je uspesno iznajmljen.
$shop->iznajmiArtikal($gpu);//Nazalost ovaj artikal se ne moze iznajmiti.

var_dump($shop);

