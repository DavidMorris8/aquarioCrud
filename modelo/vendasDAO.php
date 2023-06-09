<?php 

require_once 'conexao.php';

class Vendas
{
    private $connexao;

    public function __construct(){
        $dataBase = new dataBase();
        $this->connexao = $dataBase->dbConnection();                       
    }

    public function runQuery($sql){
        $stmt = $this->connexao->prepare($sql);
        return $stmt;
    }

    public function insert($idCliente, $idProduto, $diaVenda, $quantidade){
        try{
            $sql = "INSERT INTO vendas (idCliente, idProduto, diaVenda, quantidade) VALUES (:idCliente, :idProduto, :diaVenda, :quantidade)";
            $stmt = $this->connexao->prepare($sql);
            $stmt->bindParam(':idCliente', $idCliente);
            $stmt->bindParam(':idProduto', $idProduto);
            $stmt->bindParam(':diaVenda', $diaVenda);
            $stmt->bindParam(':quantidade', $quantidade);
            $stmt->execute();

            return $stmt;
        }catch(PDOException $e){
            echo $e -> getMessage();
        }
    }

    public function deletar($id){
        try {
            $sql = "DELETE FROM vendas WHERE id = :id";
            $stmt = $this->connexao->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function editar($idCliente, $idProduto, $diaVenda, $quantidade, $id){
        try {
            $sql = "UPDATE vendas SET iCliente = :iCliente, idProduto = :idProduto, valor = :valor where id = :id";

            $stmt = $this->connexao->prepare($sql);
            $stmt->bindParam(':iCliente', $iCliente);
            $stmt->bindParam(':idProduto', $idProduto);
            $stmt->bindParam(':valor', $valor);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function redirect($url){
        header("Location: $url");
    }

}