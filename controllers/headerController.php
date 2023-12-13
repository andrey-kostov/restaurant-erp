<?php

require_once ('classes.php');

class headerController extends Controller{
    public function index(){
        require_once ('config.php');
        
        
        $root = $globalRoot;
        $storeCurrency = $globalCurrency;
        
        
        

        $headerLogo ='';
        $headerTitle='Restourant CMS';

        require 'views/header.php';
    }
}

?>