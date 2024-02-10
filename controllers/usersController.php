<?php 
require_once ('classes.php');

class usersController extends Controller{

    public function userList(){
        require ('language/textCommon.php');
        require ('language/textUsers.php');
        require ('config.php');
        
        require ('views/users/list.php');
    }

    public function userAdd(){
        require ('language/textCommon.php');
        require ('language/textUsers.php');
        require ('config.php');
        
        require ('views/users/add.php');
    }
}