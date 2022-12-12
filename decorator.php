<?php


interface Gretting {
   public function hello();
}

class Moorning implements Gretting {
   
    public function hello(){
        echo 'good moorning ! ' ;
    }
}

abstract class Decorator implements Gretting {

    protected $gretting ;

    public function __construct(Gretting $gretting){
         $this->gretting = $gretting ;
    }

    public function hello()
    {
        return $this->gretting->hello() ;
    }
}


class EveryBodyDecorator extends Decorator {
   
    public function hello()
    {
        parent::hello();
        echo 'every body <br />' ;
    }
}

class TeamDecorator extends Decorator {
   
    public function hello()
    {
        parent::hello();
        echo 'my team </br> ' ;
    }
}

$moorning = new Moorning();

$decorator = new EveryBodyDecorator($moorning);
$decorator2 = new TeamDecorator($moorning);
$decorator->hello();
$decorator2->hello();

