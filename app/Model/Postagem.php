<?php 
class Postagem {
    private $idPostagem;
    private $titulo;
    private $conteudo;
    private $dataPostagem;

    public function __construct($titulo="", $conteudo="") {
        $this->setTitulo($titulo);
        $this->setConteudo($conteudo);
    }

    public function getIdpostagem(){
       return $this->idPostagem;
    }
    public function setIdpostagem($id){
       return $this->idPostagem = $id;
    }
    public function getTitulo(){
       return $this->titulo;
    }
    public function setTitulo($titulo){
       return $this->titulo = $titulo;
    }
    public function getConteudo(){
       return $this->conteudo;
    }
    public function setConteudo($conteudo){
        $this->conteudo = $conteudo;
    }
    public function getDataPostagem() {
        $dateFormatter = IntlDateFormatter::formatObject($this->dataPostagem, "eee, d MMMM Y", "pt-AO");
        return ucwords($dateFormatter);
    }
    public function setDataPostagem($data) {
        $this->dataPostagem = $data;
    }
    
    public function setDados($dados) {
        $this->setIdpostagem($dados['idPostagem']);
        $this->setTitulo($dados['titulo']);
        $this->setConteudo($dados['conteudo']);
        $this->setDataPostagem(new DateTime($dados['dataPostagem']));
    }
    public function insertPost(){
        $conn = Conexao::getConn();
        $sql = "INSERT INTO postagem(titulo, conteudo)VALUES (:TITULO, :CONTEUDO);";
        $stmt= $conn->prepare($sql);
        $stmt->bindValue(":TITULO", $this->getTitulo());
        $stmt->bindValue(":CONTEUDO", $this->getConteudo());
        $res = $stmt->execute();
        $sql = "SELECT * FROM postagem ORDER BY idPostagem DESC;";
        $st = $conn->prepare($sql);
        $st->execute();
        
        $dados = $st->fetchAll(PDO::FETCH_ASSOC);
        if ($st->rowCount() > 0) {
            $res = $dados[0];
        }
        $this->setDados($res);
        if ($res == false):
            throw new Exception("Falha na inserção");
            return false;
        endif;
        
        return $res;
    }
    public static function selectAllPosts(){
        $conn = Conexao::getConn();
        $sql = "SELECT * FROM postagem;";
        $stmt= $conn->prepare($sql);
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $resultados;
    }
    public function selectById($idPost){
        $conn = Conexao::getConn();
        $sql = "SELECT * FROM postagem WHERE idPostagem = :ID;";
        $stmt= $conn->prepare($sql);
        $stmt->bindValue(":ID", $idPost, PDO::PARAM_INT);
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($stmt->rowCount() > 0):
            $res = $res[0];
            $this->setDados($res);
            return $res;
        endif; 
    }
    public function updatePost($idPost){
        $conn = Conexao::getConn();
        $sql = "UPDATE postagem SET titulo = :TITULO, conteudo = :CONTEUDO WHERE idPostagem = :ID;";
        $stmt= $conn->prepare($sql);
        $stmt->bindValue(":ID", $idPost, PDO::PARAM_INT);
        $stmt->bindValue(":TITULO", $this->getTitulo());
        $stmt->bindValue(":CONTEUDO", $this->getConteudo());
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $res;
    }
    public function deletePost($idPost){
        $conn = Conexao::getConn();
        $sql = "CALL delete_post_and_coments(:ID);";
        $stmt= $conn->prepare($sql);
        $stmt->bindValue(":ID", $idPost, PDO::PARAM_INT);
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $res;
    }
    
}
?>