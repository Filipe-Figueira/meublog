<?php 
require_once "../meublog/config.php";
class PostController {
    public function index($param) {

        $postagem = new Postagem();
        $postagem->selectById($param);

        $parametros = array();
        $parametros['titulo'] = $postagem->getTitulo();
        $parametros['conteudo'] = $postagem->getConteudo();
        $parametros['dataPostagem'] = $postagem->getDataPostagem();

        //Recuperar os Comentários
        $comentario = new Comentario();
        if ($comentario->listarComentarios($param)):
            $parametros['comentarios'] = $comentario->listarComentarios($param);
        else:
            $parametros['sc'] = 3;
        endif;

       $conteudo = renderizar("app/View/", "single.html", $parametros);
        echo $conteudo;
    }
}
?>