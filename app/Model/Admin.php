<?php 
class Admin {
    private $idUsuario;
    private $username;
    private $senha;

    public function getIdUsuario() {
        return $this->idUsuario;
    }
    public function setIdUsuario($id) {
        return $this->idUsuario = $id;
    }
    public function getUsername() {
        return $this->username;
    }
    public function setUsername($user) {
        return $this->username = $user;
    }
    public function getSenha() {
        return $this->senha;
    }
    public function setSenha($senha) {
        return $this->senha = $senha;
    }

    public function setDados($dados) {
        $this->setIdUsuario($dados['idUsuario']);
        $this->setUsername($dados['username']);
        $this->setSenha($dados['senha']);
    }
    public static function verificaLogin($user, $password) {
        $sql = "SELECT * FROM usuario WHERE username like :USERNAME AND senha like :SENHA";
        $conn = Conexao::getConn();
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(":USERNAME", $user);
        $stmt->bindValue(":SENHA", $password);
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (!empty($res)):
            return $res;
        else:
            return false;
        endif;
    }
}
?>