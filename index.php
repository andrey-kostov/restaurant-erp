<?php 
    // Get the requested URL
    $url = isset($_GET['url']) ? $_GET['url'] : '';
    //Check if is ajax function
    $haystack = $url;
    $needle = 'ajax';
    if (strpos($haystack, $needle) !== false) {
        $isAjax = true;
    } else{
        $isAjax = false;
    }

    if($isAjax === false){
        //Header include
        include('controllers/headerController.php');
        $headerInstance = new headerController;
        $headerInstance->index();

        //Left Column include
        include('controllers/leftColumnController.php');
        $leftColumnInstance = new LeftColumnController;
        $leftColumnInstance->index();
        
        //Body start
        echo '<div class="col-sm-9 main-body">';
    }


        // Split the URL into controller and action
        $firstTrim = explode('?', $url); 
        $parts = explode('/', $firstTrim[0]);
        $controller = isset($parts[0]) ? $parts[0] : 'activeTables'; // Default controller
        $action = isset($parts[1]) ? $parts[1] : 'index';    // Default action

        if($controller == ''){
            $controller = 'activeTables';
        }

        
        // Include the appropriate controller file
        $controllerFile = 'controllers/'. $controller . 'Controller.php';


        if (file_exists($controllerFile)) {
            require $controllerFile;
            // Create an instance of the controller and call the action
            $controllerClass = $controller . 'Controller';
            $controllerInstance = new $controllerClass();
            if (method_exists($controllerInstance, $action)) {
                $controllerInstance->$action();
            } else {
                // Handle action not found error
                echo "Action not found";
            }
        } else {
            // Handle controller not found error
            echo "Controller not found";
            
        }

    if($isAjax === false){
        //Body End
        echo '</div>';
        
        //Footer include
        include('controllers/footerController.php');
        $footerInstance = new footerController;
        $footerInstance->index();
    }
?>
