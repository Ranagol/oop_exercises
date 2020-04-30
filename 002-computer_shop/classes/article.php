<?php

abstract class Article {
  protected $name;
  protected $cena;
  protected $stanje;

  public function __construct($name, $cena, $stanje){
    $this->name = $name;
    $this->cena = $cena;
    $this->stanje = $stanje;
  }

  public function getName(){
    return $this->name;
  }
}