<?php
    class AdminController {
        public static function index() {
            $loader = new \Twig\Loader\FilesystemLoader('./View');
            $twig = new \Twig\Environment($loader);

            $template = $twig->load('Admin.html');
            $post = Postagem::getAll();

            $parametros['postagens'] = $post;

            $conteudo = $template->render($parametros);
            echo $conteudo;
        }

        public static function create() {
            $loader = new \Twig\Loader\FilesystemLoader('./View');
            $twig = new \Twig\Environment($loader);

            $template = $twig->load('create.html');

            $conteudo = $template->render();
            echo $conteudo;
        }

        public static function insert() {
            try{
                Postagem::insert($_POST);
                echo '<script>alert("Postagem criada com sucesso!")</script>';
                echo '<script>location.href="http://localhost/CRUD/?pagina=admin"</script>';

            } catch(Exception $e) {
                echo '<script>alert("'.$e->getMessage().'")</script>';
                echo '<script>location.href="http://localhost/CRUD/?pagina=admin&metodo=create"</script>';
            }
        }

        public static function editPage() {

            $post = Postagem::getOne();
            $loader = new \Twig\Loader\FilesystemLoader('./View');
            $twig = new \Twig\Environment($loader);

            $parametros['postagens'] = $post; 
            $template = $twig->load('Edit.html');

            $conteudo = $template->render($parametros);
            echo $conteudo;
        } 

        public static function edit() {
            try {
                Postagem::edit($_POST, $_GET['id']);
                echo '<script>alert("Postagem editada com sucesso!")</script>';
                echo '<script>location.href="http://localhost/CRUD/?pagina=admin"</script>';
            } catch(Exception $e) {

            }

        } 

        public static function delete() {
            try {
                Postagem::delete($_GET['id']);
                echo '<script>alert("Postagem deletada com sucesso!")</script>';
                echo '<script>location.href="http://localhost/CRUD/?pagina=admin"</script>';
            } catch(Exception $e) {

            }         
        }
    }