<?php 
require_once "C:/laragon/www/meublog/config.php";
validar();

class AdminController {
    public function logout() {
        session_start();
        session_destroy();
        session_unset();
        header("Location: ?page=home");
    }
    public function index() {
        $dir = "app/View/admin/";
        $file = "home.html";

        $postagem = new Postagem();
        $posts = $postagem->selectAllPosts();

        $parametros = array();
        $parametros['postagens'] = $posts;

        $conteudo = renderizar($dir, $file, $parametros);
        echo $conteudo;
    }

    public function create() {
        $dir = "app/View/admin/";
        $file = "create.html";
        $parametros = array();
        $conteudo = renderizar($dir, $file, $parametros);
        echo $conteudo;

        if (isset($_POST['titulo']) and isset($_POST['conteudo'])):
            $postagem = new Postagem();
            $postagem->setTitulo($_POST['titulo']);
            $postagem->setConteudo($_POST['conteudo']);
            $postagem->insertPost();
            $id= $postagem->getIdpostagem();
            header("Location: ?page=post&id=$id");
        endif;
    }
    
    public function update($params) {

        $postagem = new Postagem();
        $postagem->selectById($params);
        if (isset($_POST['titulo']) and isset($_POST['conteudo'])):
            $postagem->setTitulo($_POST['titulo']);
            $postagem->setConteudo($_POST['conteudo']);
        endif;

        $parametros = array();
        $parametros['titulo'] = $postagem->getTitulo();
        $parametros['conteudo'] = $postagem->getConteudo();
        $postagem->updatePost($params);

        $conteudo = renderizar("app/View/admin/", "update.html", $parametros);
        echo $conteudo;
    }

    public function delete($params) {
        $postagem = new Postagem();
        $postagem->deletePost($params);
        header("Location: ?page=admin");
    }


}
?>