<?php

class Hotel {
  private static $instance;
  protected $description = 'Hotel';
  private $listaSoba = [];

  private function __construct(){}

  public static function getInstance(){
    if (self::$instance == null) {
      self::$instance = new Hotel;
    }
    return self::$instance;
  }

  public function napraviSobu($name, $brojKreveta, $kupatilo, $balkon){
    $this->listaSoba[] = new Room($name, $brojKreveta, $kupatilo, $balkon);
  }

  public function pokaziSveSobe(){
    echo 'Ovo je spisak svih soba: <br>';
    foreach ($this->listaSoba as $room) {
      echo 'Broj sobe: ' . $room->getName() . '<br>';
      echo 'Broj kreveta: ' . $room->getBrojKreveta() . '<br>';
      echo 'Da li je izdata soba: ' ; 
      echo (($room->getDaLiJeIzdato()) ? 'soba je izdata' : 'soba je slobodna');
      echo '<br>***<br>';
    }
  }

  public function pokaziSlobodneSobe(){
    echo 'Ovo je spisak svih SLOBODNIH soba, po tipovima: <br>';
    $brojSlobodnihJednoKrevetnihSoba = 0;
    $brojSlobodnihDvoKrevetnihSoba = 0;
    $brojSlobodnihTroKrevetnihSoba = 0;
    foreach ($this->listaSoba as $room) {
      if ($room->getBrojKreveta() == 1 && $room->getDaLiJeIzdato() == false) {
        $brojSlobodnihJednoKrevetnihSoba++;
      } elseif ($room->getBrojKreveta() == 2 && $room->getDaLiJeIzdato() == false) {
        $brojSlobodnihDvoKrevetnihSoba++;
      } elseif ($room->getBrojKreveta() == 3 && $room->getDaLiJeIzdato() == false) {
        $brojSlobodnihTroKrevetnihSoba++;
      }
    }
    echo 'Broj slobodnih jednokrevetnih soba: ' . $brojSlobodnihJednoKrevetnihSoba . '<br>';
    echo 'Broj slobodnih dvokrevetnih soba: ' . $brojSlobodnihDvoKrevetnihSoba . '<br>';
    echo 'Broj slobodnih trokrevetnih soba: ' . $brojSlobodnihTroKrevetnihSoba . '<br>';
  }

  public function pronadjiSlobodnuSobu($brojKreveta){
    foreach ($this->listaSoba as $room) {
      if ($room->getDaLiJeIzdato() == false && $room->getBrojKreveta() == $brojKreveta) {
        echo 'Pronasli smo slobodnu sobu! Broj sobe je: ' . $room->getName() . '<br>';
        return $room;
        break;
      } 
    }
    echo 'Nazalost nemamo slobodne sobe sa ' . $brojKreveta . ' kreveta.<br>';
    return false;
  }

  public function iznajmiSobu($brojKreveta){
    $slobodnaSoba = $this->pronadjiSlobodnuSobu($brojKreveta);
    //ako nema slobodne sobe sa datim brojem kreveta
    if (!$slobodnaSoba) {
      echo 'Postovani klijentu, nemamo slobodnu sobu sa ' . $brojKreveta . 'brojem kreveta, trenutno.<br>';
    }
    //ako ima slobodne sobe sa datim brojem kreveta
    $slobodnaSoba->setdaLiJeIzdato(true);//namestamo sobu da je izdata
    echo 'Dragi klijentu, soba broj ' . $slobodnaSoba->getName() . ' je iznajmljena za vas. <br>';

  }



}