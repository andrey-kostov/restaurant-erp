<?php 

require_once ('classes.php');

class LeftColumnController extends Controller{
    public function index(){
        require 'language/text_left_column.php';
        $test = 'test';

        require 'views/left_column.php';
    }
}

?>
