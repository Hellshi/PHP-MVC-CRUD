<?php

    class core {

        public function start($urlGet) {
            //Isso faz com que todas as páginas sejam recebidas no parâmetro página do array

            if(isset($urlGet['metodo'])) {
                $acao = $urlGet['metodo'];
            } else{
                $acao = 'index';
            }

            if(isset($urlGet['pagina'])) {
                $controller = ucfirst($urlGet['pagina'].'Controller'); 
            }  else {
                $controller = 'HomeController';
            }
            
            if(!class_exists($controller)) {
                $controller = 'ErrorController';
            }
            
            call_user_func_array(array(new $controller, $acao), array());
        }
    }

?>