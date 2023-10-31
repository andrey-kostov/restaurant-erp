<?php

require_once ('classes.php');

class headerController extends Controller{
    public function index(){
        
        $headerLogo ='';
        $headerTitle='Restourant CMS';

        require 'views/header.php';
    }
}

?>