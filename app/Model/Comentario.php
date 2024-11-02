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

    public function insertComent($idPost){
        $idPost = (Integer) $idPost;
        $conn = Conexao::getConn();
        $sql = "INSERT INTO comentario(nome, mensagem, idPostagem) VALUES (:TITULO, :CONTEUDO, :ID)";
        $stmt= $conn->prepare($sql);
        $stmt->bindValue(':ID', $idPost);
        $stmt->bindValue(":TITULO", $this->getNome());
        $stmt->bindValue(":CONTEUDO", $this->getMensagem());
        $stmt->execute();
    }
}