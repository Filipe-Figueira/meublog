<?php 
function validar(){
    session_start();
    if (!isset($_SESSION['logado'])) :
        session_unset();
        session_destroy();
        header("Location: ?page=login");
    endif;
}

function renderizar($diretorio, $arquivo, $dados = array()) {
    /**
     * @author Filipe Figueira
     * Esta função foi criada para ajudar a separar o Front-end(HTML) do Back-end(PHP) ela recebe três parâmetros:
     * $diretorio -> A pasta que contém nossos arquivos HTML
     * $arquivo -> O arquivo que deve ser carregado
     * $dados[] -> O array que contém os dados a serem apresentados 
     */
    $loader = new \Twig\Loader\FilesystemLoader($diretorio);
    $twig = new \Twig\Environment($loader);
    $template = $twig->load($arquivo);

    $conteudo = $template->render($dados);
    return $conteudo;
}

?>