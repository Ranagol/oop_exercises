<?php

class Shop {
  private $articles = [];
  private $balance = 0;

  public function dodajArtikal($artikal){
    $this->articles[] = $artikal;
  }

  
}