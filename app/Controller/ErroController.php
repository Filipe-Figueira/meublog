<?php 
class ErroController {
    public  function index() {
        $loader = new \Twig\Loader\FilesystemLoader("app/View");
        $twig = new Twig\Environment($loader);
        $template = $twig->load('404.html');

        $parametros = [];
        $conteudo = $template->render($parametros);
        echo $conteudo;
    }
}
?>