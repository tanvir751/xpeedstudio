<?php

   function linkCss($cssPath){
        $url = BASE_URL . "/" . $cssPath;
        echo '<link rel="stylesheet" href="'. $url .'">';
   }

   function linkJs($jsPath){
    $url = BASE_URL . "/" . $jsPath;
    echo '<script src="'. $url .'"></script>"';
}

?>