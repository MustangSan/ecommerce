<?php

/*
 *---------------------------------------------------------------
 * THE SHADOW CONTROLLER
 *---------------------------------------------------------------
 * Classe base de todas as controllers
 */

class TS_Controller {

   public $model;
   public $session;

   function __construct () {
      $this->model = array();
   }

   public function load_helper($helper = FALSE){
      if(!$helper)
         return FALSE;
      
      //$file_name = strtolower($helper);
      $helper_path = BASEPATH . 'helpers/' . $helper . '.php';

      if(file_exists($helper_path)) {
         require_once $helper_path;
      }
      
      $session = new Session();
   }   

   public function load_library($library = FALSE){
      if(!$library)
         return FALSE;
      
      //$file_name = strtolower($library);
      $library_path = APPPATH . 'libraries/' . $library . '.php';

      if(file_exists($library_path)) {
         require_once $library_path;
         return new $library();
      }
      else
         return FALSE;
   }

   public function load_model($model = FALSE, $name = NULL) {
      if(!$model)
         return FALSE;

      $file_name = strtolower($model);
      $model_path = APPPATH . 'models/' . $model . '.php';

      if(file_exists($model_path)) {
         require_once $model_path;
         if(class_exists($model)) {
            if(is_null($name))
               $this->model[$model] = new $model();
            else
               $this->model[$name] = new $model();
         }
      }
      else
         return FALSE;
   }

   public function load_view($view = FALSE, $data = NULL) {
      if(!$view)
         return FALSE;

      $file_name = strtolower($view);
      $view_path = APPPATH . 'views/' . $view . '.php';

      if(file_exists($view_path)) {
         if(!is_null($data))
            extract($data);
         ob_start();
         include($view_path);
         //$buffer = ob_get_contents();
         //@ob_end_clean();
         //return $buffer;
      }
   }

}