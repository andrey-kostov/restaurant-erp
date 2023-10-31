<?php 
require_once ('classes.php');

class dashboardController extends Controller{
    public function index(){
        $test = 'This is DASHBOARD';

        echo $test;
    }
}
?>