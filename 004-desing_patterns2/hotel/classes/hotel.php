<?php

class Hotel {
  private static $instance;
  protected $description = 'Hotel';
  private $listaSoba = [];
  protected $simpleBedSubscribers = [];
  protected $doubleBedSubscribers = [];
  protected $tripleBedSubscribers = [];


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
      echo 'Postovani klijentu, nemamo slobodnu sobu sa ' . $brojKreveta . ' brojem kreveta, trenutno.<br>';
    }
    //ako ima slobodne sobe sa datim brojem kreveta
    var_dump($slobodnaSoba);
    $slobodnaSoba->setdaLiJeIzdato(true);//namestamo sobu da je izdata
    echo 'Dragi klijentu, soba broj ' . $slobodnaSoba->getName() . ' je iznajmljena za vas. <br>';
  }

  public function odjaviSobu($brojSobe){
    //vrsimo odjavu sobe
    $brojKreveta = null;
    foreach ($this->listaSoba as $room) {
      if ($room->getName() == $brojSobe) {
        $room->setDaLiJeIzdato(false);
        echo 'Soba ' . $brojSobe . ' je odjavljena!';
        $brojKreveta = $room->getBrojKreveta();
      }
    }
    //proveravamo da li treba da obavestimo odredjene subsrcibere za dati tip sobe. Da li ima subscribera za dati broj kreveta? Ako da, obavesti ih.
    $this->areThereSubscribers($brojKreveta);

  }

  public function areThereSubscribers($brojKreveta){
    //do we have subscribers for this type of room? If so, notify them.
    if ($brojKreveta == 1 && !empty($this->simpleBedSubscribers)) {
      $this->notify($this->simpleBedSubscribers, $brojKreveta);

    } elseif ($brojKreveta == 2 && !empty($this->doubleBedSubscribers)) {
      $this->notify($this->doubleBedSubscribers, $brojKreveta);

    } elseif ($brojKreveta == 3 && !empty($this->tripleBedSubscribers)) {
      $this->notify($this->tripleBedSubscribers, $brojKreveta);
    } else {
      echo '<br>Something is wrong with the areThereSubscribers.<br>';
    }
  }

  //the notify action could happen only if the guest has sign out of the room. So we have to create an odjava function, and only after that we can work with the Observer task.
  public function subscribe($user, $brojKreveta){
    if ($brojKreveta == 1) {
      $this->simpleBedSubscribers[] = $user;
    } elseif ($brojKreveta == 2) {
      $this->doubleBedSubscribers[] = $user;
    } elseif ($brojKreveta == 3) {
      $this->tripleBedSubscribers[] = $user;
    }
  }

  public function notify($subscriberGroup, $brojKreveta){
    echo '<br>Notifying has been triggered!***************************<br>';
    foreach ($subscriberGroup as $observer) {
      $observer->whenThereIsAFreeRoom($brojKreveta);
    }
  }



}