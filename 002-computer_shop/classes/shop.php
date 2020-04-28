<?php

class Shop {
  private $lager = [];
  private $promet = 0;

  public function dodajNaLager($artikal){
    $this->lager[] = $artikal;
  }

  public function prodaj($artikal){
    //skini sa lagera

    //dodaj cenu na promet
  }

  
}