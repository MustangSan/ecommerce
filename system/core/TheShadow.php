<?php

   //echo "In The Shadow we are!";

   function chk_array ( $array, $key ) {
      // Verifica se a chave existe no array
      if ( isset( $array[ $key ] ) && ! empty( $array[ $key ] ) ) {
         // Retorna o valor da chave
         return $array[ $key ];
      }
      return NULL;
   }

   /*function __autoload($class_name) {
      $file = APPPATH . '/controllers/' . $class_name . '.php';

      if ( ! file_exists( $file ) ) {
         //echo "dont Exist";
         require_once APPPATH . 'views/404.php';
         return;
      }
      require_once $file;
   }*/

   require_once BASEPATH . 'core/TheShadowClass.php';
   require_once BASEPATH . 'core/Controller.php';
   require_once BASEPATH . 'core/Model.php';

   $theShadow = new TheShadow();