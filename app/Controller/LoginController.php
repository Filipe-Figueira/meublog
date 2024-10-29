<?php 
class LoginController {

    public function index() {

        $loader = new \Twig\Loader\FilesystemLoader("app/View/admin/");
        $twig = new \Twig\Environment($loader);
        $template = $twig->load("login.html");

        if ($_SERVER['REQUEST_METHOD'] == 'POST'):
            if (isset($_POST['username']) and isset($_POST['senha'])):
                $usuario = $_POST['username'];
                $senha = $_POST['senha'];
                $verify = Admin::verificaLogin($usuario, $senha);
                if ($verify) :
                    session_start();
                    $_SESSION['logado'] = true;
                    header("Location: ?page=Admin");
                endif;
            endif;
        endif;
        $parametros = array();
        $conteudo = $template->render($parametros);
        echo $conteudo;
    }
}
?>