<?php

   /*
    *---------------------------------------------------------------
    * PASTA DO SISTEMA
    *---------------------------------------------------------------
    * Contem o nome da pasta do sistema que faz o padrão mvc funcionar
    */
   $system_path = 'system';

   /*
    *---------------------------------------------------------------
    * PASTA DA APLICAÇÂO
    *---------------------------------------------------------------
    * Contem o nome da pasta onde fica a aplicação criada(seu site)
    */
   $application_folder = 'application';

   /*
    * Define o caminho para a pasta do sistema que faz o MVC funcionar
    */
   if (realpath($system_path) !== FALSE)
   {
      $system_path = realpath($system_path).'/';
      //echo "system_path realpath: " . $system_path . "<br />";
   }

   // Garante que a url está correta
   $system_path = rtrim($system_path, '/').'/';

   // Verifica se o caminho para o sistema está correto
   if ( ! is_dir($system_path))
   {
      exit("Sua pasta do sistema não existe");
   }

   $url = trim($_SERVER['REQUEST_URI'], "/");
   $url = explode("/", $url);
   $baseURL = "http://" . $_SERVER['SERVER_NAME'] . "/" . $url[0] . "/";
   //print_r($baseURL);

   /*
    *---------------------------------------------------------------
    * CONSTANTE UTILIZADAS
    *---------------------------------------------------------------
    * Definição das constantes que serão utilizadas no sitema
    * para facilitar a vida
    */

   //URL base do site
   define('BASEURL', $baseURL);

   //Nome deste arquivo
   define('SELF', pathinfo(__FILE__, PATHINFO_BASENAME));

   //Caminho para a pasta do sistema
   define('BASEPATH', str_replace("\\", "/", $system_path));

   //Caminho para a pasta principal
   define('FCPATH', str_replace(SELF, '', __FILE__));
   
   //Nome da pasta do sistema
   define('SYSDIR', trim(strrchr(trim(BASEPATH, '/'), '/'), '/'));

   // Caminho para a raiz
   define( 'ABSPATH', str_replace("\\", "/", dirname( __FILE__ )).'/');


   /*
    * Caminho para a pasta onde ficara toda a aplicação
    */
   if (is_dir($application_folder))
   {
      define('APPPATH', $application_folder.'/');
   }
   else
   {
      if ( ! is_dir(BASEPATH.$application_folder.'/'))
      {
         exit("Seu sistema não tem uma pasta de aplicação: ");
      }
      define('APPPATH', BASEPATH.$application_folder.'/');
   }


   /*
    * DEBUG
    */
   //echo "system_path rtrim: " . $system_path . "<br />";
   //echo BASEURL . "<br />";
   //echo SELF . "<br />";
   //echo 'BASEPATH '.BASEPATH . "<br />";
   //echo 'FCPATH '.FCPATH . "<br />";
   //echo 'SYSDIR '.SYSDIR . "<br />";
   //echo 'APPPATH ' . APPPATH . "<br />";
   //echo 'ABSPATH ' . ABSPATH . "<br / >";

/*
 * --------------------------------------------------------------------
 * BOOTSTRAP FILE
 * --------------------------------------------------------------------
 * Through the shadow we shall go!!!
 */
require_once BASEPATH.'core/TheShadow.php';

