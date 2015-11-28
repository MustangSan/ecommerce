<?php

   echo "In The Shadow we are!";

   function chk_array ( $array, $key ) {
      // Verifica se a chave existe no array
      if ( isset( $array[ $key ] ) && ! empty( $array[ $key ] ) ) {
         // Retorna o valor da chave
         return $array[ $key ];
      }
      return NULL;
   }

   function __autoload($class_name) {
      $file = BASEPATH . '/core/' . $class_name . 'Class.php';

      if ( ! file_exists( $file ) ) {
         echo "dont Exist";
         //require_once ABSPATH . '/includes/404.php';
         return;
      }
      require_once $file;
   }

   $theS = new TheShadow();
