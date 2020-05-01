<?php

class User implements Observer {
  protected $name;

  public function __construct($name){
    $this->name = $name;
  }

  public function whenThereIsAFreeRoom($brojKreveta){
    echo 'Ja, ' . $this->name . ' bih voleo da rezervisem jednu sobu sa ' . $brojKreveta . ' kreveta.<br>';
  }
}