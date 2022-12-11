<?php

 interface SequentialAccess {
     public function hasNext();
     public function Next();
 }

 class UsersSequentialAccess implements SequentialAccess {
    private $position ;
    private $users ;

    public function __construct(array $users)
    {
         $this->users = $users ;
         $this->position = 0 ;
    }

    public function hasNext()
    {
        return $this->position < count($this->users);
    }

   public function Next()
   {
    $item = $this->users[$this->position];
    $this->position += 1 ;
    return $item ; 
   }   
 }

 $seqAccess = new UsersSequentialAccess(array('tom', 'bob', 'joe'));

 while($seqAccess->hasNext()){
    echo $seqAccess->next() . '<br />' ;
 }