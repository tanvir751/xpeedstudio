<?php

    class Route{

        public $controller = "Buyer";
        public $method = "index";
        public $perams = [];

        public function __construct()
        {
            $url = $this->url();
            if(!empty($url)){  
                if(file_exists("../application/controllers/". $url[0].".php")){
                    $this->controller = $url[0];
                    unset($url[0]);
                }
                // else{
                //     echo   "<div style='background:red; padding:10px; margin:10px;'>Sorry!. Your Requested Controller ".$this->controller." Not Found. </div>";
                // }
            }   
            
            require_once "../application/controllers/". $this->controller .".php";
            $this->controller = new $this->controller;

            if(isset($url[1]) && !empty($url)){
                if(method_exists($this->controller, $url[1])){
                    $this->method = $url[1];
                    unset($url[1]);
                }
                // else{
                //     echo   "<div style='background:red; padding:10px; margin:10px;'>Sorry!. Your Requested Method ".$this->method." Not Found. </div>";
                // }
            }


            if(isset($url)){
                $this->perams = $url;
            }else{
                $this->perams = [];
            }


            call_user_func_array([$this->controller, $this->method], $this->perams);
        }

        public function url(){
            if(isset($_GET['url'])){
                $url = $_GET['url'];
                $url = rtrim($url);
                $url = filter_var($url, FILTER_SANITIZE_URL);
                $url = explode("/", $url);

                return $url;
            }
        }
    }

?>