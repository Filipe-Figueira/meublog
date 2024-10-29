<?php
class Comentario {
    private $idComentario;
    private $nome;
    private $mensagem;
    private $idPostagem;

    public function getIdComentario() {
        return $this->idComentario;
    }
    public function setIdComentario($id) {
        return $this->idComentario = $id;
    }
    public function getNome() {
        return $this->nome;
    }
    public function setNome($nome) {
        return $this->nome = $nome;
    }
    public function getMensagem() {
        return $this->mensagem;
    }
    public function setMensagem($msg) {
        return $this->mensagem = $msg;
    }
    public function getIdpostagem() {
        return $this->idPostagem;
    }
    public function setIdpostagem($id) {
        return $this->idPostagem = $id;
    }

    public function setDados($dados) {
        $this->setIdComentario($dados['idComentario']);
        $this->setNome($dados['nome']);
        $this->setMensagem($dados['mensagem']);
        $this->setIdpostagem($dados['idPostagem']);
      //  $this->setDataComentario(new DateTime($dados['dataPostagem']));
    }

    public function listarComentarios($idComent) {
        $sql = "SELECT * FROM comentario WHERE idPostagem = :ID";
        $conn = Conexao::getConn();
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(":ID", $idComent);
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    public function insertPost($idPost){
        $conn = Conexao::getConn();
        $sql = "INSERT INTO comentario(nome, mensagem) VALUES (:TITULO, :CONTEUDO); WHERE idPostagem = :ID";
        $stmt= $conn->prepare($sql);
        $stmt->bindValue(':ID', $idPost);
        $stmt->bindValue(":TITULO", $this->getNome());
        $stmt->bindValue(":CONTEUDO", $this->getMensagem());
        $stmt->execute();
    }
}