<?php
    class Framework{

        public function view($viewName, $data = []){
            if(file_exists("../application/views/".$viewName.".php")){
                require_once "../application/views/".$viewName.".php";
            }
            // else{
            //     echo   "<div style='background:red; padding:10px; margin:10px;'>Sorry!. Your Requested View  ".$viewName." Not Found. </div>";
            // }
        }

        public function model($modelName){
            if(file_exists("../application/models/".$modelName.".php")){
                require_once "../application/models/".$modelName.".php";
                return new $modelName;
            }
            // else{
            //     echo   "<div style='background:red; padding:10px; margin:10px;'>Sorry!. Your Requested Model  ".$modelName." Not Found. </div>";
            // }
        }


        public function input($inputName)
        {
            if($_SERVER['REQUEST_METHOD'] == "POST" || $_SERVER['REQUEST_METHOD'] == "post"){
                if(is_array($_POST[$inputName])){
                    return $_POST[$inputName];
                }else{
                    return trim(strip_tags($_POST[$inputName]));
                }
            }else if($_SERVER['REQUEST_METHOD'] == "GET" || $_SERVER['REQUEST_METHOD'] == "get"){
                return trim(strip_tags($_POST[$inputName]));
            }
        }

        public function helper($helperName){
            if(file_exists("../system/helpers/".$helperName.".php")){
                require_once "../system/helpers/".$helperName.".php";
            } else{
                echo   "<div style='background:red; padding:10px; margin:10px;'>Sorry!. Your Requested Helpers  ".$helperName." Not Found. </div>";
            }           
        }


        public function setSession($key, $value){
            if(!empty($key) && !empty($value)){
                $_SESSION[$key] = $value;
            }
        }

        public function getSession($key){
            if(!empty($key)){
                return $_SESSION[$key];
            }
        }
        
        public function setFlash($key, $value){
            if(!empty($key) && !empty($value)){
                $_SESSION[$key] = $value;
            }
        }
        public function flash($key, $className){
            if(!empty($key) && !empty($className) && isset($_SESSION[$key])){
               echo "<div class='".$className."'>".$_SESSION[$key]."</div>";
               unset($_SESSION[$key]);
            }
        }

        public function unsetSession($key){
            if(!empty($key)){
                unset($_SESSION[$key]);
            }
        }

        public function destroy(){
            session_destroy();
        }


        public function redirect($path){
            header("location:". BASE_URL."/". $path);
        }

        public function getIPAddress() {  
            //whether ip is from the share internet  
            if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                    $ip = $_SERVER['HTTP_CLIENT_IP'];  
            }  
            //whether ip is from the proxy  
            elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
             }  
            //whether ip is from the remote address  
            else{  
                $ip = $_SERVER['REMOTE_ADDR'];  
             }  
             return $ip;  
        }  

        public function getDate(){
            $date = new DateTime("now", new DateTimeZone('Asia/Dhaka') );
            return $date->format('Y-m-d');
        }
        

    }
?>