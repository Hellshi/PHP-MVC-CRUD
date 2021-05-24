<?php

    require_once './Core/core.php';

    require_once './Model/model.php';

    require_once './lib/database/connection.php';
   
    require_once './Model/comentsModel.php';

    //Carregando os controllers
    require_once './Controller/HomeController.php';

    require_once './Controller/AdminController.php';

    require_once './Controller/SobreController.php';

    require_once './Controller/ErrorController.php';

    require_once './Controller/PostController.php';

    require_once 'vendor/autoload.php';

    //Carregando o Template
    $template = file_get_contents('./Templates/nav.html');

    //Requerindo no nosso core e pegando o conteúdo dos controllers: 
    ob_start();
        $core = new core; 
        $core->start($_GET); 
        $saida = ob_get_contents();

    ob_end_clean(); 
    //Substituindo aquela mensagem pelo seu conteudo: 

    $tplFinished = str_replace('conteudo', $saida, $template);

    //Carregando tudo na página (Dedos cruzados)
    echo $tplFinished;
?>