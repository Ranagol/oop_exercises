<?php

class GPU extends Article {
  protected $frekvencija = '1Ghz';

  public function __construct($name, $cena, $stanje){
    parent::__construct($name, $cena, $stanje);
  }
}