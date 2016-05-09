<?php
class Pdo_Object  extends  PDO{
    function __construct() {
    //parent::__construct("mysql:host=localhost;dbname=book_of_proposition;", 'root', '2217254');
        parent::__construct("mysql:host=127.8.103.2:3306;dbname=book_of_proposition;", 'adminN5Lb6uF', 'rpIi3PU14e48');
    }
}