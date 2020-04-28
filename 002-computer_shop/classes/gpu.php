<?php

class GPU extends Article {
  protected $frekvencija = '1Ghz';

  public function __construct($name, $cena){
    parent::__construct($name, $cena);
  }
}