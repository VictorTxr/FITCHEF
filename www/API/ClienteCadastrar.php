<?php 
  namespace FITCHEF\API;
  use FITCHEF\Model\Cliente;
  use FITCHEF\DAO\DAOCliente;
  
  class ClienteCadastrar{
  
      public $msg;
  
      function __construct(){
        echo "ok2";
        echo $_POST['nome'];
    if($_POST){
      echo "ok1";
        try{
            $obj = new Cliente();
            $obj->setNome($_POST['nome']);
            $obj->setTelefone($_POST['telefone']);
            $obj->setEmail($_POST['email']);
            $obj->setCPF($_POST['cpf']);
            $obj->setEndereco($_POST['endereco']);
            $obj->setCep($_POST['cep']);
            $obj->setSenha($_POST['senha']);
        
            $DAO = new DAOCliente();
            $this->msg = $DAO->cadastrar($obj);

        }catch(\Exception $e){
            $this->msg = $e->getMessage();
            echo $this->msg;
        
        }
    }
}
  }


    ?>