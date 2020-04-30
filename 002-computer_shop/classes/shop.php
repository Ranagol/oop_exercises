<?php

class Shop {
  private $articles = [];
  private $balance = 0;

  public function dodajArtikal($artikal){
    $this->articles[] = $artikal;
  }

  public function prodajArtikal($artikal){
    //smanji stanje artikala sa polimorfizmom
    $artikal->smanjiStanje();
    //povecaj balans prodavnice
    $cenaArtikla = $artikal->getCena();
    $this->povecajBalans($cenaArtikla);
  }

  public function povecajBalans($cenaArtikla){
    $this->balance += $cenaArtikla;
  }

  public function iznajmiArtikal($artikal){
    if ($artikal instanceof Loanable) {
      echo 'Ovaj artikal se sme iznajmljivati. <br>';
      $artikal->smanjiStanje();
      $cenaIznajmljivanja = $artikal->getCena() / 4;
      $this->povecajBalans($cenaIznajmljivanja);
      echo 'Artikal ' . $artikal->getName() . ' je uspesno iznajmljen. <br>';
    } else {
      echo 'Nazalost ovaj artikal se ne moze iznajmiti.<br>';
    }
    
  }

  

  
}