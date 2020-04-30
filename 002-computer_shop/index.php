<?php

spl_autoload_register('myAutoloader');
function myAutoloader($className){
  include 'classes/' . $className . '.php';
}

$shop = new Shop;
$ram = new RAM('ram', 100, 5);
$cpu = new CPU('cpu', 200, 6);
$hdd = new HDD('hdd', 300, 7);
$gpu = new GPU('gpu', 400, 8);
$shop->dodajArtikal($ram);
$shop->dodajArtikal($cpu);
$shop->dodajArtikal($hdd);
$shop->dodajArtikal($gpu);
var_dump($shop);

