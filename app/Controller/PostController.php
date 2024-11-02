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

        $comentario = new Comentario();
        //Inserindo Comentários
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):
            if (isset($_POST['nome']) and isset($_POST['mensagem'])):
                $nome = $_POST['nome'];
                $mensagem = $_POST['mensagem'];
                $comentario->setNome($nome);
                $comentario->setMensagem($mensagem);
                $comentario->insertComent($param);
            endif;
        endif;
        //Recuperar os Comentários do Banco
        if ($comentario->listarComentarios($param)):
            $parametros['comentarios'] = $comentario->listarComentarios($param);
        else:
            $parametros['comentarios'] = false;
        endif;

       $conteudo = renderizar("app/View/", "single.html", $parametros);
        echo $conteudo;
     }
}
?>