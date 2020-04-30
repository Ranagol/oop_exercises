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

  public function getStanje(){
    return $this->stanje;
  }

  public function getName(){
    return $this->name;
  }

  public function smanjiStanje(){
    $this->stanje = $this->getStanje() - 1;
  }

  public function povecajStanje(){
    $this->stanje = $this->getStanje() + 1;
  }

  public function getCena(){
    return $this->cena;
  }
}