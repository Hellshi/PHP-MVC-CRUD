<?php
    class PostController {
        public function index() {
 
            $post = Postagem::getOne();

                $loader = new \Twig\Loader\FilesystemLoader('./View');
                $twig = new \Twig\Environment($loader);

                $template = $twig->load('SiglePost.html');

                $parametros = array(); 

                $parametros['posts'] = $post; 
                $parametros['comentarios'] = $post[0]->comment;

                $conteudo = $template->render($parametros); 
         
               echo $conteudo;

        }
    }