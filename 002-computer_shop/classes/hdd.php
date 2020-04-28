<?php

class HDD extends Article {
  protected $kapacitet = 1000;

  public function __construct($name, $cena){
    parent::__construct($name, $cena);
  }
}