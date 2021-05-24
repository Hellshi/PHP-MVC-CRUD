<?php
    class Postagem{
        public static function getAll() {

            $con = connection::getCon();
            
            $sql = "SELECT * FROM post ORDER BY id DESC"; 
            $sql = $con->prepare($sql); 
            $sql->execute(); 

            $resultado = array(); 

            while ($row = $sql->fetchObject('Postagem')) {
                $resultado[] = $row;
            }

            if(!$resultado) { 
                throw new Exception ('Não foi encontrada nenhuma postagem');
            }

            return $resultado;
        }

        //Pegando um único Post 

        public static function getOne() {

            //Arrumar isso depois, aparentemente não é legal passar isso assim (O River materia) kkkkk
            $id = $_GET['id'];

            $con = connection::getCon();
            
            $sql = "SELECT * FROM post WHERE id='$id'"; 
                $sql = $con->prepare($sql); 
                    $sql->execute(); 
            
                        $resultado = array(); 

            while ($Row = $sql->fetchObject('Postagem')) {
                $resultado[] = $Row;
            }

            if(!$resultado) {
                throw new Exception("Não foi encontrado nenhum resultado no banco");
            } else {
                $resultado[0]->comment = Comments::GetComment($id);
            }

            return $resultado;

        }

    public static function insert ($dados) { 

        if (empty($dados['titulo']) OR empty($dados['conteudo'])) {
            throw new Exception ("Todos os campos devem ser preenchidos");
        }

        $con = Connection::getCon();

        $sql = $con->prepare('INSERT INTO post (titulo, conteudo) VALUES (:tit, :cont)'); 
            $sql->bindValue(':tit', $dados['titulo']); 
            $sql->bindValue(':cont', $dados['conteudo']); 
        $res = $sql->execute();

            if($res == 0 ) {
                throw new Exception("Parece que houve um erro ao inserir a postagem");
                return false; 
            }
                return true;
    }

    public
     static function edit($edited, $id) {

        $con = Connection::getCon();

        $sql = $con->prepare("UPDATE post SET titulo = :tit, conteudo = :cont WHERE id='$id'");
            $sql->bindValue(':tit', $edited['titulo']); 
                $sql->bindValue(':cont', $edited['conteudo']); 
                    $res = $sql->execute();

        if($res == 0 ) {
            throw new Exception("Parece que houve um erro ao inserir a postagem");
                return false; 
        }
            return true;
    }

    public static function delete($id) {
        $con = Connection::getCon(); 
        
        $sql = $con->prepare("DELETE FROM post WHERE id='$id'"); 
            $sql->execute();
    }
}