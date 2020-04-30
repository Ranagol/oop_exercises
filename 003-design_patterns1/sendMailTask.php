<?php

/*
●	Napraviti aplikaciju koja simulira sistem za slanje elektronske pošte.
●	Svaki email je opisan adresom primaoca, temom i tekstom poruke. Instanciranje vršiti pomoću Factoryja.
●	Kreirati klasu MailService koja ima metodu sendMail koja simulira slanje mailova. MailService treba da je singleton.

*/

class MailService {
  private static $instance;
  private $description = 'this is the singleton Mailservice in case of var_dump check';

  private function __construct(){}

  public static function getInstance(){
    if (self::$instance == null) {
      self::$instance = new MailService;
    }
    return self::$instance;
  }

  public function sendMail($mail){
    $mail->mailSending();
  }
}

class Mail {
  private $primaoc;
  private $tema;
  private $tekst;

  public function __construct($primaoc, $tema, $tekst){
    $this->primaoc = $primaoc;
    $this->tema = $tema;
    $this->tekst = $tekst;
  }
  public function mailSending(){
    echo 'Upravo smo poslali mejl za ' . $this->primaoc . ' gde je tema ' . $this->tema . ' a tekst je ' . $this->tekst . '<br>';
  }

}

class MailFactory {
  public function createMail($primaoc, $tema, $tekst){
    return new Mail($primaoc, $tema, $tekst);
  }
}




$factory = new MailFactory;
$mail1 = $factory->createMail('Zoran', 'Zdravo', 'Kako si?');
var_dump($mail1);
Mailservice::getInstance()->sendMail($mail1);
