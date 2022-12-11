<?php

  class Config {

       private static $instance;

       private static array $data = [];
      
       public function __construct()
       {
        self::$data['db'] = 'my_db';
        self::$data['host'] = 'my_host'; 
        self::$data['password'] = 'my_password' ;
       }
       
       /**
        *  instanciate my class 
        *
        * @return @new class
        * 
        */
       private static function init() : Config
        {
            if(!self::$instance){
                echo ' my instance !' ;
                self::$instance = new self();
            }

            return self::$instance ;
        }

        public static function getData(string $key) : string
        {
                   self::init();
            return self::$data[$key] ?? 'null' ;
        }
  }

  var_dump(Config::getData('db') );
  var_dump(Config::getData('host') );
  var_dump(Config::getData('host') );
  var_dump(Config::getData('password') );