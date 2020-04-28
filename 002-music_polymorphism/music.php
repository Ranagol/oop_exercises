<?php

interface Playable{
  public function play();
}

class Guitar implements Playable {
  public function play(){//this will be triggered
    echo 'Guitar is playing.<br>';
  }
}

class Piano implements Playable {
  public function play(){//this will be triggered
    echo 'Piano is palying. <br>';
  }
}

class Musician {
  public function playInstrument($instrument){//trigger function
    $instrument->play();
  }
}

$musician = new Musician();
$guitar = new Guitar();
$piano = new Piano();

$musician->playInstrument($guitar);
$musician->playInstrument($piano);

