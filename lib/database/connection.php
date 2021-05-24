<?php

    abstract class Connection {
        private static $conn; 

        public static function getCon() {
            if(self::$conn == null) {
                self::$conn = new PDO('mysql: host=localhost; dbname=crud', 'hell', '621251');
                
            }
                return self::$conn;
        }
    }