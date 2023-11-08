<?php

require_once ('classes.php');

class headerController extends Controller{
    public function index(){
        require_once ('config.php');
        
        $headerLogo ='';
        $headerTitle='Restourant CMS';
        $root = $globalRoot;

        require 'views/header.php';
    }
}

?>