<?php  

/*
 *---------------------------------------------------------------
 * THE SHADOW
 *---------------------------------------------------------------
 * Contem toda a regra para tradução da url e chamada das controllers
 */

class TheShadow
{
   private $controller;
   private $method;
   private $parameters;
   private $error404 = 'views/404.php';

   function __construct() {
      $this->get_url_data();

      if(! $this->controller){
         return;
      }

      $controller_path = APPPATH . 'controllers/' . $this->controller . '.php';

      if(!file_exists($controller_path)){
         require_once APPPATH . $this->error404;
         return;
      }

      require_once $controller_path;

      $this->controller = ucfirst($this->controller);

      $this->controller = new $this->controller();

      if(method_exists($this->controller, $this->method)) {
         if(is_array($this->parameters))
            call_user_func_array(array($this->controller, $this->method), array_slice($this->parameters, 0));
         else
            call_user_func_array(array($this->controller, $this->method), array($this->parameters));
         return;
      }

      if(!$this->method AND method_exists($this->controller, 'index')) {
         if(is_array($this->parameters))
            call_user_func_array(array($this->controller, 'index'), array_slice($this->parameters, 0));
         else
            call_user_func_array(array($this->controller, 'index'), array($this->parameters));
         return;
      }

      require_once APPPATH . $this->error404;
      return;
   }

   private function get_url_data () {

      // Verifica se o parâmetro path foi enviado
      if ( isset( $_GET['path'] ) ) {

         // Captura o valor de $_GET['path']
         $path = $_GET['path'];

         // Limpa os dados
         $path = rtrim($path, '/');
         //$path = filter_var($path, FILTER_SANITIZE_URL);

         // Cria um array de parâmetros
         $path = explode('/', $path);

         // Configura as propriedades
         $this->controller = chk_array( $path, 0 );
         
         $this->method = chk_array( $path, 1 );

         // Configura os parâmetros
         if ( chk_array( $path, 2 ) ) {
            unset($path[0]);
            unset($path[1]);

            // Os parâmetros sempre virão após a ação
            $this->parameters = array_values($path);
         }

         // DEBUG
         /*echo "<br / ><br / >Teste Boostrap Class<br / >";
         echo $this->controller . '<br />';
         echo $this->method . '<br />';
         echo '<pre>';
         print_r($this->parameters);
         echo '</pre>';
         //*/
      }
   
   }
}

