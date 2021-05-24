<?php 
    
    class Comments {
        public static function GetComment($id) {

            $conn = Connection::getCon();

            $sql = "SELECT * FROM comentarios WHERE id_post =$id"; 
            $sql = $conn->prepare($sql); 
            $sql->execute();  
            
            $resultado = array();

            while( $row = $sql->fetchObject('Comments') ) {
                $resultado[] = $row;
            }

            return $resultado;

        }
    }