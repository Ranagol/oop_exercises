<?php

class RAM extends Article implements Loanable {
  protected $kapacitet = 1000;
  protected $frekvencija = '1Ghz';

  public function __construct($name, $cena, $stanje){
    parent::__construct($name, $cena, $stanje);
  }

  public function iznajmi(){
    $this->smanjiStanje();
  }

  public function vratiSaIznajmljivanja(){
    $this->povecajStanje();
  }
}