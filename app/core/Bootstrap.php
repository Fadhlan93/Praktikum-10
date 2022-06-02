<?php 
 
 namespace App\Core; 
 
 /**
 * controller/action/params
 */ 
 class Bootstrap 
 { 
 
      public function __construct() 
      { 
        // Jika url diakses 
        if (isset($_GET['page'])) { 
            // filter_var = Filter Url 
            $url = filter_var($_GET['page'], FILTER_SANITIZE_URL); 
            // trim = Hilangkan space 
            $url = trim($url); 
            // explode = Membagi string diantara slash 
            $url = explode('/', $url); 
            // ucfirst = Uppercase First 
            // array_shift = mengambil nilai pertama array 
            $page = ucfirst(array_shift($url)); 
 
            if (file_exists(ROOT . "app/controllers/" . $page . ".php")) { 
                $class = "App\\Controllers\\" . $page; 
                $controller = new $class; 
                // cek method 
                $action = array_shift($url); 
                if (method_exists($controller, $action)) { 
                // Parameters = controller/detail/1 
                $params = array_values($url); 
                if(!emptyempty($params)) { 
                call_user_func_array(array($controller, $action),
                $params);
                } else { 
                    $controller->{$action}(@$url); 
                } 
            } else { 
                $controller->index(); 
            } 
        } else { 
            $class = "App\\Core\\Error"; 
            $controller = new $class(); 
            $controller->fileNotFound(); 
        } 
 
    } else { 
        $class = "App\\Controllers\\Index"; 
        $controller = new $class(); 
        $controller->index(); 
    } 
  } 
} 
