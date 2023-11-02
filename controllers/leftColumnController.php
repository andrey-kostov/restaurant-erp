<?php 

require_once ('classes.php');

class LeftColumnController extends Controller{
    public function index(){
        require 'language/textLeftColumn.php';
        $test = 'test';

        require 'views/leftColumn.php';
    }
}

?>
