<?php
function render($path, array $variables=[]){
extract($variables);
ob_start();
require('templates/'.$path.'.html.php');
$pageContent = ob_get_clean();

require('templates/layout.html.php');
}


function redirect($url):void{
    header("Location: $url");
exit();
}