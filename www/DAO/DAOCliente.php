<?php

namespace FITCHEF\DAO;

use FITCHEF\Model\Conexao;
use FITCHEF\Model\Cliente;
use FITCHEF\Model\Usuario;


    class DAOCliente{

    public $lastId;

    public function cadastrar(Cliente $cliente){

            $pdo = Conexao::getInstance(); // Cria objeto de conexão
            $pdo->beginTransaction();// Inicia a transação

            try{

                $con = $pdo->prepare(
                    "INSERT INTO cliente VALUES 
                        (default, :nome, :telefone, :email, :cpf, :endereco, :cep, :senha)"
                );
            
            $con->bindValue(":nome", $cliente->getNome());
            $con->bindValue(":telefone", $cliente->getTelefone());
            $con->bindValue(":email", $cliente->getEmail());
            $con->bindValue(":cpf", $cliente->getCPF());
            $con->bindValue(":endereco", $cliente->getEndereco());
            $con->bindValue(":cep", $cliente->getCEP());
            $con->bindValue(":senha", $cliente->getSenha());
            $con->execute();
        
            
            $this->lastId = $pdo->lastInsertId(); // Retorna o ID do cliente cadastrado
            $pdo->commit(); // Finaliza a transação
            return "Cadastrado com sucesso";

        }catch(Exception $e){
            $this->lastId= 0;
            $pdo->rollback();
            return "Erro ao cadastrar";
        }
    }


        
        public function deleteAll(){
            $sql = "DELETE from cliente";
            $con = Conexao::getInstance()->prepare($sql);
            $con->execute();
            return "todos excluídos com sucesso";
        }

        public function deleteFromId($id){
            $sql = "delete from cliente";
            $con = Conexao::getInstance()->prepare($sql);
            $con->execute();
            return "todos excluídos com sucesso";
        }


        public function listaClientes(){

            $sql = "SELECT * FROM cliente";
            $con = conexao::getInstance()->prepare($sql);
            $con->execute();

            $lista = array();

            while($cliente = $con->fetch(\PDO::FETCH_ASSOC)) {
                $lista[] = $cliente;
            }

            return $lista;
        }

        public function buscaPorId($id){
            $sql = "SELECT * FROM cliente WHERE pk_cliente = :id";
            $con = Conexao::getInstance()->prepare($sql);
            $con->bindValue(":id",$id);
            $con->execute();

            $cliente = new Cliente();
            $cliente = $con->fetch(\PDO::FETCH_ASSOC);
            
            return  $cliente;

        }

        public function buscaPorEmailSenha(Cliente $cliente){
            
            $sql = "SELECT * FROM cliente WHERE email = :email AND senha = :senha";

            $con = Conexao::getInstance()->prepare($sql);
            $con->bindValue(":email", $cliente->getEmail());
            $con->bindValue(":senha", $cliente->getSenha());
            $con->execute();





                $obj = new Cliente();
                $obj = $con->fetch(\PDO::FETCH_ASSOC);
                var_dump($obj);
                return $obj;
           
            
        }

      
    }
?>