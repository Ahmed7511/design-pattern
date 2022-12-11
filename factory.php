<?php
 class Car {
 public function roll() {
    echo 'je roule en gazoil !' ;
 }
}

class Bus extends Car {
     public function roll(){
         echo 'je roule en gaz ! ' ;
    }

}

class Moto extends Car {
     public function roll(){
        echo 'je role en essence !' ;
     }

}


class CarFactory {
    public function getCar($class) : Car {
        $class = ucfirst($class);
        if(!class_exists($class)) throw new Exception('class '. $class . 'not found ' ) ;
        return new $class();
    }
}


$factory = new CarFactory();
$car1 =  $factory->getCar('Bus') ;
  
return $car1->roll();