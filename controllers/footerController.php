<?php

require_once ('classes.php');

class footerController extends Controller{
    public function index(){
        $testFooter = 'This is footer';

        require 'views/footer.php';
    }
}

?>