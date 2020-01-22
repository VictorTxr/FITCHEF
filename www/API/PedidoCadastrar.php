<?php
namespace FITCHEF\API;
use FITCHEF\Model\Cliente;
use FITCHEF\Model\Pedido;
use FITCHEF\Model\Carrinho;
use FITCHEF\DAO\DAOPedido;
class PedidoCadastrar{
    public $msg;
    function __construct($url){
           
     if (isset($_SESSION['clienteid'])){ 
        $this->efetuarPedido();
        
        header("location:".$url."/pedido/pagamento");
     }else{ 
         
            $_SESSION['url'] = $url."/pedido/finalizar";
            
            header("location: ".$url." /login/cliente");

     }
    }
        
        function efetuarPedido(){ 

            try{ 

                 $obj = new Pedido();
                 $obj->setData('2019-12-25');
                 $obj->setFrete(20.00);
                 $obj->setDias(5);

                 $DAO = new DAOPedido();
                 $this->msg = $DAO->cadastrar($obj,$_SESSION['carrinho']);

                 echo $this->msg;

                 if(isset($_SESSION['url'])){
                     unset($_SESSION['url']);
                 }

            }catch(Exception $e){ 
                $this->msg = $e->getMessage();

            }
    }
    }
