<?php
/*  
Chain of Responsibility is a behavioral design pattern that lets you pass requests along a chain of handlers.
 Upon receiving a request, 
each handler decides either to process the request or to pass it to the next handler in the chain.
*/

abstract class Account
{
     protected $successor;
     protected $balance ;

     public function setNext(Account $account){
        $this->successor = $account ;
     }

     public function pay(float $amount){
        if($this->canPay($amount)){
            echo 'paied successfuly with '. get_class($this) . ' </br>'    ;
        }else if($this->successor){
            echo ' you can not pay with ' . get_class($this) . ' </br>' ;
            $this->successor->pay($amount);
        }else{
            throw new Exception('exception !');
        }
     }


     public function canPay($amount) : bool {
        return $this->balance >= $amount ;
     }
}


class Bank extends Account 
{
     protected $balance ;
     public function __construct(float $balance)
     {
       $this->balance = $balance ;
     }
}

class Paypal extends Account 
{
     protected $balance ;
     public function __construct(float $balance)
     {
       $this->balance = $balance ;
     }
}

class Bitcoin extends Account 
{
     protected $balance ;
     public function __construct(float $balance)
     {
       $this->balance = $balance ;
     }
}

$bank = new Bank(100);
$paypal = new Paypal(200);
$bitcoin = new Bitcoin(250);

$bank->setNext($paypal);
$paypal->setNext($bitcoin);

$bank->pay(200);