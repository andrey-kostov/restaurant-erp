<?php 

class Controller {
    function index(){
        require ('config.php');
    }
}

class Model {
    function index(){
        require ('config.php');
        require ('configDb.php');        
    }
}

?>