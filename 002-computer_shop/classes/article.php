<?php

abstract class Article {
  protected $name;
  protected $cena;

  public function __construct($name, $cena){
    $this->name = $name;
    $this->cena = $cena;
  }

  public function getName(){
    return $this->name;
  }
}