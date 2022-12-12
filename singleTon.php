<?php

  class Config {

       private static $instance;

       /**
        *  instanciate my class 
        *
        * @return @new instance
        * 
        */
       public static function init() : Config
        {
            if(!self::$instance){
                echo ' my instance !' ;
                self::$instance = new self();
            }

            return self::$instance ;
        }
  }

  var_dump(Config::init() );
  var_dump(Config::init() );