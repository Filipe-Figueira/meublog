<?php 
class HomeController {
    public function index() {
        
        $loader = new \Twig\Loader\FilesystemLoader("app/View");
        $twig = new Twig\Environment($loader);
        $template = $twig->load("home.html");

        $postagem = new Postagem();
        $dados = $postagem->selectAllPosts();

        $parametros = array();
        $parametros['postagens'] = $dados;
        $conteudo = $template->render($parametros);
        echo $conteudo;
    }
}
?>