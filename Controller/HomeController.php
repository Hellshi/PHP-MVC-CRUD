<?php
    class HomeController {
        public function index() {

            try {
                $postagens = Postagem::getAll();

                $loader = new \Twig\Loader\FilesystemLoader('./View');
                $twig = new \Twig\Environment($loader);

                $template = $twig->load('index.html');

                $parametros = array(); 

                $parametros['postagens'] = $postagens; 

                $conteudo = $template->render($parametros); 
                echo $conteudo;

            } catch (Exception $e) {
                echo $e->getMessage();
            }
    
        }
    }