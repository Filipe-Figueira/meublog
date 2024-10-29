<?php 

class Core {
    public function start($queryString) {
        if (isset($queryString['page'])):
            $controller = ucfirst($queryString['page'])."Controller";
        else:
            $controller = "HomeController";
        endif;

        if(!class_exists($controller)):
            $controller = "ErroController";
        endif;

        if (isset($queryString['metodo'])):
            $metodo = mb_strtolower($queryString['metodo']);
        else:
            $metodo = "index";
        endif;
        
        call_user_func_array(array(new $controller, $metodo), array($queryString['id'] ?? ''));
    }
}
?>