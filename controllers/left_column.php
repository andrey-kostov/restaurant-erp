<?php 

require_once ('classes.php');

class LeftColumnController extends Controller{
    public function index(){
        $test = 'test';
    }
}

$leftColumnController = new LeftColumnController();

var_dump($leftColumnController);
?>
