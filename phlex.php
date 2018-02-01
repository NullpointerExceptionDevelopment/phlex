<?php 
/**
*    _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _        _ _ _ _
*   \_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\      /_/_/_/_/
*        _ _ _ _        _     _       _         _ _ _    \_\    /_/
*       /_/_/_/_/|     /_/|  /_/|    /_/|      /_/_/_/|   \_\  /_/ 
*      /_/|__/_/ /    /_/ / /_/ /   /_/ /     /_/|___|/    \_\/_/
*     /_/_/_/_/ /    /_/_/_/_/ /   /_/ /     /_/_/_/|      /_/\_\
*    /_/|_____|/    /_/|__/_/ /   /_/_/_    /_/____|/     /_/  \_\ 
*   /_/ /          /_/ / /_/ /   /_/_/_/|  /_/_/_/|      /_/    \_\
*   |_|/           |_|/  |_|/    |_____|/  |_____|/     /_/      \_\     
*       
*   
*   Copyright © 2018 Paitorocxon, MarioCake and SgtWalking
*       Social Media Engine 
*/

session_start([
    'cookie_lifetime' => 86400,
]);
//INITIALIZATION PROCESS
//###Initializing modules
include_once('modules/loader.php');
$initialize = new initialize();
$initialize->modules();
set_error_handler("errorhand::ErrorHandler");

    //CLASS DECLARES
        $javascript = new javascript();
        $html = new html();
        $login = new logining();
        $upload = new uploading();
    //_CLASS DECLARES

//_INITIALIZATION PROCESS


//PAGE LOAD
    $login->isLoggedin();
//_PAGE LOAD

//HTML
    $upload->uploadscript();
    $html->masterstart();
    $html->titlebar($html->plater());
    $javascript->cube();
    $image=imagecreatefromjpeg('uploads/'.$_SESSION['username']);
    $thumb=imagecreatetruecolor(1,1); imagecopyresampled($thumb,$image,0,0,0,0,1,1,imagesx($image),imagesy($image));
    $mainColor=strtoupper(dechex(imagecolorat($thumb,0,0)));
    
    echo $html->css($mainColor);
    $html->space();
    echo $html->upload();
    $html->masterend();
    var_dump($SESSION);
//_HTML