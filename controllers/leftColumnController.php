<?php 

require_once ('classes.php');

class LeftColumnController extends Controller{
    public function index(){
        require ('language/textLeftColumn.php');
        require ('config.php');
        
        $root = $globalRoot;

        require ('views/leftColumn.php');
    }
}

?>
