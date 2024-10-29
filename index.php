<?php 
    require_once "meuAutoload.php";
    require_once "vendor/autoload.php";
    date_default_timezone_set("Europe/Paris");

    $template = file_get_contents('app/View/layout.html');
    ob_start();
        $core = new Core();
        $core->start($_GET);
        $pag = ob_get_contents();
    ob_end_clean();
    
    $tpl = str_replace("{{area_dinamica}}", $pag, $template);
    echo $tpl;
?>
