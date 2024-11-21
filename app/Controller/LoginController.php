<?php 
class LoginController {

    public function index() {

        $loader = new \Twig\Loader\FilesystemLoader("app/View/admin/");
        $twig = new \Twig\Environment($loader);
        $template = $twig->load("login.html");
        $parametros = array();

        if ($_SERVER['REQUEST_METHOD'] == 'POST'):
            $usuario = $_POST['username'];
            $senha = $_POST['senha'];
            if (empty($usuario) or empty($senha)):
                $parametros['erros'] = "Preencha todos os campos!";
            else:
                if (Admin::verificaLogin($usuario, $senha)):
                    $parametros['erros'] = 0;
                    session_start();
                    $_SESSION['logado'] = true;
                    header("Location: ?page=Admin");
                else:
                    $parametros['erros'] = "Usuário/Senha inválido!";
                endif;
            endif;
        endif;
        $conteudo = $template->render($parametros);
        echo $conteudo;
    }
}

?>