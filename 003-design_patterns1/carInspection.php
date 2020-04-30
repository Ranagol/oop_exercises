<?php

//products

interface EngineSound{
  public function engineSound();
}

class Mercedes implements EngineSound{
  public function engineSound(){
    echo 'Vroom-vroom from Mercedes <br>';
  }
}

class BMW implements EngineSound{
  public function engineSound(){
    echo 'Brmbr-brmbr from BMW <br>';
  }
}

//factories

interface AbstractFactoryInterface{
  public function createCarWithEngineSound() :EngineSound;
}

class MercedesFactory implements AbstractFactoryInterface {
  public function createCarWithEngineSound() :EngineSound {
    return new Mercedes;
  }
}

class BMWFactory implements AbstractFactoryInterface{
  public function createCarWithEngineSound() :EngineSound {
    return new BMW;
  }
}

//the class that will 'inspect' the car motor sound

class MotorSoundInspection {//this has to be a singleton, because the task says so;
  private static $instance;
  private $description = 'MotorSoundInspection singleton';

  private function __construct(){}

  public static function getInstance(){
    if (self::$instance == null) {
      self::$instance = new MotorSoundInspection;
    }
    return self::$instance;
  }

  public function testEngineSound($car){
    $car->engineSound();
  }

}

//implementation of the whole apstract factory shit
$mercedesFactory = new MercedesFactory;
$mercedes = $mercedesFactory->createCarWithEngineSound();
$mercedes->engineSound();

$bmwFactory = new BMWFactory;
$bmw = $bmwFactory->createCarWithEngineSound();
$bmw->engineSound();

$carInspection = MotorSoundInspection::getInstance();
var_dump($carInspection);

$carInspection->testEngineSound($mercedes);
$carInspection->testEngineSound($bmw);

