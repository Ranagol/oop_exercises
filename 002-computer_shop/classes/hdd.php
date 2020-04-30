<?php

class HDD extends Article {
  protected $kapacitet = 1000;

  public function __construct($name, $cena, $stanje){
    parent::__construct($name, $cena, $stanje);
  }
}