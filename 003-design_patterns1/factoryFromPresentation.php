<?php

class Car {
  public function drive(){
    echo 'Vroom-vroom';
  }
}

class CarFactory {
  public function makeCar(){
    return new Car;
  }
}

$factory = new CarFactory;
$car = $factory->makeCar();
$car->drive();