<?php  

/**
* 
*/
class TheShadow
{
   private $controller;
   private $method;
   private $parameters;
   private $error404;
   
   function __construct()
   {
      $this->get_url_data();

   }

   public function get_url_data () {

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
         //$this->controller .= '-controller';
         $this->method = chk_array( $path, 1 );

         // Configura os parâmetros
         if ( chk_array( $path, 2 ) ) {
            unset($path[0]);
            unset($path[1]);

            // Os parâmetros sempre virão após a ação
            $this->parameters = array_values($path);
         }

         // DEBUG
         //
         echo "<br / ><br / >Teste Boostrap Class<br / >";
         echo $this->controller . '<br />';
         echo $this->method . '<br />';
         echo '<pre>';
         print_r($this->parameters);
         echo '</pre>';
      }
   
   }
}
?>
