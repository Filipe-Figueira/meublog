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
     * Esta função foi criada para ajudar a separar o Front-end(HTML) do Back-end(PHP) usando o "Twig Template", ela recebe três parâmetros:
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

function resumirTexto(string $texto, int $limite, string $continue = '...'): string {
        $textoLimpo = trim(strip_tags($texto));

        if (mb_strlen($textoLimpo) <= $limite) {
            return $textoLimpo;
        }
        $resumirTexto = mb_substr($textoLimpo, 0, mb_strrpos(mb_substr($textoLimpo, 0, $limite), ''));

        return $resumirTexto . $continue;
    }
?>