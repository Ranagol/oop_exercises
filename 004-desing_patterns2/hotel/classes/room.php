<?php

class Room {
  private $name;
  private $brojKreveta;
  private $kupatilo;
  private $balkon;
  private $daLiJeIzdato;

  public function __construct($name, $brojKreveta, $kupatilo, $balkon){
    $this->name = $name;
    $this->brojKreveta = $brojKreveta;
    $this->kupatilo = $kupatilo;
    $this->balkon = $balkon;
    $this->daLiJeIzdato = false;
  }

  public function getDaLiJeIzdato(){
    return $this->daLiJeIzdato;
    
  }

  public function getName(){
    return $this->name;
  }

  public function getBrojKreveta(){
    return $this->brojKreveta;
  }

  public function setDaLiJeIzdato($trueOrFalse){
    $this->daLiJeIzdato = $trueOrFalse;
  }
}