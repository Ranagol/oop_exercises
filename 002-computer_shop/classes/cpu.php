<?php

class CPU extends Article {
  protected $brojJezgara = 4;
  protected $frekvencija = '1Ghz';

  public function __construct($name, $cena, $stanje){
    parent::__construct($name, $cena, $stanje);
  }
}