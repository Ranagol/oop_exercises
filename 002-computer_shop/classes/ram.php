<?php

class RAM extends Article {
  protected $kapacitet = 1000;
  protected $frekvencija = '1Ghz';

  public function __construct($name, $cena){
    parent::__construct($name, $cena);
  }
}